<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "admin",
                "email" => "admin@example.com",
                "password" => bcrypt("password"),
                "is_admin" => true,
            ],
            [
                "name" => "user",
                "email" => "user@example.com",
                "password" => bcrypt("password"),
            ],
        ];
            foreach ($users as $user) {
                User::create($user);
            }
    }
}
