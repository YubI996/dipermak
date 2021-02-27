<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> --}}

        <!-- Fonts -->
        <link href="{{asset('front/css/nunito.css')}}" rel="stylesheet">

        <!-- Styles -->

        <meta charset="utf-8" />
        <meta name="description" content="Aplikasi dipermak oleh dinsos" />
        <meta name="author" content="Yubi" />
        <title>Dipermak</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{asset('front/js/all.js')}}" ></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        @livewireScripts @livewireStyles
               
        <link href="{{ asset('front/css/styles.dashboard.css') }}" rel="stylesheet" />
        {{-- <link href="{{ asset('vendor/datatables/buttons.server-side.js') }}" rel="stylesheet" /> --}}

    </head>
    <body class="bg-banner">
        {{-- {{ asset('vendor/datatables/buttons.server-side.js') }} --}}
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content"><body id="page-top">
                <!-- Navigation-->
                <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
                    <div class="container">
                        <a class="navbar-brand js-scroll-trigger" href="#page-top">Dipermak</a>
                        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#pagu">Pagu Anggaran Kegiatan</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#target">Capaian Target Kegiatan</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#pilih">Lihat Kegiatan</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login') }}">Login</a></li>

                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Masthead-->
                <header class="masthead  text-white text-center">
                    {{-- bg-banner --}}
                    <div class="container d-flex align-items-center flex-column">
                        <!-- Masthead Avatar Image-->
                        <img class="masthead-avatar mb-5" src="/img/logo-bontang.png" alt="Logo Bontang" />
                        <!-- Masthead Heading-->
                        {{-- <h1 class="masthead-heading text-uppercase p-0 mb-0">Dinas Sosial <br>dan Pemberdayaan Masyarakat Kota Bontang</h1> --}}
                        <h1 class="masthead-heading text-uppercase p-0 mb-0">Database Informasi Pemberdayaan Masyarakat</h1>
                        <!-- Icon Divider-->
                        <div class="divider-custom divider-light">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fab fa-ethereum" ></i></div>
                            {{-- <div class="divider-custom-icon"><i class="fab fa-ethereum"></i></div> --}}
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Masthead Subheading-->
                        <p class="masthead-subheading font-weight-light mb-0">Motto - Motto - Motto         </p>
                    </div>
                </header> 
                {{-- PAGU SECTION --}}
                <section class="page-section  mb-0 pagu" id="pagu">
                {{-- bg-success--}}
                    <div class="container">
                        <!-- Portfolio Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pagu Kegiatan Tahun {{date('Y')}}</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fab fa-ethereum"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <div class="row-md-12">
                                    <div class="card">
                                        <div class="card-body w-100">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                            <div class="text-xs align-middle font-weight-bold text-primary text-uppercase">Semua Kegiatan</div>
                                            <div class="h5 font-weight-bold text-gray-800">{{'Rp'.number_format($allPagu,0,',','.')}}</div>
                                            </div>
                                            <div class="col-auto">
                                            <img src="/img/rp.svg" style="width:2rem;height:2rem;">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Pagu all--> 
                            <div class="col-md-6">
                                <div class="row-md-6 my-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col ">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sarana dan Prasarana</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{'Rp'.number_format($smartPagu,0,',','.')}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <img src="/img/rp.svg" style="width:2rem;height:2rem;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                {{-- end of capaian taget smart city --}}
                            </div>
                            <div class="col-md-6">

                                {{-- capaian target creative city --}}
                                <div class="row-md-6 my-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemberdayaan Masyarakat</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{'Rp'.number_format($greenPagu,0,',','.')}}</div>
                                            </div>
                                            <div class="col-auto">
                                            <img src="/img/rp.svg" style="width:2rem;height:2rem;">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end of capaian target creative city --}}
                              
                                    
                            </div>
                                {{-- end of capaian target green city --}}
                        </div>
                    </div>
                    
                </section>
                {{-- end of PAGU SECTION --}}
                <!-- Portfolio Section-->
                <section class="page-section  portfolio" id="target">
                    {{-- bg-warning --}}
                    <div class="container">
                        <!-- Portfolio Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Capaian Target Kegiatan Tahun {{date('Y')}}</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fab fa-ethereum"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <div class="row-md-12 ">
                                    <div class="card">
                                        <div class="card-body w-100">
                                            <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Semua Kegiatan</div>
                                                <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($allTarget,2,',','.').'%'}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$allTarget}}%" aria-valuenow="{{$allTarget}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Grid Items-->
                        <div class="row ">
                            <!-- Portfolio Item 0-->   
                            <div class="col-md-6">

                                <div class="row-md-6 my-4">
                                    <div class="card">
                                        <div class="card-body w-100">
                                            <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sarana dan Prasarana</div>
                                                <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($smartTarget,2,',','.').'%'}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$smartTarget}}%" aria-valuenow="{{$smartTarget}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row-md-6 my-4">
                                    <div class="card">
                                        <div class="card-body w-100">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pemberdayaan Masyarakat</div>
                                                    <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($greenTarget,2,',','.').'%'}}</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$greenTarget}}%" aria-valuenow="{{$greenTarget}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                </section>          
               

                <!-- About Section-->
                <section class="page-section  text-center" id="pilih">
                    {{-- bg-rt --}}
                    <div class="container">
                        <!-- About Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-white">Lihat Kegiatan RT</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom divider-light">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fab fa-ethereum"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- About Section Content-->
                        {{-- <div class="row"> --}}
                            @livewire('keg')
                            {{-- @livewire('component', ['user' => $user], key($user->id))  --}}
                        {{-- </div> --}}
                    </div>
                </section>
                <!-- Contact Section-->
                {{-- <section class="page-section bg-info text-white mb-0" id="contact">
                    <div class="container">
                        <!-- Contact Section Heading-->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Sign In</h2>
                        <!-- Icon Divider-->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon"><i class="fab fa-ethereum"></i></div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Contact Section Form-->
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                                <form method="post" action="{{ url('/login') }}">
                                    @csrf

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            {!! Form::label('email', 'E-mail : ') !!}
                                            {{-- <label>Email Address</label> 
                                            <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="masukkan alamat email." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            {!! Form::label('password', 'Password : ') !!}
                                            {{-- <label>Password</label> 
                                            <input class="form-control" id="password" type="password" placeholder="Password" required="required" data-validation-required-message="Masukkan password." />
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <br />
                                    <div id="success"></div>
                                    <div class="form-group"><button class="btn btn-primary btn-xl" id="submit" type="submit">Sign In</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <!-- Footer-->
                <footer class="footer text-center">
                    <div class="container">
                        <div class="row">
                            <!-- Footer Location-->
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Lokasi</h4>
                                <p class="lead mb-0">
                                    Jl. Moch. Roem, Gedung Graha Taman Praja, Kelurahan Bontang Lestari
                                    <br />
                                    Bontang Kode Pos-75325
                                </p>
                            </div>
                            <!-- Footer Social Icons-->
                            <div class="col-lg-4 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Around the Web</h4>
                                <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/pages/category/Government-Organization/Dinas-Sosial-dan-Pemberdayaan-Masyarakat-Kota-Bontang-108924554123363/" target="_blank"><i class="fab fa-fw fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                            </div>
                            <!-- Footer About Text-->
                            <div class="col-lg-4">
                                <h4 class="text-uppercase mb-4">Tentang Dipermak</h4>
                                <p class="lead mb-0">
                                    Dipermak adalah 
                                    <br>
                                    <a href="http://dinsos.bontangkota.go.id/"  target="_blank">Homepage DinSos Kota Bontang</a>
                                    .
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Copyright Section-->
                <div class="copyright py-4 text-center text-white">
                    <div class="container"><small>Copyright © Dipermak 2020</small></div>
                </div>
                <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
                <div class="scroll-to-top d-lg-none position-fixed">
                    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
                </div>
               
                <!-- Bootstrap core JS-->
            
            <script src="{{asset('front/js/jquery.min.js')}}"></script>
            <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
            <!-- Third party plugin JS-->
            <script src="{{asset('front/js/jquery.easing.min.js')}}"></script>
            <!-- Contact form JS-->
            <script src="{{asset('front/assets/mail/jqBootstrapValidation.js')}}"></script>
            <script src="{{asset('front/assets/mail/contact_me.js')}}"></script>
            <!-- Core theme JS-->
            <script src="{{asset('front/js/scripts.js')}}"></script>
            </body>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
