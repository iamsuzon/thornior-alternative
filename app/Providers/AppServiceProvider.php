<?php

namespace App\Providers;

use App\Models\Blogger;
use App\Models\Category;
use App\Models\Image;
use App\Models\ImagePostTemplateFive;
use App\Models\ImagePostTemplateFour;
use App\Models\ImagePostTemplateOne;
use App\Models\ImagePostTemplateSix;
use App\Models\ImagePostTemplateThree;
use App\Models\ImagePostTemplateTwo;
use App\Models\Like;
use App\Models\Video;
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
        $image = Image::where('blogger_id',Auth::guard('blogger')->id())->count();
        $video = Video::where('blogger_id',Auth::guard('blogger')->id())->count();

        $count['image'] = $image;
        $count['video'] = $video;

        return $count;
    }
}
