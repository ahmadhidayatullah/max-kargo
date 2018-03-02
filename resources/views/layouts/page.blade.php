<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <title>Max Kargo</title>
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="app-url" content="{{ url('/') }}">
    
    {{-- Core Css --}}
    <link rel="stylesheet" href="{{ asset('css/yeti.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sticky-footer-navbar.css') }}">
    
    {{-- Fonts --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">Max Kargo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ set_active('index') }}">
                        <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="nav-item {{ set_active('search') }}">
                        <a class="nav-link" href="{{ route('search') }}">Telusur</a>
                    </li>
                    <li class="nav-item {{ set_active('payment') }}">
                        <a href="{{ route('payment') }}" class="nav-link">Pembayaran</a>
                    </li>
                    <li class="nav-item {{ set_active('cost') }}">
                        <a class="nav-link" href="{{ route('cost') }}">Tarif</a>
                    </li>
                    <li class="nav-item {{ set_active('commodity') }}">
                        <a class="nav-link" href="{{ route('commodity') }}">Commodity</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="jumbotron">
        <p style="text-align:center;"><img src="{{asset('img/logo.png')}}" alt="" style="width:15%;"></p>
        <h1 class="text-center">JASA PENGIRIMAN BARANG TIMIKA PAPUA</h1>
        <p class="text-center">Minta penawaran, Transaksi langsung dan Beri ulasan</p>
    </div>
    
    @yield('content')
    
    <br>
    
    <footer class="footer">
        <div class="container">
            <span class="text-muted">&copy; {{ date('Y') }} Max Kargo</span>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    @yield('ajax')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @yield('page-script')
    @yield('modal')
</body>
</html>
