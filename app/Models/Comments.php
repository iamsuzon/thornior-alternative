<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_type',
        'template_id',
        'post_id',
        'user_type',
        'user_id',
        'post_user_id',
        'comment'
    ];

    public function blogger()
    {
        return $this->belongsTo(Blogger::class,'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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
        return $this->belongsTo(VideoPostTemplateOne::class, 'post_id');
    }
    public function video_post_2()
    {
        return $this->belongsTo(VideoPostTemplateTwo::class, 'post_id');
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
        return $this->belongsTo(VideoPostTemplateSix::class, 'post_id');
    }
}
