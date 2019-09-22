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
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 3rem ; text-align: center"> گردهمایی </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="decleararion">
    <div class="container-fluid ">
        <p class="my-2 text-right p-3 ">
            {{$gathering}}
        </p>
    </div>
</div>
<div class="page-sections">
    <div class="container">
        <div class="row pt-5 m-auto">
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('{{asset($workshop_image)}}')"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">کارگاه های آموزشی </h4>
                        <p class="card-text">
                            {{$workshop}}
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('/gathering/workshop')}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>بیشتر</span>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('{{asset($visit_image)}}');"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">بازدید از صنایع</h4>
                        <p class="card-text">
                            {{$visit}}
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('/gathering/visit-industries')}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>بیشتر</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('{{asset($invite_image)}}');"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">دعوت از صاحبان صنایع</h4>
                        <p class="card-text">
                            {{$invite}}
                        </p>
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <button class="custom-btn text-center m-0 "type="submit" >
                                <span>بیشتر</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('include.footer')
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>
</html>