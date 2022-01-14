<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/resources/theme/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/theme/css/style.css" type="text/css">


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__widget">
            <a href="#"><em class="fa fa-cart-plus"></em></a>
        </div>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="public/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <ul class="offcanvas__widget__add">
            <li><em class="fa fa-clock-o"></em> Week day: 08:00 am to 18:00 pm</li>
            <li><em class="fa fa-envelope-o"></em> Info.colorlib@gmail.com</li>
        </ul>
        <div class="offcanvas__phone__num">
            <em class="fa fa-phone"></em>
            <span>(+12) 345 678 910</span>
        </div>
        <div class="offcanvas__social">
            <a href="#"><em class="fa fa-facebook"></em></a>
            <a href="#"><em class="fa fa-twitter"></em></a>
            <a href="#"><em class="fa fa-google"></em></a>
            <a href="#"><em class="fa fa-instagram"></em></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="/resources/theme/img/logotipo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav">
                        <nav class="header__menu">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/cars')}}">Carros</a></li>
                                <li><a href="{{url('/about')}}">Sobre nós</a></li>
                                
                            </ul>
                        </nav>
                        <div class="header__nav__widget">
                            <div class="header__nav__widget__btn">
                                @guest
                                @if (Route::has('login'))

                                <a class="primary-btn" href="{{ route('login') }}">{{ __('Login') }}</a>

                                @endif

                                @if (Route::has('register'))

                                <a class="primary-btn" href="{{ route('register') }}">{{ __('Registo') }}</a>

                                @endif
                                @else




                                <a href="/dashboard"><i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->nome  }}
                                    {{ Auth::user()->apelido  }}
                                </a>

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>







                                @endguest

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    <!-- Js Plugins -->

</body>

</html>