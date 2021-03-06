<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"> {{--
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('MDB-Free_4.8.7/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Light Box -->
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('MDB-Free_4.8.7/css/mdb.css') }}" rel="stylesheet">

    <style type="text/css" media="screen">
        .verticalLine {
            border-left: 2px solid green;
        }
        
        .bawah {
            margin-bottom: 6px;
            display: block;
            font-size: 10px;
        }
        
        .aplik {
            display: block;
        }
        
        .bg {
            background-image: url("{{ asset('images/background.jpg') }}");
            background-repeat: repeat;
            background-position: center;
            height: 100%;
            background-size: cover;
        }
        
        .navbar-toggler {
            position: absolute;
            top: 12px;
            right: 5px;
        }
        
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }
        
        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body class="bg">
    {{-- navbar --}} @include('welcome._navbar_welcome') @include('welcome._navbar_welcome_2') @include('welcome._navbar_welcome_3') @include('struktur_organisasi.jumbotron')

    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('struktur_organisasi.content')
            </div>
            <div class="col-md-3">
                @include('welcome._socmed')
            </div>
        </div>
    </div>

    <br> @include('welcome._footer')

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/mdb.min.js') }}"></script>
    <!-- Light Box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    {{--
    <script>
        $('#modalLRFormDemo').modal("show");
    </script> --}}

</body>

</html>