@extends('index')

@section('maincontent')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Tambah Balita</h4>
        <form class="forms-sample" method="POST" action="{{route('balita.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK Balita</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Balita">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="nama_ortu">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Nama Orang tua">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nama Balita">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="puskesmas">Puskesmas</label>
                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" placeholder="Nama Puskesmas">
                    </div>
                    <div class="form-group">
                        <label for="posyandu">Posyandu</label>
                        <input type="text" class="form-control" id="posyandu" name="posyandu" placeholder="Nama Posyandu">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Balita</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Balita">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select name="prov" id="prov" class="form-control">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Kab_kota_id">Kabupaten / Kota</label>
                        <select name="kab_kota" id="kab" class="form-control">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kec_id">Kecamatan</label>
                        <select name="kec" id="kec" class="form-control">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa</label>
                        <select name="desa" id="desa" class="form-control">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah data</button>
                <a href="{{route('balita.index')}}" class="btn btn-danger"> Batalkan</a>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
   $(document).ready(function() {
      // Load Provinsi
      $.ajax({
        url: '/api/provinces',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          $('#prov').html('<option value="">-- Pilih Provinsi --</option>');
          $.each(data.data, function(i, item) {
            $('#prov').append(`<option value="${item.code}">${item.name}</option>`);
          });
        }
      });

      // Load Kabupaten
      $('#prov').on('change', function() {
        let provId = $(this).val();
        $('#kab').html('<option value="">-- Pilih Kabupaten --</option>');
        $('#kec').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#desa').html('<option value="">-- Pilih Desa --</option>');

        if (provId) {
          $.ajax({
            url: `/api/regencies/${provId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $.each(data.data, function(i, item) {
                $('#kab').append(`<option value="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });

      // Load Kecamatan
      $('#kab').on('change', function() {
        let kabId = $(this).val();
        $('#kec').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#desa').html('<option value="">-- Pilih Desa --</option>');

        if (kabId) {
          $.ajax({
            url: `/api/districts/${kabId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $.each(data.data, function(i, item) {
                $('#kec').append(`<option value="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });

      // Load Desa
      $('#kec').on('change', function() {
        let kecId = $(this).val();
        $('#desa').html('<option value="">-- Pilih Desa --</option>');

        if (kecId) {
          $.ajax({
            url: `/api/villages/${kecId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $.each(data.data, function(i, item) {
                $('#desa').append(`<option value="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });
    });
</script>
@endsection