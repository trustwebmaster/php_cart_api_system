<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User One',
                'email' => 'user1@yiya.com',
                'password' => Hash::make('user12345'),
            ] ,
            [
                'name' => 'User Two',
                'email' => 'user2@yiya.com',
                'password' => Hash::make('user12345'),
            ]
        ]);

    }
}
