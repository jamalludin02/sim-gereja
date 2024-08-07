<?php

namespace App\Http\Controllers;

use App\DataTables\IbadahDataTable;
use App\Models\IbadahSyukur;
use App\Models\JadwalHalangan;
use App\Models\Lingkungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IbadahDataTable $dataTable)
    {
        $id = Auth::user()->id;
        $data = IbadahSyukur::with(['user.lingkungan', 'pendeta'])->get();
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
        $idLingkungan = User::with('lingkungan')->where('id', Auth::user()->id)->first();
        $query = IbadahSyukur::with('pendeta')->where('tanggal', $request->tanggal)->where('id_pendeta', $request->id_pendeta)->get();

        if ($query->count() == 0) {
            $data = IbadahSyukur::create($request->all());
            return redirect()->route('Ibadah.umat')->with('success', 'Acara Ibadah berhasil dibuat, tunggu persetujuan pendeta dan pihak gereja');
        } else {
            return redirect()->route('Ibadah.umat')->with('error', 'Acara Ibadah gagal dibuat pada lingkugan, tanggal, dan pendeta yang anda tentukan sudah ada');
        }
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
        $data = IbadahSyukur::with(['user.lingkungan', 'pendeta'])->where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $listPendeta = User::where('role', 'PENDETA')->get();

        $jadwalHalangan = JadwalHalangan::with(['pendeta'])->where('status', 'ACTIVE')->get();
        $jadwalHalangan = $jadwalHalangan->groupBy('pendeta.nama')->toArray();
        return view('umat.ibadahCreate', compact('listPendeta',  'data', 'jadwalHalangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = IbadahSyukur::with(['user.lingkungan', 'pendeta'])->find($id);
        return view('admin.ibadahEdit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = IbadahSyukur::find($id);
        $data->update(['status' => 'DITERIMA']);
        return redirect()->route('ibadah-syukur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = IbadahSyukur::find($id);
        $data->delete();
        return redirect()->route('ibadah-syukur.index');
    }

    public function storePenolakan($id, Request $request)
    {
        $data = IbadahSyukur::with('user.lingkungan')->where('id', $id)->first();
        $data->update([
            'keterangan' => $request->keterangan,
            'status' => 'DITOLAK',
        ]);
        return redirect()->route('ibadah-syukur.index');
    }

    public function print($ibadah_id)
    {
        $id = auth()->user()->id;
        $data = IbadahSyukur::with(['user' => fn ($q) => $q->with('lingkungan')])
            ->join('users', 'ibadah_syukur.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->select('users.*', 'ibadah_syukur.*', 'lingkungan.nama as lingkungan')
            ->where('ibadah_syukur.id', $ibadah_id)
            ->first();
        // dd($data);
        return view('umat.ibadahPrint', compact('data'));
    }
}
