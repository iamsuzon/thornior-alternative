<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class VideoPostTemplateOne extends Model
{
    use HasFactory, HasSlug;

    protected $fillable =
        [
            'blogger_id',
            'template_id',
            'post_type',
            'title',
            'slug',
            'into_header',
            'intro_description',
            'outro_header',
            'outro_description',
            'headline1',
            'headline2',
            'headline3',
            'headline4',
            'description1',
            'description2',
            'description3',
            'description4',
            'fimage',
            'article_image',
            'image1',
            'image2',
            'image3',
            'video',
            'colors',
            'product_id',
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

    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }

    public function collection()
    {
        return $this->hasOne(AllCollections::class, 'post_id','id');
    }
}
