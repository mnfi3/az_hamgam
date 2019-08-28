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
    <link rel="stylesheet" href={{asset('css/pagination.css')}}>
</head>


<body>
@include('include.navigation')
<div>
    <div class="pt-5 mt-5 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 1.8rem ; text-align: center">گروه های استارت آپی دانشگاه شهید مدنی آذربایجان</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-sections">
    <div class="container bg-light">
        <div class="row pt-5 m-auto">
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('/img/startup.jpg')"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: hidden">
                        <h4 class="card-title">گروه نوآوران برتر</h4>
                        <p class="card-text"> سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.
                        </p>
                        <p>زمینه فعالیت : اینترنت اشیا</p>
                        <p>زمان : مرکز نوآوری دانشگاه</p>
                        <p>مسئول گروه :مهدی مهدوی کیا </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('/img/startup.jpg')"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: hidden">
                        <h4 class="card-title">گروه نوآوران برتر</h4>
                        <p class="card-text"> سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.
                        </p>
                        <p>زمینه فعالیت : اینترنت اشیا</p>
                        <p>زمان : مرکز نوآوری دانشگاه</p>
                        <p>مسئول گروه :مهدی مهدوی کیا </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url('/img/startup.jpg')"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: hidden">
                        <h4 class="card-title">گروه نوآوران برتر</h4>
                        <p class="card-text"> سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.
                        </p>
                        <p>زمینه فعالیت : اینترنت اشیا</p>
                        <p>زمان : مرکز نوآوری دانشگاه</p>
                        <p>مسئول گروه :مهدی مهدوی کیا </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="pagination-section">
    <div class="container my-3 ">
        <div class="row ">
            <div class="col-8 " align="center">
                <div class="pagination ">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>

    </div>
</div>
@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script src="{{asset('js/pagination.js')}}"></script>
</body>

</html>