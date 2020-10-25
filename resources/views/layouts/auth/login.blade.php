<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'PLN - Sistem Informasi Instruktur')</title>

  <meta content="Admin Dashboard" name="description" />
  <meta content="Themesbrand" name="author" />
  <link rel="shortcut icon" href="{{asset('assets/images/pln.jpg')}}">

  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/js/toastr/toastr.min.css')}}">

</head>

<body>

  <!-- Background -->
  <div class="account-pages"></div>
  <!-- Begin page -->
  <div class="wrapper-page">
    @yield('content')
    <div class="m-t-40 text-center">
      @yield('signup')
      <p>&#169; 2020 All Rights Reserved by PT. PLN(Persero) UPDL Palembang.</p>
    </div>

  </div>

  <!-- END wrapper -->


  <!-- jQuery  -->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('assets/js/waves.min.js')}}"></script>

  <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

  <!-- App js -->
  <script src="{{ asset('assets/js/app.js') }}" defer></script>
  <script src="{{asset('assets/js/toastr/toastr.js')}}"></script>
  <script>
    $(function() {

      if ('{{$errors->has('email')}}') {
        var audio = new Audio("assets/audio/toast_sound.mp3");
        audio.play();
        toastr.options.timeOut = "10000";
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';
        toastr['error']('{{ $errors->first('email') }}');
      }
      if ('{{session('status')}}') {
        var audio = new Audio("assets/audio/toast_sound.mp3");
        audio.play();
        toastr.options.timeOut = "10000";
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';
        toastr['warning']('{{ session('status') }}');
      }
      $('.btn-toastr').on('click', function() {
        $context = $(this).data('context');
        $message = $(this).data('message');
        $position = $(this).data('position');
        if ($context === '') {
          $context = 'info';
        }
        if ($position === '') {
          $positionClass = 'toast-bottom-right';
        } else {
          $positionClass = 'toast-' + $position;
        }
        toastr.remove();
        toastr[$context]($message, '', {
          positionClass: $positionClass
        });
      });
    });
  </script>
  @section('js')

  @show
</body>

</html>
