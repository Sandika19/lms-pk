<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    #[Layout('components.layouts.auth')]
    #[Title('Register')] //atribut untuk title register

    public function render()
    {
        return view('livewire.register');
    }
}
