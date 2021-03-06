<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"> {{--
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles (bootstrap4.1.3)-->
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('startbootstrap-sb-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <!-- Custom fonts for this template-->
    <link href="{{ asset('startbootstrap-sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('startbootstrap-sb-admin/css/sb-admin.css') }}" rel="stylesheet"> {{-- datetime picker --}}
    {{-- <link href="{{ asset('datetimepicker/bootstrap-datetimepicker.css') }}" rel="stylesheet"> --}}

    <style type="text/css" media="screen">
        .table{
            font-size: 14px;
        }
        .marker{
            background-color: yellow;
        }
        input[type="radio"]{
            width: 15px;
            height: 15px;
            margin-bottom: 12px;
            margin-right: 5px;
        }

        figure {
          max-width: 100%;
          text-align: center;
          font-style: italic;
          font-size: smaller;
          text-indent: 0;
          border: thin silver solid;
          margin-right : 0.5em;
          margin-left : 0.5em;
          margin-bottom : 0.5em;
          margin-top : 0.5em;
          padding: 0.5em;
        }
        .shw-news img{
            max-width: 80%;
            height: auto;
        }
    </style>


</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="{{ url('/') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e9/Lambang_Kemdikbud.png" height="50">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="btn btn-link btn-sm text-white" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <ul class="navbar-nav ml-auto">
        </ul>

        <!-- Navbar link : profile, logout, -->
        <ul class="navbar-nav mr mr-md-0">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user-circle"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="/home">Dashboard</a>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

            @endguest
        </ul>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts._sidebar_app') 
        {{-- content --}}
        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- Page Content -->
                @yield('content')
            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Default UNJ 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('startbootstrap-sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('startbootstrap-sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    


    <!-- Page level plugin JavaScript-->
    {{-- <script src="{{ asset('startbootstrap-sb-admin/vendor/chart.js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('startbootstrap-sb-admin/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('startbootstrap-sb-admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    {{-- datetime picker --}}
    {{-- <script src="{{ asset('datetimepicker/moment-with-locales.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('datetimepicker/bootstrap-datetimepicker.js') }}"></script> --}}
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('startbootstrap-sb-admin/js/sb-admin.min.js') }}"></script>

    <!-- Demo scripts for this page-->
    {{-- <script src="{{ asset('startbootstrap-sb-admin/js/demo/datatables-demo.js') }}"></script> --}} 
    {{-- <script src="{{ asset('startbootstrap-sb-admin/js/demo/chart-area-demo.js') }}"></script> --}} 
    @yield('add_js')

</body>

</html>