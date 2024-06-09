<div class="tw-flex tw-justify-center">
    @if ($status == 'PROSES')
        <span class="badge bg-warning">Proses</span>
    @elseif ($status == 'DITERIMA')
        <span class="badge bg-success">Diterima</span>
    @elseif ($status == 'DITOLAK')
        <span class="badge bg-danger">Ditolak</span>
    @endif
</div>
