<?php

use App\Livewire\Login;
use App\Livewire\FormAuth;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',FormAuth::class);
Route::get('/login',Login::class);
Route::get('/register',Register::class);