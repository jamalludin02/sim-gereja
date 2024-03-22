<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ibadah;

class Home_Controller extends Controller
{
    public function index(request $request){
        $ibadah = Ibadah::all();
        return view('homepage.home',compact('ibadah'));
    }
}
