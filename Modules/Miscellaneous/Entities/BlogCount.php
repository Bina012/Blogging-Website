<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCount extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id'
    ];
    
    public function blog(){
        return $this->belongsTo(Blog::class,'blog_id');
    }

    public function dailyCount()
    {
        return BlogCount::where('created_at',now())->get();
    }

    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\BlogCountFactory::new();
    }
}
