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

Route::middleware(["auth"])->group(function () {
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
   Route::controller(TeacherController::class)->group(function () {
      Route::get("/teacher/home", "index");
      Route::get("/teacher/profile", "profile")->name("teacher.profile");
      Route::get("/teacher/update-profile/{teacher:nip}", "showUpdateProfile");
      Route::put("/teacher/update-profile/{teacher:nip}/put", "updateProfilePut")->name("teacher.update.pp");

      Route::get("/teacher/grade", "showGradePage")->middleware("check.teacher.class");
   });

   Route::controller(ClassroomController::class)->group(function () {
      Route::get("/teacher/classes/create-class", "showCreateClassForm");
      Route::post("/teacher/classes/create-class/post", "createClass")->name("create.class");
   });
});
// Route::get('/admin', function(){
//     return view('dashboard.admin');
// });

// Route::get('/home', function(){
//     return redirect('/admin');
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
