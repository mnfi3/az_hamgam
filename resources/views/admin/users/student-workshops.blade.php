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
        @include('admin.users.student-details-nav', $student)
        <hr style="height: 2px">
        <h6 class="text-right mr-r text-white"> آموزش -> کارگاه ها</h6>

        <div class="container my-4 " id="side-list">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <button class="custom-btn text-center" id="btn" style="max-width: 110px">خروجی اکسل </button>
                    <table class="table table-striped text-center usr-table" id="" style="direction: rtl;font-family: Vazir">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام کارگاه</th>
                            <th scope="col">تاریخ برگزاری</th>
                            <th scope="col">مدرس</th>
                            <th scope="col">نمره</th>

                        </tr>

                        </thead>
                        <tbody class="text-white">
                        @csrf


                        @php($i=0)
                        @foreach($student->studentWorkshops as $workshop)
                            <tr>
                                <td scope="row">{{++$i}}</td>
                                <td>{{$workshop->title}}</td>
                                @php($date = new \App\Http\Controllers\Util\PDate())
                                <td>{{$date->toPersian($workshop->time, 'Y/m/d')}}</td>
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
            filename: "دانشجویان دوره",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true,
            columns : [0,1,2,3,4,5,6]
        })
    })

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".example1").pDatepicker();
    });
</script>
</body>
</html>
