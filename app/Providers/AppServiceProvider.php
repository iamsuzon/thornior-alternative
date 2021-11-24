<?php

namespace App\Providers;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\ImagePostTemplateFive;
use App\Models\ImagePostTemplateFour;
use App\Models\ImagePostTemplateOne;
use App\Models\ImagePostTemplateSix;
use App\Models\ImagePostTemplateThree;
use App\Models\ImagePostTemplateTwo;
use App\Models\Like;
use App\Models\VideoPostTemplateFive;
use App\Models\VideoPostTemplateFour;
use App\Models\VideoPostTemplateOne;
use App\Models\VideoPostTemplateSix;
use App\Models\VideoPostTemplateThree;
use App\Models\VideoPostTemplateTwo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Country;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer(['layouts.countries'], function ($view){
            $view->with('countries', Country::all());
        });

        View::composer(['blogger.blog_create_process.*'], function ($view){
            $view->with('categories', Category::all());
        });

        View::composer(['blogger.posts.*'], function ($view){
            $view->with('categories', Category::all());
        });

        View::composer(['*'], function ($view){
            $view->with('categories', Category::all());
        });

        View::composer(['blogger.*'], function ($view){
            $view->with('postCount', $this->bloggerPostCount());
        });
    }

    public function bloggerPostCount()
    {
        $image1 = ImagePostTemplateOne::where('blogger_id',Auth::guard('blogger')->id())->count();
        $image2 = ImagePostTemplateTwo::where('blogger_id',Auth::guard('blogger')->id())->count();
        $image3 = ImagePostTemplateThree::where('blogger_id',Auth::guard('blogger')->id())->count();
        $image4 = ImagePostTemplateFour::where('blogger_id',Auth::guard('blogger')->id())->count();
        $image5 = ImagePostTemplateFive::where('blogger_id',Auth::guard('blogger')->id())->count();
        $image6 = ImagePostTemplateSix::where('blogger_id',Auth::guard('blogger')->id())->count();

        $video1 = VideoPostTemplateOne::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video2 = VideoPostTemplateTwo::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video3 = VideoPostTemplateThree::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video4 = VideoPostTemplateFour::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video5 = VideoPostTemplateFive::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video6 = VideoPostTemplateSix::where('blogger_id',Auth::guard('blogger')->id())->count();

        $count['image'] = $image1+$image2+$image3+$image4+$image5+$image6;
        $count['video'] = $video1+$video2+$video3+$video4+$video5+$video6;

        return $count;
    }
}
