<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function image_post_1()
    {
        return $this->morphedByMany(ImagePostTemplateOne::class, 'taggable');
    }
    public function image_post_2()
    {
        return $this->morphedByMany(ImagePostTemplateTwo::class, 'taggable');
    }
    public function image_post_3()
    {
        return $this->morphedByMany(ImagePostTemplateThree::class, 'taggable');
    }
    public function image_post_4()
    {
        return $this->morphedByMany(ImagePostTemplateFour::class, 'taggable');
    }
    public function image_post_5()
    {
        return $this->morphedByMany(ImagePostTemplateFive::class, 'taggable');
    }
    public function image_post_6()
    {
        return $this->morphedByMany(ImagePostTemplateSix::class, 'taggable');
    }

    public function video_post_1()
    {
        return $this->morphedByMany(VideoPostTemplateOne::class, 'taggable');
    }
    public function video_post_2()
    {
        return $this->morphedByMany(VideoPostTemplateTwo::class, 'taggable');
    }
    public function video_post_3()
    {
        return $this->morphedByMany(VideoPostTemplateThree::class, 'taggable');
    }
    public function video_post_4()
    {
        return $this->morphedByMany(VideoPostTemplateFour::class, 'taggable');
    }
    public function video_post_5()
    {
        return $this->morphedByMany(VideoPostTemplateFive::class, 'taggable');
    }
    public function video_post_6()
    {
        return $this->morphedByMany(VideoPostTemplateSix::class, 'taggable');
    }

    public function image()
    {
        return $this->morphedByMany(Image::class, 'taggable');
    }

    public function video()
    {
        return $this->morphedByMany(Video::class,'taggable');
    }
}
