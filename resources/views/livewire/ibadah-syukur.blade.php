<div>
@if($registerForm)
<div>
<livewire:jadwal-ibadah/>
<a href="" wire:click.prevent="register" class="text-decoration-underline">Daftar ibadah syukur</a>
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
    <input type="text" wire:model="name" class="form-control" />
  </div>

  <div class="mb-4">
  <label class="form-label">Lingkungan</label>
  <select class="form-control" wire:model="name">
  <option >Pilih Lingkungan</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  </select>
  </div>

  <div class="mb-4">
  <label class="form-label">No. Whatsapp</label>
    <input type="number" wire:model="name"  class="form-control" />
  </div>



  <div class="mb-4">
  <label class="form-label">Hari/Tanggal</label>
    <input type="date" wire:model="name"  class="form-control" />
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4 rounded-9">Kirim</button>
</form>
<a href="" wire:click.prevent="register" class="text-decoration-underline">Lihat jadwal ibadah syukur</a>
</div>
@endif
</div>
