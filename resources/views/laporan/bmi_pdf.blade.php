<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan BMI Balita</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
        }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Laporan Body Mass Index (BMI) Balita</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Balita</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Tgl Pengukuran</th>
                <th>BB (kg)</th>
                <th>TB (cm)</th>
                <th>BMI</th>
                <th>Kategori BMI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($balitas as $i => $b)
                @php
                   

                    $umurbulan = \Carbon\Carbon::parse($b->tgl_lahir)->diffInMonths(now());
                    $umur = \Carbon\Carbon::parse($b->tgl_lahir)->diff(now());
                    $bb = $b->pengukuranTerakhir->bb ?? null;
                    $tb = $b->pengukuranTerakhir->tb ?? null;

                    $bmi = ($bb && $tb) ? \app\Helpers\GiziHelper::hitungBMI($bb, $tb) : '-';
                    $kategoriBmi = is_numeric($bmi)
                        ? \app\Helpers\GiziHelper::klasifikasiBMIAnak($bmi, $umurbulan, $b->jk)
                        : 'Belum Diukur';
                @endphp
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $b->nik_balita }}</td>
                    <td>{{ $b->nama_balita }}</td>
                    <td>{{ \Carbon\Carbon::parse($b->tgl_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $umur->y }} th {{ $umur->m }} bln</td>
                    <td>{{ optional($b->pengukuranTerakhir)->tgl_pengukuran ? \Carbon\Carbon::parse($b->pengukuranTerakhir->tgl_pengukuran)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $bb ?? '-' }}</td>
                    <td>{{ $tb ?? '-' }}</td>
                    <td>{{ $bmi }}</td>
                    <td>{{ $kategoriBmi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
