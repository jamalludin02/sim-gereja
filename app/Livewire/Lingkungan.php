<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File; 
use App\Models\User;

class Lingkungan extends Component
{
    public $ketling;
    public $createForm = false;
    public $editForm = false;
    public $viewForm=true;
    public $email;
    public $nik;
    public $name;
    public $ketlingId;
    public $password;
    public $lingkungan;

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->nik = '';
        $this->password = '';
        $this->lingkungan = '';
    }

    public function mount(){
        $this->ketling = User::where('isKetling', true)->get();
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

    public function render()
    {
        return view('livewire.lingkungan');
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $this->password = Hash::make($this->password); 

       $data= User::create(['name' => $this->name, 
        'email' => $this->email,
        'nik' => $this->nik,
        'password' => $this->password,
        'lingkungan' =>$this->lingkungan,
        'isAdmin'=>false,
        'isPendeta'=>false,
        'isKetling'=>true,
        'isUmat'=>false]);

        session()->flash('berhasilBuat', 'Registrasi berhasil');
        $this->mount();
        $this->resetInputFields();
        $this->render();
        $this->create();
    }

    public function mountEdit($ketlingId)
    {
        $this->editForm = !$this->editForm;
        $this->createForm = false;
        $this->viewForm = false;
        $this->ketlingId = $ketlingId;
        $ketling = User::find($ketlingId);
        $this->name = $ketling->name;
        $this->nik = $ketling->nik;
        $this->email = $ketling->email;
        $this->password = $ketling->password;
        $this->lingkungan = $ketling->lingkungan;
        $this->ketlingId = $ketling->id;
    }

    public function editProses(){
        $ketling = User::find($this->ketlingId);
        $passwords=$ketling->password;
        if($this->password == $passwords){
            $password = $this->password;
        } else{
            $password = Hash::make($this->password); 
        }

        User::where('id', $this->ketlingId)
        ->update([
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'password' => $password,
            'lingkungan'=> $this->lingkungan
        ]);
        session()->flash('berhasilEdit', 'Akun Ketua Lingkungan Berhasil Diedit');
        $this->ketling = User::where('isKetling', true)->get();
        $this->resetInputFields();
        $this->viewForm = true;
        $this->createForm = false;
        $this->editForm = false;
        $this->render();
    }

    public function hapusProses($ketlingId){
        User::where('id', $ketlingId)->delete();
        session()->flash('berhasilHapus', 'Akun Ketua Lingkungan Berhasil Dihapus');
        $this->ketling = User::where('isKetling', true)->get();
        $this->resetInputFields();
        $this->render();
    }
}
