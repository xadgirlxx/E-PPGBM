@extends('index')

@section('maincontent')
@php
    use Illuminate\Support\Facades\Crypt;
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table Ibu Hamil</h4>

        <div class="table-responsive">
          <table class="table table-hover" id="tabel-Balita">
            <thead>
                <th>No</th>
                <th>NIK Ibu</th>
                <th>Nama Ibu</th>
                <th>Tgl Lahir</th>
                <th>No KK</th>
                <th>Nama Suami</th>
                <th>Telepon Suami</th>
                <th>Alamat</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Faskes 1</th>
                <th>Faskes Rujukan</th>
                <th>Provinsi</th>
                <th>Kab/Kota</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($data as $index => $item)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nik_bumil }}</td>
                    <td>{{ $item->nama_bumil }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $item->no_kk }}</td>
                    <td>{{ $item->nama_suami }}</td>
                    <td>{{ $item->telp_suami }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>{{ $item->faskes1 }}</td>
                    <td>{{ $item->faskes_rujukan }}</td>
                    <td>{{ $item->prov ?? '-' }}</td>
                    <td>{{ $item->kab_kota ?? '-' }}</td>
                    <td>{{ $item->kec ?? '-' }}</td>
                    <td>{{ $item->desa_kel ?? '-' }}</td>
                    <td>
                        <a href="{{ route('bumil.edit', $item->id_bumil) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                        <a href="{{ route('bumil.kesbumil.index', Crypt::encryptString($item->nik_bumil)) }}" class="btn btn-primary btn-sm">
                          <i class="fa-solid fa-plus" title="Tambah Kehamilan"></i>
                      </a>
                      <form action="{{ route('bumil.destroy', $item->id_bumil) }}" method="POST" class="form-delete" data-nama="{{ $item->nama_bumil }}" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fa-solid fa-trash" title="Hapus"></i>
                          </button>
                      </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
</div>
@endsection
