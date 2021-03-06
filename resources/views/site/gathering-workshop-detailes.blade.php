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
<div class="content mt-5">
    <div class="container ">
        <div class="row mt-5 pt-4 " >
            <div class="col-md-3 col-sm-12 mt-5">

            </div>
            <div class="col-md-8 " style="">
                <div class="d-flex flex-row justify-content-center">
                    <img src="{{asset($workshop->image)}}" alt="" style=" max-width: 650px;max-height: 300px " class="">
                </div>
                <h3 class="my-2 text-right p-3 ">{{$workshop->title}}</h3>

                <p class="my-2 text-right p-3 ">
                    @php echo $workshop->description; @endphp
                </p>
                <p class="my-2 text-right p-1 ">
                    نام استاد : {{$workshop->master->first_name . ' ' . $workshop->master->last_name}}
                </p>
                @php($date = new \App\Http\Controllers\Util\PDate())
                <p class="my-2 text-right p-1 ">
                    تاریخ : {{$date->toPersian($workshop->time, 'Y/m/d')}}
                </p>

                <p class="my-2 text-right p-1 ">
                    ساعت : {{$workshop->hour}}
                </p>

                @if($workshop->price == 0)
                    <p class="my-2 text-right p-1 ">هزینه : رایگان</p>
                @else
                    <p class="my-2 text-right p-1 ">هزینه : {{number_format($workshop->price)}} تومان</p>
                @endif

                {{--<p class="my-2 text-right p-1 ">--}}
                {{--جنسیت : مشترک--}}
                {{--</p>--}}

                <div class="d-flex flex-row-reverse flex-wrap">
                    <a href="{{url('/gathering/workshop/register', $workshop->id)}}">
                        <button class="custom-btn text-center m-4 "type="submit" style="max-width: 130px">
                            <span> ثبت نام</span>
                        </button>
                    </a>

                    @if(\Illuminate\Support\Facades\Session::get('fail') != null)
                        <p style=" color: #b91d19;text-align: right;font-family: Vazir;font-size: 1.5rem">{{ \Illuminate\Support\Facades\Session::get('fail') }}</p>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::get('success') != null)
                        <p style=" color: #1e7e34;text-align: right;font-family: Vazir;font-size: 1.5rem">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@include('include.footer')
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>
</html>