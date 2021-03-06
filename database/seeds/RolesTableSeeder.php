<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1.
        DB::table('roles')->insert([
            'name' => 'Super Admin',
            'edit_category' => 1,
            'add_content' => 0,
            'edit_content' => 1,
            'edit_component' => 1,
            'approve_content' => 1,
            'crud_permission' => 1,
            'crud_user' => 1,
        ]);

        // 2.
        DB::table('roles')->insert([
            'name' => 'Admin',
            'edit_category' => 0,
            'add_content' => 0,
            'edit_content' => 0,
            'edit_component' => 1,
            'approve_content' => 0,
            'crud_permission' => 0,
            'crud_user' => 1,
        ]);

        DB::table('roles')->insert([
            'name' => 'Penulis',
            'edit_category' => 0,
            'add_content' => 1,
            'edit_content' => 1,
            'edit_component' => 0,
            'approve_content' => 0,
            'crud_permission' => 0,
            'crud_user' => 0,
        ]);

        DB::table('roles')->insert([
            'name' => 'Editor',
            'edit_category' => 0,
            'add_content' => 0,
            'edit_content' => 1,
            'edit_component' => 0,
            'approve_content' => 1,
            'crud_permission' => 0,
            'crud_user' => 0,
        ]);


    }
}
