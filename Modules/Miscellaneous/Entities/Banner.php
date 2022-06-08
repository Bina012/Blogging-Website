<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\BannerFactory::new();
    }
}
