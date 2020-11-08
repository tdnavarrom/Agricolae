<!--Author: Santiago Pulgarin-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Home Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" sizes="114x100" href="{{ asset('storage/various_images/Logo-Agricolae-Tab.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customStyle.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">  
    @mapstyles
</head>
<body>
    <div id="app">
        <div class="sticky-top">

            <nav class="navbar navbar-expand-xl bg-light navbar-light" id="navbar-1">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home.index') }}">
                        <img src="{{ asset('storage/various_images/Logo-Agricolae.png') }}" alt="Logo" style="width: 200px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <form class="form" action="">
                                    <div class="input-group mt-1">
                                        <input class="form-control" type="text" placeholder="@lang('messages.search')">    
                                        <div class="input-group-append">
                                            <button class="btn btn-success" id="search" type="submit"><i class="fa fa-fw fa-search" id="search_icon"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-fw fa-user"></i>@lang('messages.login')</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>{{ Auth::user()->getName() }}</a>
                                <div class="dropdown-menu">
                                    <a class="nav-link" href="{{ route('user.show') }}">@lang('messages.myAccount')</a>
                                    <a class="nav-link" href="{{ route('order.list') }}">@lang('messages.myOrders')</a>
                                    <a class="nav-link" href="{{ route('location.list') }}">@lang('messages.myLocation')</a>
                                    <a class="nav-link" href="{{ route('wishlist.list') }}">@lang('messages.myWishList')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('messages.logout')</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                                @if (Auth::user()->getType() == "farmer")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('farmer.index') }}"><i class="fa fa-fw fa-chalkboard"></i>@lang('messages.dashboard')</a>
                                </li>
                                @endif
                            </li>
                            @endguest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.cart') }}"><i class="fa fa-fw fa-shopping-cart"></i>@lang('messages.cart')</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-language"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="nav-link" href="{{ route('language.setLanguage', 'es') }}">@lang('messages.spanish')</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="nav-link" href="{{ route('language.setLanguage', 'en') }}">@lang('messages.english')</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <nav class="navbar navbar-expand-xl bg-custom" id="navbar-2">
                <div class="container">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{ route('home.index') }}" class="nav-link nav">@lang('messages.home')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.list_all') }}" class="nav-link nav">@lang('messages.products')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.index') }}" class="nav-link nav">@lang('messages.aboutUs')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact.index') }}" class="nav-link nav">@lang('messages.contact')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sponsor.show') }}" class="nav-link nav">Sponsors</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <main>
            @yield('content')
        </main>

        <footer class="page-footer mt-5" id="footer">

            <div class="container-fluid pt-4" id="footer-links">
                <div class="row">

                    <div class="col-md-3 mx-auto text-md-center pt-5">
                        <i class="fa fa-store" id="footer_icons"></i>
                        <h6 class="subtitle">Agricolae Store</h6>
                    </div>

                    <hr class="clearfix w-100 d-md-none">

                    <div class="col-md-3 mx-auto text-md-center pt-5">
                        <i class="fa fa-envelope" id="footer_icons"></i>
                        <h6 class="subtitle">agricolae-support@gmail.com</h6>
                    </div>

                    <hr class="clearfix w-100 d-md-none">

                    <div class="col-md-3 mx-auto text-md-center pt-5">
                        <i class="fa fa-phone" id="footer_icons"></i>
                        <h6 class="subtitle">+(51) 345713907</h6>
                    </div>

                    <hr class="clearfix w-100 d-md-none">

                    <div class="col-md-3 mx-auto text-md-left ">
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">@lang('messages.quick_access')</h5>
                        <hr>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('home.index') }}">@lang('messages.home')</a>
                            </li>
                            <li>
                                <a href="{{ route('product.list_all') }}">@lang('messages.products')</a>
                            </li>
                            <li>
                                <a href="#!">@lang('messages.aboutUs')</a>
                            </li>
                            <li>
                                <a href="#!">@lang('messages.contact')</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <hr>

            <ul class="list-unstyled list-inline text-center mb-0 pb-2" id="social_icons">
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-ig mx-1">
                        <i class="fab fa-instagram"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn-floating btn-li mx-1">
                        <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
            </ul>

        </footer>

    </div>

    @mapscripts
    
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>