<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HideUnhide extends Model
{
    use HasFactory;

    protected $fillable = [
      'blogger_id',
      'blog_id',
      'is_page',
      'is_section',
      'page_name',
      'section_name',
      'status',
      'modified_at'
    ];

    protected $casts = [
        'modified_at' => 'datetime',
    ];

    public function blogger()
    {
        return $this->hasOne(Blogger::class,'blog_id');
    }

    public function blog()
    {
        return $this->hasOne(AllBlogs::class,'blogger_id');
    }
}
