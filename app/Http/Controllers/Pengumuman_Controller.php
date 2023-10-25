<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumumans;

class Pengumuman_Controller extends Controller
{
    public function index(request $request){
        $data_pengumuman = Pengumumans::all();
        return view('pengumuman.index',compact("data_pengumuman"));
    }
}
