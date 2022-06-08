<?php

namespace Modules\Miscellaneous\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'image',
        'address',
        'phone_number',
        'status',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Miscellaneous\Database\factories\PartnerFactory::new();
    }
}
