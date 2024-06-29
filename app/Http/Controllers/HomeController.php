<?php

namespace App\Http\Controllers;

use App\Models\BaptisAnak;
use App\Models\IbadahSyukur;
use App\Models\Lingkungan;
use App\Models\Pengumuman;
use App\Models\Pernikahan;
use App\Models\Sidi;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index()
    {
        $baptis = BaptisAnak::with(['user.lingkungan', 'pendeta.lingkungan'])
            ->leftJoin('users', 'baptis_anak.id_user', '=', 'users.id')
            ->addSelect('*', 'tgl_pelaksanaan as tanggal', 'waktu_pelaksanaan as waktu', DB::raw('"Baptis Anak" as acara'))
            ->where('status', 'DITERIMA')
            ->get();
        // dd($baptis);

        $ibadah = IbadahSyukur::with(['user.lingkungan', 'pendeta.lingkungan'])
            ->addSelect('*',  DB::raw('"Ibadah Syukur" as acara'))
            ->whereNotNull('id_pendeta')
            ->where('status', 'DITERIMA')
            ->get();

        $pernikahan = Pernikahan::with(['userLaki', 'userPerempuan', 'pendeta.lingkungan'])
            ->leftJoin('users as userLaki', 'pernikahan.id_user_laki', '=', 'userLaki.id')
            ->leftJoin('users as userPerempuan', 'pernikahan.id_user_perempuan', '=', 'userPerempuan.id')
            ->addSelect('pernikahan.*', DB::raw('concat(userLaki.nama, " & ", userPerempuan.nama) as user_nama'), DB::raw('"Pernikahan" as acara'))
            ->whereNotNull('id_pendeta')
            ->where('status', 'DITERIMA')
            ->get();

        // Gabungkan semua data dalam satu koleksi
        $data = new Collection();
        $data = $data->merge($ibadah);
        $data = $data->merge($pernikahan);
        $data = $data->merge($baptis);
        // dd($data); // Periksa hasil setelah merge kedua


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
