<div>
<div class="row">
        <div class="col-md-12">
        @if (session()->has('berhasilBuat'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-success">
        {{ session('berhasilBuat') }}
        </div>
        </div>
        @endif

        @if (session()->has('berhasilEdit'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-success">
        {{ session('berhasilEdit') }}
        </div>
        </div>
        @endif

        @if (session()->has('berhasilHapus'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-danger">
        {{ session('berhasilHapus') }}
        </div>
        </div>
        @endif
        </div>
    </div>
@if($createForm)
<div class="py-5 px-5 mt-5">
<form>
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Buat Akun Pendeta</h2>
<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>NIK :</label>
                        <input type="text" wire:model="nik" class="form-control">
                        @error('nik') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="text" id="password" wire:model="password" name="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Foto Pendeta:</label>
                        <input class="form-control form-control-lg" wire:model="foto" id="formFileLg" type="file" />
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button class="btn text-white btn-success rounded-9 text-capitalize" wire:click.prevent="registerStore">Buat Akun</button>
                </div>
            </div>
</form>
<a href="" wire:click.prevent="create" class="text-decoration-underline">Kembali</a>
</div>
@elseif($viewForm)
  <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Daftar Pendeta GKE Sinta</h1>
    <marquee direction=”left” scrollamount=”2″ align=”center”><b>-- Selamat Datang Admin! --</b></marquee>
  </header>
  <div class="w3-container w3-content w3-justify w3-text-grey">
  <a href="/" class="btn btn-lg rounded-9 btn-secondary text-dark text-capitalize" wire:click.prevent="create">Tambah Pendeta</a>
  </div>
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
  <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light text-center">
  <tr>
    <th>Nama Pendeta</th>
    <th>Foto</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
@if(count($pendeta) == null)
<tr>
    <th colspan="4" class="text-center" style="font-weight:bold;">Tidak ada data</th>
  </tr>
  @else
  @foreach($pendeta as $item)
  <tr>
 <td class="text-capitalize">{{$item->name}}</td>
 @if($item->foto == null)
 <td class="text-capitalize">Foto kosong</td>
 @else
 <td><img src="{{ asset('assets/profil/'.$item->foto) }}" alt="Avatar" class="img-fluid my-5" style="max-width: 80px;" ></td>
 @endif
 <td><button class="btn btn-md btn-outline-info rounded-9" wire:click="mountEdit({{ $item->id }})" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fa fa-edit"></i> Edit</button></td>
    <td><button class="btn btn-md btn-outline-danger rounded-9" wire:click.prevent="hapusProses({{ $item->id }})"><i class="fa fa-trash-o"></i> Hapus</button></td>
</tr>
@endforeach
  @endif
</tbody>
</table>
</div>
@endif

@if($editForm)
<div class="py-5 px-5 mt-5">
<form>
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Edit Akun Pendeta</h2>
<div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>NIK :</label>
                        <input type="text" wire:model="nik" class="form-control">
                        @error('nik') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model="email" class="form-control">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="text" id="password" wire:model="password" name="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    @if($foto !== null)
                    <img src="{{ asset('assets/profil/'.$foto) }}" alt="Avatar" class="img-fluid my-5" style="max-width: 150px;" >
                    @endif
                    <br>
                    <input class="form-control form-control-lg" wire:model="pendetaId" id="formFileLg" type="hidden" />
                        <label>Foto Pendeta:</label>
                        <input class="form-control form-control-lg" wire:model="foto" id="formFileLg" type="hidden" />
                        <input class="form-control form-control-lg" wire:model="gambar" id="formFileLg" type="file" />
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <button class="btn text-white btn-success rounded-9 text-capitalize" wire:click.prevent="editProses">Edit Akun</button>
                </div>
            </div>
</form>
<a href="" wire:click.prevent="view" class="text-decoration-underline">Kembali</a>
</div>
@endif
</div>
