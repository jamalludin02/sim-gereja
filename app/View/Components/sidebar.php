<?php

namespace App\View\Components;

use App\Models\BaptisAnak;
use App\Models\IbadahSyukur;
use App\Models\Pernikahan;
use App\Models\Sidi;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $ibadah = IbadahSyukur::where('status', 'PROSES')->count();
        $sidi = Sidi::where('status', 'PROSES')->count();
        $baptis = BaptisAnak::where('status', 'PROSES')->count();
        $pernikahan = Pernikahan::where('status', 'PROSES')->count();
        return view('components.sidebar' , compact('ibadah','sidi', 'baptis', 'pernikahan'));
    }
}
