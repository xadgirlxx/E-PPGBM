@extends('index')

@section('maincontent')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table Balita</h4>
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

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
   $( document ).ready(function() {
   new DataTable('#tabel-Balita');
    });
  </script>
@endsection