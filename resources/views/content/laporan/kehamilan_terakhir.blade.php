@extends('index')

@section('maincontent')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('laporan.kehamilan.excel') }}" class="btn btn-success me-2">
                Export Excel
            </a>
            <a href="{{ route('laporan.kehamilan.pdf') }}" class="btn btn-danger">
                Export PDF
            </a>
        </div>
        <div class="container">
            <h4>Laporan Kehamilan Terakhir</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Ibu</th>
                        <th>Kehamilan Ke</th>
                        <th>Hari Pertama Haid</th>
                        <th>BB Sebelum Hamil (kg)</th>
                        <th>TB (cm)</th>
                        <th>IMT</th>
                        <th>Jarak Kehamilan Sebelumnya</th>
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
        </div>
    </div>
</div>
@endsection
