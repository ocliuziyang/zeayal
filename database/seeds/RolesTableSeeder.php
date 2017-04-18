<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        // 1.创建角色
            // 超级管理员
        $superRole = new Role();
        $superRole->name         = 'superAdmin';
        $superRole->display_name = 'superAdmin'; // optional
        $superRole->description  = 'superAdmin'; // optional
        $superRole->save();

            // 项目角色
        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

            // 用户管理员
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

            // 普通用户
        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'Common user';
        $user->description = 'User is allowed to browser blog and published commit!';
        $user->save();

        // 2.为角色添加权限
        $allPermissions = \App\Models\Permission::where('name', 'all-permissions')->get()->first();
        $superRole->attachPermission($allPermissions);

    }
}
