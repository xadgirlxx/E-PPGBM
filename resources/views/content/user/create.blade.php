@extends('index')

@section('maincontent')
@php
    use Illuminate\Support\Facades\Crypt;
@endphp
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah User</h4>
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">--Pilih Role--</option>
                    <option value="ADMIN">ADMIN</option>
                    <option value="KADER">KADER</option>
                    <option value="PETUGAS">PETUGAS</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                <a href="{{route("user.index")}}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
