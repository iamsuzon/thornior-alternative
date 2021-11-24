<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'image_id',
        'post_type',
        'number',
        'name',
        'mime_type',
        'address'
    ];

    public function videoPost()
    {
        return $this->hasOne(Video::class,'video_id','id');
    }

    public function imagePost()
    {
        return $this->hasOne(Video::class,'image_id','id');
    }
}
