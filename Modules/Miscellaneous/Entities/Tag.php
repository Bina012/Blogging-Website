<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag'
    ];
    
    public function blogtag()
    {
        return $this->belongsTo(BlogTag::class,'id');
    }

    public function blogtags()
    {
        return $this->hasMany(BlogTag::class);
    }

    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\TagFactory::new();
    }
}
