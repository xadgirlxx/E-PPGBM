@extends('index')

@section('maincontent')
<div class="container">
    <h4>Laporan Kesehatan Ibu Hamil</h4>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('laporan.kehamilan.excel') }}" class="btn btn-success me-2">Export Excel</a>
        <a href="{{ route('laporan.kehamilan.pdf') }}" class="btn btn-danger">Export PDF</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Kehamilan Ke</th>
                <th>Hari Pertama Haid</th>
                <th>BB</th>
                <th>TB</th>
                <th>IMT</th>
                <th>Jarak Kehamilan</th>
                <th>Gol. Darah</th>
                <th>Rhesus</th>
                <th>Riwayat Penyakit</th>
                <th>Riwayat Alergi</th>
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
</div>
@endsection
