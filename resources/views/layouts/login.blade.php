<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{config('app.name')}}</title>
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/argon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{mix('css/login.css')}}" type="text/css">
</head>

<body class="bg-default">
    @yield('content')
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="dashboard.html">
                                <img src="{{asset('assets/img/brand/blue.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">
                            <span class="nav-link-inner--text">Login</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">
                            <span class="nav-link-inner--text">Cadastre-se</span>
                        </a>
                    </li>
                </ul>
                <hr class="d-lg-none" />
            </div>
        </div>
    </nav>
    <footer class="py-3" id="footer-main">
        <div class="container">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-12">
                    <div class="copyright text-center ">
                        &copy; 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">HotFood</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
