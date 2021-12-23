<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Image extends Model
{
    use HasFactory, HasSlug;

    protected $fillable =
        [
            'blogger_id',
            'template_id',
            'post_type',
            'title',
            'slug',
            'into_heading',
            'intro_description',
            'outro_heading',
            'outro_description',
            'last_heading',
            'last_description',
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
            'point_heading_1',
            'point_heading_2',
            'point_heading_3',
            'point_heading_4',
            'point_heading_5',
            'point_heading_6',
            'point_description_1',
            'point_description_2',
            'point_description_3',
            'point_description_4',
            'point_description_5',
            'point_description_6',
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
        return $this->hasMany(Comments::class, 'image_id')->orderBy('created_at');
    }

    public function collection()
    {
        return $this->hasOne(AllCollections::class, 'post_id','id');
    }

    public function medias()
    {
        return $this->hasMany(AllMedia::class, 'image_id','id')->orderBy('number');
    }
}
