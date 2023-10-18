<div>
<div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="mt-5">
        <div class="alert alert-success">
        {{ session('message') }}
        </div>
        </div>
        @endif
        </div>
    </div>
@if($editForm)
<div>
<section class="mb-5">
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-xl-9">

        <h3 class="mb-4 mt-5 text-center">EDIT PROFIL</h3>

        <div class="card shadow-md" style="border-radius: 15px;">
        <form>
          <div class="card-body">
          @if($user)
            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Nama</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="text" wire:model="name" class="form-control form-control-lg" value="{{$user->name}}"/>
              </div>
            </div>

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="email" wire:model="email" class="form-control form-control-lg" placeholder="example@example.com" value="{{$user->email}}" />
              </div>
            </div>

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">No Whatsapp</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="text" wire:model="noWa" class="form-control form-control-lg" value="{{$user->noWa}}"/>
              </div>
            </div>

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Lingkungan</h6>
              </div>
              <div class="col-md-9 pe-5">
              <select class="form-control" wire:model="name">
                <option >Pilih Lingkungan</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
              </div>
            </div>

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Alamat</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input type="text" wire:model="alamat" class="form-control form-control-lg" value="{{$user->alamat}}"/>
              </div>
            </div>

            <input type="hidden" wire:model="foto" class="form-control form-control-lg" value="{{$user->foto}}"/>
            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">
                <h6 class="mb-0">Upload Foto</h6>
              </div>
              <div class="col-md-9 pe-5">
                <input class="form-control form-control-lg" wire:model="gambar" id="formFileLg" type="file" />
              </div>
            </div>

            <div class="px-5 py-4">
              <button wire:click.prevent="updateProfile" class="btn btn-primary btn-md rounded-9">Submit</button>
            </div>
            @endif
          </div>
</form>
        </div>
      </div>
    </div>
  </div>
  <a href="" wire:click.prevent="edit" class="text-decoration-underline mb-5 mt-5" style="width:150px;">Kembali</a>
</section>

</div>
@else
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col ">
      @if($user)
        <div class="card mb-3 shadow-md" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white"
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              @if($user->foto == null)
              <img src="https://assets.practice365.co.uk/wp-content/uploads/sites/1005/2023/03/Default-Profile-Picture-Transparent.png"
                alt="Avatar" class="img-fluid my-5" style="max-width: 150px;" />
                @else
                <img src="{{ asset('assets/profil/'.$user->foto) }}"
                alt="Avatar" class="img-fluid my-5" style="max-width: 150px;" />
                @endif
              <h5></h5>
              <p></p>
              <button  wire:click.prevent="edit" class="btn btn-md btn-secondary rounded-9">Edit Profil</button>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h3>Profil Umat</h3>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                <div class="col-6 mb-3">
                    <h6>Nama</h6>
                    <p class="text-muted">{{$user->name}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted">{{$user->email}}</p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>No. Whatsapp</h6>
                    @if($user->noWa == null)
                    <p class="text-muted">Nomor anda masih kosong</p>
                    @else
                    <p class="text-muted">{{$user->noWa}}</p>
                    @endif
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Alamat</h6>
                    @if($user->alamat == null)
                    <p class="text-muted">Alamat anda masih kosong
                    @else
                    <p class="text-muted">{{$user->alamat}}</p>
                    @endif
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Lingkungan</h6>
                    @if($user->lingkungan == null)
                    <p class="text-muted">Lingkungan anda masih kosong</p>
                    @else
                    <p class="text-muted">{{$user->lingukungan}}</p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

@endif
</div>
