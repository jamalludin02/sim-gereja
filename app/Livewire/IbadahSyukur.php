<?php

namespace App\Livewire;

use Livewire\Component;


class IbadahSyukur extends Component
{
    // public $users, $email, $passwordField, $name,$password;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.ibadah-syukur')
        ->layout('livewire.umat');
    }
    
    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }
}
