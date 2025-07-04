<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            {{-- {{Auth::user()->role}} --}}
            @if (Auth::user()->role == 'ADMIN')
                <li class="nav-item nav-category">Management User</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-user"  aria-controls="ui-user">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-user">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">Daftar User</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">Tambah User</a></li>
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item nav-category">Entry</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-balita"  aria-controls="ui-balita">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Balita</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-balita">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('balita.index') }}">Daftar Balita</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('balita.create') }}">Tambah Balita</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-bumil"  aria-controls="ui-bumil">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Ibu Hamil</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-bumil">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('bumil.index') }}">Daftar Ibu Hamil</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('bumil.create') }}">Tambah Ibu Hamil</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item nav-category">Laporan</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-lap-balita"  aria-controls="ui-lap_balita">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Laporan Balita</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-lap-balita">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/laporan/balita">Laporan Balita</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/laporan/gizi">Laporan Gizi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/laporan/bmi">Laporan BMI</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/laporan/vaksin">Laporan Vaksin</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-lap-bumil"  aria-controls="ui-lap-bumil">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Laporan Ibu Hamil</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-lap-bumil">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/laporan/kehamilan-terakhir">Laporan Kehamilan</a></li>
                      <li class="nav-item"> <a class="nav-link" href="/laporan/kesehatan-bumil">Laporan Kesehatan</a></li>
                </ul>
              </div>
            </li>
            <li class="nav">
              <span class="btn btn-danger">
                <a class="dropdown-item" href="{{ route('logout') }}" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }} </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
              </span>
            </li>
            @if (Auth::user()->role == 'ADMIN')
            <li class="nav-item">
              <a href="/log" class="nav-link">Log activity</a>
            </li>
            @endif
          </ul>
        </nav>

        