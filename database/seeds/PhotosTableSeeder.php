<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'content_id' => 4,
            'filename' => 'samplephoto.png',
            'created_at' => '2019-09-03 21:39:58',
            'updated_at' => '2019-09-03 21:39:58',
        ]);
    }
}
