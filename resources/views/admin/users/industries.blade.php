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
                <h5 class="text-white text-right mb-2" style="font-family: Vazir;direction: rtl">ثبت صنایع</h5>
                <form action="{{url('/admin/users/forum/add')}}" method="post" class="row" style="">
                    @csrf
                    <div class="form-group col-md-10 py-4 d-flex ml-auto mr-auto" style="direction: rtl">
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="last_name" placeholder="نام شرکت">

                        <input type="number" id="title" required=""
                               class="form-control ml-4"  name="mobile" placeholder="شماره تماس">
                        </div>
                    <div class="form-group col-md-11 py-4 d-flex ml-auto mr-auto">
                        <button class="custom-btn text-center m-0" type="submit" style="max-width: 60px;font-size: 0.8rem">ثبت</button>
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="password" placeholder="رمز عبور">
                        <input type="text" id="title" required=""
                               class="form-control ml-4"  name="email" placeholder="ایمیل">
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
                        <th scope="col">عنوان انجمن</th>
                        <th scope="col">ایمیل</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                        <tr>
                            <th scope="row">1</th>
                            <td>شرکت پالاز موکت</td>
                            <td>info@palaz.com</td>
                        </tr>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

@include('include.footer')
</body>
</html>