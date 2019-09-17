<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('include.head')
</head>
<body class="rtl">
<div class="mt-5 ">
    <table class="m-auto response-table bg-light" border="1" >
        <thead class="">
        <tr >
            <th class="py-3 text-center " scope="col" colspan="2">{{$description}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th class="p-2" scope="row">مبلغ(ریال)</th>
            <td class="text-center">{{number_format($amount)}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row" >شماره مرجع تراکنش</th>
            <td class="text-center">{{$retrival_ref_no}}</td>
        </tr>
        <tr>
            <th class="p-2" scope="row" > شماره پیگیری</th>
            <td class="text-center">{{$system_trace_no}}</td>
        </tr>
        </tbody>
    </table>
    <div class="text-center mt-2">
        <a  href="{{route('user-courses')}}" class="m-auto btn btn-sm btn-blue">بازگشت به پنل کاربری</a>
    </div>
</div>
</body>
</html>