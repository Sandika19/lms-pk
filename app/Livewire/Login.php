<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    #[Layout('components.layouts.auth')]//atribut untuk mengarahkan main file ke auth.blade.php
    #[Title('Login')] //atribut untuk title login

    public $email;
    public$password;
    public function render()
    {
        return view('livewire.login');
    }

    public function login(){
        // dd($this->all());
        if(Auth::attempt([
            'email' => $this->email, 
            'password' => $this->password
        ])){
            return $this->redirect('/test',navigate:true);
        }
        return $this->redirect('/login', navigate:true);
    }
}
