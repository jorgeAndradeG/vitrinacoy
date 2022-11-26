<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Vitrina Coyhaique</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/templatemo-cyborg-gaming.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7.0.0/swiper-bundle.min.css" />

</head>

<body>
    @section('header')
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="{{ URL::asset('images/logo.png') }}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" class="active">Inicio</a></li>
                            <li><a href="/emprendimientos">Emprendimientos</a></li>
                            <!-- <li><a href="details.html">Productos</a></li> -->
                            <!-- <li><a href="profile.html">Beneficios</a></li> -->
                            @if (Route::has('login'))
                            <li></li>
                            @auth
                            <li><a href="{{ url('/perfil') }}">Mi Perfil</a></li>
                            @else
                            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                            @endif
                            @endauth

                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    @show

    @section('main')
    @show

    @section('footer')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2022 <a href="/">Vitrina Coyhaique</a>
                        <br>Coyhaique, Chile
                    </p>
                </div>
            </div>
        </div>
    </footer>
    @show
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->

    <!-- <script src="../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/vendor/bootstrap/js/bootstrap.min.js"></script> -->

    <script src="{{ URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{ URL::asset('js/isotope.min.js')}}"></script>
    <script src="{{ URL::asset('js/owl-carousel.js')}}"></script>
    <script src="{{ URL::asset('js/tabs.js')}}"></script>
    <script src="{{ URL::asset('js/popup.js')}}"></script>
    <script src="{{ URL::asset('js/custom.js')}}"></script>
</body>

</html>