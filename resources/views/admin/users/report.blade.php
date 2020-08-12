<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
{{--<head>--}}
{{--@include('include.head')--}}
{{--</head>--}}
<head>


    <style>
        @page{
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
        .content{
            margin:75mm 40mm 30mm 40mm;
            line-height: 50pt;
            font-size: 30pt;
            position: running(content);
            font-family:IranNastaliq;
        }

        .bolds{
            font-weight: bold;
            margin: 3px;
        }
        .center-content{
            margin:30mm 10mm 0mm 35mm;
            line-height: 50pt;
            font-size: 27pt;
            position: running(content);
            font-family: IranNastaliq;
        }
        .footer-content{
            margin:0mm 15mm 30mm 30mm;
            line-height: 50pt;
            font-size: 27pt;
            position: running(content);
            font-family: IranNastaliq;
        }
        .title-one{
            margin:0mm 0mm 0mm 0mm;
        }
        body{
            direction: rtl;
            margin: 0;
        }

        .cert-logo{
            height: 100px;

            position: absolute;

            top:40mm;
            left:46vw;
        }

        body{

        }

    </style>

    @include('include.head')

</head>


<div class="row" style="margin-top:80px;font-family: Vazir-; margin-right: 100px">
    <div class=" col-md-4 ml-auto">
        <span class="bolds text-right" style="direction: rtl;text-align: right"> کد رهگیری در سایت همگام : </span>
        <span class="bolds text-right" style="direction: rtl;text-align: right">{{$tracking_code}}</span>
    </div>
</div>



<div class=" mt-5 rtl">
    <img class="cert-logo" src="{{asset('img/certLogo.png')}}" alt="">
    <p class="content">
        احتراماً  گواهی می شود

            <span> آقای </span>



        <span class="bolds"> « {{$student->first_name.' '.$student->last_name}} » </span>
        به شماره ملی
        <span class="bolds">
            @php($num = new \App\Http\Controllers\Util\PNum())
            «{{$num->toPersian($student->national_code)}}»
        </span>
         دوره(ها) مهارتی و کارگاه(ها) آموزشی زیر را
        در دانشگاه شهید مدنی آذربایجان با موفقیت سپری نموده است.
    </p>
    <div class="row p-5" style="margin:5mm 40mm 30mm 40mm;">
        <div class="col-md-12 col-sm-12">
            <table class="table  text-center" id="" style="direction: rtl;font-family: Vazir;color: black !important;border: 2px solid black;border-radius: 7px">
                <thead>
                <tr>
                    <th scope="col" class="text-black">#</th>
                    <th scope="col">نام دوره</th>
                    <th scope="col">کد دوره</th>
                    <th scope="col" style="width: 100px">مدت(ساعت)</th>
                    <th scope="col">نیم سال</th>
                    <th scope="col">مدرس</th>
                    <th scope="col">نمره</th>

                </tr>

                </thead>
                <tbody class="text-white">


                @php($i=0)
                @foreach($student->studentCourses as $course)
                    @if($student->studentPivotCourses()->where('course_id', '=', $course->id)->first()->has_certificate == 0)
                        @continue
                    @endif
                    <tr class="text-dark text-right" style="font-family: Vazir">
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
                    <tr class="text-dark text-right" style="font-family: Vazir">
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
                    <tr class="text-dark text-right" style="font-family: Vazir">
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

    <p class="center-content d-flex justify-content-around">
        <span>دکتر علی عجمی</span>
        <span>دکتر رحیم محمدرضایی</span>
    </p>
    <p class="footer-content d-flex justify-content-around">
        <span>مدیر امور فناوری</span>
        <span class="title-one">معاون پژوهش و فناوری</span>
        {{--<span>معاون پژوهش و فناوری</span>--}}
    </p>
</div>
<script src="{{asset('js/jdate.min.js')}}"></script>

<body style="background-color: #ffffff">
<div class="rtl container mt-3">
    <div class="d-flex justify-content-around align-items-center no-print">
        <a href="{{url('/admin/users/student/report-card', $student->id)}}" class="btn btn-sm btn-blue"><i class="fal fa-arrow-alt-right mr-1"></i>بازگشت</a>
        <button class="btn btn-sm btn-blue" onclick="window.print()"><i class="fal fa-print"></i> پرینت</button>
    </div>
</div>
</body>

</html>


