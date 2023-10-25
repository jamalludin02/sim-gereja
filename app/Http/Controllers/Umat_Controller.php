<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ibadah;

class Umat_Controller extends Controller
{
    public function index(request $request){
        return view('profil.index');
    }

    public function getPendeta(Request $request, $tanggal, $pendeta_id){
        $getPendeta=ibadah::where('tanggal', $tanggal)
        ->where('pendeta_id', $pendeta_id)->get();
        return response()->json([
            'getPendeta'=>$getPendeta,
        ]);
    }
}
