<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_type',
        'template_id',
        'post_id',
        'blogger_id',
        'ip_address',
        'view_count',
    ];
}
