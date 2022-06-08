<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'company_name'     => 'Creatu Developers',
            'email1'=>'info@creatudevelopers.com',
            'contact1' => '015192060',
            'address' => 'Tinkune, Koteshwor, Kathmandu',
            'google_location'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d441.6733171368904!2d85.3413296!3d27.6744457!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190fc042d399%3A0x6064967133397f28!2sCreatu%20Developers!5e0!3m2!1sen!2snp!4v1643282584551!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'image'=>'default.png'
           ]);
    }
}
