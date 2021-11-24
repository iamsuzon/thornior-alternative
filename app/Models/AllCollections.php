<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllCollections extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'collection_slug',
        'user_id',
        'template_type',
        'template_id',
        'post_id',
        'post_user_id',
    ];

    public function visitor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function collection()
    {
        return $this->belongsTo(PostCollection::class, 'collection_id');
    }

    public function image_post_1()
    {
        return $this->hasOne(ImagePostTemplateOne::class, 'id', 'post_id');
    }
    public function image_post_2()
    {
        return $this->hasOne(ImagePostTemplateTwo::class, 'post_id');
    }
    public function image_post_3()
    {
        return $this->hasOne(ImagePostTemplateThree::class, 'post_id');
    }
    public function image_post_4()
    {
        return $this->hasOne(ImagePostTemplateFour::class, 'post_id');
    }
    public function image_post_5()
    {
        return $this->hasOne(ImagePostTemplateFive::class, 'post_id');
    }
    public function image_post_6()
    {
        return $this->hasOne(ImagePostTemplateSix::class, 'post_id');
    }

    public function video_post_1()
    {
        return $this->hasOne(VideoPostTemplateOne::class, 'id', 'post_id');
    }
    public function video_post_2()
    {
        return $this->hasOne(VideoPostTemplateTwo::class, 'post_id');
    }
    public function video_post_3()
    {
        return $this->hasOne(VideoPostTemplateThree::class, 'post_id');
    }
    public function video_post_4()
    {
        return $this->hasOne(VideoPostTemplateFour::class, 'post_id');
    }
    public function video_post_5()
    {
        return $this->hasOne(VideoPostTemplateFive::class, 'post_id');
    }
    public function video_post_6()
    {
        return $this->hasOne(VideoPostTemplateSix::class, 'post_id');
    }
}
