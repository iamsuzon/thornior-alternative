<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'question',
        'answer'
    ];

    public function blog()
    {
        return $this->hasOne(AllBlogs::class,'blog_id');
    }
}
