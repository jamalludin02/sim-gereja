<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LingkunganDataTable;
use App\DataTables\LingkunganDtTablesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Lingkungan;
use Illuminate\Http\Request;

class LingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {

        $this->middleware('auth');
    }
    public function index(LingkunganDataTable $dataTable)
    {
        $data = Lingkungan::all();
        // dd($dataTable->render('lingkungan.index', compact('data')));
        return $dataTable->render('admin.lingkungan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lingkunganCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Lingkungan::create($data);
        return redirect()->route('lingkungan.index')->with('success', 'Data Berhasil');
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
        return view('admin.lingkunganEdit', [
            'data' => Lingkungan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Lingkungan::find($id);
        $data->update($request->all());
        return redirect()->route('lingkungan.index')->with('success', 'Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Lingkungan::find($id);
        $data->delete();
        return redirect()->route('lingkungan.index')->with('success', 'Data Berhasil');
    }
}
