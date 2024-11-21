<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
   public function index()
   {
      $user = Auth::user()->id;
      $teacher = Teacher::where("user_id", $user)->first();
      $class = Classroom::where("teacher_id", $teacher->id)->get();

      return view("teacher.home", [
         "title" => "Home",
         "teacher" => $teacher,
         "classes" => $class,
      ]);
   }

   public function showClasses()
   {
      $class = Classroom::where("teacher_id", Auth::user()->teacher->id)->get();
      return view("teacher.classes", [
         "title" => "Classes",
         "classes" => $class,
      ]);
   }

   public function profile()
   {
      $user = Auth::user()->id;
      $teacher = Teacher::where("user_id", $user)->first();

      return view("teacher.profile", [
         "title" => "Profile Teacher",
         "teacher" => $teacher,
      ]);
   }

   public function showUpdateProfile(Teacher $teacher)
   {
      return view("teacher.update-profile", [
         "title" => "Update Profile",
         "teacher" => $teacher,
      ]);
   }

   public function updateProfilePut(Teacher $teacher, Request $request)
   {
      $validatedData = $request->validate([
         "fullname" => "required|string|max:255",
         "username" => "required|string|max:255",
         "nip" => "required",
         "date_of_birth" => "required|date",
         "gender" => "required|in:male,female",
         "profile_picture" => "file|mimes:jpg,jpeg,png|max:3000",
      ]);

      if ($teacher->user) {
         $teacher->user->update([
            "username" => $validatedData["username"],
         ]);
      }

      if ($request->hasFile("profile_picture")) {
         if ($teacher->profile_picture) {
            Storage::disk("public")->delete($teacher->profile_picture);
         }

         $validatedData["profile_picture"] = $request->file("profile_picture")->store("teacher-profile", "public");
      }

      $teacher->update($validatedData);
      return redirect()->route("teacher.profile")->with("update.profile.success", "Your profile has been updated successfully!");
   }

   public function showGradePage()
   {
      return view("teacher.grade", [
         "title" => "Grade",
      ]);
   }
}
