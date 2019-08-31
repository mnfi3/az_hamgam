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
            <div class="col-md-4 col-sm-12">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column p-2" style="box-shadow: 0px 0px 15px rgba(10, 10, 10, 0.6);border-radius: 5px">
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">همه دوره ها</h5>
                        <ul style="direction: rtl" class="side-list2">
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره اموزش Swift </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="{{asset('/admin/course-detailes')}}" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره آموزش زبان </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="{{asset('/admin/course-detailes')}}" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره تخصصی Hse </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="{{asset('/admin/course-detailes')}}" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره آموزش زبان </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="{{asset('/admin/course-detailes')}}" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره تخصصی Hse </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره تخصصی Hse </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره آموزش زبام </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">دوره تخصصی Hse </p>
                                    <a href="" class="custom-btn text-center">حذف</a>
                                    <a href="" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 ">
                <form action="" class="px-3" style="direction: rtl;font-family: Vazir">
                <div class="form-group row py-4">
                    <label class="col-md-3 col-form-label ">توضیح مختصر دور های مهارتی :</label>
                    <div class="col-md-5">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات"></textarea>
                    </div>
                        <div class="col-md-3">
                            <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                        </div>
                </div>
                </form>
                <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دوره های مهارتی</h5>

                <form action="" class="px-3" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> عنوان دوره :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="name" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> رشته های مرتبط:</label>
                        <select class="browser-default custom-select col-md-3">
                            <option selected>نام رشته</option>
                            <option value="1">مهندسی نرم افزار</option>
                            <option value="2">مهندسی برق</option>
                            <option value="3">مدیریت دولتی</option>
                            <option value="3">مطالعات خانواده</option>
                            <option value="3">زبان</option>
                        </select>
                        <select class="browser-default custom-select col-md-3">
                            <option selected>نام رشته</option>
                            <option value="1">مهندسی نرم افزار</option>
                            <option value="2">مهندسی برق</option>
                            <option value="3">مدیریت دولتی</option>
                            <option value="3">مطالعات خانواده</option>
                            <option value="3">زبان</option>
                        </select>
                        <select class="browser-default custom-select col-md-3">
                            <option selected>نام رشته</option>
                            <option value="1">مهندسی نرم افزار</option>
                            <option value="2">مهندسی برق</option>
                            <option value="3">مدیریت دولتی</option>
                            <option value="3">مطالعات خانواده</option>
                            <option value="3">زبان</option>
                        </select>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-10 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="images[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> مدرس دوره :</label>
                        <select class="browser-default custom-select col-md-8">
                            <option selected>نام مدرس</option>
                            <option value="1">علی صالحی</option>
                            <option value="2">کاوه آهنگر</option>
                            <option value="3">فریدون جیرانی</option>
                            <option value="3">کامران کامروا</option>
                        </select>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> نیم سال:</label>
                        <select class="browser-default custom-select col-md-8">
                            <option selected>نیمسال</option>
                            <option value="1">اول</option>
                            <option value="1">دوم</option>
                            <option value="1">تابستان</option>
                        </select>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> جنسیت:</label>
                        <select class="browser-default custom-select col-md-8">
                            <option selected>مشترک</option>
                            <option value="1">مرد</option>
                            <option value="1">زن</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">زمان برگزاری </legend>
                        <div class="col-sm-10">
                            <input  type="text" name="" class="form-control start-day example1" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>


                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-9 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">
                    </textarea>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label ">پیش نیاز (در صورت وجود):</label>
                        <div class="col-md-8 d-flex flex-wrap p-2" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.4); border-radius: 5px">

                            <form >

                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox"  value="" >درس اول
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox"  value="">درس دوم
                                </label>
                                <label class="checkbox-inline mr-3">
                                    <input type="checkbox" value="">درس سوم
                                </label>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
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