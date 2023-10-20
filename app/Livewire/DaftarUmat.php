<?php

namespace App\Livewire;
use App\Models\Umat;
use App\Models\User;
use Livewire\Component;

class DaftarUmat extends Component
{
    public $ketling;
    public $dataumat;
    public $createForm = false;
    public $editForm = false;
    public $viewForm=true;
    public $nama_kk;
    public $alamat;
    public $umatId;
    public $no_wa;
    public $lingkungan;

    public function mount(){
        $this->ketling = auth()->user()->lingkungan;
        $lings = auth()->user()->lingkungan;
        $this->dataumat = Umat::where('lingkungan', $lings)->get();
    }

    public function create(){
        $this->createForm = !$this->createForm;
        $this->resetInputFields();
    }

    public function view()
    {
        $this->viewForm = true;
        $this->createForm = false;
        $this->editForm = false;
    }

    private function resetInputFields(){
        $this->nama_kk = '';
        $this->alamat = '';
        $this->no_wa = '';
    }

    public function render()
    {
        return view('livewire.daftar-umat');
    }

    public function createUmat(){
        $lings = auth()->user()->lingkungan;
        Umat::create([
            'nama_kk'=>$this->nama_kk,
            'alamat'=>$this->alamat,
            'lingkungan'=>$lings,
            'no_wa'=>$this->no_wa
        ]);

        session()->flash('berhasilBuat', 'Data Umat Berhasil Ditambah');
        $this->mount();
        $this->resetInputFields();
        $this->render();
        $this->create();
    }

    public function hapusProses($umatId){
        Umat::where('id', $umatId)->delete();
        session()->flash('berhasilHapus', 'Data Umat Berhasil Dihapus');
        $this->mount();
        $this->resetInputFields();
        $this->render();
    }

    public function mountEdit($umatId)
    {
        $this->editForm = !$this->editForm;
        $this->createForm = false;
        $this->viewForm = false;
        $umat = Umat::find($umatId);
        $this->nama_kk = $umat->nama_kk;
        $this->alamat = $umat->alamat;
        $this->no_wa = $umat->no_wa;
        $this->umatId = $umat->id;
    }

    public function editUmat(){
        Umat::where('id', $this->umatId)
        ->update([
            'nama_kk' => $this->nama_kk,
            'alamat' => $this->alamat,
            'no_wa' => $this->no_wa,
        ]);
        session()->flash('berhasilEdit', 'Data Umat Berhasil Diedit');
        $this->mount();
        $this->resetInputFields();
        $this->viewForm = true;
        $this->createForm = false;
        $this->editForm = false;
        $this->render();
    }
}
