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
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-10 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">گزارش های دریافتی</h5>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">نام کاربر</th>
                        <th scope="col">شماره</th>
                        <th scope="col">گزارش دریافتی</th>
                        <th scope="col">پرینت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=0 @endphp
                    @foreach($reports as $report)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$report->user->first_name. ' ' . $report->user->last_name}}</td>
                            <td>{{$report->user->mobile}}</td>
                            <td><button class="custom-btn text-center" style="max-width: 150px" data-toggle="modal" data-target="#myModal{{$report->id}}">مشاهده </button></td>
                            <td><button class="custom-btn text-center" style="max-width: 100px">  <a class="custom-btn text-center" style="max-width: 110px" href="{{url('/admin/performance-report-print', $report->id)}}">پرینت </a>
                                </button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



                <ul  class="pagination" style="text-align: center">
                    {{$reports->links()}}
                </ul>


            </div>
        </div>
    </div>
</div>


    @foreach($reports as $report)
        <div class="modal fade" id="myModal{{$report->id}}" style="font-family: Vazir">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body text-right">
                       @php echo $report->message; @endphp
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @include('include.footer')
</body>
</html>