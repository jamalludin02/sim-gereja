<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pengumumans;
use Illuminate\Http\Request;

class Pengumuman extends Component
{   public $pengumuman;
    public $judul;
    public $isi;
    public $pengumumanId;
    public $createForm = false;

    public function mount()
    {
        $this->pengumuman = Pengumumans::get();
    }

    public function mountEdit($pengumumanId)
    {
        $this->pengumumanId = $pengumumanId;
        $pengumuman = Pengumumans::find($pengumumanId);
        $this->judul = $pengumuman->judul;
        $this->isi = $pengumuman->isi;
        $this->pengumumanId = $pengumuman->id;
    }

    public function mountHapus($pengumumanId)
    {
        $this->pengumumanId = $pengumumanId;
        $pengumuman = Pengumumans::find($pengumumanId);
        $this->pengumumanId = $pengumuman->id;
    }

    public function editProses(){
        Pengumumans::where('id', $this->pengumumanId)
        ->update([
            'judul' => $this->judul,
            'isi' => $this->isi
        ]);
        session()->flash('berhasilEdit', 'Pengumuman Berhasil Diedit');
        $this->pengumuman = Pengumumans::get();
        $this->render();
    }

    public function hapusProses(){
        Pengumumans::where('id', $this->pengumumanId)->delete();
        session()->flash('berhasilHapus', 'Pengumuman Berhasil Dihapus');
        $this->pengumuman = Pengumumans::get();
        $this->render();
    }

    public function create()
    {
        $this->createForm = !$this->createForm;
    }

    public function createPengumuman(){
        Pengumumans::create([
            'isi' => $this->isi,
            'judul' => $this->judul
        ]);
        session()->flash('berhasilBuat', 'Pengumuman Berhasil Dibuat');
        $this->pengumuman = Pengumumans::get();
        $this->judul = '';
        $this->isi = '';
        $this->render();
        $this->create();
    }

    public function render()
    {
        return view('livewire.pengumuman');
    }
}
