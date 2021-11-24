<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'blogger_id',
        'template_type',
        'template_id',
        'post_id',
    ];

    public function blogger()
    {
        return $this->belongsTo(Blogger::class);
    }
}
