<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            @if (Auth::user()->role = 'ADMIN')
                <li class="nav-item nav-category">Management User</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-balita"  aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-balita">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">Daftar User</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('user.create')}}">Tambah User</a></li>
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item nav-category">Entry</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-balita"  aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Balita</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-balita">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('balita.index') }}">Daftar Valita</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('balita.create') }}">Tambah Valita</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-bumil"  aria-controls="ui-basic">
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
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-lap-balita"  aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Laporan Balita</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-lap-balita">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/">Laporan Gizi</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/">Laporan BMI</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/">Laporan Vaksin</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-lap-bumil"  aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Laporan Ibu Hamil</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-lap-bumil">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/">Laporan Kehamilan</a></li>
                      <li class="nav-item"> <a class="nav-link" href="/">Laporan Kesehatan</a></li>
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
            <li class="nav-item">
              <a href="/log" class="nav-link">Log activity</a>
            </li>
          </ul>
        </nav>

        