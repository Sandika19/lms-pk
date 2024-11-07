<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function updateProfile() {
        return view('student.update-profile', [
            'title' => 'Update Profle'
        ]);
    }
    
    public function updateProfilePost(Request $request) {
        // dd($request);
        $validatedData = $request->validate([
            "fullname" => "required|string|max:255",
            "email" => "required|email|max:255",
            "major" => "required|in:pplg,dkv,akl,otkp,bdp", 
            "grade" => "required|in:10,11,12", 
            "date_of_birth" => "required|date",
            "gender" => "required|in:male,female", 
            "profile_picture" => "file|mimes:jpg,jpeg,png|max:3000"
        ]);

        // dd($validatedData["profile_picture"]);
        
       if ($request->file("profile_picture")) {
            $validatedData["profile_picture"] = $request->file("profile_picture")->store("student-profile", "public");
        }

        $validatedData["user_id"] = Auth::user()->id;
        Student::create($validatedData);
		return redirect()->route('student.profile')->with("update.profile.success", "Your profile has been updated successfully!");
    }


    
}
