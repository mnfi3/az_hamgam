<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body class="rtl">
<div class="mt-5 text-center ">
    <h6 class="m-auto alert alert-danger p-3 fail-message">{{$description}}</h6>
    <div class="mt-3">
        <a  href="{{url('/home')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>
    </div>
</div>
</body>
</html>