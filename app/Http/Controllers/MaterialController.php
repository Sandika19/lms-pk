<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
   public function showAddFile(Classroom $classroom)
   {
      return view("teacher.classroom.material.add-material", [
         "title" => "Upload Content - File PDF/PPT",
         "classroom" => $classroom,
      ]);
   }

   public function showAddVideo(Classroom $classroom)
   {
      return view("teacher.classroom.material.add-material", [
         "title" => "Upload Content - Video",
         "classroom" => $classroom,
      ]);
   }

   public function addMaterial(Request $request, Classroom $classroom)
   {
      $validatedData = $request->validate([
         "title" => "required|string|max:255",
         "description" => "nullable|string",
         "file_path" => "file|mimes:pdf,ppt,pptx,mp4,mkv|max:102400",
      ]);

      $validatedData["classroom_id"] = $classroom->id;
      $validatedData["type"] = $request->file("file_path")->getClientOriginalExtension();
      $validatedData["file_name"] = $request->file("file_path")->getClientOriginalName();

      if ($request->hasFile("file_path")) {
         $validatedData["file_path"] = $request->file("file_path")->store("materials", "public");
      }

      Material::create($validatedData);

      return redirect()
         ->route("show.classwork", $classroom->id)
         ->with("add.material.success", "Material has been successfully added.");
   }

   public function deleteMaterial(Classroom $classroom, Material $material)
   {
      try {
         if ($material->file_path) {
            Storage::disk("public")->delete($material->file_path);
         }

         $material->delete();
         return redirect()
            ->route("show.classwork", $material->classroom_id)
            ->with("delete.material", "Material has been successfully deleted!");
      } catch (\Exception $e) {
         return redirect()
            ->back()
            ->with("error", "Gagal menghapus kelas: " . $e->getMessage());
      }
   }

   public function showMaterialFileUpdate(Classroom $classroom, Material $material)
   {
      return view("teacher.classroom.material.update-material", [
         "title" => "Update Content - File PDF/PPT",
         "material" => $material,
         "classroom" => $classroom,
      ]);
   }

   public function showMaterialVideoUpdate(Classroom $classroom, Material $material)
   {
      return view("teacher.classroom.material.update-material", [
         "title" => "Update Content - Video",
         "material" => $material,
         "classroom" => $classroom,
      ]);
   }

   public function updateMaterial(Classroom $classroom, Material $material, Request $request)
   {
      $validatedData = $request->validate([
         "title" => "required|string|max:255",
         "description" => "nullable|string",
         "file_path" => "file|mimes:pdf,ppt,pptx,mp4,mkv|max:102400",
      ]);

      if ($request->hasFile("file_path")) {
         if ($material->file_path) {
            Storage::disk("public")->delete($material->file_path);
         }

         $validatedData["file_path"] = $request->file("file_path")->store("materials", "public");
         $validatedData["type"] = $request->file("file_path")->getClientOriginalExtension();
         $validatedData["file_name"] = $request->file("file_path")->getClientOriginalName();
      }

      $material->update($validatedData);
      return redirect()
         ->route("show.classwork", $material->classroom_id)
         ->with("update.material.success", "Your material has been updated successfully!");
   }
}
