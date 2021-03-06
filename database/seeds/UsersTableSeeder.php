<?php

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
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'role_id' => 1,
            'email' => 'sa@mail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'role_id' => 2,
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sample Penulis',
            'role_id' => 3,
            'email' => 'penulis@mail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sample Editor',
            'role_id' => 4,
            'email' => 'editor@mail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
