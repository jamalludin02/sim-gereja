<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Jampendeta;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;

class Pendeta extends Component
{
    use WithFileUploads;
    public $pendeta;
    public $createForm = false;
    public $editForm = false;
    public $viewForm=true;
    public $email;
    public $name;
    public $nik;
    public $pendetaId;
    public $password;
    public $foto;
    public $gambar;

    private function resetInputFields(){
        $this->name = '';
        $this->nik = '';
        $this->email = '';
        $this->password = '';
        $this->foto = '';
    }

    public function mount(){
        $this->pendeta = User::where('isPendeta', true)->get();
    }

    public function create(){
        $this->createForm = !$this->createForm;
        $this->resetInputFields();
    }

    public function registerStore()
    {
        if($this->foto == null){
            $nama_gambars = null;
        } else{
        $img=$this->foto;
        $image = Image::make($img->getRealPath());
        $image->resize(150, null, function ($constraint) {
        $constraint->aspectRatio();
        });
        $nama_gambar = time() . "_" . $img->getClientOriginalName();
        $tujuan_upload = 'assets/profil/';
        $image->encode('webp', 10)->save(public_path($tujuan_upload . '/' . pathinfo($nama_gambar, PATHINFO_FILENAME) . '.webp'));
        $nama_gambars = pathinfo($nama_gambar, PATHINFO_FILENAME) . '.webp';
        }

        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nik' => 'required|numeric'
        ]);

       $this->password = Hash::make($this->password); 

       $data= User::create(['name' => $this->name, 
        'email' => $this->email,
        'nik' => $this->nik,
        'password' => $this->password,
        'isAdmin'=>false,
        'foto'=>$nama_gambars,
        'isPendeta'=>true,
        'isKetling'=>false,
        'isUmat'=>false]);

        // dd($data);
        session()->flash('berhasilBuat', 'Registrasi berhasil');
        $this->pendeta = User::where('isPendeta', true)->get();
        $this->resetInputFields();
        $this->render();
        $this->create();
    }

    public function render()
    {
        return view('livewire.pendeta');
    }

    public function hapusProses($pendetaId){
        $fotos = User::where('id', $pendetaId)->first();
        if($fotos->foto !== null){
            File::delete('assets/profil/'.$fotos->foto);
        } 
        User::where('id', $pendetaId)->delete();
        session()->flash('berhasilHapus', 'Akun Pendeta Berhasil Dihapus');
        $this->pendeta = User::where('isPendeta', true)->get();
        $this->resetInputFields();
        $this->render();
    }

    public function mountEdit($pendetaId)
    {
        $this->editForm = !$this->editForm;
        $this->createForm = false;
        $this->viewForm = false;
        $this->pendetaId = $pendetaId;
        $pendeta = User::find($pendetaId);
        $foto=$pendeta->foto;
        $this->name = $pendeta->name;
        $this->nik = $pendeta->nik;
        $this->email = $pendeta->email;
        $this->password = $pendeta->password;
        $this->foto = $pendeta->foto;
        $this->pendetaId = $pendeta->id;
    }

    public function editProses(){
        $pendeta = User::find($this->pendetaId);
        $passwords=$pendeta->password;
        if($this->password == $passwords){
            $password = $this->password;
        } else{
            $password = Hash::make($this->password); 
        }
        if($this->gambar == null){
            $nama_gambars = $this->foto;
        } else{
        $images = User::where('id', $pendeta->id)->first();
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

        User::where('id', $this->pendetaId)
        ->update([
            'name' => $this->name,
            'email' => $this->email,
            'nik' => $this->nik,
            'password' => $password,
            'foto'=> $nama_gambars
        ]);
        session()->flash('berhasilEdit', 'Akun Pendeta Berhasil Diedit');
        $this->pendeta = User::where('isPendeta', true)->get();
        $this->resetInputFields();
        $this->viewForm = true;
        $this->createForm = false;
        $this->editForm = false;
        $this->render();
    }

    public function view()
    {
        $this->viewForm = true;
        $this->createForm = false;
        $this->editForm = false;
    }
}
