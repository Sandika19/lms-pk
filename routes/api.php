<?php
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get("/classes", function (Request $request) {
   $major = $request->query("major");
   $level = $request->query("level");

   $query = Classroom::query();

   // Filter berdasarkan major jika tersedia
   if ($major) {
      $query->where("major", $major);
   }

   // Filter berdasarkan level jika tersedia
   if ($level) {
      $query->where("class", $level);
   }

   $classes = $query->get();
   return response()->json($classes);
});

?>
