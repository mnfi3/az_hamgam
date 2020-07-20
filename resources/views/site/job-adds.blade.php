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
    <div class="pt-5 mt-2 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 1.8rem ; text-align: center">فرصت های شغلی</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="filter-section mt-2">
    <div class="container  mt-4">
        <form action="">
            <div class="d-flex flex-row-reverse align-content-center justify-content-center" style=" border: 0px solid #eb185c">
                    <form method="get" action="{{url('/academic-guidance/job-ads')}}" class="row">
                        <input type="text" id="title"
                               class=" align-placeholder my-3 text-center col-md-6 col-sm-8"  @if(!empty($text)) value="{{$text}}" @else value="" @endif  name="text" placeholder="نام یا عنوان شغل" style="text-align: right" >
                        <div class="flex-item text-dark ">
                                <button class="custom-btn text-center col-md-3 col-sm-4 "type="submit" style="max-width: 130px">
                                    <span>جستجو</span>
                                </button>
                        </div>
                    </form>
            </div>
        </form>
    </div>
</div>
<div class="container mt-1">
	<div class="row pt-5 m-auto">

        @foreach($ads as $ad)
            <div class="col-md-6 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset($ad->image)}})"></div>
                    <div class="card-body pt-2" style="overflow-y: auto">
                        <h4 class="card-title">{{$ad->title}} </h4>
                        <p class="card-text ">
                            @if($ad->industry_id > 0)
                                آگهی دهنده : <span style="font-weight:600"> {{$ad->industry->first_name}} </span>
                            @else
                                آگهی دهنده : <span style="font-weight:600"> مدیریت </span>
                            @endif
                        </p>
                        @if(strlen($ad->skills) > 3)
						<p class="card-text ">
                            مهارت های مورد نیاز  : <span style="font-weight:600">{{$ad->skills}}</span>
                        </p>
                        @endif

                        @if(strlen($ad->salary) > 3)
						<p class="card-text ">
                             حقوق  : <span style="font-weight:600"> {{$ad->salary}} </span>
                        </p>
                        @endif
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('/academic-guidance/job-details', $ad->id)}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>...اطلاعات بیشتر</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach




</div>
</div>
{{--<div class="page-sections">--}}
    {{--<div class="container bg-light">--}}
        {{--<div class="row pt-5 m-auto justify-content-center">--}}

            {{--@foreach($ads as $ad)--}}

            {{--<div class="col-md-3  col-lg-3 mx-2 my-2" style="border-radius: 5px">--}}
                {{--<div class="card card-custom bg-white border-white border-0" style="min-height: 200px       ">--}}
                    {{--<div class="card-body p-2" style="overflow-y: hidden">--}}
                        {{--<h4 class="card-title" style="text-align: center">{{$ad->title}}</h4>--}}
                        {{--<p class="card-text">--}}
                        {{--</p>--}}
                        {{--<p>{{$ad->description}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="pagination-section">
    <div class="container my-3 ">
        <div class="row ">
            <div class="col-8 " align="center">
                <div class="pagination ">
                    {{$ads->links()}}

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