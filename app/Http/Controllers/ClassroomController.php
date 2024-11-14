<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
   public function showCreateClassForm()
   {
      return view("teacher.create-class", [
         "title" => "Create Class",
      ]);
   }

   public function createClass(Request $request)
   {
      $validatedData = $request->validate([
         "title" => "required|string|max:255",
         "class" => "required|in:x,xi,xii",
         "thumbnail_class" => "required|file|mimes:jpg,jpeg,png|max:3000",
         "instructions" => "nullable|string",
      ]);
      // dd($validatedData);

      if ($request->file("thumbnail_class")) {
         $validatedData["thumbnail_class"] = $request->file("thumbnail_class")->store("thumbnail-class", "public");
      }

      $validatedData["teacher_id"] = Auth::user()->teacher->id;

      Classroom::create($validatedData);
      return redirect()->to("/teacher/home")->with("create.class.success", "Class created successfully! Your class is now available for students.");
   }
}
