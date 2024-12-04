<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

   public function showClasswork(Classroom $classroom)
   {
      $material = Material::where("classroom_id", $classroom->id)->get();
      return view("teacher.classroom.classwork", [
         "title" => "My Class | $classroom->title",
         "classroom" => $classroom,
         "materials" => $material,
      ]);
   }

   public function showClassworkPeople(Classroom $classroom)
   {
      return view("teacher.classroom.people", [
         "title" => "My Class | $classroom->title",
         "classroom" => $classroom,
      ]);
   }

   public function deleteClass(Classroom $classroom)
   {
      try {
         $classroom->delete();
         return redirect()->to("/teacher/classes")->with("delete.class", "Class has been successfully deleted!");
      } catch (\Exception $e) {
         return redirect()
            ->back()
            ->with("error", "Gagal menghapus kelas: " . $e->getMessage());
      }
   }

   public function showUpdateClass(Classroom $classroom)
   {
      return view("teacher.classroom.update-class", [
         "title" => "Update Class",
         "classroom" => $classroom,
      ]);
   }

   public function updateClass(Classroom $classroom, Request $request)
   {
      $validatedData = $request->validate([
         "title" => "required|string|max:255",
         "class" => "required|in:x,xi,xii",
         "instructions" => "nullable|string",
         "thumbnail_class" => "file|mimes:jpg,jpeg,png|max:3000",
      ]);

      if ($request->hasFile("thumbnail_class")) {
         if ($classroom->thumbnail_class) {
            Storage::disk("public")->delete($classroom->thumbnail_class);
         }

         $validatedData["thumbnail_class"] = $request->file("thumbnail_class")->store("thumbnail-class", "public");
      }

      $classroom->update($validatedData);
      return redirect()
         ->route("show.classwork", $classroom->id)
         ->with("update.class.success", "Your class has been updated successfully!");
   }
}
