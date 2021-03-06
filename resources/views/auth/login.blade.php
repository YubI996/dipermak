{{-- @extends('mold.app') --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- @section('css')
        
    @endsection --}}
    <!-- Bootstrap 3.3.7 -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    {{-- <!-- Font Awesome --> --}}
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    {{-- <!-- Ionicons --> --}}
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> --}}

    {{-- <!-- Theme style --> --}}
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css"> --}}

    {{-- <!-- iCheck --> --}}
    <link rel="stylesheet" href="{{asset('css/_all.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css"> --}}
    <link rel="stylesheet" href="{{asset('/css/border-tv.css')}}"   >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body style="background: linear-gradient(to left, #348f50, #56b4d3)" class="">
    <div class="d-flex align-items-center min-vh-100">
        <div class="container-fluid">
            <div class="content">
                <div class="row row-12 justify-content-md-center">
                    <div class="col col-md-auto  align-items-center">
                            {{-- <div class="d-flex justify-content-center align-items-center" > --}}
                                <div class="p-2">
                                <div id="tv">
                                    <div class="login-logo">
                                        <a href="{{ url('/home') }}"><b>Dipermak </b>App</a>
                                    </div>
                    
                                    <!-- /.login-logo -->
                                    <div  class="login-box-body">
                                        {{-- <p class="login-box-msg"></p> --}}
                    
                                        <form method="post" action="{{ url('/login') }}">
                                            @csrf
                    
                                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                    
                                            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input type="password" class="form-control" placeholder="Password" name="password">
                                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                    
                                            </div>
                                            <div class="form-group has-feedback{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                                <div class=" d-flex justify-content-center" >
                                                    <div id = "ref" class="p-1 border border-primary rounded">{!!captcha_img('math')!!}
                                                    </div>
                                                    <button  tooltip="test" align = "center" type="button" tabindex = 100 class="btn btn-primary btn-user1 btn-block" id="refresh" width=1>
                                                        <span id="refresh" class="fa fa-repeat" aria-setsize="50"></span>
                                                        {{-- <i class="fa fa-refresh">Reload Captcha</i> --}}
                                                    </button>
                                                </div>
                                                <div class=" m-2">
                                                </div>
                                                <input type="captcha" name="captcha" class="form-control form-control-user @error('captcha') is-invalid @enderror" id="captcha" placeholder="Captcha">
                                                @if ($errors->has('captcha'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('captcha') }}</strong>
                                                </span>
                                                @endif
                    
                                            </div>
                                            <div class="row">
                                                {{-- <div class="col-xs-8">
                                                    <div class="checkbox icheck">
                                                        <label>
                                                            <input type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div> --}}
                                                <!-- /.col -->
                                                <div class="col">

                                                    <div class="col-xs-4">
                                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                                                    </div>
                                                    {{-- <a href="{{ url('/password/reset') }}">Saya lupa password</a> --}}
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </form>
                    
                                        <br>
                                        {{-- <a href="{{ url('/register') }}" class="text-center">Mendaftar</a> --}}
                    
                                    </div>
                                    <!-- /.login-box-body -->
                    
                                </div>
                                <!-- /.login-box -->
                            </div>    
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    
                            <!-- AdminLTE App -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
                    
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
                            <script>
                                $(function () {
                                    $('input').iCheck({
                                        checkboxClass: 'icheckbox_square-blue',
                                        radioClass: 'iradio_square-blue',
                                        increaseArea: '20%' // optional
                                    });
                                });

                                var base_url = window.location.origin+'/refreshcaptcha';

                                $("#refresh").click(function(){
                                    $.ajax({
                                    type:'GET',
                                    url:'refreshcaptcha',
                                    success:function(data){
                                        $(".captcha span").html(data.captcha);
                                        var container = document.getElementById("ref");
                                    var refreshContent = data;
                                    container.innerHTML = refreshContent;
                                    }
                                    });
                                });
                            </script>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
