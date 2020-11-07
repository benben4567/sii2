<!-- ========== Left Sidebar Start ========== -->
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<div class="left side-menu">
  <div class="slimscroll-menu" id="remove-scroll">
    <div class="user-details">

      <div class="float-left mr-2">
        @if(Auth::user()->foto == '')
        <img src="{{asset('assets/images/default.png')}}" alt="" class="thumb-md rounded-circle">
        @else
        <img src="{{asset('assets/images/user/'. Auth::user()->foto)}}" alt="" class="thumb-md rounded-circle">
        @endif
      </div>

      <div class="user-info">
        <div class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Auth::user()->username}}
          </a>
          <ul class="dropdown-menu">
            <li><a href="#" class="dropdown-item"><i class="mdi mdi-account-circle m-r-5"></i> Profile<div class="ripple-wrapper"></div></a></li>
            <li><a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="mdi mdi-power m-r-5"></i> Logout</a></li>
          </ul>
        </div>
        <p class="text-white-50 m-0">{{!empty(Auth::user()->roles()->first()->name) ? Auth::user()->roles()->first()->name : "Users"}}</p>
      </div>

    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <!-- Left Menu Start -->
      <ul class="metismenu" id="side-menu">

        <li class="menu-title">Main</li>

        {{-- Dashboard (all)--}}
        <li>
          <a href="{{ route('home') }}" class="waves-effect">
            <i class="mdi mdi-home"></i> <span> Dashboard </span>
          </a>
        </li>

        {{-- Pengalaman (instruktur)--}}
        @role('instruktur')
        <li>
          <a href="javascript:void(1);" class="waves-effect"><i class="fas fa-chalkboard-teacher"></i>
            <span> Pengalaman <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span>
          </a>
          <ul class="submenu">
            <li><a href="{{ route('instruktur.magang.index') }}">Magang</a></li>
            <li><a href="{{ route('instruktur.mengajar.index') }}">Mengajar</a></li>
            <li><a href="{{ route('instruktur.pendalaman-materi.index') }}">Pendalaman Materi</a></li>
            <li><a href="{{ route('instruktur.narasumber.index') }}">Narasumber</a></li>
            <li><a href="{{ route('instruktur.penyusun.index') }}">Penyusun</a></li>
          </ul>
        </li>
        @endrole

        {{-- Pembelajaran (admin&instuktur) --}}
        <li>
          <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-readme"></i>
            <span> Pembelajaran <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span></span>
          </a>
          {{-- admin --}}
          @role('super-admin')
          <ul class="submenu">
            <li><a href="{{ route('admin.materi.index')}}">Materi</a></li>
            <li><a href="{{ route('admin.judul.index')}}">Judul Pembelajaran</a></li>
            <li><a href="{{ route('admin.warning.index')}}">Early Warning</a></li>
          </ul>
          @endrole

          {{-- instruktur  --}}
          @role('instruktur')
          <ul class="submenu">
            <li><a href="{{ route('instruktur.judul.index')}}">Judul Pembelajaran</a></li>
          </ul>
          @endrole
        </li>

        {{-- Data Diri --}}
        {{-- <li>
          <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i><span> Instruktur <span class="float-right menu-arrow">
            <i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
              <li><a href="#">Data diri</a></li>
            </ul>
        </li> --}}

        {{-- Data Instruktur (admin) --}}
        @role('super-admin')
        <li>
          <a href="{{ route('admin.instruktur.index') }}" class="waves-effect">
            <i class="fas fa-users"></i><span> Data Instruktur </span>
          </a>
        </li>
        @endrole

        {{-- Data Penyusun (admin) --}}
        @role('super-admin')
        <li>
          <a href="{{ route('admin.penyusun.index') }}" class="waves-effect">
            <i class="fas fa-users"></i><span> Data Penyusun </span>
          </a>
        </li>
        @endrole

        {{-- Evaluasi Instruktur (admin) --}}
        @role('super-admin')
        <li>
          <a href="javascript:void(3);" class="waves-effect"><i class="fab fa-readme"></i>
            <span> Evaluasi Level Satu <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i>
            </span></span>
          </a>
          <ul class="submenu">
            <li><a href="{{ route('admin.evaluasi.terbuka') }}">Evaluasi Terbuka</a></li>
            <li><a href="{{ route('admin.evaluasi.tertutup') }}">Evaluasi Tertutup</a></li>
          </ul>
        </li>
        @endrole

        {{-- Sertifikasi (instruktur) --}}
        @role('instruktur')
        <li>
          <a href="javascript:void(2);" class="waves-effect"><i class="far fa-id-card"></i>
            <span> Sertifikasi <span class="float-right menu-arrow"> <i class="mdi mdi-plus"></i></span> </span>
          </a>
          <ul class="submenu">
            <li><a href="{{ route('instruktur.kompetensi.index') }}">Kompetensi</a></li>
            <li><a href="{{ route('instruktur.bidang.index') }}">Bidang</a></li>
          </ul>
        </li>
        @endrole

        {{-- Authentikasi (admin) --}}
        @role('super-admin')
        <li>
          <a href="javascript:void(3);" class="waves-effect"><i class="mdi mdi-settings"></i>
            <span> Authtentikasi <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span>
          </a>
          <ul class="submenu">
            <li><a href="{{ route('admin.users.index') }}">User</a></li>
          </ul>
        </li>
        @endrole
      </ul>

    </div>
    <!-- ./Sidemenu -->

  <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
