<?php

namespace App\Http\Controllers;

use App\DataTables\PernikahanDataTable;
use App\Models\JadwalHalangan;
use App\Models\Pernikahan;
use App\Models\Sidi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class PernikahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PernikahanDataTable $dataTable)
    {
        $data = Pernikahan::with(['userLaki', 'userPerempuan'])
            // ->join('users as laki', 'laki.id', '=', 'pernikahan.id_user_laki')
            // ->join('users as perempuan', 'perempuan.id', '=', 'pernikahan.id_user_perempuan')
            // ->select('laki.nama as nama_laki', 'perempuan.nama as nama_perempuan',  'pernikahan.*')
            ->get();
        // dd($data);
        return $dataTable->render('admin.pernikahan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = auth()->user()->id;
        $data = User::findOrFail($id);
        $sidi = Sidi::where('id_user', $id)->where('status', 'DITERIMA')->first();

       
        return view('umat.pernikahanCreate', compact('data', 'sidi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
         $request->validate([
            'id_user_laki' => 'required|exists:users,id',
            'id_user_perempuan' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'ktp_laki' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'ktp_perempuan' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'sidi_laki' => 'required|exists:sidi,id',
            'sidi_perempuan' => 'required|exists:sidi,id',
        ]);

        // Cek status Sidi
        $sidiLaki = Sidi::find($request->sidi_laki);
        $sidiPerempuan = Sidi::find($request->sidi_perempuan);

        if ($sidiLaki->status !== 'DITERIMA' || $sidiPerempuan->status !== 'DITERIMA') {
            return redirect()->back()->withErrors(['sidi' => 'Status Sidi harus diterima.']);
        }

        // Mengunggah dan menyimpan file ke direktori public/storage/pernikahan
        $ktpLakiPath = null;
        $ktpPerempuanPath = null;

        if ($request->hasFile('ktp_laki')) {
            $file = $request->file('ktp_laki');
            $nama_file = $request->id_user_laki . '-' . 'ktp_laki.' . $file->getClientOriginalExtension();
            $ktpLakiPath = 'pernikahan/' . $nama_file;
            $file->move(public_path('storage/pernikahan'), $nama_file);
        }

        if ($request->hasFile('ktp_perempuan')) {
            $file = $request->file('ktp_perempuan');
            $nama_file = $request->id_user_perempuan . '-' . 'ktp_perempuan.' . $file->getClientOriginalExtension();
            $ktpPerempuanPath = 'pernikahan/' . $nama_file;
            $file->move(public_path('storage/pernikahan'), $nama_file);
        }

        // Menyimpan data ke database
        Pernikahan::create([
            'id_user_laki' => $request->id_user_laki,
            'id_user_perempuan' => $request->id_user_perempuan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'ktp_laki' => $ktpLakiPath,
            'ktp_perempuan' => $ktpPerempuanPath,
            'sidi_laki' => $request->sidi_laki,
            'sidi_perempuan' => $request->sidi_perempuan,
        ]);

        return redirect()->route('pernikahan.umat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pernikahan::with(['userLaki' => function ($q) {
            $q->with('lingkungan');
        }, 'userPerempuan' => function ($q) {
            $q->with('lingkungan');
        }, 'sidiLaki', 'sidiPerempuan'])->find($id);
        $pendeta = User::select('id', 'nama')->where('role', 'PENDETA')->get();
        $jadwalHalangan = JadwalHalangan::with(['pendeta'])->where('status', 'ACTIVE')->get();
        $jadwalHalangan = $jadwalHalangan->groupBy('pendeta.nama')->toArray();
        return view('admin.pernikahanEdit', compact('data', 'pendeta', 'jadwalHalangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id_pendeta' => 'required|exists:users,id',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $data = Pernikahan::find($id);

       
        $data->update([
            'id_pendeta' => $request->id_pendeta,
            'status' => $request->status,
        ]);

        return redirect()->route('pernikahan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pernikahan::findOrFail($id);
        $data->delete();
        return redirect()->route('pernikahan.index');
    }

    public function indexUmat()
    {
        $data = $this->getData();
        $sidi = Sidi::where('id_user', auth()->user()->id)->where('status', 'DITERIMA')->first();
        if ($sidi === null) {
            $disableBtn = false;
            return view('umat.pernikahan', compact('data', 'disableBtn'))
                ->withErrors(['error' => [
                    'Sidi anda tidak ditemukan',
                    'Pastikan pasangan anda sudah melengkapi data sidi',
                    "Psstikan 'Status' Sidi anda & pasangan diterima",
                ]]);
        }
        return view('umat.pernikahan', compact('data'));
    }

    public function print()
    {
        $data = $this->getData();
        // dd($data);
        return view('umat.pernikahanPrint', compact('data'));
    }

    public function getData()
    {
        $data = Pernikahan::with(['userLaki.lingkungan', 'userPerempuan.lingkungan', 'pendeta'])
            ->join('users as laki', 'laki.id', '=', 'pernikahan.id_user_laki')
            ->join('users as perempuan', 'perempuan.id', '=', 'pernikahan.id_user_perempuan')
            ->where(function ($query) {
                $query->where('pernikahan.id_user_laki', auth()->user()->id)
                    ->orWhere('pernikahan.id_user_perempuan', auth()->user()->id);
            })
            ->select(
                'pernikahan.*',
                'laki.id as laki_id',
                'laki.nama as laki_nama',
                'laki.alamat as laki_alamat',
                'laki.gender as laki_gender',
                DB::raw('lingkungan_laki.nama as laki_lingkungan'),
                'perempuan.id as perempuan_id',
                'perempuan.nama as perempuan_nama',
                'perempuan.alamat as perempuan_alamat',
                'perempuan.gender as perempuan_gender',
                DB::raw('lingkungan_perempuan.nama as perempuan_lingkungan')
            )
            ->leftJoin('lingkungan as lingkungan_laki', 'laki.id_lingkungan', '=', 'lingkungan_laki.id')
            ->leftJoin('lingkungan as lingkungan_perempuan', 'perempuan.id_lingkungan', '=', 'lingkungan_perempuan.id')
            ->first();
        return $data;
    }
}
