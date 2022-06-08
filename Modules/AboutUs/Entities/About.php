<?php

namespace Modules\AboutUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class About extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
        'our_mission',
        'our_vision',
        'seo_title',
        'seo_description',
        'seo_keyword',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    
    protected static function newFactory()
    {
        return \Modules\AboutUs\Database\factories\AboutFactory::new();
    }
}
