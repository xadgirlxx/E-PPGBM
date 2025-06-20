@extends('index')

@section('maincontent')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Edit Data Balita</h4>
        <form class="forms-sample" method="POST" action="{{ route('balita.update', $balita->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK Balita</label>
                        <input type="text" class="form-control" id="nik" name="nik_balita" value="{{ old('nik_balita', $balita->nik_balita) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $balita->tgl_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_ortu">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu', $balita->nama_ortu) }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp', $balita->no_telp) }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $balita->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="puskesmas">Puskesmas</label>
                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" value="{{ old('puskesmas', $balita->puskesmas) }}">
                    </div>
                    <div class="form-group">
                        <label for="posyandu">Posyandu</label>
                        <input type="text" class="form-control" id="posyandu" name="posyandu" value="{{ old('posyandu', $balita->posyandu) }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Balita</label>
                        <input type="text" class="form-control" id="nama" name="nama_balita" value="{{ old('nama_balita', $balita->nama_balita) }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jk', $balita->jk) == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="P" {{ old('jk', $balita->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select name="prov" id="prov" class="form-control select2" readonly>
                            <option value="{{ $balita->prov }}">{{ $balita->prov }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kab">Kabupaten / Kota</label>
                        <select name="kab_kota" id="kab" class="form-control select2" readonly>
                            <option value="{{ $balita->kab_kota }}">{{ $balita->kab_kota }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kec">Kecamatan</label>
                        <select name="kec" id="kec" class="form-control select2" readonly>
                            <option value="{{ $balita->kec }}">{{ $balita->kec }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa</label>
                        <select name="desa_kel" id="desa" class="form-control select2" readonly>
                            <option value="{{ $balita->desa_kel }}">{{ $balita->desa_kel }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('balita.index') }}" class="btn btn-secondary">Batalkan</a>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
