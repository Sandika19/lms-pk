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

        User::factory()->createMany([
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@lms.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'guru',
                'username' => 'guru',
                'email' => 'guru@lms.com',
                'password' => bcrypt('password'),
                'role' => 'guru',
            ],
            [
                'name' => 'siswa',
                'username' => 'siswa',
                'email' => 'siswa@lms.com',
                'password' => bcrypt('password'),
                'role' => 'user',
            ],
        ]);
        
    }
}
