<nav id="adminNavbar" class="navbar navbar-expand-md navbar-dark navbar-custom">
    <div class="container-fluid mt-5">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbarContent"
                aria-controls="adminNavbarContent" aria-expanded="false"
                aria-label="">
            <i class="fa  fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse " id="adminNavbarContent" style="background: linear-gradient(to right, #8d0c35, #eb185c) !important; border-radius: 5px">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto " style="direction: rtl !important;">
                <li class="dropdown nav-item mx-2">
                    <a id="adminNavSite" class="nav-link dropdown-toggle nav-hover" href="{{url('/forum/forum')}}" id="navbarSite" role="button" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-book mt-1"></i>
                        پیشنهادات
                    </a>

                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/forum/profile')}}" id="navbarTicket" role="button">
                        <i class="fa fa-graduation-cap mt-1"></i>
                        تغییر رمز عبور
                        <span class="new-ticket"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</nav>