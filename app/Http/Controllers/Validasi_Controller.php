<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ibadah;

class Validasi_Controller extends Controller
{
    public function index(request $request){
        $data_ibadah = ibadah::all();
        return view('validasi.index',compact("data_ibadah"));
    }
}
