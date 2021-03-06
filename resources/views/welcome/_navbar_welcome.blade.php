<nav id="#top-section"class="navbar navbar-expand-lg navbar-dark sticky-top z-depth-0" style="background-color: {{ $components[0]->background_color }}">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e9/Lambang_Kemdikbud.png" height="35" alt="mdb logo"> {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ url('/') }}">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-info-circle"></i>Profil
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('g_show_page', [ 'id' => 4 ]) }}"> Visi & Misi </a>
                      <a class="dropdown-item" href="{{ route('g_show_page', [ 'id' => 5 ]) }}"> Tugas dan Fungsi </a>
                      <a class="dropdown-item" href="{{ route('g_show_page', [ 'id' => 6 ]) }}"> Struktur Organisasi </a>
                      <a class="dropdown-item" href="{{ route('g_show_page', [ 'id' => 7 ]) }}"> Reformasi Birokrasi </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('g_show_pagel', [ 'id' => 9 ]) }}">
                        <i class="fas fa-building"></i> Vertikal
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{url('a/g')}}">
                        <i class="fas fa-th"></i> Aplikasi Paud-Dikmas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('g_show_pagel', [ 'id' => 11 ]) }}">
                        <i class="fas fa-arrow-down"></i>Unduh
                    </a>
                </li>

            </ul>



            <ul class="navbar-nav">
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login ') }} <i class="fas fa-sign-in-alt"></i> 
                        </a>
                    </li>

                @else
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>