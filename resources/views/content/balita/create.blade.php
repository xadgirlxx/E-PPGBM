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
                        <input type="text" class="form-control" id="nik" name="nik_balita" placeholder="NIK Balita">
                    </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir:</label>
                      <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
                      <div id="tgl_lahir_error" style="color: red; margin-top: 5px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama_ortu">Nama Orang Tua</label>
                        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Nama Orang tua">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor telepon / Whatsapp">
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
                        <input type="text" class="form-control" id="nama" name="nama_balita" placeholder="Nama Balita">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jenis_kelamin" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
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
            const tglLahirInput = document.getElementById('tgl_lahir');
            const tglLahirError = document.getElementById('tgl_lahir_error');

            const today = new Date();

            // --- 1. Set atribut min dan max langsung pada input ---
            const formatForInputDate = (date) => {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            // Calculate 5 years ago from current date (June 29, 2025)
            // This will be June 29, 2020
            const fiveYearsAgo = new Date(today);
            fiveYearsAgo.setFullYear(today.getFullYear() - 5);

            // Set max attribute (cannot select future dates)
            tglLahirInput.setAttribute('max', formatForInputDate(today));

            // Set min attribute (cannot select dates older than 5 years ago)
            tglLahirInput.setAttribute('min', formatForInputDate(fiveYearsAgo));


            // --- 2. Tambahkan event listener untuk validasi setelah perubahan ---
            tglLahirInput.addEventListener('change', function() {
                const inputDate = new Date(this.value);

                // Bersihkan pesan error sebelumnya
                tglLahirError.textContent = '';

                // Periksa apakah tanggal yang dipilih valid (tidak NaN)
                if (isNaN(inputDate.getTime())) {
                    tglLglahirError.textContent = 'Format tanggal tidak valid.';
                    this.value = ''; // Kosongkan jika tidak valid
                    return;
                }

                // Perhitungan umur yang lebih robust (mempertimbangkan bulan dan hari)
                let age = today.getFullYear() - inputDate.getFullYear();
                const m = today.getMonth() - inputDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < inputDate.getDate())) {
                    age--;
                }

                if (age < 0 || age > 5) {
                    tglLahirError.textContent = 'Umur balita harus antara 0 sampai 5 tahun.';
                    this.value = ''; // Kosongkan input
                }
            });
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