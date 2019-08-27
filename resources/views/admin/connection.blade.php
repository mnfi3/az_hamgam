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
            <div class="col-md-10 col-sm-12 ml-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">راه های ارتباطی و لینک های مرتبط</h5>

                <form action="" class="px-3" style="direction: rtl">
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> شماره ثابت :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="name" placeholder="">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> آدرس :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="name" placeholder="">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="">ایمیل :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="name" placeholder="ایمیل سامانه">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> لینک  اول :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-4 "  name="name" placeholder="عنوان">
                        <input type="text" id="title" required=""
                               class="form-control col-md-5 mr-1"  name="name" placeholder="لینک">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> لینک  دوم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-4 "  name="name" placeholder="عنوان">
                        <input type="text" id="title" required=""
                               class="form-control col-md-5 mr-1"  name="name" placeholder="لینک">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> لینک  سوم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-4 "  name="name" placeholder="عنوان">
                        <input type="text" id="title" required=""
                               class="form-control col-md-5 mr-1"  name="name" placeholder="لینک">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> لینک  چهارم :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-4 "  name="name" placeholder="عنوان">
                        <input type="text" id="title" required=""
                               class="form-control col-md-5 mr-1"  name="name" placeholder="لینک">
                    </div>
                    {{--<div class="form-group row pt-4">--}}
                    {{--<label class="col-md-3 col-form-label "--}}
                    {{--style="" for="title">Name :</label>--}}
                    {{--<div class="col-md-8 mr-auto">--}}
                    {{--<select name="name" id="" class="form-control">--}}
                    {{--<option value="1"></option>--}}
                    {{--<option value="Departments & Courses">Departments & Courses</option>--}}
                    {{--<option value="How to apply">How to apply</option>--}}

                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group row py-4">--}}
                    {{--<label class="col-md-3 col-form-label "> text :</label>--}}
                    {{--<div class="col-md-8 mr-auto">--}}
                    {{--<textarea type="text" id="editor1" required=""--}}
                    {{--class="form-control" name="description" placeholder="set content here">--}}
                    {{--</textarea>--}}
                    {{--<script>--}}
                    {{--CKEDITOR.replace( 'editor1' );--}}
                    {{--</script>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group row py-4">--}}
                    {{--<label class="col-md-3 col-form-label " style="" for="title">Document :</label>--}}
                    {{--<div class="col-md-8 mr-auto">--}}
                    {{--<div  id="fileInputsContainer">--}}
                    {{--<div class="d-flex flex-row justify-content-between">--}}
                    {{--<input type="file" id="images"--}}
                    {{--class="form-control-file" name="images[]">--}}
                    {{--<button class="btn btn-outline-success text-dark " onclick="addDocumentInput()">Add Document</button>--}}
                    {{--</div>--}}
                    {{--</div> </div>--}}
                    {{--</div>--}}
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