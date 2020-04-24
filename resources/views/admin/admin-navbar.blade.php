<nav id="adminNavbar" class="navbar navbar-expand-md navbar-dark navbar-custom">
    <div class="container-fluid mt-5">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNavbarContent"
                aria-controls="adminNavbarContent" aria-expanded="false"
                aria-label="">
            <i class="fa  fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse " id="adminNavbarContent" style="background: linear-gradient(to right, #8d0c35, #eb185c) !important; border-radius: 5px">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto mr-auto " style="direction: rtl !important;">
                <li class="dropdown nav-item mx-2">
                    <a id="adminNavSite" class="nav-link dropdown-toggle nav-hover" href="{{url('/admin/admin')}}" id="navbarSite" role="button" aria-haspopup="true" aria-expanded="false" >
                        <i class="fa fa-globe mt-1"></i>
                        مدیریت سایت
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/admin')}}">اسلایدر سایت</a>
                        <a class="dropdown-item" href="{{url('/admin/about-hamgam')}}">درباره سامانه همگام</a>
                        <a class="dropdown-item" href="{{url('/admin/question')}}">سوالات متداول</a>
                        <a class="dropdown-item" href="{{url('/admin/connection')}}">راه های ارتباطی و لینک های مرتبط سامانه</a>
                        <a class="dropdown-item" href="{{url('/admin/inquery')}}">سوالات و درخواست های دریافتی</a>
                        <a class="dropdown-item" href="{{url('/admin/managers')}}">مدیران معاونت پژوهشی</a>
                        <a class="dropdown-item" href="{{url('/admin/news')}}">اخبار و اطلاعیه</a>
                        {{--                        <a class="dropdown-item" href="{{url('/admin/explanation')}}">توصیحات هر بخش</a>--}}

                    </div>
                </li>
                <li class="dropdown nav-item mt-1 mx-2">
                    <a id="adminNavProfessors" class="nav-link nav-hover" href="{{url('/admin/guidance')}}" role="button"   aria-expanded="false">
                        <i class="fa fa-chalkboard-teacher mt-1"></i>
                        هدایت شغلی
                    </a>
                    <div class="dropdown-menu mr-5" aria-labelledby="navbarSite" style="">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/job-ads')}}">معرفی فرصت های شغلی</a>
                        <a class="dropdown-item" href="{{url('/admin/jobs')}}">شغل های مرتبط با رشته</a>
                        <a class="dropdown-item" href="{{url('/admin/consult')}}">مشاوره</a>
                        <a class="dropdown-item" href="{{url('/admin/change-field')}}">ضوابط و شرایط تغییر رشته</a>
                    </div>
                </li>
                <li  class="dropdown nav-item mt-1 mx-2">
                    <a id="adminNavUsers" class="nav-link nav-hover" href="{{url('/admin/skill-learning')}}" role="button" >
                        <i class="fa fa-users-class mt-1"></i>
                        مهارت آموزی
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" hskill-couresref="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/skill-courses')}}">دوره های مهارتی</a>
                        <a class="dropdown-item" href="{{url('/admin/free-courses')}}">دوره های آزاد</a>
                        <a class="dropdown-item" href="{{url('/admin/course-offer')}}">پیشنهاد دوره</a>
                        <a class="dropdown-item" href="{{url('/admin/schedule')}}">ترم بندی دورهای مهارتی</a>
                    </div>
                </li>
                <li class="navbar-ticket nav-item  mx-2">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/admin/gathering')}}" id="navbarTicket" role="button">
                        <i class="fa fa-ticket mt-1"></i>
                        گردهمایی
                        <span class="new-ticket"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/workshop')}}">کارگاه های آموزشی</a>
                        <a class="dropdown-item" href="{{url('/admin/visit-industries')}}">بازدید از صنایع</a>
                        <a class="dropdown-item" href="{{url('/admin/invite-industries')}}">دعوت از صاحبان صنایع</a>
                    </div>
                </li>
                <li class="navbar-ticket nav-item  mx-2">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/admin/idea')}}" id="navbarTicket" role="button">
                        <i class="fa fa-ticket mt-1"></i>
                        ایده ها
                        <span class="new-ticket"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/idea-support')}}">ایده و حمایت</a>
                        <a class="dropdown-item" href="{{url('/admin/idea/festivals')}}">جشنواره ها</a>
                        <a class="dropdown-item" href="{{url('/admin/startup')}}">تشکیل گروه های استارت آپی</a>
                    </div>
                </li>
                <li class="navbar-ticket nav-item  mx-2">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="{{url('/admin/success')}}" id="navbarTicket" role="button">
                        <i class="fa fa-ticket mt-1"></i>
                        موفقیت
                        <span class="new-ticket"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        {{--<a class="dropdown-item" href="{{url('/admin/idea-support')}}">الگوهای برتر اشتغال</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/success/graduation-jobs')}}">فارغ التحصیلان شاغل</a>
                        <a class="dropdown-item" href="{{url('/admin/success/startups')}}">گروه های استارت آپی دانشگاه</a>
                    </div>
                </li>
                <li class="navbar-ticket nav-item  mx-2">
                    <a id="adminNavTickets" class="nav-link navbar-ticket-a nav-hover" href="#" id="navbarTicket" role="button">
                        <i class="fa fa-ticket mt-1"></i>
                        مدیریت کاربران
                        <span class="new-ticket"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarSite">
                        {{--<a class="dropdown-item" href="#">دوره های مهارتی</a>--}}
                        <a class="dropdown-item" href="{{url('/admin/users/student')}}">دانشجویان</a>
                        <a class="dropdown-item" href="{{url('/admin/users/master')}}">اساتید</a>
                        <a class="dropdown-item" href="{{url('/admin/users/consult')}}">مشاور</a>
                        <a class="dropdown-item" href="{{url('/admin/users/forums')}}">انجمن ها</a>
                        <a class="dropdown-item" href="{{url('/admin/industries')}}">صنایع</a>
                        <a class="dropdown-item" href="{{url('/admin/performance-report')}}">گزارش های عملکرد</a>
                    </div>
                </li>
                <li  class="dropdown nav-item mx-2 btn-primary">
                    <a id="adminNavUsers" class="nav-link" href="{{url('/admin/backup')}}" role="button" >
                        <i class=""></i>
                        ایجاد فایل پشتیبان و دانلود
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>