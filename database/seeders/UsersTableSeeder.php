<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Saiful Islam',
                'email'          => 'saiful013101@gmail.com',
                'password'       => bcrypt('123456'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Asad',
                'email'          => 'asad@gmail.com',
                'password'       => bcrypt('123456'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
