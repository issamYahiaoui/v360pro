<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" src="{{asset('dashboard/images/logo-icon.png')}}">
    <title>V360 PRO</title>

    <!-- page css -->
    <link href="{{asset('dashboard/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dashboard/css/style.min.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">V360 PRO</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register" style="background-image:url({{asset('dashboard/images/background/login-register.jpg')}});" >
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <h3 class="box-title m-b-20">Login to V360ProAgent.com</h3>
                    <div class="form-group row">
                        <div class="col-xs-2" style="width: 20% ; padding: 5px">
                            <select name="code" class="form-control">
                                <option value="+65">+65</option>
                                <option value="+60">+60</option>
                                <option value="+62">+62</option>
                            </select>
                        </div>
                        <div class="col-xs-8" style="width: 80% ;padding: 5px ">

                            <input  type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  placeholder="Phone" name="phone" value="{{ old('phone') }}" required> </div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"   placeholder="Password" name="password" value="{{ old('password') }}" required> </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                {{--<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-danger btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="form-group m-b-0">
                        @if(count($errors->all())>0)
                            <div class="alert alert-danger text-center col-md-12 ">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                                <ul class="list-unstyled text-center">
                                    @foreach($errors->all() as $error)
                                        <li class="text-center">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('dashboard/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('dashboard/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('dashboard/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>

</body>

</html>