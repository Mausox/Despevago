<nav class="top-header navbar fixed-top navbar-expand navbar-dark blue darken-4 scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo/logo_brand.png') }}" width="auto" height="30" class="d-inline-block align-top" alt=""></a>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.shopping_cart')}}"><i class="fas fa-shopping-cart"></i> Shopping Cart</a>
            </li>

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('user.profile') }}">My account</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
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
    </div>
</nav>
<div class="aux-margin-bottom"></div>