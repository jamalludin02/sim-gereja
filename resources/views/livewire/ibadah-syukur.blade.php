<div>
@if($registerForm)
<livewire:jadwal-ibadah/>
<a href="" wire:click.prevent="register" class="text-decoration-underline">Daftar ibadah syukur</a>
@else
<form>
    <h3 class="text-center mb-5">PENDAFTARAN IBADAH SYUKUR</h3>
  <div class="mb-4">
  <label class="form-label" for="form6Example3">Nama Kepala Keluarga</label>
    <input type="text" id="form6Example3" class="form-control" />
  </div>

  <div class="mb-4">
  <label class="form-label" for="form6Example4">Alamat</label>
    <input type="text" class="form-control" />
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Lingkungan</label>
  <select class="form-select" aria-label="Default select example">
  <option >Pilih Lingkungan</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  </select>
  </div>

  <div class="mb-4">
  <label class="form-label" for="form6Example4">No. Whatsapp</label>
    <input type="number" class="form-control" />
  </div>

  <div class="mb-4">
  <label class="form-label" for="form6Example4">Jam</label>
  <select class="form-select" aria-label="Default select example">
  <option >Pilih Jam</option>
  <option value="1">11.00</option>
  <option value="1">16.00</option>
  </select>
  </div>

  <div class="form-outline mb-4">
  <label class="form-label" for="form6Example4">Pendeta</label>
  <select class="form-select" aria-label="Default select example">
  <option >Pilih Pendeta</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  </select>
  </div>

  <div class="mb-4">
  <label class="form-label" for="form6Example4">Hari/Tanggal</label>
    <input type="date" class="form-control" />
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4 rounded-9">Kirim</button>
</form>
<a href="" wire:click.prevent="register" class="text-decoration-underline">Lihat jadwal ibadah syukur</a>
@endif
</div>

