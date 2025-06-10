@extends('index')

@section('maincontent')

<h3>Riwayat Login</h3>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Login</th>
            <th>Logout</th>
            <th>IP Address</th>
        </tr>
    </thead>
    <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{$log->nama}}</td>
                <td>{{ $log->login_at }}</td>
                <td>{{ $log->logout_at ?? '-' }}</td>
                <td>{{ $log->ip_address }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada aktivitas login.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection