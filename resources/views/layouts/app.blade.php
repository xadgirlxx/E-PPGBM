<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('temp')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{asset('temp')}}/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('temp')}}/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('temp')}}/assets/images/favicon.png" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{asset('temp')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('temp')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('temp')}}/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="{{asset('temp')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('temp')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('temp')}}/assets/js/template.js"></script>
    <script src="{{asset('temp')}}/assets/js/settings.js"></script>
    <script src="{{asset('temp')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('temp')}}/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('temp')}}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{asset('temp')}}/assets/js/dashboard.js"></script>
    <!-- <script src="{{asset('temp')}}/assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>
</html>
