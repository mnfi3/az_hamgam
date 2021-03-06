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
            <div class="row mt-3">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2  text-dark" style="font-family: Vazir; font-size: 2.2rem ; text-align: center">جشنواره ها</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="page-sections">
    <div class="container bg-light">
        <div class="row pt-3 m-auto">

            @foreach($festivals as $festival)
                <div class="col-md-4 col-lg-4 pb-3">
                    <div class="card card-custom bg-white border-white border-0">
                        <div class="card-custom-img" style="background-image: url('{{asset($festival->image)}}')"></div>
                        <div class="card-custom-avatar">
                            {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                        </div>
                        <div class="card-body" style="overflow-y: hidden;padding:0.9rem">
                            <h5 class="card-title">{{$festival->title}}</h5>
                            {{--<p>مدرس : {{$workshop->master->first_name . ' ' . $workshop->master->last_name}}</p>--}}
                            @php($date = new \App\Http\Controllers\Util\PDate())
                            <p class="m-0">تاریخ : {{$date->toPersian($festival->date, 'Y/m/d')}}</p>
                            <p class="m-0">ساعت : {{$festival->hour}}</p>
                            @if($festival->price == 0)
                                <p class="m-0">هزینه : رایگان</p>
                            @else
                                <p class="m-0">هزینه : {{number_format($festival->price)}} تومان</p>
                            @endif

                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit;">
                            <div align="right">
                                <a href="{{url('/idea/festival-detail', $festival->id)}}">
                                    <button class="custom-btn text-center m-0 "type="submit" >
                                        <span>مشاهده جزئیات</span>
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="pagination-section">
    <div class="container my-3 ">
        <div class="row ">
            <div class="col-8 " align="center">
                <ul class="pagination">
                    {{--{{$workshops->links()}}--}}
                    {{$festivals->links()}}

                </ul>
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
