<?php

namespace App\Http\Controllers;

use App\DataTables\BaptisDataTable;
use App\Models\BaptisAnak;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class BaptisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BaptisDataTable $dataTable)
    {
        $data = BaptisAnak::with('user')->get();
        // dd($data);
        return $dataTable->render('admin.baptis', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('umat.baptisCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_anak' => 'required|string|max:255',
            'gender' => 'required|string',
            'tgl_lahir' => 'required|date',
            'tgl_pelaksanaan' => 'required|date',
            'waktu_pelaksanaan' => 'required|date_format:H:i',
            'akta_kelahiran' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'kartu_keluarga' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Mengunggah dan menyimpan file ke direktori public/storage/surat-baptis
        $aktaKelahiranPath = null;
        $kartuKeluargaPath = null;

        if ($request->hasFile('akta_kelahiran')) {
            $file = $request->file('akta_kelahiran');
            $nama_file = auth()->user()->id . '-' . 'akta_kelahiran.' . $file->getClientOriginalExtension();
            $aktaKelahiranPath = 'akta-kelahiran/' . $nama_file;
            $file->move(public_path('storage/akta-kelahiran'), $nama_file);
        }

        if ($request->hasFile('kartu_keluarga')) {
            $file = $request->file('kartu_keluarga');
            $nama_file = auth()->user()->id . '-' . 'kartu_keluarga.' . $file->getClientOriginalExtension();
            $kartuKeluargaPath = 'kartu-keluarga/' . $nama_file;
            $file->move(public_path('storage/kartu-keluarga'), $nama_file);
        }

        // Menyimpan data ke database
        BaptisAnak::create([
            'id_user' => auth()->user()->id,
            'nama_anak' => $request->nama_anak,
            'gender' => $request->gender,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_pelaksanaan' => $request->tgl_pelaksanaan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'akta_kelahiran' => $aktaKelahiranPath,
            'kartu_keluarga' => $kartuKeluargaPath,
        ]);

        return redirect()->route('baptis-anak.umat');
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
        $data = BaptisAnak::find($id);
        // dd($data);
        return view('admin.baptisEdit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BaptisAnak::find($id);
        $data->update(['status' => $request->status]);
        // $data->update($request->all());
        return redirect()->route('baptis-anak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BaptisAnak::find($id);
        $data->delete();
        return redirect()->route('baptis-anak.index');
    }

    public function indexUmat()
    {
        $id = auth()->user()->id;
        $data = BaptisAnak::with('user')
            ->select('users.*', 'baptis_anak.*', 'lingkungan.nama as lingkungan')
            ->join('users', 'baptis_anak.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->where('baptis_anak.id_user', $id)
            ->get();
        // dd($data);
        return view('umat.baptis', compact('data'));
    }

    public function print($id)
    {
        $data = BaptisAnak::with('user')
            ->select('users.*', 'baptis_anak.*', 'lingkungan.nama as lingkungan')
            ->join('users', 'baptis_anak.id_user', '=', 'users.id')
            ->join('lingkungan', 'users.id_lingkungan', '=', 'lingkungan.id')
            ->where('baptis_anak.id', $id)
            ->first();
        // dd($data);
        return view('umat.baptisPrint', compact('data'));
    }
}
