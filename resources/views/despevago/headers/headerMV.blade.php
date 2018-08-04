<header>
    <nav class="navbar navbar-expand navbar-dark blue darken-3">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item space {{ request()->is('home') ? 'active' : ''}}">
                    <a class="nav-link" href={{route('home')}}><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item space {{ request()->is('hotels') ? 'active' : ''}}">
                    <a class="nav-link active" href="{{url('/hotels')}}"><i class="fas fa-hotel"></i> Accommodation</a>
                </li>
                <li class="nav-item space {{ request()->is('flights') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-plane"></i> Flights</a>
                </li>
                <li class="nav-item space {{ request()->is('packages') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-suitcase"></i> Packages</a>
                </li>
                <li class="nav-item space {{ request()->is('activities') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i> Activities</a>
                </li>
                <li class="nav-item space {{ request()->is('cars') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-car"></i> Cars</a>
                </li>
                <li class="nav-item space {{ request()->is('transfers') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-shuttle-van"></i> Transfers</a>
                </li>

            </ul>
        </div>
    </nav>
</header>