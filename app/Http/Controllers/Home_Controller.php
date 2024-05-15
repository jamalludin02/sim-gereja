<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IbadahSyukur;
use Illuminate\Http\Request;
use App\Models\ibadah;
use App\Models\IbadahSyukur as ModelsIbadahSyukur;
use App\Models\User;

class Home_Controller extends Controller
{
    public function index(request $request){
        $ibadah = IbadahSyukur::all();
        return view('homepage.home',compact('ibadah'));
    }

    public function indexumat(request $request){
        $ibadah = IbadahSyukur::all();
        return view('homepage.homeumat',compact('ibadah'));
    }
    

    public function searchId(Request $request){
        $name = $request->input('name');
        $users = User::where('isUmat', true)->where('name', 'like', '%' . $name . '%')->get();
    
        return response()->json([
            'users' => $users
        ]);
    }
}
