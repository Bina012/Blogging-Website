<?php

namespace Modules\Enquiry\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = ['email'];
    
    protected static function newFactory()
    {
        return \Modules\Enquiry\Database\factories\EnquiryFactory::new();
    }
}
