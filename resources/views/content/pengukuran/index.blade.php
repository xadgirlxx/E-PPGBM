@extends('index')

@section('maincontent')
@php
    use Carbon\Carbon;
    \Carbon\Carbon::setLocale('id');
    $umur = Carbon::parse($balitas->tgl_lahir)->diff(Carbon::now());
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Pengukuran Anak Ibu / Bapak {{$balitas->nama_ortu}}</h1>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h2>Identitas Anak</h2></div>
                </div>
                <div class="card body">
                    <div class="row">
                        <div class="col-md-2">
                            <span>NIK : <b> {{$balitas->nik_balita}}</b></span><br>
                            <span>Nama :<b> {{$balitas->nama_balita}}</b></span><br>
                            <span>Lahir :<b> {{$balitas->tgl_lahir}}</b></span><br>
                        </div>
                        <div class="col-md-4">
                            <span>Umur : <b>{{ $umur->y }} tahun, {{ $umur->m }} bulan, {{ $umur->d }} hari</b></span><br>
                            <span>Puskesmas : <b>{{$balitas->puskesmas}}</b></span> <br>
                            <span>Posyandu : <b>{{$balitas->posyandu}}</b></span> <br>
                            <span>Alamat : <b>{{$balitas->alamat}}</b></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/balita" class="btn btn-danger btn-sm">KEMBALI</a>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahUkuranModal">Tambah Pengukuran</button>                   
                    <a href="{{ route('balita.imunisasi.index', Crypt::encryptString($balitas->nik_balita)) }}" class="btn btn-secondary btn-sm">Tambah Imunisasi</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel-Balita">
            <thead>
              <tr class="text-center">
                <th rowspan="2">No</th>
                <th rowspan="2">Tanggal pengukuran</th>
                <th colspan="6" >Pengukuran</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr class="text-center">
                <th>TB</th>
                <th>BB</th>
                <th>Lingkar Kepala</th>
                <th>Kelas Ibu Balita</th>
                <th>Cara Ukur</th>
                <th>Vitamin A</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pengukuran as $index => $item)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($item->tgl_pengukuran)->translatedFormat('d F Y') }}</td>
                  <td>{{ $item->tb ?? '-' }}</td>
                  <td>{{ $item->bb ?? '-' }}</td>
                  <td>{{ $item->lingkar_kepala ?? '-' }}</td>
                  <td>{{ $item->kelas_ibu ?? '-' }}</td>
                  <td>{{ $item->cara_ukur ?? '-' }}</td>
                  <td>{{ $item->vitamin_a ?? '-' }}</td>
                  <td>
                    <!-- Tombol Edit/Hapus -->
                    <a href="{{ route('balita.pengukuran.edit', ['balitum' => $balitas->id, 'pengukuran' => $item->id_ukuran]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('balita.pengukuran.destroy', ['balitum' => $balitas->id, 'pengukuran' => $item->id_ukuran]) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination Links -->
        {{-- {{ $balitas->links() }} --}}
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="tambahUkuranModal" tabindex="-1" aria-labelledby="tambahUkuranModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('balita.pengukuran.store', $balitas->id) }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahUkuranModalLabel">Tambah Pengukuran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pengukuran</label>
                <input type="date" name="tgl_pengukuran" id="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bb">Berat Badan (KG)*</label>
                <input type="text" name="bb" id="bb" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tb">Tinggi Badan (CM)*</label>
                <input type="text" name="tb" id="tb" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lingkar_kepala">Lingkar Kepala (CM)*</label>
                <input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelas_ibu">Telah mengikuti kali kelas ibu balita</label>
                <select name="kelas_ibu" id="kelas_ibu" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="YA"> Ya </option>
                    <option value="TIDAK"> Tidak </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cara_ukur">Cara Ukur</label>
                <select name="cara_ukur" id="cara_ukur" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="Terlentang"> Terlentang </option>
                    <option value="Berdiri"> Berdiri </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="vitamin_a">Vitamin A</label>
                <select name="vitamin_a" id="vitamin_a" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="YA"> Ya </option>
                    <option value="TIDAK"> Tidak </option>
                </select>
            </div>
          <!-- Tambah field lain jika perlu -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
