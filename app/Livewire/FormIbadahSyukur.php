<?php

namespace App\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ibadah;
use App\Models\User;

class FormIbadahSyukur extends Component
{
    public $pendeta;
    
    public function render()
    {
        return view('livewire.form-ibadah-syukur');
    }

    public function mount(){
        $this->pendeta = User::where('isPendeta', true)->get();
    }
}
