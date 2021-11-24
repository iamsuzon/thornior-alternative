<?php

namespace App\Http\Controllers;

use App\Models\AllBlogs;
use App\Models\AllCollections;
use App\Models\BlogAbout;
use App\Models\Blogger;
use App\Models\BloggerProduct;
use App\Models\Category;
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

        $posts['posts'] = $this->allpost($LIMIT);

        if (!isset($posts['posts'])) {
            return view('welcome2');
        }

        $posts['image'] = Image::orderBy('created_at', 'DESC')->limit(10)->get();
        $posts['video'] = Video::orderBy('created_at', 'DESC')->limit(10)->get();
        $posts['posts'] = $this->allpost($LIMIT);
        $posts['view'] = $this->mostviewd();

//        if (count($posts['posts']) < 10) {
//            $LIMIT = 2;
//            $posts['posts'] = $this->allpost($LIMIT);
//        }

        $posts['latestPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();
//        $posts['allPost'] = $posts['latestPost'];
        $posts['mostViewed'] = collect($posts['view'])->sortBy('created_at')->reverse();
        $posts['blogs'] = AllBlogs::all();

        if ($request->ajax()) {
            $view = view('home_posts', compact('posts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('welcome2', compact('posts'));
    }

    public function allpost($LIMIT)
    {
        $posts['image'] = Image::orderBy('created_at', 'DESC')->limit($LIMIT)->get();
        $posts['video'] = Video::orderBy('created_at', 'DESC')->limit($LIMIT)->get();

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

        return $posts['posts'];
    }

    public function mostviewd()
    {
        $views = View::orderBy('view_count', 'desc')->limit(24)->get();
        $views = $views->unique(['post_id']);

        if ($views->count() == 0)
        {
            return null;
        }

        $index = 1;
        foreach ($views as $view) {

            $model = 'App\Models\\' . ucfirst($view->template_type);

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

    public function show($template_type, $template_id, $slug)
    {
        $TEMPLATE_TYPE = ['image', 'video'];
        $TEMPLATE_TOTAL_EACH = 6;

        if (!in_array($template_type, $TEMPLATE_TYPE) or $template_id > $TEMPLATE_TOTAL_EACH or $template_id < 1) {
            abort(404);
        }

        switch ($template_id) {
            case 1:
                $template_id = "One";
                break;
            case 2:
                $template_id = "Two";
                break;
            case 3:
                $template_id = "Three";
                break;
            case 4:
                $template_id = "Four";
                break;
            case 5:
                $template_id = "Five";
                break;
            case 6:
                $template_id = "Six";
                break;
        }

        $model = 'App\Models\\' . ucwords($template_type) . 'PostTemplate' . $template_id;
        $post['post'] = $model::where('slug', $slug)->first();
        if ($post['post'] == null) {
            abort(404);
        }
        $post['products'] = BloggerProduct::where('blogger_id', $post['post']->blogger->id)
            ->where('post_id', $post['post']->id)
            ->where('template_id', $post['post']->template_id)
            ->where('post_type', $post['post']->post_type)
            ->get();
        $post['related_posts'] = $model::where('id', '!=', $post['post']->id)->inRandomOrder()->get();

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
        if (Category::where('slug', $slug)->exists() == false) {
            abort(404);
        }

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
        if (Category::where('slug', $slug)->exists() == false) {
            abort(404);
        }


        for ($j = 1; $j <= 6; $j++) {
            $relation_name = 'video_post_' . $j;
            $index_name = 'video' . '_' . $j . '';

            $posts[$index_name] = Category::where('slug', strtolower($slug))->first()->$relation_name;
        }

        $post_index = 0;
        foreach ($posts['video_1'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_2'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_3'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_4'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_5'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_6'] as $post) {
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
        return view('blogs', compact('blogs'));
    }

    public function allVideos()
    {
        $posts['video_one'] = VideoPostTemplateOne::orderBy('created_at', 'DESC')->get();
        $posts['video_two'] = VideoPostTemplateTwo::orderBy('created_at', 'DESC')->get();
        $posts['video_three'] = VideoPostTemplateThree::orderBy('created_at', 'DESC')->get();
        $posts['video_four'] = VideoPostTemplateFour::orderBy('created_at', 'DESC')->get();
        $posts['video_five'] = VideoPostTemplateFive::orderBy('created_at', 'DESC')->get();
        $posts['video_six'] = VideoPostTemplateSix::orderBy('created_at', 'DESC')->get();

        $post_index = 0;
        $posts['posts'] = null;

        foreach ($posts['video_one'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_two'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_three'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_four'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_five'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_six'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        return $posts['posts'];
    }

    public function videos()
    {
        $posts['posts'] = $this->allVideos();
        $posts['videos'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        $posts['view'] = $this->mostviewd();
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
        if ($blog == null) {
            abort(404);
        }

        $status = HideUnhide::where('blogger_id', $blog->blogger->id)->get();
        $about['about'] = BlogAbout::where('blog_id', $blog->id)->first();
        $about['faqs'] = FAQs::where('blog_id', $blog->id)->get();

        $posts['unique_categories'] = DB::table('taggables')
            ->join('categories', 'taggables.category_id', '=', 'categories.id')
            ->join('bloggers as blogger', 'taggables.blogger_id', '=', 'blogger.id')
            ->where('blogger.id', '=', $blog->blogger->id)
            ->select('categories.*', 'taggables.*')
            ->get();

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
        $posts['posts'] = $this->allpost(100);
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
        $posts['posts'] = $this->allVideos();
        $posts['latestPost'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('latestVideo', compact('posts'));
    }
}
