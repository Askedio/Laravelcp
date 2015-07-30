<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Askedio\Laravelcp\Models\Role;
use Askedio\Laravelcp\Models\User;
use Askedio\Laravelcp\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('password'),
        ]);

        User::first()->attachRole(Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '', // optional
            'parent_id' => NULL, // optional, set to NULL by default
        ]));

        Role::first()->attachPermission(Permission::create([
            'name' => 'Admin Dashboard',
            'slug' => 'admin.dashboard',
            'description' => '', // optional
        ]));

    }
}
