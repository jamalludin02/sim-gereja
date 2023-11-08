<div>
<h3 class="text-center mb-5">JADWAL IBADAH SYUKUR</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama_kk</th>
      <th scope="col">Alamat</th>
      <th scope="col">Lingkungan</th>
      <th scope="col">Pendeta</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jam</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
@if(count($jadwal) == null)
    <tr>
      <th colspan="7" class="text-center">Jadwal Kosong</th>
    </tr>
    @else
    @foreach($jadwal as $item)
    <tr>
      <th>{{$item->nama_kk}}</th>
      <th>{{$item->alamat}}</th>
      <th>{{$item->lingkungan}}</th>
      <th>{{$item->pendeta}}</th>
      <th>{{$item->tanggal}}</th>
      <th>{{$item->jam}}</th>
      @if($item->status == true)
      <th><span class="badge rounded-pill badge-danger">Menunggu Surat Ibadah</span></th>
      @endif
</tr>
@endforeach
@endif
  </tbody>
</table>
</div>
