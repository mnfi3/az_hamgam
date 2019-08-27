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
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">حذف سوالات</h5>
                <ul style="direction: rtl" class="side-list">
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">سامانه چطور کار میکند؟ </p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">چه دوره هایی ارائه میشود؟</p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">سامانه همگام دانشگاه شهید مدنی آذربایجان</p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">سامانه چطور کار میکند؟ </p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">چه دوره هایی ارائه میشود؟</p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">سامانه همگام دانشگاه شهید مدنی آذربایجان</p>

                            <a href="" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-12">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">اضافه کردن سوال</h5>

                <form action="" class="px-3" style="direction: rtl">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال اول :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال اول :</label>
                        <textarea type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال دوم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال دوم :</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال سوم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال سوم :</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال چهارم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال چهارم :</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال پنجم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال پنجم :</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال ششم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="name" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال ششم :</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="name" placeholder="پاسخ">
                        </textarea>
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
</body>
<script>
  function addDocumentInput() {
    var referenceNode = document.getElementById('fileInputsContainer').lastChild;
    var newNode = document.createElement("DIV");
    newNode.className += 'mt-1'
    newNode.innerHTML = '<input type="file"  required=""\n' +
      '                       class="form-control-file" name="images[]">'
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }
</script>
</html>