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
            <h3 style="font-family: Vazir;"> پنل کاربر </h3>
        </div>
    </div>
    @include('student.student-navbar')
    <div class="container my-4 " id="profile">
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  ایده های ارسالی </h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">وضعیت</th>
                <th scope="col">پاسخ</th>
            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            <tr>
                <th scope="row">1</th>
                <td >پاسخ داده نشده</td>
                <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>



            </tr>
            </tbody>
        </table>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  آپلود فرم ایده برای مدیریت </h5>
        <div class="row">
            <div class="col-md-12">
                <form action=" " class="row">
                    <div class="col-6 ml-auto">
                        <div class="form-group row">
                            <input type="text" class="col-md-7 form-control" name="name" required placeholder="عنوان ایده خود را اینجا بنویسید" value="">
                            <label for="name" class="col-md-3 mt-1">: عنوان ایده </label>
                        </div>
                        <div class="form-group row py-2">
                            <div class="col-md-7">
                                <div  id="fileInputsContainer">
                                    <div class="d-flex flex-row justify-content-between">
                                        <input type="file" id="images"
                                               class="form-control-file" name="">
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-3" >: آپلود فرم </label>
                        </div>
                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit" style="max-width: 70px">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal" style="font-family: Vazir">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-right ml-auto">پاسخ</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body text-right">
                        <form action="" class="" style="direction: rtl;font-family: Vazir">
                            <div class="form-group row ">
                                <div class="col-md-12">
                    <textarea type="text" id="editor1" required="" style="width: 100%;height: 190px;font-size: 0.8rem"
                              class="form-control" name="description" placeholder="پاسخی دریافت نشده است.">
                    </textarea>
                                </div>
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
    <!-- Modal footer -->

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