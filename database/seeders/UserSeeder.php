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
        /* create admin, author and user */
        /* password for these users is password */

        $factoryUsers = [
            [
                'name' => 'admin user',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$dD8yarAAR8v75qt7ekre1utGJE7dA0PS2Ge5FLX9OkPxVBzMIBAcC', // password
                'role' => 'admin'
            ],

          

            [
                'name' => 'simple user',
                'email' => 'user@user.com',
                'password' => '$2y$10$dD8yarAAR8v75qt7ekre1utGJE7dA0PS2Ge5FLX9OkPxVBzMIBAcC', // password
                'role' => 'user'
            ],
        ];

        foreach ($factoryUsers as $user) {
            $newUser =  User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}
