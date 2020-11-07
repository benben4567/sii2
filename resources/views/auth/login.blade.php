@extends('layouts.auth.login')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <h3 class="text-center">
          <a href="index.php" class="logo logo-admin"><img src="{{asset('assets/images/logopln.png')}}" height="40" alt="logo"></a>
        </h3>
        <h3 class="text-center m-0">
          <img src="{{asset('assets/images/brain.png')}}" height="230" alt="brain">
        </h3>
        <h5 class="text-center">
          The Brainware Generator
        </h5>
      </div>
      <div class="col-lg-6 border-left">
        <div class="p-3">
          <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
          <p class="text-muted text-center">Sign in to continue</p>

          <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group ">
              <label for="username">Username</label>
              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter username">
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">{{ __('Password') }}</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
            </div>

            <div class="form-group row m-t-20">
              <div class="col-6">
                <div class="custom-control custom-checkbox">

                  <input type="checkbox" class="custom-control-input" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="customControlInline">Remember me</label>
                </div>
              </div>
              <div class="col-6 text-right">
                <button class="btn btn-primary w-md waves-effect waves-light btn-toastr" type="submit">Log In</button>
              </div>
            </div>

            @section('signup')
                <p class="text-muted">Don't have an account ? <a href="{{route('register')}}" style="color:cornflowerblue">  Signup Now </a> </p>
            @endsection

            <div class="form-group m-t-10 mb-0 row">
              <div class="col-12 m-t-20">
                @if (Route::has('password.request'))
                <a class="text-muted" href="{{ route('password.request') }}">
                  <i class="mdi mdi-lock"></i> {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
