<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Berat Badan</th>
      <th>Umur</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
      <tr>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->berat_badan }}</td>
        <td>{{ $item->umur }}</td>
      </tr>
    @endforeach
  </tbody>
</table>