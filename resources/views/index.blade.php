<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-PPGBM </title>
    <!-- plugins:css -->
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
  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     @include('layout.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layout.sidebar')
        <!-- partial -->
        @include('layout.main')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
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