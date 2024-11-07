<?php

use App\Livewire\Login;
use App\Livewire\FormAuth;
use App\Livewire\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

Route::redirect('/', '/login');

// Route::get('/test',FormAuth::class);
// // Route::get('/login',Login::class);
// Route::get('/register',Register::class);

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[SesiController::class, 'index'])->name('login');
    Route::post('/login',[SesiController::class, 'login']);
});
// Route::get('/home', function(){
//     return redirect('/admin');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    // Route::get('/dashboard/admin',[AdminController::class,'admin'])->middleware(UserAccess::class.':admin');
    // Route::get('/dashboard-teacher/home',[AdminController::class,'guru'])->middleware(UserAccess::class.':guru');
    // Route::get('/logout',[SesiController::class,'logout']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home',[StudentController::class, 'index'])->name('student.home')->middleware('check.profile.data');
    Route::get('/profile',[StudentController::class, 'profile'])->name('student.profile');
    Route::get('/update-profile',[StudentController::class, 'updateProfile']);
    Route::post('/update-profile-post',[StudentController::class, 'updateProfilePost']);

    Route::get('/update-profile/{student:nis}',[StudentController::class, 'showUpdateProfile']);
    Route::put('/update-profile/{student:nis}/put',[StudentController::class, 'updateProfilePut']);

});




// Route::get('/admin', function(){
//     return view('dashboard.admin');
// });





Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route("login"));
})->name('logout');

Route::get('/cobalogin', function(){
    return view('cobaLogin');
});

