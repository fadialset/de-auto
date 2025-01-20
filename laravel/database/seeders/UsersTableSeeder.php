<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@2way2.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create regular users
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@2way2.com",
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);
        }
    }
}