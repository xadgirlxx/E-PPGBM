@php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('H');

    if ($jam >= 5 && $jam < 11) {
        $ucapan = "Selamat Pagi!";
    } elseif ($jam >= 11 && $jam < 15) {
        $ucapan = "Selamat Siang!";
    } elseif ($jam >= 15 && $jam < 18) {
        $ucapan = "Selamat Sore!";
    } else {
        $ucapan = "Selamat Malam!";
    }
@endphp

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="/">
              <img src="{{asset('temp')}}/assets/images/logo.png" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="/">
              <img src="{{asset('temp')}}/assets/images/logo.png" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item fw-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">{{$ucapan}}, <span class="text-black fw-bold">{{Auth::user()->name}}</span></h1>
            <h3 class="welcome-sub-text">Bekerja Dengan Sepenuh Hati</h3>
          </li>
        </ul>
        </div>
      </nav>