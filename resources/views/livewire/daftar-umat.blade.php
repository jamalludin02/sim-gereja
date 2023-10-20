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
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Buat Data Umat</h2>
  <div class="mb-4">
  <label class="form-label" for="form6Example4">Nama KK</label>
    <input type="text" id="form6Example4" wire:model="nama_kk" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">Alamat</label>
  <input type="text" id="form6Example4" wire:model="alamat" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">No Whatsapp</label>
  <input type="text" id="form6Example4" wire:model="no_wa" class="form-control" />
  </div>
  <button wire:click.prevent="createUmat" class="btn btn-primary rounded-9 mb-4 text-capitalize">Submit</button>
</form>

<a href="" wire:click.prevent="create" class="text-decoration-underline">Kembali</a>
</div>
@elseif($viewForm)
<header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo">
    <span class="w3-hide-small">Daftar Umat @if($ketling == 'Lingkungan_2') Lingkungan 2 @endif
    @if($ketling == 'Lingkungan_1') Lingkungan 1 @endif
    @if($ketling == 'Lingkungan_3') Lingkungan 3 @endif
    @if($ketling == 'Lingkungan_4') Lingkungan 4 @endif
    @if($ketling == 'Lingkungan_5') Lingkungan 5 @endif
    @if($ketling == 'Lingkungan_6') Lingkungan 6 @endif
    @if($ketling == 'Lingkungan_7') Lingkungan 7 @endif
    @if($ketling == 'Lingkungan_8') Lingkungan 8 @endif
    @if($ketling == 'Lingkungan_9') Lingkungan 9 @endif
    @if($ketling == 'Lingkungan_10') Lingkungan 10 @endif
    </span>
    </h1>
    <marquee direction=”left” scrollamount=”2″ align=”center”><b>-- Selamat Datang Ketua Lingkungan! --</b></marquee>
  </header>
  <div class="w3-container w3-content w3-justify w3-text-grey">
  <a href="/" class="btn btn-lg rounded-9 btn-secondary text-dark text-capitalize" wire:click.prevent="create">Tambah Umat</a>
  </div>
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
  <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light text-center">
  <tr>
    <th>Nama KK</th>
    <th>Alamat</th>
    <th>Lingkungan</th>
    <th>No WA</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
@if(count($dataumat) == null)
<tr>
    <th colspan="6" class="text-center" style="font-weight:bold;">Tidak ada data</th>
  </tr>
  @else
  @foreach($dataumat as $item)
  <tr>
 <td class="text-capitalize">{{$item->nama_kk}}</td>
 <td class="text-capitalize">{{$item->alamat}}</td>
 <td class="text-capitalize">{{$item->lingkungan}}</td>
 <td class="text-capitalize">{{$item->no_wa}}</td>
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
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Buat Data Umat</h2>
  <div class="mb-4">
  <label class="form-label" for="form6Example4">Nama KK</label>
    <input type="text" id="form6Example4" wire:model="nama_kk" class="form-control" />
    <input type="hidden" id="form6Example4" wire:model="umatId" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">Alamat</label>
  <input type="text" id="form6Example4" wire:model="alamat" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">No Whatsapp</label>
  <input type="text" id="form6Example4" wire:model="no_wa" class="form-control" />
  </div>
  <button wire:click.prevent="editUmat" class="btn btn-primary rounded-9 mb-4 text-capitalize">Submit</button>
</form>

<a href="" wire:click.prevent="view" class="text-decoration-underline">Kembali</a>
</div>
@endif
</div>
