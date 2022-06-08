<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Miscellaneous\Entities\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'image' => 'default.png'
        ]);
    }
}
