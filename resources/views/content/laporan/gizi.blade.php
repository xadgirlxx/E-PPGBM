@extends('index')

@section('maincontent')
@php
    use App\Helpers\GiziHelper;
@endphp
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Laporan Gizi Balita</h4>

        <div class="mb-3">
            <a href="{{ route('laporan.gizi.excel') }}" class="btn btn-success">Export Excel</a>
            <a href="{{ route('laporan.gizi.pdf') }}" class="btn btn-danger">Export PDF</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                        <th>Tgl Pengukuran</th>
                        <th>Berat Badan (kg)</th>
                        <th>Tinggi Badan (cm)</th>
                        <th>Status Gizi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $i => $balita)
                        @php
                            $umurbulan = \Carbon\Carbon::parse($balita->tgl_lahir)->diffInMonths(now());
                            $bb = $balita->pengukuranTerakhir->bb ?? null;
                            $jk = $balita->jk;

                            $statusGizi = $bb ? \app\Helpers\GiziHelper::hitungStatusGizi($bb, $umurbulan, $jk) : 'Belum Diukur';
                    
                            $umur = \Carbon\Carbon::parse($balita->tgl_lahir)->diff(\Carbon\Carbon::now());
                        @endphp
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $balita->nik_balita }}</td>
                            <td>{{ $balita->nama_balita }}</td>
                            <td>{{ $balita->tgl_lahir }}</td>
                            <td>{{ $umur->y }} th {{ $umur->m }} bln</td>
                            <td>{{ optional($balita->pengukuranTerakhir)->tgl_pengukuran ?? '-' }}</td>
                            <td>{{ optional($balita->pengukuranTerakhir)->bb ?? '-' }}</td>
                            <td>{{ optional($balita->pengukuranTerakhir)->tb ?? '-' }}</td>
                            <td>{{ $statusGizi}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
