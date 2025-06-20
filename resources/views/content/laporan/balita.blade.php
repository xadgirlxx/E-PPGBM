@extends('index')

@section('maincontent')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Laporan Data Balita</h4>
        <div class="card-header">
            <a href="{{ route('laporan.balita.pdf') }}" class="btn btn-danger btn-sm">
                <i class="fa fa-file-pdf"></i> Export PDF
            </a>

            <a href="{{ route('laporan.balita.excel') }}" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel"></i> Export Excel
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Balita</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ortu</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item->nik_balita }}</td>
                        <td>{{ $item->nama_balita }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $item->nama_ortu }}</td>
                        <td>{{ $item->alamat }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Tidak ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

