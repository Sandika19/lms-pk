<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
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
            "name" => "admin",
            "username" => "admin",
            "email" => "admin@lms.com",
            "password" => bcrypt("password"),
            "role" => "admin",
         ],
         [
            "name" => "guru",
            "username" => "guru",
            "email" => "guru@lms.com",
            "password" => bcrypt("password"),
            "role" => "teacher",
         ],
         [
            "name" => "siswa",
            "username" => "siswa",
            "email" => "siswa@lms.com",
            "password" => bcrypt("password"),
            "role" => "student",
         ],
      ]);

      // Student::create([
      //     'user_id' => 3,
      //     'username' => 'siswa',
      // ]);

      Teacher::create([
         "user_id" => 2, // Misalnya, ID pengguna yang sudah ada
         "fullname" => "Phantom Sensei",
         "nip" => "123131313",
         "date_of_birth" => "2005-05-15", // Format tanggal: YYYY-MM-DD
         "gender" => "Male",
      ]);

      Classroom::create([
         "teacher_id" => 1,
         "title" => "HTML",
         "class" => "x",
         "thumbnail_class" => "thumbnail-class/tes1.jpg",
         "major" => "pplg",
         "instructions" =>
            "Pelajari materi lorem10 dan CSS: Memahami teori dasar HTML dan CSS serta bagaimana keduanya digunakan untuk membuat dan mempercantik halaman web.Saksikan video pembelajaran: Menonton video tutorial atau penjelasan terkait konsep HTML dan CSS, seperti cara membuat struktur HTML atau menggunakan CSS untuk styling.Pelajari semua materinya: Memastikan setiap bagian materi yang disediakan, baik teori maupun praktik, dipelajari dengan teliti.",
      ]);
      Classroom::create([
         "teacher_id" => 1,
         "title" => "CSS",
         "class" => "xi",
         "thumbnail_class" => "thumbnail-class/tes1.jpg",
         "major" => "pplg",
         "instructions" =>
            "Pelajari materi HTML dan CSS: Memahami teori dasar HTML dan CSS serta bagaimana keduanya digunakan untuk membuat dan mempercantik halaman web.Saksikan video pembelajaran: Menonton video tutorial atau penjelasan terkait konsep HTML dan CSS, seperti cara membuat struktur HTML atau menggunakan CSS untuk styling.Pelajari semua materinya: Memastikan setiap bagian materi yang disediakan, baik teori maupun praktik, dipelajari dengan teliti.",
      ]);
      Classroom::create([
         "teacher_id" => 1,
         "title" => "Laravel",
         "class" => "xii",
         "thumbnail_class" => "thumbnail-class/tes1.jpg",
         "major" => "pplg",
         "instructions" =>
            "Pelajari materi HTML dan CSS: Memahami teori dasar HTML dan CSS serta bagaimana keduanya digunakan untuk membuat dan mempercantik halaman web.Saksikan video pembelajaran: Menonton video tutorial atau penjelasan terkait konsep HTML dan CSS, seperti cara membuat struktur HTML atau menggunakan CSS untuk styling.Pelajari semua materinya: Memastikan setiap bagian materi yang disediakan, baik teori maupun praktik, dipelajari dengan teliti.",
      ]);
   }
}
