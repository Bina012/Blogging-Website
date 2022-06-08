<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'tag_id'
    ];
    
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }

    

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\BlogTagFactory::new();
    }
}
