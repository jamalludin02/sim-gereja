<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Admin_Controller extends Controller
{
    public function index(request $request){
        return view('admin.index');
    }

    public function dashboard(request $request){
        return view('admin.dashboard');
    }

    public function indexlingkungan(request $request){
        return view('admin.lingkungan');
    }

    public function indexkatekisasi(request $request){
        return view('admin.katekisasi');
    }

    public function indexbaptis(request $request){
        return view('admin.baptis');
    }

    public function indexnikah(request $request){
        return view('admin.nikah');
    }

    public function indexpendeta(request $request){
        return view('admin.pendeta');
    }

    public function indexpengumuman(request $request){
        return view('admin.pengumuman');
    }

    public function indexpersembahan(request $request){
        return view('admin.persembahan');
    }

    public function indexumat(request $request){
        $umat = User::where('role', 'UMAT')->get();
        return view('admin.umat', compact('umat'));
    }
}
