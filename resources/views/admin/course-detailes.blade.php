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
            <div class="col-md-6 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دانشجویان ثبت نامی</h5>
                <table class="table table-striped text-center usr-table" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">جرئیات</th>
                        <th scope="col">
                            ارسال گواهی

                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td><button class="custom-btn text-center" style="max-width: 110px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>
                        <td class="table-check">
                            <input class="form-control tableCheckBox" form="certForm" type="checkbox" name="cert[]" value="1"  checked="true"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td><button class="custom-btn text-center" style="max-width: 110px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>
                        <td>
                            <input type="checkbox" value="">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td><button class="custom-btn text-center" style="max-width: 110px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>
                        <td>
                            <input type="checkbox" value="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4">
                        <button class="custom-btn text-center" style="max-width: 110px" onclick="" >ارسال گواهی </button></td>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">جزئیات دوره مهارتی</h5>

                <form action="" class="px-3" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان کارگاه :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-9 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="images[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> مدرس دوره :</label>
                        <select class="browser-default custom-select col-md-9">
                            <option selected>نام مدرس</option>
                            <option value="1">علی صالحی</option>
                            <option value="2">کاوه آهنگر</option>
                            <option value="3">فریدون جیرانی</option>
                            <option value="3">کامران کامروا</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3 pt-0">زمان برگزاری :</label>
                        <input  type="text" name="" class="form-control col-sm-9" required>
                        {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}

                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-9 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">
                    </textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('include.footer')
<script type="text/javascript">
  $(document).ready(function() {
    $(".example1").pDatepicker();
  });
</script>
</body>
</html>