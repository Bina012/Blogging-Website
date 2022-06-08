<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class whyUS extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\WhyUSFactory::new();
    }
}
