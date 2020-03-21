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
            'role' => 'user',
            'name' => 'One',
            'surname' => 'Example',
            'nick' => 'example1',
            'email' => 'one@example.com',
            'password' => Hash::make('user'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Two',
            'surname' => 'Example',
            'nick' => 'example2',
            'email' => 'two@example.com',
            'password' => Hash::make('user'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Three',
            'surname' => 'Example',
            'nick' => 'example3',
            'email' => 'three@example.com',
            'password' => Hash::make('user'),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ]);
    }
}
