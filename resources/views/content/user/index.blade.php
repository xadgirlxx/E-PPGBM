@extends('index')

@section('maincontent')
@php
    use Illuminate\Support\Facades\Crypt;
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table User</h4>
        <div class="table-responsive">
          <table class="table table-hover" id="tabel-user">
            <thead>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($data as $d)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->email }}</td>
                  <td>{{ $d->role }}</td>
                  <td>
                    <a href="{{ route('user.edit', $d->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square" title="Edit"></i></a>
                     <form action="{{ route('user.destroy', $d->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa-solid fa-trash" title="Hapus"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
