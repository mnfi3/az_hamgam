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
                    @foreach($questions as $question)
                    <li>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <p class="text-light text-right mb-2 pr-2">{{$question->question}}</p>
                            <a href="{{url('/admin/question/remove', $question->id)}}" class="custom-btn text-center">حذف</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8 col-sm-12">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">اضافه کردن سوال</h5>

                <form action="{{url('/admin/question/add')}}" method="post" class="px-3" style="direction: rtl">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان سوال :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="question" placeholder="عنوان سوال">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> پاسخ سوال :</label>
                        <textarea type="text" id="title" required=""
                               class="form-control col-md-9 "  name="answer" placeholder="پاسخ"></textarea>
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