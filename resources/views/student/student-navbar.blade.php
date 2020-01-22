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
                    <a id="adminNavSite" class="nav-link dropdown-toggle nav-hover" href="#" id="navbarSite" role="button" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-book mt-1"></i>
                        آموزش
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/student/student')}}">دوره های مهارتی</a>
                        <a class="dropdown-item" href="{{url('/student/workshop')}}">کارگاه های آموزشی</a>
                        <a class="dropdown-item" href="{{url('/student/free-course')}}">دوره های آزاد</a>

                    </div>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/student/consult')}}" id="navbarTicket" role="button">
                        <i class="fa fa-graduation-cap mt-1"></i>
                        مشاوره
                        <span class="new-ticket"></span>
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/student/profile')}}" id="navbarTicket" role="button">
                        <i class="fa fa-file mt-1"></i>
                        پروفایل
                        <span class="new-ticket"></span>
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/student/contact')}}" id="navbarTicket" role="button">
                        <i class="fa fa-male mt-1"></i>
                        ارتباط با مدیریت
                        <span class="new-ticket"></span>
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/student/idea')}}" id="navbarTicket" role="button">
                        <i class="fa fa-graduation-cap mt-1"></i>
                        ایده و حمایت
                        <span class="new-ticket"></span>
                    </a>
                </li>
                <li class="navbar-ticket nav-item  mx-2 mr-3">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/student/festivals')}}" id="navbarTicket" role="button">
                        <i class="fa fa-graduation-cap mt-1"></i>
                        جشنواره ها
                        <span class="new-ticket"></span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>