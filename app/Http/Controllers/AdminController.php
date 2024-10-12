<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        echo'halo selamat datang';   
        echo "<h1>". Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

    function admin(){
        echo'halo selamat datang admin';   
        echo "<h1>". Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

    function guru(){
        echo'halo selamat datang bapak/ibu guru';   
        echo "<h1>". Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }

    function siswa(){
        echo'halo selamat datang teman-teman';   
        echo "<h1>". Auth::user()->name . "</h1>";
        echo "<a href='/logout'>Logout</a>";
    }
}
