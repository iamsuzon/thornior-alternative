<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AllPost extends Model implements HasMedia
{
    use HasFactory,SoftDeletes, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'header1',
        'des1',
        'header2',
        'des2',
        'editor',
        'fimage',
        'image1',
        'image2',
        'image3',
        'colors'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function blogger()
    {
        return $this->belongsTo(Blogger::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'taggable');
    }
}
