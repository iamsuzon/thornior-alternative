<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'template_type',
        'template_id',
        'post_id',
        'user_type',
        'user_id'
    ];

    public function blogger()
    {
        return $this->belongsTo(Blogger::class,'user_id');
    }

    public function visitor()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
