<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'nizarid04@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Tiaa',
                'email' => 'tia@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Zoro',
                'email' => 'zozo@gmail.com',
                'password' => Hash::make('password'),
            ]
        ];

        User::insert($users);
    }
}
