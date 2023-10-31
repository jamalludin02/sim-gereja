<div>
<div class="row">
        <div class="col-md-12">
        @if (session()->has('berhasilUpload'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-success">
        {{ session('berhasilUpload') }}
        </div>
        </div>
        @endif
</div>
</div>
@if($uploadSuratpage)
<h5 class="text-left mb-5">Upload Surat Ibadah</h5>
<div class="mb-5">
<form>
  <div class="mb-4">
  <label class="form-label">Nama Kepala Keluarga</label>
    <input type="text" wire:model="namaKK"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Alamat</label>
    <input type="text" wire:model="alamat"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Lingkungan</label>
    <input type="text" wire:model="lingkungan"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Nomor Whatsapp</label>
    <input type="text" wire:model="no_wa"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Tanggal</label>
    <input type="text" wire:model="tanggal"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Jam</label>
    <input type="text" wire:model="jam"  class="form-control" readonly/>
  </div>

  <div class="mb-4">
  <label class="form-label">Pendeta</label>
    <input type="text" wire:model="pendeta"  class="form-control" readonly/>
  </div>
  <input type="hidden" wire:model="suratId"  class="form-control" readonly/>
  <input type="hidden" wire:model="pendetaId"  class="form-control" readonly/>
  <input type="hidden" wire:model="userId"  class="form-control" readonly/>

  <div class="mb-4">
  <label class="form-label">Upload Surat (PDF)</label>
  <input class="form-control form-control-lg" wire:model="filesurat" id="formFileLg" type="file" accept=".pdf" />
  </div>

  <div class="mb-4">
  <a href="" wire:click.prevent="uploadSuratproses" class="btn btn-primary rounded-9">Submit</a> 
  </div>

  <a href="" wire:click="back" class="mt-5 btn btn-outline-dark rounded-9" data-mdb-ripple-color="dark">< Kembali</a> 
</form>
</div>

@else
<div class="mb-4">
  <label class="form-label">Filter:</label>
    <br>
    <button wire:click="toggleButton('terbaru')" type="button" class="{{ $activeButton === 'terbaru'}} btn btn-outline-dark rounded-9" data-mdb-ripple-color="dark">Pengajuan Terbaru</button> 
    <button wire:click="toggleButton('diterima')" type="button" class="{{ $activeButton === 'diterima' ? 'active' : '' }} btn btn-outline-dark rounded-9" data-mdb-ripple-color="dark">Diterima</button>
    <button wire:click="toggleButton('ditolak')" type="button" class="{{ $activeButton === 'ditolak' ? 'active' : '' }} btn btn-outline-dark rounded-9" data-mdb-ripple-color="dark">Ditolak</button>
    <button wire:click="toggleButton('diupload')" type="button" class="{{ $activeButton === 'diupload' ? 'active' : '' }} btn btn-outline-dark rounded-9" data-mdb-ripple-color="dark">Berhasil Upload Surat</button>
  </div>
  <br>
<table class="table align-middle mb-0 bg-white">
<thead class="bg-light text-center">
  <tr>
    <th>Nama KK</th>
    <th>Alamat</th>
    <th>Lingkungan</th>
    <th>No WA</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Pendeta</th>
    <th>Status</th>
  </tr>
</thead>
<tbody class="shadow-0">
@if(count($surat) == null)
<tr>
    <th colspan="8" class="text-center" style="font-weight:bold;">Tidak ada data</th>
  </tr>
  @else
  @foreach($surat as $item)
<tr>
    <td class="text-capitalize">{{$item->nama_kk}}</td>
     <td class="text-capitalize">{{$item->alamat}}</td>
     <td class="text-capitalize">{{$item->lingkungan}}</td>
     <td class="text-capitalize">{{$item->no_wa}}</td>
     <td class="text-capitalize">{{ date('d/m/Y', strtotime($item->tanggal)) }}</td>
     <td class="text-capitalize">{{$item->jam}}</td>
     <td class="text-capitalize">{{$item->pendeta}}</td>
    <td class="shadow-0">
    <div class="btn-group shadow-0">
    @if($item->status == 0)
  <a href="" class="text-capitalize btn btn-sm btn-success terima" wire:click.prevent="terimaProses({{ $item->id }})"><i class="fa fa-check" aria-hidden="true"></i> Terima</a>
  <a href="" class="text-capitalize btn btn-sm btn-danger tolak" wire:click.prevent="tolakProses({{ $item->id }})"><i class="fa-solid fa-x"></i> Tolak</a>
  @elseif($item->status == 1)
  <a href="" class="text-capitalize btn btn-sm btn-primary"wire:click.prevent="uploadSurat({{$item->id}})"><i class="fa fa-upload" aria-hidden="true"></i> Upload Surat</a>
</div>
@elseif($item->status == 2)
  Ditolak
  @elseif($item->status == 3)
  Surat Berhasil Diupload
  @endif
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
@endif
</div>
