<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<head>--}}
{{--@include('include.head')--}}
{{--</head>--}}
<head>


    <style>

        @font-face {
            font-family: Vazir;
            src: url('../../../../public/fonts/Vazir-FD.eot');
            src: url('../../../../public/fonts/Vazir-FD.eot?#iefix') format('embedded-opentype'),
            url('../../../../public/fonts/Vazir-FD.woff2') format('woff2'),
            url('../../../../public/fonts/Vazir-FD.woff') format('woff'),
            url('../../../../public/fonts/Vazir-FD.ttf') format('truetype');
            font-weight: normal;
        }
        @page{
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
        .content{
            margin:75mm 40mm 30mm 40mm;
            line-height: 50pt;
            font-size: 20pt;
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
            height: 150px;
            position: absolute;
            top:30mm;
            left:47vw;
        }

    </style>

    @include('include.head')

</head>






<div class=" mt-5 rtl">
    <img class="cert-logo " style="" src="{{asset('img/certLogo.png')}}" alt="">
    <p class="content ">
        @php echo $report->message; @endphp
    </p>

    {{--<p class="center-content d-flex justify-content-around">--}}
        {{--<span>{{$authority1}}</span>--}}
        {{--<span>{{$authority2}}</span>--}}
    {{--</p>--}}
    {{--<p class="footer-content d-flex justify-content-around">--}}
        {{--<span>مدیر امور فناوری</span>--}}
        {{--<span class="title-one">معاون پژوهش و فناوری</span>--}}
        {{--<span>معاون پژوهش و فناوری</span>--}}
    {{--</p>--}}
</div>


<script src="{{asset('js/jdate.min.js')}}"></script>

<body style="background-color: #ffffff">
<div class="rtl container mt-3">
    <div class="d-flex justify-content-around align-items-center no-print">
        {{--<a href="{{url('/admin/users/student-detailes', $user->id)}}" class="btn btn-sm btn-blue"><i class="fal fa-arrow-alt-right mr-1"></i>بازگشت</a>--}}
        <button class="btn btn-sm btn-blue" onclick="window.print()"><i class="fal fa-print"></i> پرینت</button>
    </div>
</div>
</body>
</html>


