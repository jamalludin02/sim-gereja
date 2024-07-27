<?php

namespace App\Http\Controllers;

use App\DataTables\IbadahDataTable;
use App\Models\JadwalHalangan;
use App\Models\Lingkungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalHalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IbadahDataTable $dataTable)
    {
        $id = Auth::user()->id;
        $data = JadwalHalangan::with(['pendeta'])->get();
        return $dataTable->render('admin.pernikahan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lingkungan = Lingkungan::all();
        return view('admin.ibadahCreate', compact('lingkungan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_pendeta = Auth::user()->id;
        $data = JadwalHalangan::create([
            'id_pendeta' => $id_pendeta,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'keterangan' => $request->keterangan,
            'status' => 'PROSES',
        ]);
        return redirect()->route('jadwal-halangan.pendeta');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function showByUmat()
    {
        $data = JadwalHalangan::with(['user.lingkungan', 'pendeta'])->where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $listPendeta = User::where('role', 'PENDETA')->get();
        return view('umat.ibadahCreate', compact('listPendeta',  'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = JadwalHalangan::with(['user.lingkungan', 'pendeta'])->find($id);
        return view('admin.ibadahEdit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = JadwalHalangan::find($id);
        $data->update(['status' => 'DITERIMA']);
        return redirect()->route('ibadah-syukur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JadwalHalangan::find($id);
        $data->delete();
        return redirect()->route('ibadah-syukur.index');
    }

    public function storePenolakan($id, Request $request)
    {
        $data = JadwalHalangan::with('user.lingkungan')->where('id', $id)->first();
        $data->update([
            'keterangan' => $request->keterangan,
            'status' => 'DITOLAK',
        ]);
        return redirect()->route('ibadah-syukur.index');
    }


    public function indexPendeta(IbadahDataTable $dataTable)
    {
        $id = Auth::user()->id;
        $jadwalHalangan = JadwalHalangan::with(['pendeta'])->where('id_pendeta', $id)->get();
        // dd($data);
        return view('pendeta.jadwal-halangan', compact('jadwalHalangan'));
    }
}
