<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kesehatan Ibu Hamil</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        h4 { text-align: center; }
    </style>
</head>
<body>
    <h4>Laporan Kesehatan Ibu Hamil</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Kehamilan Ke</th>
                <th>Hari Pertama Haid</th>
                <th>BB</th>
                <th>TB</th>
                <th>IMT</th>
                <th>Jarak</th>
                <th>Gol Darah</th>
                <th>Rhesus</th>
                <th>Penyakit</th>
                <th>Alergi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $row)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $row->nik_bumil }}</td>
                <td>{{ $row->nama_bumil }}</td>
                <td>{{ $row->kehamilan_ke_berapa }}</td>
                <td>{{ $row->hari_pertama_haid_terakhir }}</td>
                <td>{{ $row->bb_sblm_hamil }}</td>
                <td>{{ $row->tb }}</td>
                <td>{{ $row->imt }}</td>
                <td>{{ $row->jarak_kehamilan_sblmnya }}</td>
                <td>{{ $row->gol_darah }}</td>
                <td>{{ $row->rhesus }}</td>
                <td>{{ $row->riwayat_penyakit_bumil }}</td>
                <td>{{ $row->riwayat_alergi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
