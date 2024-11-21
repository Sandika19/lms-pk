<?php

use App\Livewire\Login;
use App\Livewire\FormAuth;
use App\Livewire\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Storage;

Route::redirect("/", "/login");
Route::redirect("/teacher", "/teacher/home");

Route::get("/tes", function () {
   return view("tes");
});
// Route::post("/tes/post", function () {
//    Storage::disk("public")->delete("student-profile/evNeOeAD52sCO7BnOYRYOxd9etXIecpUpff0QVW1.jpg");
// });

// Route::get('/test',FormAuth::class);
// // Route::get('/login',Login::class);
// Route::get('/register',Register::class);

Route::middleware(["guest"])->group(function () {
   Route::get("/login", [SesiController::class, "index"])->name("login");
   Route::post("/login", [SesiController::class, "login"]);
});

Route::middleware(["auth"])->group(function () {
   Route::get("/admin", [AdminController::class, "index"]);
   // Route::get('/dashboard/admin',[AdminController::class,'admin'])->middleware(UserAccess::class.':admin');
   // Route::get('/dashboard-teacher/home',[AdminController::class,'guru'])->middleware(UserAccess::class.':guru');
   // Route::get('/logout',[SesiController::class,'logout']);
});

Route::middleware(["auth", "force.user"])->group(function () {
   Route::get("/home", [StudentController::class, "index"])
      ->name("student.home")
      ->middleware("check.profile.data");
   Route::get("/profile", [StudentController::class, "profile"])->name("student.profile");
   Route::get("/complete-profile", [StudentController::class, "completeProfile"]);
   Route::post("/complete-profile-post", [StudentController::class, "completeProfilePost"]);
   Route::get("/update-profile/{student:nis}", [StudentController::class, "showUpdateProfile"]);
   Route::put("/update-profile/{student:nis}/put", [StudentController::class, "updateProfilePut"]);
});

Route::middleware(["auth"])->group(function () {
   Route::prefix("teacher")->group(function () {
      Route::controller(TeacherController::class)->group(function () {
         Route::get("/home", "index");
         Route::get("/classes", "showClasses");
         Route::get("/profile", "profile")->name("teacher.profile");
         Route::get("/update-profile/{teacher:nip}", "showUpdateProfile");
         Route::put("/update-profile/{teacher:nip}/put", "updateProfilePut")->name("teacher.update.pp");
         Route::get("/grade", "showGradePage")->middleware("check.teacher.class");
      });

      Route::controller(ClassroomController::class)->group(function () {
         Route::get("/classes/create-class", "showCreateClassForm");
         Route::post("/classes/create-class/post", "createClass")->name("create.class");
         Route::get("/classes/{classroom}/classwork", "showClasswork")->name("show.classwork");
         Route::get("/classes/{classroom}/people", "showClassworkPeople")->name("show.classwork.people");
         Route::delete("/classes/{classroom}/delete", "deleteClass")->name("delete.class");
         Route::get("/classes/{classroom}/update-class", "showUpdateClass")->name("show.update.class");
         Route::put("/classes/{classroom}/update", "updateClass")->name("update.class");
      });

      Route::controller(MaterialController::class)->group(function () {
         Route::get("/classes/{classroom}/add-material-file", "showAddFile")->name("show.add.material.file");
         Route::get("/classes/{classroom}/add-material-video", "showAddVideo")->name("show.add.material.video");
         Route::post("/classes/{classroom}/add-material-file/post", "addMaterial")->name("add.material");
         Route::delete("/classes/{classroom}/materials/{material}/delete", "deleteMaterial")->name("delete.material");

         Route::get("/classes/{classroom}/materials/{material}/update-material-file", "showMaterialFileUpdate")->name("show.update.file.material");
         Route::get("/classes/{classroom}/materials/{material}/update-material-video", "showMaterialVideoUpdate")->name("show.update.video.material");

         Route::put("/classes/{classroom}/materials/{material}/update-material", "updateMaterial")->name("update.material");
      });
   });
});

// Route::get('/admin', function(){
//     return view('dashboard.admin');
// });

Route::post("/logout", function (Request $request) {
   Auth::logout();
   $request->session()->invalidate();
   $request->session()->regenerateToken();
   return redirect(route("login"));
})->name("logout");

Route::get("/cobalogin", function () {
   return view("cobaLogin");
});
