

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/argon.css')}}" type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{asset('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
                </a>
            </div>
            @php
            $currentRouteName = \Illuminate\Support\Facades\Route::getCurrentRoute()->getName();
            @endphp
            <div class="navbar-inner">
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{$currentRouteName === 'order.sended' ? 'active' : ''}}"
                                href="{{route('order.sended')}}">
                                <i class=" ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Produtos Criados</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$currentRouteName === 'order.received' ? 'active' : ''}}"
                                href="{{route('order.received')}}">
                                <i class=" ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Produtos Recebidos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$currentRouteName === 'product.index' ? 'active' : ''}}" href="
                                {{route('product.index')}}">
                                <i class="ni ni-box-2 text-primary"></i>
                                <span class="nav-link-text">Produtos</span>
                            </a>
                        </li>
                    </ul>
                    <hr class="my-3">
                </div>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center  ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a data-channel="notification-channel"
                                class="nav-link {{ ($countNotifications ? 'pulse' : '') }}" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <div class="px-3 py-3">
                                    @if($countNotifications)
                                    <h6 data-channel="notification-channel" class="text-sm text-muted m-0">
                                        Você tem <strong class="text-primary">{{$countNotifications}}</strong> novo(s)
                                        pedido(s).
                                    </h6>
                                    @else
                                    <h6 data-channel="notification-channel" class="text-sm text-muted m-0">Você não tem
                                        novos pedidos.</h6>
                                    @endif
                                </div>
                                <div data-channel="notification-channel" class="list-group list-group-flush">
                                    @foreach($resumeNotifications as $order)
                                    <a href="{{route("product.client.productDetails", ['id' => $order->id])}}"
                                        class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder"
                                                    src="{{asset("assets/img/profile/{$order->user->image}")}}"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">{{$order->user->name}}</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>Pedido feito em: {{$order->created_at}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>

                                <a href="{{route('order.sended')}}"
                                    class="dropdown-item text-center text-primary font-weight-bold py-3">Ver
                                    todos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder"
                                            src="{{url('assets/img/profile', Auth::user()->image)}}">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 id="greeting" class="text-overflow m-0">...</h6>
                                </div>

                                <a href="{{route('profile.edit')}}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Editar Perfil</span>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="{{route('logout')}}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Sair</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4">
                        <div class="text-right">
                            <a class="btn btn-neutral" href="{{route('product.create')}}">Incluir Produto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-12">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">HotFood</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <script src="{{asset('assets/js/argon.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
