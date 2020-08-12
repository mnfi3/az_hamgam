

<!-- partial:index.partial.html -->

<div class="navigation-wrap  start-header start-style " >

    <div class="mx-3 ">
        <div class="row">
            {{--<div class="col-12 " style="max-height: 20px">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-9 mb-2 ">--}}
            {{--<a class="item-2" href="#">اطلاعیه برگزاری دوره اموش نوشتن انشا</a>--}}
            {{--<a class="item-3" href="#">اطلاعیه برگزاری کارگاه آموزش جوش ceo ceo</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3  text-white">--}}
            {{--<h6 style="font-family: Vazir;text-align: center; background:linear-gradient(to right, #8d0c35, #eb185c) !important;border-radius: 3px;padding: 3px 0px;max-width: 140px ">: آخرین اخبار و اطلاعیه ها </h6>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-12">
                <header>
                    <nav class="navbar navbar-expand-md  navbar-light ">
                        <a class="navbar-brand p-0 m-0" href="{{url('/')}}"><img src="{{asset('/img/hamgam-logo.png')}}" alt=""></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            @auth
                                <ul class="navbar-nav py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4  ">
                                        <form  method="post" action="{{route('logout')}}">
                                            @csrf
                                            <a class="nav-link" >
                                                <button class="nav-link " style="background-color: transparent ; padding: 10px 10px"  type="submit">
                                                    خروج
                                                </button>
                                            </a>
                                        </form>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link" style="font-size:13px !important" href="{{url('/home')}}">پنل کاربری</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link " style="font-size:13px !important" href="{{url('/news')}}">اخبار و اطلاعیه ها</a>
                                    </li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link "  style="font-size: 13px !important; border-color: #721c24;border: 2px #721c24 solid;border-radius: 3px;background: linear-gradient(to right, #8d0c35, #eb185c) !important;"  href="{{url('/academic-guidance/corona-consultation')}}">مشاوره سلامت روان-اجتماعی(ویژه کرونا)</a>
                                    </li>
                                </ul>
                            @endauth

                            @guest
                                <ul class="navbar-nav py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link" href="{{url('/login')}}" style="font-size:13px !important">ورود</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link" style="font-size:13px !important" href="{{url('/register')}}">ثبت نام</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link " href="{{url('/news')}}" style="font-size:12px !important">اخبار و اطلاعیه ها</a>
                                    </li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ml-5">
                                    <a class="nav-link" style="font-size:13px !important" href="#">نمایشگاه نیازمندی های فناورانه</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-3 ">
                                        <a class="nav-link " style="font-size: 0.7rem; border-color: #721c24;border: 2px #721c24 solid;border-radius: 3px;background: linear-gradient(to right, #8d0c35, #eb185c) !important;" href="{{url('/academic-guidance/corona-consultation')}}">مشاوره سلامت روان-اجتماعی(ویژه کرونا)</a>
                                    </li>

                                </ul>
                            @endguest
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-1 ">
                                    <a class="nav-link " href="{{url('/success')}}" style="font-size:13px !important"> <span style="color: #45a3ff">م</span>وفقیت</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/success/graduation-job')}}">فارغ التحصیلان </a>
                                        {{--<a class="dropdown-item" href="{{url('/success/proud')}}">افتخار آفرینان</a>--}}
                                        <a class="dropdown-item" href="{{url('/success/university-startups')}}">
                                            گروه های استارت آپی دانشگاه</a>
                                    </div>
                                </li>

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-3">
                                    <a class="nav-link" href="{{url('/idea')}}" style="font-size:13px !important"> <span style="color: #45a3ff">ا</span>یده ها</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/idea/support')}}">ایده و حمایت </a>
                                        <a class="dropdown-item" href="{{url('/idea/festivals')}}">جشنواره ها</a>
                                        <a class="dropdown-item" href="{{url('/idea/startup')}}">تشکیل گروه های استارت آپی</a>
                                    </div>
                                </li>
                                <li class="nav-item  pl-4 pl-md-0 ml-0 ml-md-2">
                                    <a class="nav-link" href="{{url('/gathering')}}" style="font-size:13px !important">  <span style="color: #45a3ff">گ</span>ردهمایی</a>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{url('/gathering/workshop')}}">کارگاه های آموزشی </a>
                                        <a class="dropdown-item text-right" href="{{url('/gathering/visit-industries')}}" >بازدید از صنایع</a>
                                        {{--<a class="dropdown-item" href="{{url('/gathering/industry-posts')}}">دعوت از صاحبان صنایع</a>--}}
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-2">
                                    <a class="nav-link " style="font-size:13px !important" href="{{url('/skill-learning')}}" > <span style="color: #45a3ff">م</span>هارت آموزی</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/skill-learning/courses')}}">دوره های مهارتی </a>
                                        <a class="dropdown-item" href="{{url('/skill-learning/free-courses')}}">دوره های آزاد </a>
                                        <a class="dropdown-item text-right" href="{{url('/skill-learning/termination')}}" >ترم بندی دوره های مهارتی </a>
                                        <a class="dropdown-item" href="{{url('/skill-learning/offer')}}">پیشنهاد دوره</a>
                                        <a class="dropdown-item" href="{{url('/skill-learning/certificate-auth')}}">رهگیری کارنامه مهارتی</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-md-0 ml-md-2 mr-1">
                                    <a class="nav-link"  style="font-size:13px !important " href="{{url('/academic-guidance')}}"> <span style="color: #45a3ff">ه</span>دایت شغلی</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/academic-guidance/relative-jobs')}}"> فرصت های شغلی مرتبط</a>
                                        <a class="dropdown-item text-right" href="{{url('/academic-guidance/consult')}}" >مشاوره</a>
                                        <a class="dropdown-item" href="{{url('/academic-guidance/job-ads')}}">نیازهای شغلی صنایع و سازمان ها</a>
                                        <a class="dropdown-item" href="{{url('/academic-guidance/change-field')}}">ضوابط و شرایط تغییر رشته</a>

                                    </div>
                                </li>
								<li class="nav-item pl-4 pl-md-2">
                                    <a class="nav-link" style="font-size:12px !important" href="{{url('/academic-guidance/job-ads')}}">نیازهای شغلی صنایع و سازمان ها</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ml-5">
                                    <a class="nav-link" style="font-size:13px !important" href="{{url('/')}}">خانه</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>
    </div>
</div>
{{--<div class="section full-height">--}}
{{--<div class="absolute-center">--}}
{{--<div class="section">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-12">--}}
{{--<h1><span>B</span><span>o</span><span>o</span><span>t</span><span>s</span><span>t</span><span>r</span><span>a</span><span>p</span> <span>4</span><br>--}}
{{--<span>m</span><span>e</span><span>n</span><span>u</span></h1>--}}
{{--<p>scroll for nav animation</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="section mt-5">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-12">--}}
{{--<div id="switch">--}}
{{--<div id="circle"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

</div>

<!-- Link to page
================================================== -->

{{--<a href=""      class="link-to-portfolio" target=”_blank”></a>--}}
