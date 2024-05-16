<?php

namespace App\Http\Controllers;

use App\Models\IbadahSyukur;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'indexumat', 'searchId');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(request $request)
    {
        $ibadah = IbadahSyukur::all();
        // dd($ibadah);
        return view('homepage.home', compact('ibadah'));
    }

    public function indexumat(request $request)
    {
        $ibadah = IbadahSyukur::with('user')->all();
        return view('homepage.homeumat', compact('ibadah'));
    }


    public function searchId($id)
    {
        $name = $request->input('name');
        $users = User::where('isUmat', true)->where('name', 'like', '%' . $name . '%')->get();

        return response()->json([
            'users' => $users
        ]);
    }
}
