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
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TeacherController;
use App\Models\Submission;
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
   Route::controller(StudentController::class)->group(function () {
      Route::get("/home", "index")->name("student.home")->middleware("check.profile.data");
      Route::get("/profile", "profile")->name("student.profile");
      Route::get("/complete-profile", "completeProfile");
      Route::post("/complete-profile-post", "completeProfilePost");
      Route::get("/update-profile/{student:nis}", "showUpdateProfile");
      Route::put("/update-profile/{student:nis}/put", "updateProfilePut");

      Route::get("/classes", "showClassList");
   });

   Route::controller(EnrollmentController::class)->group(function () {
      Route::post("/classes/{classroom}/enrollment", "studentClassEnrollment")->name("student.class.enrollment");
   });

   Route::controller(TeacherController::class)->group(function () {
      Route::get("/teacher/home", "index");
      Route::get("/teacher/classes", "showClasses");
      Route::get("/teacher/profile", "profile")->name("teacher.profile");
      Route::get("/teacher/update-profile/{teacher:nip}", "showUpdateProfile");
      Route::put("/teacher/update-profile/{teacher:nip}/put", "updateProfilePut")->name("teacher.update.pp");
      Route::get("/teacher/grade", "showGradePage")->middleware("check.teacher.class");
      Route::get("/teacher/grade/{material}", "showGradeSubmission")->name("show.grade.submission");
      Route::get("/teacher/recap", "showRecapPage");
      Route::get("/teacher/recap/{classroom}", "showRecapDetails")->name("show.recap.details");
   });

   Route::controller(ClassroomController::class)->group(function () {
      Route::get("/classes/{classroom}/classwork", "showStudentClasswork")->name("student.classwork");

      Route::get("/teacher/classes/create-class", "showCreateClassForm");
      Route::post("/teacher/classes/create-class/post", "createClass")->name("create.class");
      Route::get("/teacher/classes/{classroom}/classwork", "showClasswork")->name("show.classwork");
      Route::get("/teacher/classes/{classroom}/people", "showClassworkPeople")->name("show.classwork.people");
      Route::delete("/teacher/classes/{classroom}/delete", "deleteClass")->name("delete.class");
      Route::get("/teacher/classes/{classroom}/update-class", "showUpdateClass")->name("show.update.class");
      Route::put("/teacher/classes/{classroom}/update", "updateClass")->name("update.class");
   });

   Route::controller(MaterialController::class)->group(function () {
      Route::get("/classes/{classroom}/materials/{material}", "studentMaterial")->name("student.material");
      Route::get("/classes/{classroom}/materials/{material}/assignment", "studentShowAssignment")->name("student.show.assignment");
      Route::get("/teacher/classes/{classroom}/add-material-file", "showAddFile")->name("show.add.material.file");
      Route::get("/teacher/classes/{classroom}/add-material-video", "showAddVideo")->name("show.add.material.video");
      Route::post("/teacher/classes/{classroom}/add-material/post", "addMaterial")->name("add.material");
      Route::delete("/teacher/classes/{classroom}/materials/{material}/delete", "deleteMaterial")->name("delete.material");
      Route::get("/teacher/classes/{classroom}/materials/{material}/update-material-file", "showMaterialFileUpdate")->name("show.update.file.material");
      Route::get("/teacher/classes/{classroom}/materials/{material}/update-material-video", "showMaterialVideoUpdate")->name("show.update.video.material");
      Route::put("/teacher/classes/{classroom}/materials/{material}/update-material", "updateMaterial")->name("update.material");
      Route::get("/teacher/classes/{classroom}/materials/{material}", "showMaterial")->name("show.material");
      Route::get("/teacher/classes/{classroom}/add-assignment", "showAddAssignment")->name("show.add.assignment");
      Route::get("/teacher/classes/{classroom}/materials/{material}/update-assignment", "showAssignmentUpdate")->name("show.update.assignment");

      // Route::get("/teacher/classes/{classroom}/materials/{material}", "showAssignment")->name("show.assignment");
   });

   Route::controller(SubmissionController::class)->group(function () {
      Route::post("/classes/{classroom}/materials/{material}/submissions", "submitAssignment")->name("submit.assignment");
      Route::put("/teacher/grade/{material}/update-score/{submission}", "updateStudentScore")->name("update.student.score");
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
