<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class VideoPostTemplateSix extends Model
{
    use HasFactory, HasSlug;

    protected $fillable =
        [
            'blogger_id',
            'template_id',
            'post_type',
            'title',
            'slug',
            'intro_headline',
            'intro_description',
            'outro_headline',
            'outro_description',
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
            'image1',
            'image2',
            'image3',
            'image4',
            'image5',
            'image6',
            'video',
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
        return $this->hasMany(Comments::class, 'id','post_id');
    }

    public function collection()
    {
        return $this->hasOne(AllCollections::class, 'post_id','id');
    }
}
