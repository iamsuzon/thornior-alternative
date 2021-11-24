<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowBlogger extends Model
{
    use HasFactory;

    protected $fillable = [
      'blog_id',
      'blogger_id',
      'user_id'
    ];

    public function blog()
    {
        return $this->belongsTo(AllBlogs::class,'blog_id','id');
    }
}
