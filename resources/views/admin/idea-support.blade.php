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
            <div class="col-md-6 col-sm-12">
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir;font-size: 0.8rem">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان ایده</th>
                        <th scope="col">فرم تشریح ایده</th>
                        <th scope="col">پاسخ</th>
                        <th scope="col">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.8rem">
                    <tr>
                        <th scope="row">1</th>
                        <td >کاشت گیاهان دریای صادراتی</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" >دانلود </button></td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">پاسخ </button></td>
                        <td>بررسی شد. </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td >کاشت گیاهان دریای صادراتی</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" >دانلود </button></td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">پاسخ </button></td>
                        <td>بررسی نشد. </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-sm-12">
                <form action="" class="px-3" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر:</label>
                        <div class="col-md-5">
                    <textarea type="text" id="" required=""
                              class="form-control" name="description" style="font-size: 0.7rem" placeholder="توضیحات">
                    </textarea>
                        </div>
                        <div class="col-md-3">
                            <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                        </div>
                    </div>
                </form>
                <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

                <h5 class="text-white text-right mb-2" style="font-family: Vazir">ایده و حمایت</h5>

                <form action="" class="px-3" style="direction: rtl">
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label " style=""> عنوان(در صورت وجود) :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-8 "  name="name" placeholder="اختیاری">
                    </div>
                    <div class="form-group row py-2">
                        <label class="col-md-4 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-8 ">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file" id="images"
                                           class="form-control-file" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">متن :</label>
                        <div class="col-md-8 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="محنوای">
                    </textarea>
                            <script>
                              CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label " style="" for="title">فایل (در صورت وجود) :</label>
                        <div class="col-md-8 mr-auto">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file" id="images"
                                           class="form-control-file" name="images[]">
                                </div>
                            </div> </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" style="font-family: Vazir">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-right ml-auto">ارسال پاسخ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-right">
                    <form action="" class="" style="direction: rtl;font-family: Vazir">
                        <div class="form-group row ">
                            <div class="col-md-12">
                    <textarea type="text" id="editor1" required="" style="width: 100%;height: 190px;font-size: 0.8rem"
                              class="form-control" name="description">
                    </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="custom-btn btn-danger"  style="max-width: 60px">ارسال</button>
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