<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PromissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $allPermissions = new Permission();
        $allPermissions->name = 'all-permissions';
        $allPermissions->display_name = 'all-permissions';
        $allPermissions->description = 'have all permissions';
        $allPermissions->save();

        //
        $createPost = new Permission();
        $createPost->name         = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description  = 'create new blog posts'; // optional
        $createPost->save();

        $editUser = new Permission();
        $editUser->name         = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description  = 'edit existing users'; // optional
        $editUser->save();

    }
}
