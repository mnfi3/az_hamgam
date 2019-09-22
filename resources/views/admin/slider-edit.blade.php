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
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">ویرایش اسلایدر</h5>

                <form action="{{url('/admin/slider/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl">
                    @csrf
                    <input type="hidden" value="{{$slider->id}}" name="id">
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> عنوان :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="title" placeholder="" value="{{$slider->title}}">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="" >تصویر اسلایدر :</label>
                        <div class="col-md-9 mr-auto">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file" id="images"
                                           class="form-control-file" required name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label " style=""> لینک (در صورت وجود) :</label>
                        <input type="text" id="title"
                               class="form-control col-md-8 "  name="link" placeholder="" value="{{$slider->link}}">
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
</html>