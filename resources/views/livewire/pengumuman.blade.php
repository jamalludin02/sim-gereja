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
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Buat Pengumuman</h2>
  <div class="mb-4">
  <label class="form-label" for="form6Example4">Judul Pengumuman</label>
    <input type="text" id="form6Example4" wire:model="judul" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">Isi Pengumuman</label>
    <textarea class="form-control" wire:model="isi" id="form6Example7" rows="8"></textarea>
  </div>
  <button wire:click.prevent="createPengumuman" class="btn btn-primary rounded-9 mb-4 text-capitalize">Buat Pengumuman</button>
</form>

<a href="" wire:click.prevent="create" class="text-decoration-underline">Kembali</a>
</div>
@elseif($viewForm)
<header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Data Pengumuman</h1>
    <marquee direction=”left” scrollamount=”2″ align=”center”><b>-- Selamat Datang Admin! --</b></marquee>
  </header>
  <div class="w3-container w3-content w3-justify w3-text-grey">
  <a href="/" class="btn btn-lg rounded-9 btn-secondary text-dark text-capitalize" wire:click.prevent="create">Tambah Pengumuman</a>
  </div>
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light text-center">
  <tr>
    <th>Judul Pengumuman</th>
    <th>Waktu Upload</th>
    <th>Edit Pengumuman</th>
    <th>Hapus Pengumuman</th>
  </tr>
</thead>
<tbody>
@if(count($pengumuman) == null)
<tr>
    <th colspan="4" class="text-center" style="font-weight:bold;">Tidak ada data</th>
  </tr>
  @else
  @foreach($pengumuman as $item)
  <tr>
    <td class="text-capitalize">{{$item->judul}}</td>
    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
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
<h2 class="mb-4 mt-4 text-center" style="font-weight:bold;">Edit Pengumuman</h2>
  <div class="mb-4">
  <input type="hidden" id="form6Example4" wire:model="pengumumanId" class="form-control" />
  <label class="form-label" for="form6Example4">Judul Pengumuman</label>
    <input type="text" id="form6Example4" wire:model="judul" class="form-control" />
  </div>
  <div class="mb-4">
  <label class="form-label" for="form6Example7">Isi Pengumuman</label>
    <textarea class="form-control" wire:model="isi" id="form6Example7" rows="8"></textarea>
  </div>
  <button wire:click.prevent="editProses" class="btn btn-primary rounded-9 mb-4 text-capitalize">Edit</button>
</form>

<a href="" wire:click.prevent="view" class="text-decoration-underline">Kembali</a>
</div>

@endif
</div>
