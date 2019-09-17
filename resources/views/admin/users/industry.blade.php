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
            <h3 style="font-family: Vazir;"> پنل صنایع</h3>
        </div>
    </div>
    @include('admin.admin-navbar')
    <div class="container-fluid my-4 " id="side-list">
        <div class="row mb-2">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir;direction: rtl">ثبت صنعت جدید </h5>
                <form action="{{url('/admin/industry/add')}}" method="post" class="row" style="">
                    @csrf
                    <div  class="form-group col-md-10 py-4 d-flex ml-auto mr-auto" style="font-family: Vazir;direction: rtl">
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="name" placeholder="عنوان صنعت">
                        <input type="tel" id="title" required=""
                               class="form-control ml-4"  name="mobile" placeholder="شماره تلفن">
                        <input type="email" id="title" required=""
                               class="form-control ml-4"  name="email" placeholder="آدرس ایمیل">
                        <input type="password" id="title" required=""
                               class="form-control ml-4"  name="password" placeholder="رمز عبور">
                    </div>
                    <div class="form-group col-md-11 py-1 ml-auto mr-auto">
                        <button class="custom-btn text-center m-0" type="submit" style="max-width: 60px;font-size: 0.8rem">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 1px;background-color: #721c24;margin-bottom: 10px"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">مدیریت صنایع</h5>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان صنعت</th>
                        <th scope="col">ایمیل</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    @php($i=0)
                    @foreach($industries as $industry)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$industry->first_name}}</td>
                        <td>{{$industry->email}}</td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
{{--<div class="modal fade" id="myModal" style="font-family: Vazir">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}

            {{--<!-- Modal Header -->--}}
            {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title text-right ml-auto">محتوای پیام</h4>--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
            {{--</div>--}}

            {{--<!-- Modal body -->--}}
            {{--<div class="modal-body text-right">--}}
                {{--سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید--}}
            {{--</div>--}}

            {{--<!-- Modal footer -->--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="modal fade" id="myModal1" style="font-family: Vazir">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}

            {{--<!-- Modal Header -->--}}
            {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title text-right ml-auto">نوشتن پیام</h4>--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
            {{--</div>--}}

            {{--<!-- Modal body -->--}}
            {{--<div class="modal-body text-right">--}}
                {{--<form action="" class="" style="direction: rtl;font-family: Vazir">--}}
                    {{--<div class="form-group row ">--}}
                        {{--<div class="col-md-12">--}}
                    {{--<textarea type="text" id="editor1" required="" style="width: 100%;height: 100%;font-size: 0.8rem"--}}
                              {{--class="form-control" name="description" placeholder="متن پیام"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="d-flex justify-content-center ">--}}
                        {{--<button class="custom-btn text-center" type="submit" style="max-width: 100px">ارسال</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}

            {{--<!-- Modal footer -->--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloremque dolorum est illum incidunt inventore?
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
                <h4 class="modal-title text-right ml-auto">نوشتن پیام </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                <form action="" class="" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row ">
                        <div class="col-md-12">
                    <textarea type="text" id="editor1" required="" style="width: 100%;height: 100%;font-size: 0.8rem"
                              class="form-control" name="description" placeholder="متن پیام"></textarea>
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
@include('include.footer')
</body>
</html>