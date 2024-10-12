<?php

use App\Livewire\Login;
use App\Livewire\FormAuth;
use App\Livewire\Register;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',FormAuth::class);
// Route::get('/login',Login::class);
Route::get('/register',Register::class);

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[SesiController::class, 'index'])->name('login');
    Route::post('/login',[SesiController::class, 'login']);
});
Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/admin',[AdminController::class,'admin'])->middleware(UserAccess::class.':admin');
    Route::get('/admin/guru',[AdminController::class,'guru'])->middleware(UserAccess::class.':guru');
    Route::get('/admin/siswa',[AdminController::class,'siswa'])->middleware(UserAccess::class.':user');
    Route::get('/logout',[SesiController::class,'logout']);
});



