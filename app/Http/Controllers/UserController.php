<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\Lingkungan;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $datatable)
    {
        $data = User::with('lingkungan')->get();
        // dd($data);
        return $datatable->render('admin.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lingkungan = Lingkungan::all();
        return view('admin.userCreate', compact('lingkungan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = User::create([
            // 'id' => $this->getAndCheckId(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make(12345678),
            'alamat' => $request->alamat,
            'gender' => $request->gender,
            'id_lingkungan' => $request->id_lingkungan,
            'role' => $request->role

        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::with('lingkungan')->find($id);
        $data->password = Hash::check($data->password, $data->password) ? $data->password : Hash::make($data->password);
        $lingkungan = Lingkungan::all();
        return view('admin.userEdit', compact('data', 'lingkungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user.index');
    }

    public function resetPassword($id)
    {
        $data = User::find($id);
        $data->update([
            'password' => Hash::make('12345678')
        ]);
        return redirect()->route('user.index');
    }

    public function indexUmat()
    {
        $id = auth()->user()->id;
        $data = User::with('lingkungan')->find($id);


        $user = Auth::user();
        $role = $user->role;
        $isDefaultPassword = Hash::check('12345678', $user->password);
        if($isDefaultPassword){
            return view('umat.akun', compact('data'))->withErrors(['error' => [
                'Password anda menggunakan password default. Silahkan ubah password anda.',
            ]]);;
        }else{
            return view('umat.akun', compact('data'));
        }
       
    }
    public function updateAkunByUmat(Request $request)
    {
        $id = auth()->user()->id;
        // dd($id);
        $user = User::find($id);
        if ($request->oldPassword  && $request->newPassword  && $request->confirmPassword) {
            if ($request->newPassword == $request->confirmPassword) {
                if (Hash::check($request->oldPassword, $user->password)) {
                    try {
                        $user->fill([
                            'email' => $request->email,
                            'password' => Hash::make($request->newPassword)
                        ])->save();

                        return redirect()->back()->with('success', 'email Berhasil Di Update');
                        // return response()->json(["data" => $user]);
                    } catch (Error $err) {
                        return redirect()->back()->with('error', $err);
                        // return response()->json(['err' => $err]);
                    }
                } else {
                    return redirect()->back()->with('error', 'password lama tidak cocok.');
                }
            } else {
                return redirect()->back()->with('error', 'password baru dan konfirmasi password tidak sesuai.');
            }
        }
        try {
            $data = $user->fill([
                'email' => $request->email,
            ])->save();
            return redirect()->back()->with('success', 'email Berhasil Di Update');
        } catch (Error $err) {
            return redirect()->back()->with('error', $err);
        }
        // dd($data);

        return redirect()->back();
    }

    public function indexPendeta()
    {
        $id = auth()->user()->id;
        $data = User::with('lingkungan')->find($id);
        
        $user = Auth::user();
        $role = $user->role;
        $isDefaultPassword = Hash::check('12345678', $user->password);
        if($isDefaultPassword){
            return view('pendeta.akun', compact('data'))->withErrors(['error' => [
                'Password anda menggunakan password default. Silahkan ubah password anda.',
            ]]);;
        }else{
            return view('pendeta.akun', compact('data'));
        }
    }
    public function updateAkunByPendeta(Request $request)
    {
        $id = auth()->user()->id;
        // dd($id);
        $user = User::find($id);
        if ($request->oldPassword  && $request->newPassword  && $request->confirmPassword) {
            if ($request->newPassword == $request->confirmPassword) {
                if (Hash::check($request->oldPassword, $user->password)) {
                    try {
                        $user->fill([
                            'email' => $request->email,
                            'password' => Hash::make($request->newPassword)
                        ])->save();

                        return redirect()->back()->with('success', 'email Berhasil Di Update');
                        // return response()->json(["data" => $user]);
                    } catch (Error $err) {
                        return redirect()->back()->with('error', $err);
                        // return response()->json(['err' => $err]);
                    }
                } else {
                    return redirect()->back()->with('error', 'password lama tidak cocok.');
                }
            } else {
                return redirect()->back()->with('error', 'password baru dan konfirmasi password tidak sesuai.');
            }
        }
        try {
            $data = $user->fill([
                'email' => $request->email,
            ])->save();
            return redirect()->back()->with('success', 'email Berhasil Di Update');
        } catch (Error $err) {
            return redirect()->back()->with('error', $err);
        }
        // dd($data);

        return redirect()->back();
    }
}
