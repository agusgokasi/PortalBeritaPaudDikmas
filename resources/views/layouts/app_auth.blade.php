<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('MDB-Free_4.8.7/css/bootstrap.css') }}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('MDB-Free_4.8.7/css/mdb.css') }}" rel="stylesheet">

        {{-- sidebar-css --}}
        <link href="{{ asset('MDB-Free_4.8.7/css/simple-sidebar.css') }}" rel="stylesheet">


    </head>

    <body class="bg">

        {{-- navbar --}}
        @include('layouts._navbar_log_in')

        <br><br><br><br>
        @yield('content')
        <br><br><br><br>
        
        <footer class="page-footer text-center font-small mdb-color darken-2 fixed-bottom wow fadeIn" style="padding: 0px">
          <div class="footer-copyright">
            © 2019 Copyright:
            <a href="https://www.paud-dikmas.kemdikbud.go.id/" target="_blank"> Defult UNJ </a> <br>
          </div>
        </footer>

        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/popper.min.js') }}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/mdb.min.js') }}"></script>

        <!-- MDB core JavaScript -->
        {{-- <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/bootstrap.bundle.js') }}"></script> --}}

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });
        </script>

    </body>
</html>