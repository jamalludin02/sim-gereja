<?php

namespace App\Http\Controllers;

use App\DataTables\SidiDataTable;
use App\Models\Sidi;
use Illuminate\Http\Request;

class SidiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SidiDataTable $dataTable)
    {
        $data = Sidi::with(['user' => fn ($q) => $q->with('lingkungan')])->join('users', 'sidi.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->select('users.*', 'lingkungan.nama as lingkungan', 'sidi.*')
            ->where('users.role', 'UMAT')
            ->get();
        // dd($data);
        return $dataTable->render('admin.sidi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        // dd($request->all());
        $request->validate([
            'surat_baptis' => 'required|file|mimes:pdf|max:2048', // contoh validasi
        ]);

        // Inisialisasi variabel $path
        $path = null;

        // Mengunggah dan menyimpan file ke storage
        if ($request->hasFile('surat_baptis')) {
            $file = $request->file('surat_baptis');
            $nama_file = auth()->user()->id . '-' . 'surat_baptis.' . $file->getClientOriginalExtension();
            $path = 'surat-baptis/' . $nama_file;
            $file->move(public_path('storage/surat-baptis'), $nama_file);

            Sidi::create([
                'id_user' => auth()->user()->id,
                'surat_baptis' => $path,
                'status' => 'PROSES',
            ]);
        }

        return redirect()->route('sidi.index');
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
        $data = Sidi::with(['user' => fn ($q) => $q->with('lingkungan')])->join('users', 'sidi.id_user', '=', 'users.id')
            ->leftJoin('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->select('users.*', 'lingkungan.nama as lingkungan', 'sidi.*')->find($id);
        // dd($data);
        return view('admin.sidiEdit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Sidi::find($id);
        $data->update(['status' => $request->status]);
        return redirect()->route('sidi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sidi::find($id);
        $data->delete();
        return redirect()->route('sidi.index');
    }


    public function indexUmat()
    {
        $id = auth()->user()->id;
        $sidi = Sidi::where('id_user', $id)->where('sidi.status', 'DITERIMA')->first() ? true : false;
        $data = Sidi::with(['user' => fn ($q) => $q->with('lingkungan')])->join('users', 'sidi.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->select('users.*', 'sidi.*', 'lingkungan.nama as lingkungan')
            ->where('sidi.id_user', $id)
            ->first();
        // dd($data);
        return view('umat.sidi', compact('data', 'sidi'));
    }
    public function print()
    {
        $id = auth()->user()->id;
        $data = Sidi::with(['user' => fn ($q) => $q->with('lingkungan')])
            ->join('users', 'sidi.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->select('users.*', 'sidi.*', 'lingkungan.nama as lingkungan')
            ->where('sidi.id_user', $id)
            ->first();
        // dd($data);
        return view('umat.sidiPrint', compact('data'));
    }
}
