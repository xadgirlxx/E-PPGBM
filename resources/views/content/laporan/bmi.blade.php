@extends('index')

@section('maincontent')
@php
    use App\Helpers\GiziHelper;
@endphp
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Laporan BMI Balita</h4>

        <div class="mb-3">
            <a href="{{ route('laporan.bmi.excel') }}" class="btn btn-success">Export Excel</a>
            <a href="{{ route('laporan.bmi.pdf') }}" class="btn btn-danger">Export PDF</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
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
   
                           $bmi = ($bb && $tb) ? \App\Helpers\GiziHelper::hitungBMI($bb, $tb) : '-';
                           $kategoriBmi = is_numeric($bmi)
                               ? \App\Helpers\GiziHelper::klasifikasiBMIAnak($bmi, $umurbulan, $b->jk)
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
        </div>
    </div>
</div>
@endsection
