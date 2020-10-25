<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>@yield('title', 'PLN - Sistem Informasi Instruktur')</title>
  <meta content="Admin Dashboard" name="description" />
  <meta content="Themesbrand" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{asset('assets/images/pln.jpg')}}" height="5">

  <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  <!--  Toast -->
  <link rel="stylesheet" href="{{ asset('assets/js/toastr/toastr.min.css')}}">
  <!-- DataTables -->
  <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/DataTables-1.10.20/css/dataTables.bootstrap4.min.css')}}"/>
  <!--  dropify  -->
  <link  href="{{asset('assets/plugins/dropify-master/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Table css -->
  <link href="{{asset('assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" media="screen">
  <!-- Select 2  -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <!-- Datetime  -->
  <link href="{{asset('assets/plugins/bootstrap-md-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
  <!-- Sweet Alert -->
  <link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
  <!-- <link href="{{asset('assets/plugins/wizardku/wizardku.css')}}" rel="stylesheet" type="text/css"> -->
  @yield('css-head')
  @yield('style')
  @stack('css')
</head>

<body>

  <!-- Begin page -->
  <div id="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        @yield('content')
        @include('sweetalert::alert')
        @include('layouts.footer')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->


  <!-- jQuery  -->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('assets/js/waves.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <!-- Peity JS -->
  <script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
  {{-- <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script> --}}
  <script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
  {{-- <script src="{{asset('assets/pages/dashboard.js')}}"></script> --}}
  <script src="{{asset('assets/js/toastr/toastr.js')}}"></script>
  <script src="{{asset('assets/js/validator.js')}}"></script>
  <!-- Required datatable js -->
  <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Buttons examples -->
  <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
  <!-- Responsive examples -->
  <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
  <!-- Datatable init js -->
  <script type="text/javascript" src="{{asset('assets/plugins/DataTables-1.10.20/js/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Responsive-table-->
  <script src="{{asset('assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js')}}"></script>
  {{-- dropify --}}
  <script src="{{asset('assets/plugins/dropify-master/dist/js/dropify.min.js')}}"></script>
  <!-- Sweet-Alert  -->
  <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
  <script src="{{asset('assets/pages/sweet-alert.init.js')}}"></script>
  <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css -->
  <script src="{{asset('assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
  <script src="{{asset('assets/plugins/bootstrap-md-datetimepicker/js/moment-with-locales.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap-md-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
  <script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}"></script>
  <!-- App js -->
  <script src="{{ asset('assets/js/app.js') }}" defer></script>

  @section('js')

  @show
  @stack('js')
</body>

</html>
