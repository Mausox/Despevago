<nav class="blue darken-3 nav-center">
    <div class="nav-wrapper container">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons left">menu</i>MENU</a>
        <ul class="hide-on-med-and-down">
            <li class="{{ request()->is('activities') ? 'active' : ''}}"><a href="/activities"><i class="icon-center material-icons left">local_activity</i>Activities</a></li>
            <li class="{{ request()->is('hotels/search','hotels/search_results') ? 'active' : ''}}"><a href="/hotels/search"><i class="icon-center material-icons left">hotel</i>Accommodation</a></li>
            <li class="{{ request()->is('flights') ? 'active' : ''}}"><a href="/flights"><i class="icon-center material-icons left">local_airport</i>Flights</a></li>
            <li class="{{ request()->is('packages') ? 'active' : ''}}"><a href="/packages"><i class="icon-center material-icons left">work</i>Packages</a></li>
            <li class="{{ request()->is('searchCarCompanies') ? 'active' : ''}}"><a href="/searchCarCompanies"><i class="icon-center material-icons left">directions_car</i>Cars</a></li>
            <li class="{{ request()->is('transfers') ? 'active' : ''}}"><a href="/transfers/search"><i class="icon-center material-icons left">airport_shuttle</i>Transfers</a></li>
        </ul>
    </div>
</nav>
    
<ul class="sidenav" id="mobile-demo">
    <li class="{{ request()->is('activities') ? 'active' : ''}}"><a href="/activities"><i class="icon-center material-icons left">local_activity</i>Activities</a></li>
    <li class="{{ request()->is('hotels/search','hotels/search_results') ? 'active' : ''}}"><a href="/hotels/search"><i class="icon-center material-icons left">hotel</i>Accommodation</a></li>
    <li class="{{ request()->is('flights') ? 'active' : ''}}"><a href="/flights"><i class="icon-center material-icons left">local_airport</i>Flights</a></li>
    <li class="{{ request()->is('packages') ? 'active' : ''}}"><a href="/packages"><i class="icon-center material-icons left">work</i>Packages</a></li>
    <li class="{{ request()->is('searchCarCompanies','') ? 'active' : ''}}"><a href="/searchCarCompanies"><i class="icon-center material-icons left">directions_car</i>Cars</a></li>
    <li class="{{ request()->is('transfers') ? 'active' : ''}}"><a href="/transfers"><i class="icon-center material-icons left">airport_shuttle</i>Transfers</a></li>
</ul>

      
              