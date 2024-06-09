<?php

namespace App\Http\Controllers;

use App\DataTables\PengumumanDataTable;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PengumumanDataTable $dataTable)
    {
        $data = Pengumuman::all();
        return $dataTable->render('admin.pengumuman', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengumumanCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Pengumuman::create($request->all());
        return redirect()->route('pengumuman.index');
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
        $data = Pengumuman::find($id);
        return view('admin.pengumumanEdit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pengumuman::find($id);
        $data->update($request->all());
        return redirect()->route('pengumuman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengumuman::find($id);
        $data->delete();
        return redirect()->route('pengumuman.index');
    }
}
