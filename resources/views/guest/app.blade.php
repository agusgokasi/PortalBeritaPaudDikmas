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
        <!-- Light Box -->
        <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('MDB-Free_4.8.7/css/mdb.css') }}" rel="stylesheet">

        <style type="text/css" media="screen">

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
            
            .map-container{
                overflow:hidden;
                /* padding-bottom:56.25%; */
                position:relative;
                height:0;
            }
            .map-container iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
            }
            
            .multi-item-example > .item {
                position: relative;
                display: none;
                -webkit-transition: 0.1s ease-in-out left;
                -moz-transition: 0.1s ease-in-out left;
                -o-transition: 0.1s ease-in-out left;
                transition: 0.1s ease-in-out left;
            }
            .back-to-top {
                cursor: pointer;
                position: fixed;
                bottom: 20px;
                right: 20px;
                display:none;
            }

            /* counter */
            .counter {
                padding: 10px 0;
            }

            .count-title {
                font-size: 25px;
                font-weight: normal;
                margin-top: 10px;
                margin-bottom: 0;
                text-align: center;
            }

            .count-text {
                font-size: 13px;
                font-weight: normal;
                margin-top: 10px;
                margin-bottom: 0;
                text-align: center;
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

        @yield('add_css')

    </head>

    <body class="bg">
    
        @include('welcome._navbar_welcome')
        @include('welcome._navbar_welcome_2')
        @include('welcome._navbar_welcome_3')
        
        @yield('content')


        @include('welcome._footer')

        <a id="back-to-top" href="#" class="btn btn-warning btn-lg back-to-top rounded-circle" role="button" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"><i class="fas fa-angle-up"></i></span></a>
        
        

        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/jquery-3.4.1.min.js') }}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/popper.min.js') }}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('MDB-Free_4.8.7/js/mdb.min.js') }}"></script>

        <script type="text/javascript">
        $(document).ready(function(){
             $(window).scroll(function () {
                    if ($(this).scrollTop() > 50) {
                        $('#back-to-top').fadeIn();
                    } else {
                        $('#back-to-top').fadeOut();
                    }
                });
                // scroll body to 0px on click
                $('#back-to-top').click(function () {
                    $('#back-to-top').tooltip('hide');
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
                
                $('#back-to-top').tooltip('show');

        });
            
        </script>

        <script type="text/javascript" src="{{ asset('js/counter.js') }}"></script>

        @yield('add_js')

    </body>
</html>
