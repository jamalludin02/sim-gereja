<?php

namespace App\Livewire;

use Livewire\Component;

class Umat extends Component
{
    public $registerForm = false;
    public function render()
    {
        return view('livewire.umat');
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }
}
