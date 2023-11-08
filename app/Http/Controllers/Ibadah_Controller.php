<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ibadah;
class Ibadah_Controller extends Controller
{
    public function index(request $request){
        $ibadah = Ibadah::all();
        return view('ibadah.index', compact('ibadah'));
    }
}
