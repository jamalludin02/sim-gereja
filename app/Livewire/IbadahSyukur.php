<?php

namespace App\Livewire;

use Livewire\Component;

class IbadahSyukur extends Component
{
    public $formIbadahSyukur;

    public function render()
    {
        return view('livewire.ibadah-syukur')
        ->layout('livewire.umat');
    }
}
