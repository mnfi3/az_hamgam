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
    @include('industry.industry-navbar')
    <div class="container my-4 " id="side-list">

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir"> {{$ad->title}}</h5>
            </div>

            <button class=" custom-btn text-center m-0" id="btn" style="max-width: 120px;font-size: 0.8rem;color: white"><i class="fa fa-file-excel"></i> خروجی اکسل </button>
            <div class="container-fluid my-4 " id="side-list">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">نام درخواست دهنده</th>
                                <th scope="col"> شماره تماس </th>
                                <th scope="col">ایمیل</th>
                                <th scope="col">تاریخ ارسال رزومه</th>
                                <th scope="col">دانلود</th>
                                <th scope="col">وضعیت</th>

                            </tr>
                            </thead>
                            <tbody class="text-white" style="font-size: 0.9rem">
                            @php($i=0)
                            @foreach($ad->userJobAd()->orderBy('id', 'desc')->get() as $user_jobad)
                                <tr>
                                    <td scope="row">{{++$i}}</td>
                                    <td>{{$user_jobad->user->first_name.' '.$user_jobad->user->last_name}}</td>
                                    <td>{{$user_jobad->user->mobile}}</td>
                                    <td>{{$user_jobad->user->email}}</td>
                                    @php($date = new \App\Http\Controllers\Util\PDate())
                                    <td>{{$date->toPersian($user_jobad->created_at, 'Y/m/d')}}</td>
                                    <td>
                                        <a href="{{url('/industry/job-details/resume-download', $user_jobad->id)}}">
                                            <button class="btn bg-success text-center text-white mt-0" type="submit" style="">دانلود</button>
                                        </a>
                                    </td>
                                    @if($user_jobad->is_seen == 0)
                                        <td> بررسی نشده </td>
                                    @else
                                        <td>بررسی شده</td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
@include('include.footer')
<script src="{{asset('js/jquery.js/jquery1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/table2excel.js')}}"></script>
<script>
    $("#btn").click(function () {
        var $table =  $('.table')
        $table.table2excel({
            name: "Excel Document Name",
            filename: "گزارش مشاغل",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true,
            columns : [0,1,2,3,4]
        })
    })

</script>
</body>
</html>
