@extends('index')

@section('maincontent')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table Balita</h4>

        <!-- Form Search -->
        <form method="GET" action="{{ route('balita.index') }}" class="mb-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIK, Nama, atau Nama Orang Tua" class="form-control" style="max-width: 300px; display:inline-block;">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
            <a href="{{ route('balita.index') }}" class="btn btn-secondary btn-sm">Reset</a>
        </form>

        <div class="table-responsive">
          <table class="table table-hover" id="tabel-Balita">
            <thead>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Nomor Telepon</th>
              <th>Nama Orang Tua</th>
              <th>Alamat</th>
              <th>Provinsi</th>
              <th>Kab / Kota</th>
              <th>Kecamatan</th>
              <th>Desa</th>
              <th>Puskesmas</th>
              <th>Posyandu</th>
              <th>Action</th>
            </thead>
            <tbody>
              @php $no = $balitas->firstItem(); @endphp
              @foreach($balitas as $balita)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $balita->nik_balita }}</td>
                  <td>{{ $balita->nama_balita }}</td>
                  <td>@if ( $balita->jk  == 'L')
                      <span>Laki - Laki</span>
                  @else
                      <span>Perempuan</span>
                  @endif</td>
                  <td>{{ $balita->no_telp }}</td>
                  <td>{{ $balita->nama_ortu }}</td>
                  <td>{{ $balita->alamat }}</td>
                  <td>{{ $balita->prov }}</td>
                  <td>{{ $balita->kab_kota }}</td>
                  <td>{{ $balita->kec }}</td>
                  <td>{{ $balita->desa_kel }}</td>
                  <td>{{ $balita->puskesmas }}</td>
                  <td>{{ $balita->posyandu }}</td>
                  <td>
                    <a href="{{ route('balita.edit', $balita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('balita.destroy', $balita->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data?')">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination Links -->
        {{ $balitas->links() }}
      </div>
    </div>
</div>
@endsection
