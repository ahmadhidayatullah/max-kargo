<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="app-url" content="{{ url('/') }}">

    <title>Max Kargo</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project -->
    {{-- <link href="{{ asset('css/demo.css') }}" rel="stylesheet" /> --}}

    <!--  Fonts and icons     -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">

            <!--
                Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
            -->

            <div class="logo">
                <a href="{{ route('index') }}" class="simple-text logo-mini">
                    MK
                </a>

                <a href="{{ route('index') }}" class="simple-text logo-normal">
                    Max Kargo
                </a>
            </div>

            @include('layouts.partials.main-sidebar')
        </div>

        <div class="main-panel">
    		    @include('layouts.partials.main-header')

            @yield('content')

            @include('layouts.partials.main-footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  	<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
  	<script src="{{ asset('js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  	{{-- <!--  Checkbox, Radio & Switch Plugins -->
  	<script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

  	<!--  Charts Plugin -->
  	<script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script> --}}

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    <!--  Plugin for DataTables.net  -->
	  <script src="{{ asset('js/jquery.datatables.js') }}"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
  	<script src="{{ asset('js/paper-dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#btn-logout").click(function () {
                $("#form-logout").submit();
            });
        });
    </script>

    @yield('page_script')

    @yield('modal')

</body>
</html>
