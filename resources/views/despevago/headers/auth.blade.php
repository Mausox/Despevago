<div class="row nav-size navbar-fixed">
        <nav class="blue darken-4 content">
            <div class="nav-wrapper brand-top">
                <div class="container">
                    <a href="{{ url('/') }}" class="left valign-wrapper content">
                        <img src="{{ asset('img/logo/logo_brand.png') }}" width="auto" height="30" alt="">
                    </a>
                    <ul class="right">
                        @guest
                        <li>
                            <a class="valign-wrapper content" href="{{ route('login') }}">
                                {{ __('Sign in') }}
                            </a>
                        </li>
                        <li>
                            <a class="valign-wrapper content important" href="{{ route('register') }}">
                                {{ __('Sign up') }}
                            </a>
                        </li>
                        @else
                        
                        <li>
                            <a class="valign-wrapper content" href="{{route('user.shopping_cart')}}">
                                <i class="material-icons left">add_shopping_cart</i>
                                Shopping Cart
                            </a>
                        </li>
                        <li>
                                <a class="valign-wrapper content">
                                    <i class="material-icons left">attach_money</i>
                                    {{ Auth::user()->current_balance}}

                                </a>
                            </li>
                        <li class="{{ request()->is('user/profile') ? 'active' : ''}}">
                            <a class="valign-wrapper content" href="{{ route('user.profile') }}">
                                <i class="material-icons">person</i>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>
                        </li>
                        <li>
                            <a class="valign-wrapper content" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <i class="material-icons">exit_to_app</i>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>