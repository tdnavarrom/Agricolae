<!--Author: Santiago Pulgarin-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Home Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">  
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
                                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>{{ Auth::user()->getName() }}</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link text-light" href="{{ route('user.show') }}">@lang('messages.myAccount')</a>
                                    <a class="nav-link text-light" href="{{ route('wishlist.list') }}">@lang('messages.myWishList')</a>
                                    <a class="nav-link text-light" href="{{ route('location.list') }}">@lang('messages.myLocation')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                                @if (Auth::user()->getType() == "farmer")
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('farmer.index') }}"><i class="fa fa-fw fa-chalkboard"></i>@lang('messages.dashboard')</a>
                                </li>
                                @endif
                            </li>
                            @endguest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('product.cart') }}"><i class="fa fa-fw fa-shopping-cart"></i>@lang('messages.cart')</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-language"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('language.setLanguage', 'es') }}">@lang('messages.spanish')</a>
                                    <div class="dropdown-divider"></div>
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
                            <li class="nav-item dropdown">
                                <a href="#" class="level-1 trsn nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">@lang('messages.products')</a>
                                <div class="dropdown-menu" id="categories">
                                    <a class="nav-link ddown-custom text-light" href="{{ route('product.list_cat','legumes') }}">@lang('messages.legumes')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link ddown-custom text-light" href="{{ route('product.list_cat', 'tubers') }}">@lang('messages.tubers')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link ddown-custom text-light" href="{{ route('product.list_cat', 'veggies') }}">@lang('messages.veggies')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link ddown-custom text-light" href="{{ route('product.list_cat', 'fruits') }}">@lang('messages.fruits')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link  text-light" href="{{ route('product.list_cat', 'nuts') }}">@lang('messages.nuts')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link ddown-custom text-light" href="{{ route('product.list_cat', 'cereals') }}">@lang('messages.cereals')</a>
                                
                                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>