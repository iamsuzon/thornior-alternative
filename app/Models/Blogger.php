<?php

namespace App\Models;

use App\Http\Controllers\Auth\BloggerResetPasswordController;
use App\Notifications\AdminResetPasswordNotification;
use App\Notifications\BloggerResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Blogger extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'blogger';

    protected $fillable = [
        'name', 'email', 'password','about','region','role','is_approved','has_blog'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function blog()
    {
        return $this->hasOne(AllBlogs::class,'blogger_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new BloggerResetPasswordNotification($token));
    }
}
