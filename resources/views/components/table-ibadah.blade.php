<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Lingkungan</th>
                <th scope="col">Senin</th>
                <th scope="col">Selasa</th>
                <th scope="col">Rabu</th>
                <th scope="col">Kamis</th>
                <th scope="col">Jumat</th>
                <th scope="col">Sabtu</th>
                <th scope="col">Minggu</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->lingkungan->nama }}</td>
                    <td>{{ date('H:i', strtotime($item->senin)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->selasa)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->rabu)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->kamis)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->jumat)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->sabtu)) }} - Selesai</td>
                    <td>{{ date('H:i', strtotime($item->minggu)) }} - Selesai</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
