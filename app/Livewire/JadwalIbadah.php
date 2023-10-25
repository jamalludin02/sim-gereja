<?php

namespace App\Livewire;
use App\Models\ibadah;
use Livewire\Component;

class JadwalIbadah extends Component
{
    public $jadwal;
    public function render()
    {
        return view('livewire.jadwal-ibadah');
    }
    public function mount(){
        $this->jadwal = ibadah::where('user_id', auth()->user()->id)->get();
    }
}
