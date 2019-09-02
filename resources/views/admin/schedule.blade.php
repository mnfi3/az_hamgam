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
        <form action="{{url('/admin/schedule/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر  :</label>
                <div class="col-md-5">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}} </textarea>
                </div>

            </div>

            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر :</label>
                <div class="col-md-5">
                    <input type="file" id="editor1" required=""
                              class="form-control" name="image">
                </div>

            </div>


            <div class="row">
                <div class="col-md-8 col-sm-12 ml-auto">
                    <h5 class="text-white text-right mb-2" style="font-family: Vazir">بارگذاری ترم بندی دوره های مهارتی</h5>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="" for="files">:  بارگذاری فایل </label>
                        <div class="col-md-9 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="file">
                                </div>
                            </div>
                        </div>  </div>

                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                    </div>
                </div>
            </div>

        </form>
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