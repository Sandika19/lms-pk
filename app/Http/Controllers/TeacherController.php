<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index() {
        $user = Auth::user()->id;
        $teacher = Teacher::where('user_id', $user)->first();

        return view('teacher.home', [
            'title' => 'Home',
            'teacher' => $teacher
        ]);
    }
}
