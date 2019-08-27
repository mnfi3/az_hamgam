<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    @include('include.page-title')
    @include('include.bootstrap')
    @include('include.nav-style-js')
</head>


<body>
@include('include.navigation')
<div>
    <div class="pt-5 mt-3 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 3rem ; text-align: center"> هدایت تحصیلی </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="decleararion">
    <div class="container-fluid ">
        <p class="my-2 text-right p-3 ">
        {{$description}}
        </p>
    </div>
</div>


<div class="page-sections">
    <div class="container">
        <div class="row pt-5 m-auto">
            <div class="col-md-6 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset('img/purpose.jpg')}})"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">هدف</h4>
                        <p class="card-text ">
                            {{substr($goal, 0, 120)}} ...
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('/academic-guidance/goal')}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>بیشتر</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset('/img/job.jpg')}});"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">شغل های مرتبط با رشته</h4>
                        <p class="card-text"> سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <a href="{{url('/academic-guidance/relative-jobs')}}">
                            <button class="custom-btn text-center m-0 "type="submit" >
                                <span>بیشتر</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset('img/consultation.jpg')}})"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">مشاوره</h4>
                        <p class="card-text">در این بخش کاربر سوال پرسیده و یا به مشاهور مورد نطر لینک خواهد شد سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('/academic-guidance/consult')}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>بیشتر</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 m-auto">

            <div class="col-md-6 col-lg-4 pb-3 mr-auto ml-auto">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset('img/change.jpg')}})"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">تغییر رشته</h4>
                        <p class="card-text">
                            {{substr($change_field, 0, 120)}} ...
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <a href="{{url('/academic-guidance/change-field')}}">
                            <button class="custom-btn text-center m-0 "type="submit" >
                                <span>بیشتر</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>

</html>