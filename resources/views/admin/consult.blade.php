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
    <div class="container-fluid my-4 " id="side-list">
        <form action="" class="px-3" style="direction: rtl;font-family: Vazir">
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                <div class="col-md-5">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">
                    </textarea>
                </div>
                <div class="col-md-3">
                    <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                </div>
            </div>
        </form>
        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h6 class="text-white text-right mb-2" style="font-family: Vazir">مشاوره (توجه: برای پاسخ دهی فقط یکی از گزینه های ارسال به مشاور و یا پاسخ خود مدیریت انتخاب شود.)</h6>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">رشته تحصیلی</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">مشاهده پرسش</th>
                        <th scope="col">ارسال به مشاور</th>
                        <th scope="col">پاسخ دادن</th>
                        <th scope="col">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td>Aliarabgary2gmail.com</td>
                        <td>09367904148</td>
                        <td>کارشناسی فناوری اطلاعات</td>
                        <td>هدایت تحصیلی</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>

                        <td>
                            <div class="d-flex  p-2 justify-content-between">
                                <select class=" custom-select ml-2" style="font-size: 0.7rem;min-width: 120px">
                                    <option selected>نام مشاور</option>
                                    <option value="1">علی احمدی</option>
                                    <option value="2">رضا یزدانی</option>
                                    <option value="3">محمدرضا فروتن</option>
                                    <option value="4">بهرام نورایی</option>
                                </select>
                                <button class="custom-btn text-center mt-0" style="max-width: 50px">ارسال</button>

                            </div>
                        </td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal1">پاسخ </button></td>

                        <td >پاسخ داده نشده</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td>Aliarabgary2gmail.com</td>
                        <td>09367904148</td>
                        <td>کارشناسی فناوری اطلاعات</td>
                        <td>مشاغل</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>

                        <td>
                            <div class="d-flex  p-2 justify-content-between">
                                <select class=" custom-select ml-2" style="font-size: 0.7rem;min-width: 120px">
                                    <option selected>نام مشاور</option>
                                    <option value="1">علی احمدی</option>
                                    <option value="2">رضا یزدانی</option>
                                    <option value="3">محمدرضا فروتن</option>
                                    <option value="4">بهرام نورایی</option>
                                </select>
                                <button class="custom-btn text-center mt-0" style="max-width: 50px">ارسال</button>

                            </div>
                        </td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal1">پاسخ </button></td>

                        <td >پاسخ داده نشده</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>علی عربگری</td>
                        <td>Aliarabgary2gmail.com</td>
                        <td>09367904148</td>
                        <td>کارشناسی فناوری اطلاعات</td>
                        <td>آینده شغلی</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>

                        <td>
                            <div class="d-flex  p-2 justify-content-between">
                                <select class=" custom-select ml-2" style="font-size: 0.7rem;min-width: 120px">
                                    <option selected>نام مشاور</option>
                                    <option value="1">علی احمدی</option>
                                    <option value="2">رضا یزدانی</option>
                                    <option value="3">محمدرضا فروتن</option>
                                    <option value="4">بهرام نورایی</option>
                                </select>
                                <button class="custom-btn text-center mt-0" style="max-width: 50px">ارسال</button>

                            </div>
                        </td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal1">پاسخ </button></td>

                        <td >پاسخ داده نشده</td>
                    </tr>
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