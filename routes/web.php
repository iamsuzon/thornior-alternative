<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 | 1st. User Route
 | 2nd. Admin Route
 | 3rd. Blogger Route
 | 4th. Visitor Route
 */





//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/latest-post', [App\Http\Controllers\IndexController::class, 'latestPost'])->name('latest.post');
Route::get('/latest-videos', [App\Http\Controllers\IndexController::class, 'latestVideo'])->name('latest.video');
Route::get('/most-viewed', [App\Http\Controllers\IndexController::class, 'viewed'])->name('viewed');
Route::get('/post/{template_type}/{template_id}/{slug}', [App\Http\Controllers\IndexController::class, 'show'])->name('post.show');
Route::get('/categories', [App\Http\Controllers\IndexController::class, 'categories'])->name('categories');
Route::get('/categories/{slug}', [App\Http\Controllers\IndexController::class, 'selectedCategories'])->name('categories.selected');
Route::get('/blogs', [App\Http\Controllers\IndexController::class, 'blogs'])->name('blogs');
Route::get('/videos', [App\Http\Controllers\IndexController::class, 'videos'])->name('videos');
Route::get('/categories/video/{slug}', [App\Http\Controllers\IndexController::class, 'selectedCategoriesVideo'])->name('categories.selected.video');
Route::get('/about', [App\Http\Controllers\IndexController::class, 'about'])->name('about');
Route::get('/blogs/{slug}', [App\Http\Controllers\IndexController::class, 'blog'])->name('blog');

Route::post('/views/count', [App\Http\Controllers\ClickViewController::class, 'views'])->name('views');

/* ---------------------------------------------------------------------------------------------- */
/* User Login , Registration , Password Reset */
Auth::routes();

/* User Email Verification */
Route::prefix('user')->group(function(){
    Route::get('/email/verify', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'mustVerify'])->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'emailVerified'])->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'sendVerifyEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

/* User Dashboard */
Route::prefix('user')->middleware(['auth:web','verified'])->group(function(){
    /* If User Not Approved */
    Route::get('/approve', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'userNotApprove'])->name('user.notapprove');

    /* Approving User */
    Route::middleware('isapproved')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\UserControllers\UserController::class, 'index'])->name('user.dashboard');

        Route::get('/liked', [App\Http\Controllers\UserControllers\UserController::class, 'liked'])->name('user.liked');

        /* Saving Blog Post */
        Route::get('/saved', [App\Http\Controllers\UserControllers\UserController::class, 'saved'])->name('user.saved');
        Route::post('/save/{template_type}/{template_id}', [App\Http\Controllers\SavePostController::class, 'save'])->name('user.post.save');

        /* Post Collection */
        Route::get('/collection', [App\Http\Controllers\UserControllers\PostCollectionController::class, 'index'])->name('user.collection');
        Route::post('/collection', [App\Http\Controllers\UserControllers\PostCollectionController::class, 'store'])->name('user.collection.store');
        Route::post('/collection/update', [App\Http\Controllers\UserControllers\PostCollectionController::class, 'update'])->name('user.collection.update');
        Route::get('/collection/{slug}', [App\Http\Controllers\UserControllers\PostCollectionController::class, 'show'])->name('user.collection.show');
        Route::get('/collection/{slug}/delete', [App\Http\Controllers\UserControllers\PostCollectionController::class, 'delete'])->name('user.collection.delete');
        Route::post('/collection/single', [App\Http\Controllers\UserControllers\AllCollectionsController::class, 'store'])->name('user.collection.all.store');

        Route::get('/settings', [App\Http\Controllers\UserControllers\UserController::class, 'settings'])->name('user.settings');
        Route::post('/settings', [App\Http\Controllers\UserControllers\UserController::class, 'settings_update'])->name('user.settings.update');

        /* Follow Blog */
        Route::post('/follow', [App\Http\Controllers\UserControllers\FollowBloggerController::class, 'follow'])->name('user.blogger.follow');
        Route::post('/unfollow', [App\Http\Controllers\UserControllers\FollowBloggerController::class, 'unfollow'])->name('user.blogger.unfollow');
    });
});
/* ---------------------------------------------------------------------------------------------- */





/* ---------------------------------------------------------------------------------------------- */
/* Admin Login */
Route::get('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showForm'])->name('admin.login.show');
Route::post('/admin-login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

/* Admin Password Reset */
Route::prefix('admin')->group(function(){
    Route::get('/password/reset',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/email',[App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::post('/password/reset',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('/password/reset/{token}',[App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
});

/* Admin Dashboard */
Route::prefix('admin')->namespace('AdminControllers')->middleware('auth:admin')->group(function(){
    Route::get('/', function (){return redirect(route('admin.dashboard'));});
    Route::get('/dashboard', [App\Http\Controllers\AdminControllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/blogs', [App\Http\Controllers\AdminControllers\AdminController::class, 'blogs'])->name('admin.blogs');
    Route::get('/blogs/pause/{slug}', [App\Http\Controllers\AdminControllers\AdminController::class, 'pauseBlog'])->name('admin.blogs.pause');
    Route::get('/blogs/delete/{slug}', [App\Http\Controllers\AdminControllers\AdminController::class, 'deleteBlog'])->name('admin.blogs.delete');

    /* Activity Pages */
    Route::get('/activity', [App\Http\Controllers\AdminControllers\AdminController::class, 'activity'])->name('admin.activity');
    Route::post('/activity/post/delete', [App\Http\Controllers\AdminControllers\AdminController::class, 'adminPostDelete'])->name('admin.post.delete');

    /* Category Management */
    Route::get('/category', [App\Http\Controllers\AdminControllers\CategoryController::class, 'index'])->name('admin.category.index');
    Route::post('/category', [App\Http\Controllers\AdminControllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::post('/category/edit/{id}', [App\Http\Controllers\AdminControllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('/category/delete/{id}', [App\Http\Controllers\AdminControllers\CategoryController::class, 'delete'])->name('admin.category.delete');

    /* Admin Settings */
    Route::get('/settings/profile', [App\Http\Controllers\AdminControllers\AdminController::class, 'profile'])->name('admin.settings.profile.index');
    Route::get('/settings/profile/edit/{id}', function (){
        return redirect(route('admin.settings.profile.index'));
    });
    Route::post('/settings/profile/edit/{id}', [App\Http\Controllers\AdminControllers\AdminController::class, 'editProfile'])->name('admin.settings.profile.edit');

    /* Logout */
    Route::post('/admin-logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'adminlogout'])->name('admin.logout');

    /* Blogger Management */
    Route::get('/blogger', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'index'])->name('admin.blogger.index');
    Route::get('/blogger/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'create'])->name('admin.blogger.create');
    Route::post('/blogger/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'sent'])->name('admin.blogger.sent');
    Route::get('/blogger/create/again/{email}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'sentagain'])->name('admin.blogger.sent.again');
    Route::get('/blogger/{id}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'giveapproval'])->name('admin.blogger.account.giveapproval');
});

Route::get('/blogger/account/{token}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'compare'])->name('admin.blogger.account.compare')->middleware('checkinvitetoken');
Route::post('/blogger/account/create', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'store'])->name('admin.blogger.account.store');

Route::get('/blogger/account/approval/{id}', [App\Http\Controllers\AdminControllers\CreateBloggerController::class, 'waitapproval'])->name('admin.blogger.account.approval');
/* ---------------------------------------------------------------------------------------------- */





/* ---------------------------------------------------------------------------------------------- */
/* Blogger Login */
Route::get('/blogger-login', [App\Http\Controllers\Auth\BloggerLoginController::class, 'showForm'])->name('blogger.login.show');
Route::post('/blogger-login', [App\Http\Controllers\Auth\BloggerLoginController::class, 'login'])->name('blogger.login.submit');

/* Blogger Password Reset */
Route::prefix('blogger')->group(function(){
    Route::get('/password/reset',[App\Http\Controllers\Auth\BloggerForgotPasswordController::class, 'showLinkRequestForm'])->name('blogger.password.request');
    Route::post('/password/email',[App\Http\Controllers\Auth\BloggerForgotPasswordController::class, 'sendResetLinkEmail'])->name('blogger.password.email');
    Route::post('/password/reset',[App\Http\Controllers\Auth\BloggerResetPasswordController::class, 'reset'])->name('blogger.password.update');
    Route::get('/password/reset/{token}',[App\Http\Controllers\Auth\BloggerResetPasswordController::class, 'showResetForm'])->name('blogger.password.reset');
});

/* Blogger Dashboard */
Route::prefix('blogger')->middleware(['auth:blogger'])->group(function(){
    Route::get('/', function (){
       return redirect()->route('blogger.dashboard');
    });

    /* If Blogger Not Approved */
    Route::get('/approve', [App\Http\Controllers\Auth\UserEmailVerificationController::class, 'notApprove'])->name('blogger.notapprove');

    Route::middleware('isapproved')->group(function(){

        /* Blog Creation Process */
        Route::middleware('hasblog_nosetup')->group(function (){
            Route::match(['get','post'],'setup/blog/step-1', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step1'])->name('blogger.blog.create.step1');
            Route::match(['get','post'],'setup/blog/step-2', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step2'])->name('blogger.blog.create.step2');
            Route::match(['get','post'],'setup/blog/step-3', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step3'])->name('blogger.blog.create.step3');
            Route::match(['get','post'],'setup/blog/step-4', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'step4'])->name('blogger.blog.create.step4');
            Route::match(['get','post'],'setup/blog/final', [App\Http\Controllers\BloggerControllers\BlogCreationController::class, 'final'])->name('blogger.blog.create.final');
        });

        /* Dashboard */
        Route::middleware('hasblog')->group(function(){
            Route::get('/dashboard', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'index'])->name('blogger.dashboard');
            Route::get('/overview', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'overview'])->name('blogger.overview');
            Route::post('/overview/post', [App\Http\Controllers\HideUnhideController::class, 'hide_post'])->name('blogger.overview.hide.post');
            Route::post('/overview/video', [App\Http\Controllers\HideUnhideController::class, 'hide_video'])->name('blogger.overview.hide.video');
            Route::post('/overview/link', [App\Http\Controllers\HideUnhideController::class, 'hide_link'])->name('blogger.overview.hide.link');
            Route::post('/overview/about', [App\Http\Controllers\HideUnhideController::class, 'hide_about'])->name('blogger.overview.hide.about');
            Route::post('/overview/about/layout', [App\Http\Controllers\HideUnhideController::class, 'layout_about'])->name('blogger.overview.layout.about');
            Route::post('/overview/about/faqs', [App\Http\Controllers\HideUnhideController::class, 'about_question'])->name('blogger.overview.faq.about');
            Route::post('/overview/about/faqs/edit', [App\Http\Controllers\HideUnhideController::class, 'about_question_edit'])->name('blogger.overview.faq.about.edit');
            Route::post('/overview/about/faqs/delete', [App\Http\Controllers\HideUnhideController::class, 'about_question_delete'])->name('blogger.overview.faq.about.delete');

            /* Post */
            Route::get('/blog/post/templates', [App\Http\Controllers\BloggerControllers\PostTemplateController::class, 'postTemplates'])->name('blogger.blog.post.templates');
            Route::get('/blog/post/templates/preview/{type}/{id}', [App\Http\Controllers\BloggerControllers\PostTemplateController::class, 'postTemplatesPreview'])->name('blogger.blog.post.templates.preview');

            /*-------- Image --------*/
            /* Post - Image Post One */
            Route::get('/blog/post/image/template1', [App\Http\Controllers\BloggerControllers\ImagePostController::class, 'index1'])->name('blogger.blog.post.image.index.1');
            Route::post('/blog/post/image/template1/store', [App\Http\Controllers\BloggerControllers\ImagePostController::class, 'store'])->name('blogger.blog.post.image.store.1');
            Route::get('/blog/post/image/template1/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostController::class, 'show'])->name('blogger.blog.post.image.show.1');
            Route::get('/blog/post/image/template1/edit/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostController::class, 'edit'])->name('blogger.blog.post.image.edit.1');
            Route::post('/blog/post/image/template1/edit/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostController::class, 'update'])->name('blogger.blog.post.image.update.1');

            /* Post - Image Post Two */
            Route::get('/blog/post/image/template2', [App\Http\Controllers\BloggerControllers\ImagePostTwoController::class, 'ImagePostIndexTwo'])->name('blogger.blog.post.image.index.2');
            Route::post('/blog/post/image/template2/store', [App\Http\Controllers\BloggerControllers\ImagePostTwoController::class, 'ImagePostStoreTwo'])->name('blogger.blog.post.image.store.2');
            Route::get('/blog/post/image/template2/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostTwoController::class, 'ImagePostShowTwo'])->name('blogger.blog.post.image.show.2');
            Route::get('/blog/post/image/template2/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostTwoController::class, 'ImagePostEditTwo'])->name('blogger.blog.post.image.edit.2');
            Route::post('/blog/post/image/template2/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostTwoController::class, 'ImagePostUpdateTwo'])->name('blogger.blog.post.image.update.2');

            /* Post - Image Post Three */
            Route::get('/blog/post/image/template3', [App\Http\Controllers\BloggerControllers\ImagePostThreeController::class, 'ImagePostIndexThree'])->name('blogger.blog.post.image.index.3');
            Route::post('/blog/post/image/template3/store', [App\Http\Controllers\BloggerControllers\ImagePostThreeController::class, 'ImagePostStoreThree'])->name('blogger.blog.post.image.store.3');
            Route::get('/blog/post/image/template3/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostThreeController::class, 'ImagePostShowThree'])->name('blogger.blog.post.image.show.3');
            Route::get('/blog/post/image/template3/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostThreeController::class, 'ImagePostEditThree'])->name('blogger.blog.post.image.edit.3');
            Route::post('/blog/post/image/template3/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostThreeController::class, 'ImagePostUpdateThree'])->name('blogger.blog.post.image.update.3');

            /* Post - Image Post Four */
            Route::get('/blog/post/image/template4', [App\Http\Controllers\BloggerControllers\ImagePostFourController::class, 'ImagePostIndexFour'])->name('blogger.blog.post.image.index.4');
            Route::post('/blog/post/image/template4/store', [App\Http\Controllers\BloggerControllers\ImagePostFourController::class, 'ImagePostStoreFour'])->name('blogger.blog.post.image.store.4');
            Route::get('/blog/post/image/template4/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostFourController::class, 'ImagePostShowFour'])->name('blogger.blog.post.image.show.4');
            Route::get('/blog/post/image/template4/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostFourController::class, 'ImagePostEditFour'])->name('blogger.blog.post.image.edit.4');
            Route::post('/blog/post/image/template4/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostFourController::class, 'ImagePostUpdateFour'])->name('blogger.blog.post.image.update.4');

            /* Post - Image Post Five */
            Route::get('/blog/post/image/template5', [App\Http\Controllers\BloggerControllers\ImagePostFiveController::class, 'ImagePostIndexFive'])->name('blogger.blog.post.image.index.5');
            Route::post('/blog/post/image/template5/store', [App\Http\Controllers\BloggerControllers\ImagePostFiveController::class, 'ImagePostStoreFive'])->name('blogger.blog.post.image.store.5');
            Route::get('/blog/post/image/template5/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostFiveController::class, 'ImagePostShowFive'])->name('blogger.blog.post.image.show.5');
            Route::get('/blog/post/image/template5/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostFiveController::class, 'ImagePostEditFive'])->name('blogger.blog.post.image.edit.5');
            Route::post('/blog/post/image/template5/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostFiveController::class, 'ImagePostUpdateFive'])->name('blogger.blog.post.image.update.5');

            /* Post - Image Post Six */
            Route::get('/blog/post/image/template6', [App\Http\Controllers\BloggerControllers\ImagePostSixController::class, 'ImagePostIndexSix'])->name('blogger.blog.post.image.index.6');
            Route::post('/blog/post/image/template6/store', [App\Http\Controllers\BloggerControllers\ImagePostSixController::class, 'ImagePostStoreSix'])->name('blogger.blog.post.image.store.6');
            Route::get('/blog/post/image/template6/show/{slug}', [App\Http\Controllers\BloggerControllers\ImagePostSixController::class, 'ImagePostShowSix'])->name('blogger.blog.post.image.show.6');
            Route::get('/blog/post/image/template6/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostSixController::class, 'ImagePostEditSix'])->name('blogger.blog.post.image.edit.6');
            Route::post('/blog/post/image/template6/edit/{id}', [App\Http\Controllers\BloggerControllers\ImagePostSixController::class, 'ImagePostUpdateSix'])->name('blogger.blog.post.image.update.6');

            /*-------- Video --------*/
            /* Post - Video Post One */
            Route::get('/blog/post/video/template1', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index1'])->name('blogger.blog.post.video.index.1');
            Route::post('/blog/post/video/template1/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.1');
            Route::get('/blog/post/video/template1/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.1');
            Route::get('/blog/post/video/template1/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.1');
            Route::post('/blog/post/video/template1/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.1');

            /* Post - Video Post Two */
            Route::get('/blog/post/video/template2', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index2'])->name('blogger.blog.post.video.index.2');
            Route::post('/blog/post/video/template2/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.2');
            Route::get('/blog/post/video/template2/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.2');
            Route::get('/blog/post/video/template2/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.2');
            Route::post('/blog/post/video/template2/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.2');

            /* Post - Video Post Three */
            Route::get('/blog/post/video/template3', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index3'])->name('blogger.blog.post.video.index.3');
            Route::post('/blog/post/video/template3/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.3');
            Route::get('/blog/post/video/template3/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.3');
            Route::get('/blog/post/video/template3/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.3');
            Route::post('/blog/post/video/template3/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.3');

            /* Post - Video Post Four */
            Route::get('/blog/post/video/template4', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index4'])->name('blogger.blog.post.video.index.4');
            Route::post('/blog/post/video/template4/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.4');
            Route::get('/blog/post/video/template4/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.4');
            Route::get('/blog/post/video/template4/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.4');
            Route::post('/blog/post/video/template4/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.4');

            /* Post - Video Post Five */
            Route::get('/blog/post/video/template5', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index5'])->name('blogger.blog.post.video.index.5');
            Route::post('/blog/post/video/template5/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.5');
            Route::get('/blog/post/video/template5/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.5');
            Route::get('/blog/post/video/template5/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.5');
            Route::post('/blog/post/video/template5/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.5');

            /* Post - Video Post Six */
            Route::get('/blog/post/video/template6', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'index6'])->name('blogger.blog.post.video.index.6');
            Route::post('/blog/post/video/template6/store', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'store'])->name('blogger.blog.post.video.store.6');
            Route::get('/blog/post/video/template6/show/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'show'])->name('blogger.blog.post.video.show.6');
            Route::get('/blog/post/video/template6/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'edit'])->name('blogger.blog.post.video.edit.6');
            Route::post('/blog/post/video/template6/edit/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'update'])->name('blogger.blog.post.video.update.6');

            /* Video Post Delete */
            Route::post('/blog/post/video/delete/{slug}', [App\Http\Controllers\BloggerControllers\VideoPostController::class, 'destroy'])->name('blogger.blog.post.video.delete');
            Route::get('/blog/post/video/delete/{slug}', function (){
                abort(404);
            });

            /* Post Delete */
//            Route::post('/dashboard/post/delete', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'postDelete'])->name('blogger.post.delete');

            /* Products */
            Route::get('/blog/post/image/products', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'getAllProducts'])->name('blogger.blog.post.image.products');

            Route::get('/blog/product', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'index'])->name('blogger.blog.product.index');
            Route::post('/blog/product', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'store'])->name('blogger.blog.product.store');
            Route::get('/blog/product/update', function () {return back();});
            Route::post('/blog/product/update', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'update'])->name('blogger.blog.product.update');
            Route::get('/blog/product/draft/{post_id}', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'draft'])->name('blogger.blog.product.draft');
            Route::get('/blog/product/undraft/{post_id}', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'undraft'])->name('blogger.blog.product.undraft');
            Route::get('/blog/product/delete/{post_id}', [App\Http\Controllers\BloggerControllers\BloggerProductController::class, 'delete'])->name('blogger.blog.product.delete');

            /* Profile */
            Route::get('/profile', function (){
                return redirect()->route('blogger.settings.profile');
            });
            Route::get('/settings/profile', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'settingsProfileShow'])->name('blogger.settings.profile');
            Route::post('/settings/profile', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'settingsProfileSubmit'])->name('blogger.settings.profile.submit');
            Route::post('/settings/profile/image', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'settingsProfileImageSubmit'])->name('blogger.settings.profile.image.submit');

            /* Settings */
            Route::get('/settings', function (){return redirect()->route('blogger.settings.blog');});
            Route::get('/settings/blog', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'settingsBlogShow'])->name('blogger.settings.blog');
            Route::post('/settings/blog', [App\Http\Controllers\BloggerControllers\BloggerController::class, 'settingsBlogSubmit'])->name('blogger.settings.blog.submit');
        });
    });

    /* Logout */
    Route::post('/blogger-logout', [App\Http\Controllers\Auth\BloggerLoginController::class, 'bloggerlogout'])->name('blogger.logout');
});
/* ---------------------------------------------------------------------------------------------- */




/* ---------------------------------------------------------------------------------------------- */
/* Visitor */
/* All Post */
Route::post('like/{template_type}/{template_id}', [App\Http\Controllers\LikeCommentsController::class, 'like'])->name('like');
Route::post('comment/{template_type}/{template_id}', [App\Http\Controllers\LikeCommentsController::class, 'store'])->name('comment');

/* ---------------------------------------------------------------------------------------------- */
