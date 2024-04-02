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
</div>
</div>
@if($registerForm)
<div>
<livewire:jadwal-ibadah/>
<a href="" wire:click.prevent="back" class="text-decoration-underline">Daftar ibadah syukur</a>
</div>
@else
<div class="mb-5">
<form>
    <h3 class="text-center mb-5">PENDAFTARAN IBADAH SYUKUR</h3>
  <div class="mb-4">
  <label class="form-label" >Nama Kepala Keluarga</label>
    <input type="text" wire:model="name"  class="form-control" />
  </div>

  <div class="mb-4">
  <label class="form-label">Alamat</label>
    <input type="text" wire:model="alamat" class="form-control" />
  </div>

  <div class="mb-4">
  <label class="form-label">Lingkungan</label>
  <select class="form-control" wire:model="lingkungan">
  <option >Pilih Lingkungan</option>
  <option value="Lingkungan_1">Lingkungan_1</option>
                        <option value="Lingkungan_2">Lingkungan_2</option>
                        <option value="Lingkungan_3">Lingkungan_3</option>
                        <option value="Lingkungan_4">Lingkungan_4</option>
                        <option value="Lingkungan_5">Lingkungan_5</option>
                        <option value="Lingkungan_6">Lingkungan_6</option>
                        <option value="Lingkungan_7">Lingkungan_7</option>
                        <option value="Lingkungan_8">Lingkungan_8</option>
                        <option value="Lingkungan_9">Lingkungan_9</option>
                        <option value="Lingkungan_10">Lingkungan_10</option>
  </select>
  </div>

  <div class="mb-4">
  <label class="form-label">Hari/Tanggal</label>
    <input type="date" id="tanggal" wire:model="tanggal" class="form-control" />
  </div>

  
  <div class="mb-4" id="pilihPendeta">
  <label class="form-label">Pilih Pendeta</label>
  <select class="form-control" wire:model="pendetaList" id="pilihJadwal">
  <option value="">Pilih Pendeta</option>
    @foreach($pendeta as $item)
  <option value="{{$item->id}}">{{$item->name}}</option>
  @endforeach
  </select>
</div>

<div id="Jumlahindex">
</div>
<div class="mb-4" id="pilihJam">
  <label class="form-label">Pilih Jam</label>
  <select class="form-control" wire:model="jam" id="pilihJadwaljam">
  </select>
</div>




  <button type="submit" wire:click.prevent="kirim"  class="btn btn-primary btn-block mb-4 rounded-9">Kirim</button>
</form>
<a href="" wire:click.prevent="register" class="text-decoration-underline">Lihat jadwal ibadah syukur</a>
</div>
@endif
</div>
