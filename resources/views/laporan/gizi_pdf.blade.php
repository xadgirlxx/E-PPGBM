<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Gizi Balita</title>
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
    <h2>Laporan Status Gizi Balita</h2>
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
                <th>Status Gizi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($balitas as $i => $b)
                <tr>
                      @php

                            $umurbulan = \Carbon\Carbon::parse($b->tgl_lahir)->diffInMonths(now());
                            $bb = $b->pengukuranTerakhir->bb ?? null;
                            $jk = $b->jk;

                            $statusGizi = $bb ? \App\Helpers\GiziHelper::hitungStatusGizi($bb, $umurbulan, $jk) : 'Belum Diukur';
                    
                        @endphp
                    <td>{{ $i+1 }}</td>
                    <td>{{ $b->nik_balita }}</td>
                    <td>{{ $b->nama_balita }}</td>
                    <td>{{ \Carbon\Carbon::parse($b->tgl_lahir)->format('d-m-Y') }}</td>
                    <td>
                        @php
                            $umur = \Carbon\Carbon::parse($b->tgl_lahir)->diff(\Carbon\Carbon::now());
                        @endphp
                        {{ $umur->y }} th {{ $umur->m }} bln
                    </td>
                    <td>{{ optional($b->pengukuranTerakhir)->tgl_pengukuran ? \Carbon\Carbon::parse($b->pengukuranTerakhir->tgl_pengukuran)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $b->pengukuranTerakhir->bb ?? '-' }}</td>
                    <td>{{ $b->pengukuranTerakhir->tb ?? '-' }}</td>
                    <td>{{ $statusGizi}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
