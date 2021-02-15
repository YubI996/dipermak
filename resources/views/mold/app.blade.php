<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

  <title>Dipermak</title>
  @yield('css')
  @yield('script')
  @include('mold.css')
  @include('mold.script')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
          </li>
              {{-- <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
              </li> --}}
        </ul>

        {{--<!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> --}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto mb-0">
          <!-- Messages Dropdown Menu -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Mesin Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li> --}}
          <!-- Notifications Dropdown Menu -->
          {{-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li> --}}
          <!-- User Account Menu -->
          <li class="nav-item dropdown user-menu mx-auto">
              <!-- Menu Toggle Button -->
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbarurl('storage\\'.Auth::user()->foto)-->
                  <img src="{{url('storage\\'.Auth::user()->foto)}}"
                        class="user-image mx-auto hidden-xs" alt="User Image" height="12%"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                      <img src="{{url('storage\\'.Auth::user()->foto)}}"
                            class="img-circle" alt="{{ Auth::user()->name }}"/>
                      <p>
                          {{ Auth::user()->name }}
                          <small>Member since {{ empty(Auth::user()->created_at) ? "-" : Auth::user()->created_at->format('M. Y')}}</small>
                          
                      </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer d-flex justify-content-between">
                      <div class="pull-left">
                          <a href="#" class="btn btn-outline-primary">Profile</a>
                      </div>
                      <div class="ml-auto">
                          <a href="{{ url('/logout') }}" class="btn btn-outline-danger"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Sign out
                          </a>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              </ul>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
          <img src="../../img/d.png" alt="Dipermak Logo" class="brand-image  elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Dipermak</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src={{{isset(Auth::user()->name) ?  "../../storage\\".Auth::user()->foto:"../../img/avataaars.svg"}}} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name :"Unauthorized" }}}</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        {{-- SideBar Menu --}}
        @include('mold.side')
        {{-- SideBar Menu End --}}
        </div>
        <!-- /.sidebar -->  
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        {{-- <section class="content-header d-flex justify-content-between"> --}}
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Dipermak</h1>
              </div>
              {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Advanced Form</li>
                </ol>
              </div> --}}
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content p-auto"> 
          <div class="container-fluid">
            <div class="card card-default">
              <div class="card-header ">
                <h3 class="card-title position-relative">
                  @yield('content-title')
                </h3>
                
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col align-self-center">
                  @yield('content')
                </div>
                
              </div>
                <!-- /.row -->
            </div>
              <!-- /.card-body -->
              <div class="card-footer">
                @yield('content-footer')
              </div>
            </div>
          </div>
          </section>
            
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <strong>Copyright &copy; 2021 Dinsos Kota Bontang.</strong> |Template by <a href="https://adminlte.io">AdminLTE.io</a>
            {{-- <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> Dinsos Kota Bontang.</strong> |Template by <a href="https://adminlte.io">AdminLTE.io</a> --}}
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


      <!-- datatable -->
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    

</body>
</html>
