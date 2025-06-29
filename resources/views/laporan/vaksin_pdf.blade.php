<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Vaksin Polio & Campak</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h4 { text-align: center; margin-bottom: 0; }
    </style>
</head>
<body>
    <h4>LAPORAN VAKSIN POLIO & CAMPAK</h4>
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
</body>
</html>
