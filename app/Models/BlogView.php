<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
    use HasFactory;

    protected $fillable = [
        'blogger_id',
        'blog_id',
        'ip_address',
        'view_count',
    ];
}
