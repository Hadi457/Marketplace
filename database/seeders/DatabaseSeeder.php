<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'kontak' => '081234567890',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Member',
            'username' => 'member',
            'kontak' => '089876543210',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);
    }
}
