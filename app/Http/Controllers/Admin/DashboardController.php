<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaptisAnak;
use App\Models\IbadahSyukur;
use App\Models\Pernikahan;
use App\Models\Sidi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ibadah = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $sidi = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $baptis = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $pernikahan = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $ibadah->proses = IbadahSyukur::where('status', 'PROSES')->count();
        $ibadah->ditolak = IbadahSyukur::where('status', 'DITOLAK')->count();
        $ibadah->diterima = IbadahSyukur::where('status', 'DITERIMA')->count();

        $sidi->proses = Sidi::where('status', 'PROSES')->count();
        $sidi->ditolak = Sidi::where('status', 'DITOLAK')->count();
        $sidi->diterima = Sidi::where('status', 'DITERIMA')->count();

        $baptis->proses = BaptisAnak::where('status', 'PROSES')->count();
        $baptis->ditolak = BaptisAnak::where('status', 'DITOLAK')->count();
        $baptis->diterima = BaptisAnak::where('status', 'DITERIMA')->count();

        $pernikahan->proses = Pernikahan::where('status', 'PROSES')->count();
        $pernikahan->ditolak = Pernikahan::where('status', 'DITOLAK')->count();
        $pernikahan->diterima = Pernikahan::where('status', 'DITERIMA')->count();

        return view('admin.dashboard', compact('ibadah', 'sidi', 'baptis', 'pernikahan'));
    }

    public function indexUmat()
    {
        $id = Auth::user()->id;
        $ibadah = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $baptis = (object)[
            'proses' => 0,
            'ditolak' => 0,
            'diterima' => 0
        ];
        $ibadah->proses = IbadahSyukur::where('status', 'PROSES')->where('id_user', $id)->count();
        $ibadah->ditolak = IbadahSyukur::where('status', 'DITOLAK')->where('id_user', $id)->count();
        $ibadah->diterima = IbadahSyukur::where('status', 'DITERIMA')->where('id_user', $id)->count();

        $baptis->proses = BaptisAnak::where('status', 'PROSES')->where('id_user', $id)->count();
        $baptis->ditolak = BaptisAnak::where('status', 'DITOLAK')->where('id_user', $id)->count();
        $baptis->diterima = BaptisAnak::where('status', 'DITERIMA')->where('id_user', $id)->count();
        
        $sidi = Sidi::where('status', 'DITERIMA')->where('id', $id)->exists();
        $pernikahan = Pernikahan::where('status', 'DITERIMA')->where('id', $id)->exists();
        return view('umat.dashboard', compact('ibadah', 'sidi', 'baptis', 'pernikahan'));
    }
    public function indexPendeta()
    {
        $id = Auth::user()->id;
        $ibadah = IbadahSyukur::with('user.lingkungan')->where('id_pendeta', $id)->get();
        $pernikahan = Pernikahan::with(['userLaki', 'userPerempuan'])->where('id_pendeta', $id)->get();
        // dd($pernikahan[0]->userLaki->nama);
        return view('pendeta.jadwal', compact('ibadah', 'pernikahan'));
    }
}
