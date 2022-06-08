<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\UserAndRoles\Entities\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role       = Role::where('name', 'superadmin')->first();
        $superadmin = User::create([
         'name'     => 'Super Admin',
         'slug'=>"super-admin",
         'email'    => 'admin@admin.com',
         'phone_no' =>982141,
         'password' => Hash::make('password'),
         'status'   => "active",
         
        ]);
        // $superadmin->roles()->attach($role);

        // $role1       = Role::where('name', 'user')->first();
        // $user = User::create([
        //  'name'     => 'Default Customer',
        //  'slug'=>"default-customer",
        //  'email'    => 'user@user.com',
        //  'phone_no' =>9800000000,
        //  'password' => Hash::make('password'),
        //  'status'   => "active",
        // ]);
        // $user->roles()->attach($role1);
    }
}
