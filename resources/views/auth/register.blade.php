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
            The Brain Generator
          </h5>
        </div>
        <div class="col-lg-6 border-left"">
          <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Register</h4>
            <p class="text-muted text-center">Get your account now.</p>

            <form class="form-horizontal m-t-30" method="POST" action="{{ route('register') }}" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <label for="username">{{ __('NIP') }}</label>

                        <input id="username" type="text"  placeholder="Enter NIP" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group row">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password"  placeholder="Enter Confirm Password"class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary w-md waves-effect waves-light btn-toastr" type="submit"> {{ __('Register') }}</button>
                    </div>
                </div>

                {{-- <div class="form-group m-t-3 mb-0 row">
                  <div class="col-12 m-t-20">
                      <p class="font-14 text-muted mb-0">By registering you agree to the Agroxa <a href="#" class="text-primary">Terms of Use</a></p>
                  </div>
                </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @section('signup')
    <p class="text-muted">Already have an account ? <a href="{{route('login')}}" style="color:cornflowerblue"> Login </a> </p>
  @endsection
@endsection
