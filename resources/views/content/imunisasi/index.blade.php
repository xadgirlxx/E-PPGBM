@extends('index')

@section('maincontent')
@php
    use Carbon\Carbon;
    $umur = Carbon::parse($balitas->tgl_lahir)->diff(Carbon::now());
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Imunisasi Anak Ibu / Bapak {{$balitas->nama_ortu}}</h1>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahImunisasiModal">Tambah Imunisasi</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel-Balita">
            <thead>
                <th rowspan="2">No</th>
                <th rowspan="2">Tanggal Imunisasi</th>
                <th colspan="5" >Jenis Imunisasi</th>
                <th rowspan="2">Action</th>
              </tr>
              <tr class="text-center">
                <th>HB</th>
                <th>Polio</th>
                <th>Campak</th>
                <th>BCG</th>
                <th>IPV</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($imunisasi as $index => $item)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                  <td>{{ \Carbon\Carbon::parse($item->tgl_imunisasi)->format('d-m-Y') }}</td>
                  <td>{{ $item->hb ?? '-' }}</td>
                  <td>{{ $item->polio ?? '-' }}</td>
                  <td>{{ $item->campak ?? '-' }}</td>
                  <td>{{ $item->BCG ? '✓' : '-' }}</td>
                  <td>{{ $item->IPV ? '✓' : '-' }}</td>
                  <td>
                    <!-- Tombol Edit/Hapus -->
                    <a href="{{ route('balita.imunisasi.edit', ['balitum' => $balitas->id, 'imunisasi' => $item->id_imun]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('balita.imunisasi.destroy', ['balitum' => $balitas->id, 'imunisasi' => $item->id_imun]) }}" method="POST" style="display:inline-block;">
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
<div class="modal fade" id="tambahImunisasiModal" tabindex="-1" aria-labelledby="tambahImunisasiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('balita.imunisasi.store', $balitas->id) }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahImunisasiModalLabel">Tambah Imunisasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Imunisasi</label>
                <input type="date" name="tgl_imunisasi" id="tanggal" class="form-control" required>
            </div>
            <span><b>JENIS IMUNISASI</b></span>
            <div class="mb-3">
                <label for="hb" class="form-label">HB</label>
                <select name="hb" id="hb" class="form-control">
                    <option value="">--Pilih HB--</option>
                    <option value="HB-0">HB-0 (0-7 hari)</option>
                    <option value="DPT-HB-HIB-1">*DPT-HB-HIB-1</option>
                    <option value="DPT-HB-HIB-2">*DPT-HB-HIB-2</option>
                    <option value="DPT-HB-HIB-3">*DPT-HB-HIB-3</option>
                    <option value="DPT-HB-HIB Lanjutan">***DPT-HB-HIB Lanjutan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="polio" class="form-label">Polio</label>
                <select name="polio" id="polio" class="form-control">
                    <option value="">--Pilih Polio--</option>
                    <option value="Polio 1">*Polio</option>
                    <option value="Polio 2">*Polio 2</option>
                    <option value="Polio 3">*Polio 3</option>
                    <option value="Polio 4">*Polio 4</option>    
                </select>
            </div>
            <div class="mb-3">
                <label for="campak" class="form-label">Campak</label>
                <select name="campak" id="campak" class="form-control">
                    <option value="">--Pilih Campak--</option>
                    <option value="campak">*Campak</option>
                    <option value="campak lanjutan">*Campak Lanjutan</option>    
                </select>
            </div>
            <div class="row">
              <div class="col-3">
                <div class="form-check d-flex justify-content-end md-3">
                  <input class="form-check-input" type="checkbox" name="BCG" value="BCG" id="bcg">
                  <label class="form-check-label" for="bcg">BCG</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-check d-flex justify-content-end md-3">
                  <input class="form-check-input" type="checkbox" name="IPV" value="IPV" id="ipv">
                  <label class="form-check-label" for="ipv">*IPV</label>
                </div>
              </div>
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
