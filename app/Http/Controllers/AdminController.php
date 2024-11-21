<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function admin(){
        // echo'halo selamat datang admin';   
        // echo "<h1>". Auth::user()->name . "</h1>";
        // echo "<a href='/logout'>Logout</a>";
        $jumlah_murid = User::where('role', 'student')->count();
        $jumlah_guru = User::where('role', 'teacher')->count();
        $jumlah_admin = User::where('role', 'admin')->count();
        $users = User::all();

        return view('dashboard.admin',[
            'title'=>'Data Users',
            'jumlah_murid' => $jumlah_murid,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_admin' => $jumlah_admin,
            'users' => $users
        ]);

        $users = User::get();
        return view('dashboard.admin',compact('users'));
        
    }

    function students(){
        $jumlah_murid = User::where('role', 'student')->count();
        $users = User::where('role', 'student')->get();
        return view('dashboard.adminMurid',[
            'title'=>'Students Data',
            'jumlah_murid' => $jumlah_murid,
            'users' => $users
            
        ]);

        $users = User::get();
        return view('dashboard.admin',compact('users'));
        
       
    }

    function tambahSiswa(){
        return view('dashboard.siswaTambah',[
            'title'=>'Tambah Siswa']);
    }



    function teacher(){
        $jumlah_guru = User::where('role', 'teacher')->count();
        $users = User::where('role', 'teacher')->get();
        return view('dashboard.adminTeacher',[
            'title'=>'Teachers Data',
            'jumlah_guru' => $jumlah_guru,
            'users' => $users
            
        ]);

        $users = User::get();
        return view('dashboard.adminTeacher',compact('users'));
        
        
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }

    
}
