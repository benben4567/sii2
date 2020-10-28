<!-- Top Bar Start -->
<div class="topbar">

  <!-- LOGO -->
  <div class="topbar-left">
    <a href="#" class="logo">
      <span>
        <img src="{{asset('assets/images/logopln.png')}}" alt="" height="34">
      </span>
      <i>
        <img src="{{asset('assets/images/logopln.png')}}" alt="" height="20">
      </i>
    </a>
  </div>

  <nav class="navbar-custom">

    <ul class="navbar-right d-flex list-inline float-right mb-0">

    <li class="dropdown notification-list">
        <div class="dropdown notification-list nav-pro-img">
          <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light user-header" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            {{-- @if(Auth::user()->foto == '') --}}
            <img src="{{asset('assets/images/default.png')}}" alt="" class="thumb-md rounded-circle">
            {{-- @else --}}
            {{-- <img src="{{asset('assets/images/user/'. Auth::user()->foto)}}" alt="" class="thumb-md rounded-circle"> --}}
            {{-- @endif --}}
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="{{ route('logout')}}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            ><i class="mdi mdi-power text-danger"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
      </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
      <li class="float-left">
        <button class="button-menu-mobile open-left waves-effect waves-light">
          <i class="mdi mdi-menu"></i>
        </button>
      </li>
    </ul>

  </nav>

</div>
<!-- Top Bar End -->
