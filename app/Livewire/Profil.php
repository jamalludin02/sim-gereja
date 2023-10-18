<?php

namespace App\Livewire;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\File; 

class Profil extends Component
{
    use WithFileUploads;

    public $user;
    public $editForm = false;
    public $name;
    public $email;
    public $alamat;
    public $noWa;
    public $foto;
    public $gambar;
    

    public function mount()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.profil');
    }

    public function edit()
    {
        $userId =  auth()->user()->id;   
        $this->user = User::find($userId);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->alamat = $this->user->alamat;
        $this->noWa = $this->user->noWa;
        $this->foto = $this->user->foto;
        $this->editForm = !$this->editForm;
    }

    public function updateProfile(){
        $users=auth()->user();
        if($this->gambar == null){
            $nama_gambars = $this->foto;
        } else{
        $images = User::where('id', $users->id)->first();
        File::delete('assets/profil/'.$images->foto);
        $img=$this->gambar;
        $image = Image::make($img->getRealPath());
        $image->resize(150, null, function ($constraint) {
        $constraint->aspectRatio();
        });
        $nama_gambar = time() . "_" . $img->getClientOriginalName();
        $tujuan_upload = 'assets/profil/';
        $image->encode('webp', 10)->save(public_path($tujuan_upload . '/' . pathinfo($nama_gambar, PATHINFO_FILENAME) . '.webp'));
        $nama_gambars = pathinfo($nama_gambar, PATHINFO_FILENAME) . '.webp';
        }

        $data = User::where('id', $users->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'noWa' => $this->noWa,
            'foto' => $nama_gambars
        ]);
        session()->flash('message', 'Update Profil Berhasil');
        $this->edit();
    }
    
}
