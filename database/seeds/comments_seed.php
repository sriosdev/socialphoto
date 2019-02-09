<?php

use Illuminate\Database\Seeder;

class comments_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 1,
            'image_id' => 4,
            'content' => 'Nice pic!',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'image_id' => 1,
            'content' => 'This is awesome :)',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('comments')->insert([
            'user_id' => 2,
            'image_id' => 4,
            'content' => 'Woooow :O',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
