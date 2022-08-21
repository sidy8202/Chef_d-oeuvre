<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faso Doc</title>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/css/font-awesome.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/css/jquery.mCustomScrollbar.css') }}">
</head>
 <body>
            <div id="pcoded" class="pcoded">

                @include('layouts.commissaire.navbar')   

                <div class="pcoded-main-container">
                    @include('layouts.commissaire.sidebar')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            @yield('content')
                        </div>
                    </div>

                </div>
            </div>
        
            <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/jquery/jquery.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/popper.js/popper.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
                <!-- jquery slimscroll js -->
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
                <!-- modernizr js -->
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/modernizr/modernizr.js') }}"></script>
                <!-- am chart -->
                <script src="{{ asset('asssets/dashboard/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
                <script src="{{ asset('assets/dashboard/assets/pages/widget/amchart/serial.min.js') }}"></script> 
                <!-- Chart js -->
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/chart.js/Chart.js') }}"></script>
                <!-- Todo js -->
                <script type="text/javascript " src="{{ asset('assets/dashboard/assets/pages/todo/todo.js') }}"></script>
                <!-- Custom js -->
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/pages/dashboard/custom-dashboard.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/script.js') }}"></script>
                <script type="text/javascript " src="{{ asset('assets/dashboard/assets/js/SmoothScroll.js') }}"></script>
                <script src="{{ asset('assets/dashboard/assets/js/pcoded.min.js') }}"></script>
                <script src="{{ asset('assets/dashboard/assets/js/vartical-demo.js') }}"></script>
                <script src="{{ asset('assets/dashboard/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        </body>
</html>