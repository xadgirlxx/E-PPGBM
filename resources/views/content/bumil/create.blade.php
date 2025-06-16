@extends('index')

@section('maincontent')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Tambah Bumil</h4>
        <form class="forms-sample" method="POST" action="{{route('bumil.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK Ibu Hamil</label>
                        <input type="text" class="form-control" id="nik" name="nik_bumil" placeholder="NIK Ibu Hamil">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga">
                    </div>
                    <div class="form-group">
                        <label for="nama_suami">Nama Suami</label>
                        <input type="text" class="form-control" id="nama_suami" name="nama_suami" placeholder="Nama Suami">
                    </div>
                    <div class="form-group">
                        <label for="telp_suami">Telepon Suami</label>
                        <input type="text" class="form-control" id="telp_suami" name="telp_suami" placeholder="Telepon Suami">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="faskes1">Faskes 1</label>
                        <input type="text" class="form-control" id="faskes1" name="faskes1" placeholder="Faskes 1">
                    </div>
                    <div class="form-group">
                        <label for="faskes_rujukan">Faskes Rujukan</label>
                        <input type="text" class="form-control" id="faskes_rujukan" name="faskes_rujukan" placeholder="Faskes Rujukan">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Ibu Hamil</label>
                        <input type="text" class="form-control" id="nama" name="nama_bumil" placeholder="Nama Ibu Hamil">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="">Pilih Pendidikan</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA/MA/Paket C">SMA/MA/Paket C</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="nik_suami">NIK Suami</label>
                        <input type="text" name="nik_suami" id="nik_suami" class="form-control" placeholder="NIK Suami">
                    </div>
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select name="prov" id="prov" class="form-control select2">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Kab_kota_id">Kabupaten / Kota</label>
                        <select name="kab_kota" id="kab" class="form-control select2">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kec_id">Kecamatan</label>
                        <select name="kec" id="kec" class="form-control select2">
                            <option value="">Loading ...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa</label>
                        <select name="desa_kel" id="desa" class="form-control select2">
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
            $('#prov').append(`<option value="${item.name}" data-id="${item.code}">${item.name}</option>`);
          });
          // $('#prov').select2({ width: '100%' });
        }
      });

      // Load Kabupaten
      $('#prov').on('change', function() {
        let provId =  $(this).find('option:selected').data('id')
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
                $('#kab').append(`<option value="${item.name}" data-id="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });

      // Load Kecamatan
      $('#kab').on('change', function() {
        let kabId =  $(this).find('option:selected').data('id')
        $('#kec').html('<option value="">-- Pilih Kecamatan --</option>');
        $('#desa').html('<option value="">-- Pilih Desa --</option>');

        if (kabId) {
          $.ajax({
            url: `/api/districts/${kabId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $.each(data.data, function(i, item) {
                $('#kec').append(`<option value="${item.name}" data-id="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });

      // Load Desa
      $('#kec').on('change', function() {
        let kecId =  $(this).find('option:selected').data('id')
        $('#desa').html('<option value="">-- Pilih Desa --</option>');

        if (kecId) {
          $.ajax({
            url: `/api/villages/${kecId}`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
              $.each(data.data, function(i, item) {
                $('#desa').append(`<option value="${item.name}" data-id="${item.code}">${item.name}</option>`);
              });
            }
          });
        }
      });
    });
</script>
@endsection