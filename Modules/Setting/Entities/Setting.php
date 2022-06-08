<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','email1','contact1','address','google_location','fax_no','po_box_no','image','facebook_link','insta_link','twitter_link','linkedin_link'];
    
    protected static function newFactory()
    {
        return \Modules\Setting\Database\factories\SettingFactory::new();
    }
}
