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
            <h3 style="font-family: Vazir;"> پنل استاد </h3>
        </div>
    </div>
    @include('admin.admin-navbar')
    <div class="container-fluid my-4 " id="side-list">
        <div class="row mb-2">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">ثبت استاد جدید</h5>
                <form action="" class="row" style="">
                    <div class="form-group col-md-10 py-4 d-flex ml-auto mr-auto">
                        <input type="number" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="شماره ملی">
                        <input type="number" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="شماره تماس">
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group col-md-11 py-4 d-flex ml-auto mr-auto">
                        <button class="custom-btn text-center m-0" type="submit" style="max-width: 60px;font-size: 0.8rem">ثبت</button>

                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="ایمیل">
                        <select class="custom-select ml-4" style="font-family: Vazir;direction: rtl ">
                            <option selected>جنسیت</option>
                            <option value="1">مرد</option>
                            <option value="2">زن</option>
                        </select>
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="رمز عبور">
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 1px;background-color: #721c24;margin-bottom: 10px"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">مدیریت اساتید</h5>
                <form action="{{url('/admin/users/master')}}" method="get" class="row" style="">
                    <div class="form-group col-md-8 py-4 d-flex ml-auto mr-auto">
                        <button class="custom-btn text-center m-0" type="submit" style="max-width: 60px;font-size: 0.8rem">جستجو</button>
                        <input type="number" id="title"
                               class="form-control ml-2"  name="national_code" value="{{\Illuminate\Support\Facades\Session::get('national_code')}}" placeholder="شماره ملی">
                        <input type="text" id="title"
                               class="form-control ml-2"  name="name" value="{{\Illuminate\Support\Facades\Session::get('name')}}" placeholder="نام یا نام خانوادگی">
                    </div>
                </form>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">کد ملی</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">جزئیات</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    @php($i=0)
                   @foreach($masters as $master)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$master->first_name.' '.$master->last_name}}</td>
                        <td>{{$master->national_code}}</td>
                        <td>{{$master->mobile}}</td>
                        <td>
                            <a href="{{asset('/admin/users/master-detailes', $master->id)}}" class="custom-btn text-center mt-0" style="max-width: 80px;text-decoration: none">جزئیات</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal" style="font-family: Vazir">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" style="font-family: Vazir">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-right ml-auto">نوشتن پاسخ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                <form action="" class="" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row ">
                        <div class="col-md-12">
                    <textarea type="text" id="editor1" required="" style="width: 100%;height: 100%;font-size: 0.8rem"
                              class="form-control" name="description" placeholder="پاسخ">
                    </textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <button class="custom-btn text-center" type="submit" style="max-width: 100px">ارسال</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>
            </div>

        </div>
    </div>
</div>
</div>
@include('include.footer')
</body>
</html>