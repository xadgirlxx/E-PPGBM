@extends('index')

@section('maincontent')
<div class="row">
    {{-- Balita Tidak Naik BB --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-primary dropdown-toggle w-100" type="button" id="naikBbDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Balita Tidak Naik BB
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="naikBbDropdown">
            @foreach($naik_bb as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Balita Underweight --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="underweightDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Balita Underweight (ZS < -2)
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="underweightDropdown">
            @foreach($underweight as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Balita Stunting --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-warning dropdown-toggle w-100" type="button" id="stuntingDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Balita Stunting
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="stuntingDropdown">
            @foreach($stunting as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Gizi Kurang --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-danger dropdown-toggle w-100" type="button" id="giziKurangDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Gizi Kurang (Tidak Stunting)
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="giziKurangDropdown">
            @foreach($gizi_kurang as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Balita Menyimpang --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-light dropdown-toggle w-100" type="button" id="menyimpangDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Balita Menyimpang
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="menyimpangDropdown">
            @foreach($menyimpang as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Bumil KEK --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-success dropdown-toggle w-100" type="button" id="bumilKekDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Bumil KEK
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="bumilKekDropdown">
            @foreach($bumil_kek as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik_bumil }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- Bumil Anemia --}}
    <div class="col-md-4 dropdown mb-3">
        <button class="btn btn-info dropdown-toggle w-100" type="button" id="bumilAnemiaDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Bumil Anemia
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="bumilAnemiaDropdown">
            @foreach($bumil_anemia as $item)
                <li><a class="dropdown-item" href="{{ route('balita.detail', $item->id) }}">{{ $item->nama }} - {{ $item->nik_bumil }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
