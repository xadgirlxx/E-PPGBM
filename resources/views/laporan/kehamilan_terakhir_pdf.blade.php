<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kehamilan Terakhir</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 12px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        h4 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h4>Laporan Kehamilan Terakhir</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Ibu</th>
                <th>Kehamilan Ke</th>
                <th>Hari Pertama Haid</th>
                <th>BB</th>
                <th>TB</th>
                <th>IMT</th>
                <th>Jarak Kehamilan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $row)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $row->nik_bumil }}</td>
                <td>{{ $row->nama_bumil }}</td>
                <td>{{ $row->kehamilan_ke_berapa }}</td>
                <td>{{ $row->hari_pertama_haid_terakhir }}</td>
                <td>{{ $row->bb_sblm_hamil }}</td>
                <td>{{ $row->tb }}</td>
                <td>{{ $row->imt }}</td>
                <td>{{ $row->jarak_kehamilan_sblmnya }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
