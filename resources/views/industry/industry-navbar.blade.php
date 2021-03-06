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
                    <a id="adminNavSite" class="nav-link nav-hover" href="{{url('/industry/industry')}}" id="navbarSite" role="button" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-envelope mt-1"></i>
                        ارتباط با دانشگاه
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/industry/jobs')}}" id="navbarTicket" role="button">
                        <i class="fa fa-money mt-1"></i>
                        فرصت های شغلی
                        <span class="new-ticket"></span>
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/industry/profile')}}" id="navbarTicket" role="button">
                        <i class="fa fa-key mt-1"></i>
                        تغییر رمز عبور
                        <span class="new-ticket"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

