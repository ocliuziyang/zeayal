<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'superAdmin',
            'email' => 'superAdmin@superAdmin.com',
            'password' => Hash::make('superAdmin'),
            'is_admin' => true,
            'real_name' => '超级管理员'
        ]);


        $superRole = \App\Models\Role::where('name', 'superAdmin')->first();
        $admin->attachRole($superRole);
    }
}
