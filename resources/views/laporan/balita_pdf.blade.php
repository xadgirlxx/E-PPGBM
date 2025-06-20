<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Balita</title>
    <style>
        body { font-family: sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Balita</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Balita</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Nama Orang Tua</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $balita)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $balita->nik_balita }}</td>
                <td>{{ $balita->nama_balita }}</td>
                <td>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->format('d-m-Y') }}</td>
                <td>{{ $balita->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $balita->nama_ortu }}</td>
                <td>{{ $balita->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
