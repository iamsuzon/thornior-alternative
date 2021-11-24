<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'title',
        'description',
        'image',
        'layout',
    ];

    public function blog()
    {
        return $this->belongsTo(AllBlogs::class,'blog_id');
    }
}
