@extends('index')

@section('maincontent')
@php
    use Carbon\Carbon;
    \Carbon\Carbon::setLocale('id');
    $umur = Carbon::parse($bumil->tgl_lahir)->diff(Carbon::now());
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Kesehatan Ibu Hamil A/n Ibu {{$bumil->nama_bumil}}</h1>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><h2>Identitas Ibu Hamil</h2></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <span>NIK : <b> {{$bumil->nik_bumil}}</b></span><br>
                            <span>Nama :<b> {{$bumil->nama_bumil}}</b></span><br>
                            <span>Lahir :<b> {{$bumil->tgl_lahir}}</b></span><br>
                        </div>
                        <div class="col-md-4">
                            <span>Umur : <b>{{ $umur->y }} tahun, {{ $umur->m }} bulan, {{ $umur->d }} hari</b></span><br>
                            <span>Puskesmas : <b>{{$bumil->faskes1}}</b></span> <br>
                            <span>Posyandu : <b>{{$bumil->faskes_rujukan}}</b></span> <br>
                            <span>Alamat : <b>{{$bumil->alamat}}</b></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('bumil.index')}}" class="btn btn-danger btn-sm">KEMBALI</a>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahKehamilanModal">Tambah Kehamilan</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel-Balita">
            <thead>
              <tr class="text-center">
                <th rowspan="2">No</th>
                <th rowspan="2">Kehamilan Ke</th>
                <th colspan="9" >Data Kehamilan</th>
              </tr>
              <tr class="text-center">
                <th>Hari Pertama Haid</th>
                <th>BB Sebelum Hamil</th>
                <th>Tinggi Badan</th>
                <th>Imt</th>
                <th>Jarak Kehamilan Sebelumnya</th>
                <th>Golongan Darah</th>
                <th>Rhesus</th>
                <th>Riwayat Penyakit</th>
                <th>Riwayat Alergi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kesbumil as $index => $item)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                  <td>{{ $item->kehamilan_ke_berapa ?? '-' }}</td>
                  <td>{{ $item->hari_pertama_haid_terakhir ?? '-' }}</td>
                  <td>{{ $item->bb_sblm_hamil ?? '-' }}</td>
                  <td>{{ $item->tb ?? '-' }}</td>
                  <td>{{ $item->imt ?? '-' }}</td>
                  <td>{{ $item->jarak_kehamilan_sblmnya ?? '-' }}</td>
                  <td>{{ $item->gol_darah ?? '-' }}</td>
                  <td>{{ $item->rhesus ?? '-' }}</td>
                  <td>{{ $item->riwayat_penyakit_bumil ??  '-' }}</td>
                  <td>{{ $item->riwayat_alergi ??  '-' }}</td>
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
<div class="modal fade" id="tambahKehamilanModal" tabindex="-1" aria-labelledby="tambahKehamilanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('bumil.kesbumil.store', $bumil->id_bumil) }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahKehamilanModalLabel">Tambah Kehamilan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="kehamilan_ke" class="form-label">Kehamilan Ke</label>
            <input type="number" name="kehamilan_ke_berapa" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="hari_haid" class="form-label">Hari Pertama Haid Terakhir</label>
            <input type="date" name="hari_pertama_haid_terakhir" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="bb_sebelum" class="form-label">Berat Badan Sebelum Hamil (kg)</label>
            <input type="number" step="0.1" name="bb_sblm_hamil" class="form-control">
          </div>

          <div class="mb-3">
            <label for="tinggi_badan" class="form-label">Tinggi Badan (cm)</label>
            <input type="number" step="0.1" name="tb" class="form-control">
          </div>

          <div class="mb-3">
            <label for="imt" class="form-label">IMT (Indeks Massa Tubuh)</label>
            <input type="number" step="0.1" name="imt" class="form-control">
          </div>

          <div class="mb-3">
            <label for="jarak_kehamilan" class="form-label">Jarak Kehamilan Sebelumnya</label>
            <input type="text" name="jarak_kehamilan_sblmnya" class="form-control">
          </div>

          <div class="mb-3">
            <label for="gol_darah" class="form-label">Golongan Darah</label>
            <select name="gol_darah" id="gol_darah" class="form-select">
              <option value="" selected disabled>Pilih Golongan Darah</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="AB">AB</option>
              <option value="O">O</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="rhesus" class="form-label">Rhesus</label>
            <select name="rhesus" class="form-control">
              <option value="">-- Pilih Rhesus --</option>
              <option value="+">Positif (+)</option>
              <option value="-">Negatif (-)</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
            <input type="text" name="riwayat_penyakit_bumil" class="form-control">
          </div>

          <div class="mb-3">
            <label for="riwayat_alergi" class="form-label">Riwayat Alergi</label>
            <input type="text" name="riwayat_alergi" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
