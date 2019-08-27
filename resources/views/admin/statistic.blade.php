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
            <div class="col-md-8 col-sm-12 ml-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">اضافه کردن اسلایدر</h5>

                <form action="" class="px-3" style="direction: rtl">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> تعداد اساتید :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="name" >
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> تعداد رشته :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="name">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> تعداد ایده  :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="name">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> تعداد دوره ها  :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="name">
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