<!--Author: Santiago Pulgarin-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Home Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="sticky-top">

            <nav class="navbar navbar-expand-xl bg-light navbar-light" id="navbar-1">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home.index') }}">
                        <img src="{{ asset('images/Logo-Agricolae.png') }}" alt="Logo" style="width: 200px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto">
                            <form class="form-inline" action="">
                                <input class="form-control mr-sm-2" type="text" placeholder="@lang('messages.search')">
                                <button class="btn btn-success"  id="search" type="submit"><i class="fa fa-fw fa-search"></i></button>
                            </form>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i>@lang('messages.login')</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>@lang('messages.account')</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link text-light" href="{{ route('user.show') }}">@lang('messages.myAccount')</a>
                                    <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('product.cart') }}"><i class="fa fa-fw fa-shopping-cart"></i>@lang('messages.cart')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#" id="wishlistButton" name="wishlistButton" value="Wish List"><i class="fa fas fa-heart"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-language"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" selected href="{{ route('language.setLanguage', 'es') }}">@lang('messages.spanish')</a>
                                    <a class="dropdown-item" href="{{ route('language.setLanguage', 'en') }}">@lang('messages.english')</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <nav class="navbar navbar-expand-xl bg-custom navbar-dark" id="navbar-2">
                <div class="container">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{ route('home.index') }}" class="level-1 trsn nav-link">@lang('messages.home')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.list_all') }}" class="level-1 trsn nav-link">@lang('messages.products')</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="level-1 trsn nav-link">@lang('messages.aboutUs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="level-1 trsn nav-link">@lang('messages.contact')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>