<?php

namespace App\Http\Controllers;

use App\Models\AllBlogs;
use App\Models\AllCollections;
use App\Models\BlogAbout;
use App\Models\Blogger;
use App\Models\BloggerProduct;
use App\Models\Category;
use App\Models\Country;
use App\Models\FAQs;
use App\Models\HideUnhide;
use App\Models\Image;
use App\Models\ImagePostTemplateFive;
use App\Models\ImagePostTemplateFour;
use App\Models\ImagePostTemplateOne;
use App\Models\ImagePostTemplateSix;
use App\Models\ImagePostTemplateThree;
use App\Models\ImagePostTemplateTwo;
use App\Models\Like;
use App\Models\PostCollection;
use App\Models\SavePost;
use App\Models\Video;
use App\Models\VideoPostTemplateFive;
use App\Models\VideoPostTemplateFour;
use App\Models\VideoPostTemplateOne;
use App\Models\VideoPostTemplateSix;
use App\Models\VideoPostTemplateThree;
use App\Models\VideoPostTemplateTwo;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $LIMIT = 10;

        $posts['image'] = Image::orderBy('created_at', 'DESC')->get();
        $posts['video'] = Video::orderBy('created_at', 'DESC')->get();
        $posts['posts'] = $this->allpost($posts['image'],$posts['video'],$LIMIT);
        $posts['view'] = $this->mostviewd();

        $posts['latestPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();
        $posts['allPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();
        $posts['mostViewed'] = collect($posts['view'])->sortBy('created_at')->reverse();
        $posts['blogs'] = AllBlogs::all();

        if ($request->ajax()) {
            $view = view('home_posts', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('welcome2', compact('posts'));
    }

    public function allpost($image,$video,$LIMIT)
    {
        $post_index = 0;
        $posts['posts'] = null;
        foreach ($image as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($video as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        return $posts['posts'];
    }

    public function mostviewd()
    {
        $views = View::orderBy('id', 'desc')->limit(24)->get();
        $views['views'] = $views->unique(['post_id']);

        if ($views['views']->count() == 0)
        {
            return null;
        }

        $index = 1;
        foreach ($views['views'] as $view) {

            $TEMPLATE_TYPE = ucfirst($view->template_type);
            $model = 'App\Models\\' . $TEMPLATE_TYPE ;

            $posts[$view->template_type.$index] = $model::where('id', $view->post_id)->orderBy('created_at', 'desc')->get();

            foreach ($posts[$view->template_type.$index] as $post)
            {
                $posts['view'][$index] = $post;
                $index++;
            }

            if(!isset($posts['view']))
            {
                $posts['view'] = null;
            }
        }

        return $posts['view'];
    }

    public function show($template_type, $slug)
    {
        $TEMPLATE_TYPE = ['image', 'video'];

        abort_if(!in_array($template_type, $TEMPLATE_TYPE), 404);

        $model = 'App\Models\\' . ucwords($template_type);
        $post['post'] = $model::where('slug', $slug)->first();

        abort_if($post['post'] == null, 404);

        $post['products'] = BloggerProduct::where('blogger_id', $post['post']->blogger->id)
            ->where('post_id', $post['post']->id)
            ->where('post_slug', $post['post']->slug)
            ->where('post_type', $post['post']->post_type)
            ->get();

        $post['related_posts'] = $model::where('id', '!=', $post['post']->slug)->inRandomOrder()->limit(6)->get();

        $post['like'] = $this->checkLike($post['post']);
        $post['save'] = $this->checkSave($post['post']);

        $shareURL = url()->full();
        $shareComponent = \Share::page(
            $shareURL,
            'Check out this wonderful content',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        return view('blogger.posts' . '.' . $template_type . '_post_show', compact('post', 'shareComponent'));
    }

    public function checkLike($post)
    {
        if (Auth::guard('blogger')->check()) {
            $user_guard = 'blogger';
        } else if (Auth::guard('web')->check()) {
            $user_guard = 'web';
        } else {
            return null;
        }
        $like = Like::where('template_type', $post->post_type)
            ->where('template_id', $post->template_id)
            ->where('post_id', $post->id)
            ->where('user_type', $user_guard)
            ->where('user_id', Auth::guard($user_guard)->id())
            ->exists();

        return $like;
    }

    public function checkSave($post)
    {
        if (Auth::guard('web')->check()) {
            $user_guard = 'web';
        } else {
            return null;
        }
        $save = SavePost::where('template_type', $post->post_type)
            ->where('template_id', $post->template_id)
            ->where('post_id', $post->id)
            ->where('user_type', $user_guard)
            ->where('user_id', Auth::guard($user_guard)->id())
            ->exists();

        return $save;
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function selectedCategories($slug)
    {
        abort_if(Category::where('slug', $slug)->exists() == false, 404);

        $category = Category::where('slug',$slug)->first();

        $post_index = 0;
        foreach ($category->image as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        foreach ($category->video as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        if (!isset($posts['posts'])) {
            return view('single_category', compact('slug'));
        }

        $posts['posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('single_category', compact('posts', 'slug'));
    }

    public function selectedCategoriesVideo($slug)
    {
        abort_if(Category::where('slug', $slug)->exists() == false, 404);

        $category = Category::where('slug',$slug)->first();

        $post_index = 0;
        foreach ($category->video as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        if (!isset($posts['posts'])) {
            return view('single_category_video', compact('slug'));
        }

        $posts['posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('single_category_video', compact('posts', 'slug'));
    }

    public function blogs()
    {
        $blogs = Blogger::all();
        $countries = DB::table('countries')
            ->join('bloggers', 'bloggers.region', '=', 'countries.code')
            ->select('countries.*')
            ->get();

        return view('blogs', compact('blogs', 'countries'));
    }

    public function country($country)
    {
        abort_if(Country::where('code',$country)->first() == null, 404);

        $countries = DB::table('countries')
            ->join('bloggers', 'bloggers.region', '=', 'countries.code')
            ->select('countries.*')
            ->get();

        $blogs = Blogger::where('region', $country)->get();

        return view('country_blogs', compact('blogs', 'countries'));
    }

//    public function allVideos()
//    {
//        $posts['video_one'] = Video::orderBy('created_at', 'DESC')->get();
//
//        $post_index = 0;
//        $posts['posts'] = null;
//
//        return $posts['posts'];
//    }

    public function videos()
    {
        $TEMPLATE_TYPE = 'Video';
        $posts['videos'] = Video::orderBy('created_at', 'DESC')->get();

        $posts['view'] = $this->mostviewd($TEMPLATE_TYPE);
        $posts['mostViewed'] = collect($posts['view'])->sortBy('created_at')->reverse();
        $posts['blogs'] = AllBlogs::all();

        return view('videos', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function blog($slug)
    {
        $blog = AllBlogs::where('blog_slug', $slug)->first();
        abort_if($blog == null, 404);

        $status = HideUnhide::where('blogger_id', $blog->blogger->id)->get();
        $about['about'] = BlogAbout::where('blog_id', $blog->id)->first();
        $about['faqs'] = FAQs::where('blog_id', $blog->id)->get();

        $posts['unique_categories'] = DB::table('taggables')
            ->join('categories', 'taggables.category_id', '=', 'categories.id')
            ->join('bloggers as blogger', 'taggables.blogger_id', '=', 'blogger.id')
            ->where('blogger.id', '=', $blog->blogger->id)
            ->select('categories.*', 'taggables.*')
            ->get();

        $category_post = null;
        $i = 1;
        foreach ($posts['unique_categories'] as $category) {
            $category_post[$i] = $category->taggable_type::where('id', $category->taggable_id)
                ->where('blogger_id', $blog->blogger->id)
                ->first();

            $category_post[$i]->category_id = $category->category_id;
            $i++;
        }

        foreach ($status as $state) {
            if ($state->section_name == 'post_section') {
                $status['post_section'] = $state;
            }
            if ($state->section_name == 'video_section') {
                $status['video_section'] = $state;
            }
            if ($state->section_name == 'link_section') {
                $status['link_section'] = $state;
            }
            if ($state->section_name == 'about_section') {
                $status['about_section'] = $state;
            }
        }

        $posts['image'] = Image::where('blogger_id', $blog->blogger->id)->orderBy('created_at', 'DESC')->limit(10)->get();
        $posts['video'] = Video::where('blogger_id', $blog->blogger->id)->orderBy('created_at', 'DESC')->limit(10)->get();

        $post_index = 0;
        $posts['posts'] = null;
        foreach ($posts['image'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        $posts['latestPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('single_blog', compact('blog', 'status', 'about', 'posts', 'category_post'));
    }

    public function latestPost()
    {
        $posts['image'] = Image::orderBy('created_at', 'DESC')->get();
        $posts['video'] = Video::orderBy('created_at', 'DESC')->get();
        $posts['posts'] = $this->allpost($posts['image'],$posts['video'],10);
        $posts['latestPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('latestPost', compact('posts'));
    }

    public function viewed()
    {
        $posts['view'] = $this->mostviewd();
        $posts['mostViewed'] = collect($posts['view'])->sortBy('created_at')->reverse();
        return view('viewed', compact('posts'));
    }

    public function latestVideo()
    {
        $posts['latestPost'] = Video::orderBy('created_at','DESC')->get();

        return view('latestVideo', compact('posts'));
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'search' => 'required'
        ]);

        $images = Image::where('title', 'like', '%' . $request->search . '%')->get();
        $videos = Video::where('title', 'like', '%' . $request->search . '%')->get();

        $blogs = AllBlogs::where('blog_name', 'like', '%' . $request->search . '%')->get();

        $search_query = $request->search;

        if (($images->isEmpty()) AND ($videos->isEmpty()) AND ($blogs->isEmpty()))
        {
            return view('search', compact('search_query'));
        }

        $search_data = [];
        $index = 0;

        foreach ($images as $image)
        {
            $search_data[$index] = $image;
            $index++;
        }

        foreach ($videos as $video)
        {
            $search_data[$index] = $video;
            $index++;
        }

        return view('search', compact('blogs','search_data', 'search_query'));
    }
}
