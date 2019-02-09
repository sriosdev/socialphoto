<?php

use Illuminate\Database\Seeder;

class users_seed extends Seeder
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
            'name' => 'Sergio',
            'surname' => 'Ríos',
            'nick' => 'srios',
            'email' => 'sergio@asdf.com',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d'),
            'updated' => date('Y-m-d')
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Michael',
            'surname' => 'Smith',
            'nick' => 'mike12',
            'email' => 'michael@asdf.com',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d'),
            'updated' => date('Y-m-d')
        ]);

        DB::table('users')->insert([
            'role' => 'user',
            'name' => 'Anne',
            'surname' => 'Richards',
            'nick' => 'annerichards',
            'email' => 'anne@asdf.com',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d'),
            'updated' => date('Y-m-d')
        ]);
    }
}
