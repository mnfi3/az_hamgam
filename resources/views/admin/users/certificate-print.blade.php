<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
            font-family: IranNastaliq;
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

    </style>

    @include('include.head')

</head>






<div class=" mt-5 rtl">
    <img class="cert-logo" src="{{asset('img/certLogo.png')}}" alt="">
    <p class="content">
        احتراماً  گواهی می شود
        @if($user->is_male == 1)
            <span> آقای </span>
        @else
            <span> سرکار خانم </span>
        @endif
        <span class="bolds"> «{{$user->first_name. ' '.$user->last_name}}» </span>
        به شماره ملی
        <span class="bolds">
            «{{\App\Http\Controllers\Util\PNum::toPersian($user->national_code)}}»
        </span>
        دوره مهارتی
        <span class="bolds">
            «{{$course->title}}»
        </span>
        را به مدت
        <span class="bolds">
            «{{\App\Http\Controllers\Util\PNum::toPersian($course->duration)}}» </span>
        ساعت ، در تاریخ
        @php
            $date = new \App\Http\Controllers\Util\PDate();
            $date = $date->toPersian($course->deadline, 'Y/m/d')
        @endphp
        <span class="bolds">
            «{{\App\Http\Controllers\Util\PNum::toPersian($date)}}»
        </span>
        در دانشگاه شهید مدنی آذربایجان با موفقیت به پایان رسانده اند.
    </p>

    <p class="center-content d-flex justify-content-around">
        <span>{{$authority1}}</span>
        <span>{{$authority2}}</span>
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
        <a href="{{url('/admin/users/student-detailes', $user->id)}}" class="btn btn-sm btn-blue"><i class="fal fa-arrow-alt-right mr-1"></i>بازگشت</a>
        <button class="btn btn-sm btn-blue" onclick="window.print()"><i class="fal fa-print"></i> پرینت</button>
    </div>
</div>
</body>
</html>


