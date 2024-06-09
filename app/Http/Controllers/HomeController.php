<?php

namespace App\Http\Controllers;

use App\Models\IbadahSyukur;
use App\Models\Lingkungan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data  = IbadahSyukur::with(['user.lingkungan', 'pendeta.lingkungan',])
            ->where('id_pendeta', '!=', 'NULL')
            ->where('status', 'DITERIMA')->get();
        return view('index', compact('data'));
    }

    public function pengumuman()
    {
        $data = Pengumuman::orderBy('id', 'desc')->paginate(10);
        return view('pengumuman', compact('data'));
    }

    public function pengumumanDetails($id)
    {
        $data = Pengumuman::find($id);
        return view('pengumuman-details', compact('data'));
    }

    public function getJadwal()
    {
        $data = IbadahSyukur::with(['user.lingkungan', 'pendeta.lingkungan',])->get();
        return response()->json($data);
    }
}
