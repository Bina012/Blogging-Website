<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'blog_title',
        'cat_id',
        'image',
        'image_alternative',
        'blog_description',
        'blog_slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'blog_status',
        'blog_feature',
        'count'
        ];

    public function blogCategory()
    {
        return $this->belongsTo(BLogCategory::class, 'cat_id');
    }

    public function blogCount()
    {
        return $this->hasMany(BlogCount::class);
    }

    public function blogTags()
    {
        return $this->hasMany(BlogTag::class);
    }


    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\BlogFactory::new();
    }
}
