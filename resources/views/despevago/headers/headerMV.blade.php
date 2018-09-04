<header>
    <nav class="navbar navbar-expand navbar-dark blue darken-3">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item space {{ request()->is('/hotels') ? 'active' : ''}}">
                    <a class="nav-link active" href="#"><i class="fas fa-hotel"></i> Accommodation</a>
                </li>
                <li class="nav-item space {{ request()->is('/flights') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-plane"></i> Flights</a>
                </li>
                <li class="nav-item space {{ request()->is('/') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-suitcase"></i> Packages</a>
                </li>
                <li class="nav-item space {{ request()->is('/activities') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i> Activities</a>
                </li>
                <li class="nav-item space {{ request()->is('/cars') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-car"></i> Cars</a>
                </li>
                <li class="nav-item space {{ request()->is('/transfers') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-shuttle-van"></i> Transfers</a>
                </li>
                <li class="nav-item space {{ request()->is('/rentals') ? 'active' : ''}}">
                    <a class="nav-link" href="#"><i class="fas fa-street-view"></i> Rentals</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <a href="{!! url()->previous(); !!}"> <i class="fas fa-arrow-circle-left"> Go back</i></a>
        </div>
    </nav>


</header>

