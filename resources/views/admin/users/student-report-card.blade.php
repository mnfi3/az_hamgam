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
<div class="container py-5 " style="margin-top: 150px; background-color: #4fa1bf;margin-bottom: 150px; border-radius: 10px">
    <div class="d-flex flex-row-reverse">
        <div class="text-white text-right ">
            <h3 style="font-family: Vazir;"> پنل مدیریت </h3>

        </div>

    </div>
    @include('admin.admin-navbar')
    {{--    <h5 class="text-right mr-r text-white" style="font-family: Vazir">{{$student->first_name}} {{$student->last_name}} : اطلاعات کاربری  </h5>--}}
        @include('admin.users.student-details-nav', $student)
        <hr style="height: 2px">
        <h6 class="text-center mr-r text-white"> صدور کارنامه دوره ها و کارگاه های سپری شده توسط <b>{{$student->first_name.' '.$student->last_name}}</b></h6>
        <p class="text-right mr-r text-warning" style="text-align: center!important;direction: rtl">  توجه کنید  فقط دوره هایی که برای دانشجو گواهی صادر کرده اید نمایش داده خواهند شد</p>
        <div class="row py-4">
            <a class="btn custom-btn m-auto " href="{{url('/admin/users/student/cert-print', $student->id)}}" style="max-width: 150px;text-align: center !important;"> پرینت </a>
        </div>


</div>
@include('include.footer')

</body>
</html>
