@extends('index')

@section('maincontent')
<div class="container">
    <h4>Laporan Vaksin Polio & Campak</h4>
    <a href="{{ route('laporan.vaksin.excel') }}" class="btn btn-success btn-sm">Export Excel</a>
    <a href="{{ route('laporan.vaksin.pdf') }}" class="btn btn-danger btn-sm">Export PDF</a>
    <table class="table table-bordered mt-3">
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
</div>
@endsection
