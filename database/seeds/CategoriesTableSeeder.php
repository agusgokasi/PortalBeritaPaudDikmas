<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('categories')->insert([
            'name' => 'News',
            'is_content' => 1,
            'is_component' => 0,
        ]);
        // 2.
        DB::table('categories')->insert([
            'name' => 'Gallery Photo',
            'is_content' => 1,
            'is_component' => 0,
        ]);
        // 3.
        DB::table('categories')->insert([
            'name' => 'Headlines',
            'is_content' => 1,
            'is_component' => 0,
        ]);
        // 4
        DB::table('categories')->insert([
            'name' => 'Page',
            'is_content' => 0,
            'is_component' => 1,
        ]);
        // 5
        DB::table('categories')->insert([
            'name' => 'Page Link',
            'is_content' => 0,
            'is_component' => 1,
        ]);
        // 6
        DB::table('categories')->insert([
            'name' => 'Main Navbar',
            'is_content' => 0,
            'is_component' => 1,
        ]);
        // 7
        DB::table('categories')->insert([
            'name' => 'Secondary Navbar',
            'is_content' => 0,
            'is_component' => 1,
        ]);
    }
}
