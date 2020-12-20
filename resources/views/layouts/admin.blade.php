<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('images/fav.png') }}" type="image/x-icon">
    {{-- <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script> --}}
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/dataTables.css')}}">
    <link href="{{asset('admin/css/tabel.css')}}" rel="stylesheet">
    <script type="text/javascript" charset="utf8" src="{{asset('admin/js/dataTables.js')}}"></script>
    <script src="{{asset('admin/js/tabel.js')}}"></script>
    @yield('head')
    <style>
        #headerJudul{
            margin-right: 250px;
        }
        @media(max-width:600px){
            #headerJudul{
            margin-right: 40px;
        }
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo">@yield('role')</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li><h1 id="headerJudul">@yield('judul')</h1></li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{Auth::user()->image_path}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{Auth::user()->name}}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{url('admin/history')}}">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('logout')}}" onclick="return confirm('Are you sure?')">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="{{url('logout')}}" onclick="return confirm('Are you sure?')">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{Auth::user()->image_path}}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            @if (Auth::user()->hasRole('admin'))
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin-page')}}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/profile')}}">
                    <span class="menu-title">Profile</span>
                    <i class="mdi mdi-account menu-icon"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/list-pendaftar')}}">
                    <span class="menu-title">List Pendaftar</span>
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('admin/kotak-masuk')}}">
                    <span class="menu-title">Kotak Masuk</span>
                    <i class="mdi mdi-message menu-icon"></i>
                  </a>
                </li>
            @endif
            @if (Auth::user()->hasRole('superUser'))
            <li class="nav-item">
              <a class="nav-link" href="{{url('super-page')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('super/profile')}}">
                <span class="menu-title">Profile</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('super/tambah-admin')}}">
                <span class="menu-title">Tambah Admin</span>
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('super/admin-activity')}}">
                <span class="menu-title">Admin Activity</span>
                <i class="mdi mdi-cached menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('super/laporan')}}">
                <span class="menu-title">Laporan</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
              </a>
            </li>
            @endif
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <a href="{{url('logout')}}" onclick="return confirm('are you sure ?')" class="btn btn-block btn-lg btn-gradient-danger mt-4">Logout</a>
              </span>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @yield('content')


          </div>
          <!-- content-wrapper ends -->
          {{-- <!-- partial:../../partials/_footer.html -->
          <footer class="footer text-center">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="http://spydercode.site/" target="_blank">Spydercode</a>. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial --> --}}
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script> --}}
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/misc.js')}}"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    @yield('custom-script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>
