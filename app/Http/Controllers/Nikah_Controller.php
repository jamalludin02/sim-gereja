<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Nikah_Controller extends Controller
{
    public function index(request $request){
        return view('nikah.index');
    }
}
