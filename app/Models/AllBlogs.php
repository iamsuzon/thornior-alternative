<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AllBlogs extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'blogger_id',
        'blog_name',
        'blog_slug',
        'blog_description',
        'region',
        'avg_post',
        'categories'
    ];

    protected $casts = [
        'categories' => 'array'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('blog_name')
            ->saveSlugsTo('blog_slug');
    }

    public function blogger()
    {
        return $this->hasOne(Blogger::class,'id');
    }

    public function country()
    {
        return $this->hasOne(Country::class,'code','region');
    }

    public function blog_about()
    {
        return $this->hasOne(BlogAbout::class,'id');
    }

    public function follows()
    {
        return $this->hasOne(FollowBlogger::class,'blog_id');
    }

    public function image_post_1()
    {
        return $this->belongsTo(ImagePostTemplateOne::class, 'post_id');
    }
    public function image_post_2()
    {
        return $this->belongsTo(ImagePostTemplateTwo::class, 'post_id');
    }
    public function image_post_3()
    {
        return $this->belongsTo(ImagePostTemplateThree::class, 'post_id');
    }
    public function image_post_4()
    {
        return $this->belongsTo(ImagePostTemplateFour::class, 'post_id');
    }
    public function image_post_5()
    {
        return $this->belongsTo(ImagePostTemplateFive::class, 'post_id');
    }
    public function image_post_6()
    {
        return $this->belongsTo(ImagePostTemplateSix::class, 'post_id');
    }

    public function video_post_1()
    {
        return $this->belongsTo(VideoPostTemplateOne::class, 'blogger_id');
    }
    public function video_post_2()
    {
        return $this->belongsTo(VideoPostTemplateTwo::class, 'blogger_id');
    }
    public function video_post_3()
    {
        return $this->belongsTo(VideoPostTemplateThree::class, 'post_id');
    }
    public function video_post_4()
    {
        return $this->belongsTo(VideoPostTemplateFour::class, 'post_id');
    }
    public function video_post_5()
    {
        return $this->belongsTo(VideoPostTemplateFive::class, 'post_id');
    }
    public function video_post_6()
    {
        return $this->belongsTo(VideoPostTemplateSix::class, 'blogger_id');
    }
}
