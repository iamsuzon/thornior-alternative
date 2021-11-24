<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class VideoPostTemplateFive extends Model
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
            'headline_outro',
            'headline_outro_description',
            'point_headline_1',
            'point_headline_2',
            'point_headline_3',
            'point_headline_4',
            'point_headline_5',
            'point_headline_6',
            'point_description_1',
            'point_description_2',
            'point_description_3',
            'point_description_4',
            'point_description_5',
            'point_description_6',
            'fimage',
            'image1',
            'image2',
            'image3',
            'image4',
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
        return $this->hasMany(Comments::class,'post_id');
    }

    public function collection()
    {
        return $this->hasOne(AllCollections::class, 'post_id','id');
    }
}
