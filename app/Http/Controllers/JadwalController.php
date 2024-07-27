<?php

namespace App\Http\Controllers;

use App\Models\BaptisAnak;
use App\Models\IbadahSyukur;
use App\Models\Pernikahan;
use App\Models\Sidi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function indexPendeta()
    {
        $id = Auth::user()->id;
        $ibadah = IbadahSyukur::with('user.lingkungan')->where('id_pendeta', $id)->where('status', 'ACTIVE')->get();
        $pernikahan = Pernikahan::with(['userLaki', 'userPerempuan'])->where('id_pendeta', $id)->get();
        // dd($pernikahan[0]->userLaki->nama);
        return view('pendeta.jadwal', compact('ibadah', 'pernikahan'));
    }
}
