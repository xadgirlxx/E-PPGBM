@extends('index')
@section('maincontent')
<h4>Data Balita Tidak Naik BB</h4>
<select class="form-select" id="balita-dropdown">
  <option value="">-- Pilih Balita --</option>
  @foreach($balita as $b)
    <option value="{{ $b->id }}">{{ $b->nama }} - {{ $b->nik }}</option>
  @endforeach
</select>
<div id="result-container" class="mt-3"></div>
<script>
  document.getElementById('balita-dropdown').addEventListener('change', function () {
    let id = this.value;
    if (id) {
      fetch(`/balita/detail/${id}`)
        .then(response => response.text())
        .then(html => {
          document.getElementById('result-container').innerHTML = html;
        });
    } else {
      document.getElementById('result-container').innerHTML = '';
    }
  });
</script>
@endsection