<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ImagePostTemplateFive extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable =
        [
            'blogger_id',
            'template_id',
            'post_type',
            'title',
            'slug',
            'intro_headline',
            'intro_description',
            'headline1',
            'headline2',
            'headline3',
            'headline4',
            'headline5',
            'headline6',
            'description1',
            'description2',
            'description3',
            'description4',
            'description5',
            'description6',
            'fimage',
            'article_image1',
            'article_image2',
            'article_image3',
            'article_image4',
            'article_image5',
            'article_image6',
            'product-background_image',
            'color1',
            'color2',
            'color3',
            'color4',
            'color5',
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
        return $this->hasMany(Comments::class, 'post_id','id');
    }

    public function collection()
    {
        return $this->hasOne(AllCollections::class, 'post_id','id');
    }
}
