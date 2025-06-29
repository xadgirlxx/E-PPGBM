<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIK Balita</th>
            <th>Tanggal Imunisasi</th>
            <th>Polio</th>
            <th>Campak</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataVaksin as $i => $v)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $v->nik_balita }}</td>
            <td>{{ \Carbon\Carbon::parse($v->tgl_imun)->format('d-m-Y') }}</td>
            <td>{{ $v->polio }}</td>
            <td>{{ $v->campak }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
