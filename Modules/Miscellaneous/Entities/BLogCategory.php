<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BLogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'image',
        'image_alternative',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'slug',
    ];

    public function getBlog(){
        return $this->hasMany(Blog::class,'cat_id','id');
    }
    
    

    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\BLogCategoryFactory::new();
    }
}
