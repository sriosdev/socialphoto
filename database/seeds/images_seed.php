<?php

use Illuminate\Database\Seeder;

class images_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => 'image1',
            'description' => 'Image 1 description',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => 'image2',
            'description' => 'Image 2 description',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('images')->insert([
            'user_id' => 1,
            'image_path' => 'image3',
            'description' => 'Image 3 description',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('images')->insert([
            'user_id' => 3,
            'image_path' => 'image4',
            'description' => 'Image 4 description',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
