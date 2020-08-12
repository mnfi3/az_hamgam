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
    <div class="pt-5 mt-3 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 2rem ; text-align: center">رهگیری کارنامه مهارتی</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="signup-section">
    <div class="container" style=" min-height: 450px">
        <div class="row">
            <div class="col-12">

{{--                    <div class="alert alert-success" role="alert">--}}

                    </div>
                <form class="login ml-auto mr-auto mt-3" align ="center" method="get" action="{{url('/skill-learning/certificate-auth')}}">
                    <input id="code" type="number" name="code" value="{{$tracking_code}}" required class=" ml-auto mr-auto" placeholder=" کد رهگیری را وارد نمایید"  required autocomplete="email" autofocus>
                    @if($not_found == true)
                        <span> کارنامه با کد {{$tracking_code}} یافت نشد  </span>
                    @endif

                    <button  class="custom-btn text-center m-0 "type="submit" >
                        <span>مشاهده</span>
                    </button>

                </form>
            </div>


        @if($student != null)
            <div class="row p-5" style="margin:5mm 0mm 30mm 0mm;">
                {{--            <a class="btn custom-btn m-auto " href="{{url('/admin/users/student/cert-print')}}" style="max-width: 150px;text-align: center !important;"> پرینت </a>--}}
                <h6 class="text-right ml-auto" > : کارگاه ها و دوره های گذرانده شده توسط دانشجو</h6>
                <h5 class="text-right ml-auto" > کد رهگیری : {{$tracking_code}} </h5>
                <h5 class="text-right ml-auto" >نام دانشجو : ‌{{$student->first_name.' '.$student->last_name}} </h5>

                <div class="col-md-12 col-sm-12">
                    <table class="table text-center" id="" style="direction: rtl;font-family: Vazir;color: black !important;border: 2px solid black;border-radius: 7px">
                        <thead>
                        <tr>
                            <th scope="col" class="text-black" >#</th>
                            <th scope="col">نام دوره</th>
                            <th scope="col">کد دوره</th>
                            <th scope="col" style="width: 100px">مدت(ساعت)</th>
                            <th scope="col">نیم سال</th>
                            <th scope="col">مدرس</th>
                            <th scope="col">نمره</th>

                        </tr>

                        </thead>
                        <tbody class="">
                        @csrf


                        @php($i=0)
                        @foreach($student->studentCourses as $course)
                            @if($student->studentPivotCourses()->where('course_id', '=', $course->id)->first()->has_certificate == 0)
                                @continue
                            @endif
                            <tr  class=" text-right" style="font-family: Vazir ;background-color: black">
                                <td scope="row">{{++$i}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->code}}</td>
                                <td>{{$course->duration}}</td>
                                <td>@if($course->term == 1) اول @elseif($course->term == 2) دوم @else تابستان @endif</td>
                                <td>{{$course->master->first_name.' '.$course->master->last_name}}</td>
                                @if(strlen($student->studentPivotCourses()->where('course_id', '=', $course->id)->first()->mark) > 0)
                                    <td>{{$student->studentPivotCourses()->where('course_id', '=', $course->id)->first()->mark}}</td>
                                @else
                                    <td>اعلام نشده</td>
                                @endif
                            </tr>
                        @endforeach

                        @foreach($student->studentFreeCourses as $course)
                            @if($student->studentPivotFreeCourses()->where('free_course_id', '=', $course->id)->first()->has_certificate == 0)
                                @continue
                            @endif
                            <tr  class=" text-right" style="font-family: Vazir ;background-color: black">
                                <td scope="row">{{++$i}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->code}}</td>
                                <td>{{$course->duration}}</td>
                                <td>@if($course->term == 1) اول @elseif($course->term == 2) دوم @else تابستان @endif</td>
                                <td>{{$course->master->first_name.' '.$course->master->last_name}}</td>
                                @if(strlen($student->studentPivotFreeCourses()->where('free_course_id', '=', $course->id)->first()->mark) > 0)
                                    <td>{{$student->studentPivotFreeCourses()->where('free_course_id', '=', $course->id)->first()->mark}}</td>
                                @else
                                    <td>اعلام نشده</td>
                                @endif
                            </tr>
                        @endforeach


                        @foreach($student->studentWorkshops as $workshop)
                            @if($student->studentPivotWorkshops()->where('workshop_id', '=', $workshop->id)->first()->has_certificate == 0)
                                @continue
                            @endif
                            <tr  class=" text-right" style="font-family: Vazir ;background-color: black">
                                <td scope="row">{{++$i}}</td>
                                <td>{{$workshop->title}}</td>
                                <td>-</td>
                                <td>{{$workshop->duration}}</td>
                                <td>-</td>
                                <td>{{$workshop->master->first_name.' '.$workshop->master->last_name}}</td>
                                @if(strlen($student->studentPivotWorkshops()->where('workshop_id', '=', $workshop->id)->first()->mark) > 0)
                                    <td>{{$student->studentPivotWorkshops()->where('workshop_id', '=', $workshop->id)->first()->mark}}</td>
                                @else
                                    <td>اعلام نشده</td>
                                @endif
                            </tr>
                        @endforeach




                        </tbody>
                    </table>
                </div>
            </div>
        @endif
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
