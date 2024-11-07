<?php

namespace Database\Seeders;

use App\Models\Student;
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
                'role' => 'teacher',
            ],
            [
                'name' => 'siswa',
                'username' => 'siswa',
                'email' => 'siswa@lms.com',
                'password' => bcrypt('password'),
                'role' => 'student',
            ],
        ]);

        // Student::create([
        //     'user_id' => 3, // Misalnya, ID pengguna yang sudah ada
        //     'fullname' => 'John Doe',
        //     'grade' => '10',
        //     'major' => 'PPLG',
        //     'date_of_birth' => '2005-05-15', // Format tanggal: YYYY-MM-DD
        //     'gender' => 'Male',
        // ]);
    }
}
