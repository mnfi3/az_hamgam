

<!-- partial:index.partial.html -->

<div class="navigation-wrap  start-header start-style " >
    <div class="row" style="z-index: 200">
        @php($posts = \App\Post::orderBy('id', 'desc')->take(3)->get())
        <div class="col-12 " style="max-height: 20px">
            <div class="row">
                <div class="col-md-9 mb-2 ">
                    @php($i=0)
                    @foreach($posts as $post)
                        @php($i++)
                        @if($i==1)
                        <a class="item-1" href="{{url('/news/detailes', $post->id)}}">{{$post->title}}</a>
                        @elseif($i==2)
                        <a class="item-2" href="{{url('/news/detailes', $post->id)}}">{{$post->title}}</a>
                        @elseif($i==3)
                        <a class="item-3" href="{{url('/news/detailes', $post->id)}}">{{$post->title}}</a>
                        @endif

                    @endforeach
                </div>
                <div class="col-md-3  text-white">
                    <h6 style="font-family: Vazir;text-align: center; background:linear-gradient(to right, #8d0c35, #eb185c) !important;border-radius: 3px;padding: 5px 0px;max-width: 180px ">: آخرین اخبار و اطلاعیه ها </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            {{--<div class="col-12 " style="max-height: 20px">--}}
            {{--<div class="row">--}}
            {{--<div class="col-md-9 mb-2 ">--}}
            {{--<a class="item-2" href="#">اطلاعیه برگزاری دوره اموش نوشتن انشا</a>--}}
            {{--<a class="item-3" href="#">اطلاعیه برگزاری کارگاه آموزش جوش ceo ceo</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3  text-white">--}}
            {{--<h6 style="font-family: Vazir;text-align: center; background:linear-gradient(to right, #8d0c35, #eb185c) !important;border-radius: 3px;padding: 5px 0px;max-width: 180px ">: آخرین اخبار و اطلاعیه ها </h6>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-12">
                <header>
                    <nav class="navbar navbar-expand-md  navbar-light ">
                        <a class="navbar-brand p-0 m-0" href="{{url('/')}}" target="_blank"><img src="{{asset('/img/hamgam-logo.png')}}" alt=""></a>

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
                                        <a class="nav-link" href="{{url('/home')}}">پنل کاربری</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link " href="{{url('/news')}}">اخبار و اطلاعیه ها</a>
                                    </li>
                                </ul>
                            @endauth

                            @guest
                                <ul class="navbar-nav py-4 py-md-0">
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link" href="{{url('/login')}}">ورود</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link" href="{{url('/register')}}">ثبت نام</a>
                                    </li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                        <a class="nav-link " href="{{url('/news')}}">اخبار و اطلاعیه ها</a>
                                    </li>
                                </ul>
                            @endguest
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link dropdown-toggle" href="{{url('/success')}}">موفقیت</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/success/graduation-job')}}">فارغ التحصیلان شاغل</a>
                                        <a class="dropdown-item" href="{{url('/success/university-startups')}}">
                                            گروه های استارت آپی دانشگاه</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{url('/idea')}}">ایدها</a>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{url('/idea/support')}}">ایده و حمایت </a>
                                        <a class="dropdown-item" href="{{url('/idea/startup')}}">تشکیل گروه های استارت آپی</a>
                                    </div>
                                </li>
                                <li class="nav-item  pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{url('/gathering')}}">گردهمایی</a>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{url('/gathering/workshop')}}">کارگاه های آموزشی </a>
                                        <a class="dropdown-item text-right" href="{{url('/gathering/visit-industries')}}" >بازدید از صنایع</a>
                                        <a class="dropdown-item" href="{{url('/skill-learning/courses')}}">دعوت از صاحبان صنایع</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link dropdown-toggle" href="{{url('/skill-learning')}}" >مهارت آموزی</a>
                                    <div class="dropdown-menu">

                                        <a class="dropdown-item" href="{{url('/skill-learning/courses')}}">دوره های مهارتی </a>
                                        <a class="dropdown-item text-right" href="{{url('/skill-learning/termination')}}" >ترم بندی دوره های مهارتی </a>
                                        <a class="dropdown-item" href="{{url('/skill-learning/offer')}}">پیشنهاد دوره</a>
                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                    <a class="nav-link" href="{{url('/academic-guidance')}}">هدایت شغلی</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('/academic-guidance/relative-jobs')}}">شغل های مرتبط با رشته </a>
                                        <a class="dropdown-item text-right" href="{{url('/academic-guidance/consult')}}" >مشاوره</a>
                                        <a class="dropdown-item" href="{{url('/academic-guidance/purpose')}}">هدف</a>
                                        <a class="dropdown-item" href="{{url('/academic-guidance/change-field')}}">تغییر رشته</a>

                                    </div>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{url('/')}}">خانه</a>
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
