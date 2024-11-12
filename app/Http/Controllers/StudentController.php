<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index() {
        $user = Auth::user()->id;
        $student = Student::where('user_id', $user)->first();

        return view('student.home', [
            'title' => 'Home',
            'student' => $student
        ]);
    }

    public function profile() {
        return view('student.profile', [
            'title' => 'Profile Student'
        ]);
    }

    public function completeProfile() {
        return view('student.complete-profile', [
            'title' => 'Update Profile'
        ]);
    }
    
    public function completeProfilePost(Request $request) {
        $validatedData = $request->validate([
            "fullname" => "required|string|max:255",
            "nis" => "required",
            "major" => "required|in:pplg,dkv,akl,otkp,bdp", 
            "grade" => "required|in:10,11,12", 
            "date_of_birth" => "required|date",
            "gender" => "required|in:male,female", 
            "profile_picture" => "file|mimes:jpg,jpeg,png|max:3000"
        ]);

        
       if ($request->file("profile_picture")) {
            $validatedData["profile_picture"] = $request->file("profile_picture")->store("student-profile", "public");
        }

        $validatedData["user_id"] = Auth::user()->id;
        Student::create($validatedData);
		return redirect()->route('student.profile')->with("update.profile.success", "Your profile has been updated successfully!");
    }

    public function showUpdateProfile(Student $student) {
        return view('student.update-profile', [
            'title' => 'Update Profile',
            'student' => $student
        ]);
    }

    public function updateProfilePut(Student $student, Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            "fullname" => "required|string|max:255",
            "nis" => "required",
            "major" => "required|in:pplg,dkv,akl,otkp,bdp", 
            "grade" => "required|in:10,11,12", 
            "date_of_birth" => "required|date",
            "gender" => "required|in:male,female", 
            "profile_picture" => "file|mimes:jpg,jpeg,png|max:3000"
        ]);

        if ($request->hasFile("profile_picture")) {
            if ($student->profile_picture) {
                Storage::disk('public')->delete($student->profile_picture);
            }

			$validatedData["profile_picture"] = $request->file("profile_picture")->store("student-profile", "public");
		}

        $student->update($validatedData);
		return redirect()->route('student.profile')->with("update.profile.success", "Your profile has been updated successfully!");
    }



    
}
