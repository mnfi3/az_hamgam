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
<div class="container-fluid py-5 " style="margin-top: 150px; background-color: #4fa1bf;margin-bottom: 150px; border-radius: 10px">
    <div class="d-flex flex-row-reverse">
        <div class="text-white text-right ">
            <h3 style="font-family: Vazir;"> پنل مدیریت </h3>
        </div>
    </div>
    @include('admin.admin-navbar')
    <div class="container-fluid my-4 " id="side-list">
        <h6 class="text-white text-right mb-2" style="font-family: Vazir">ویرایش فرصت شغلی</h6>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/admin/job-ad/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <input type="hidden" name="id" value="{{$ad->id}}">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان فرصت شغلی :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-7 "  name="title" placeholder="فرصت شغلی" value="{{$ad->title}}">
                    </div>
                    <div class="form-group row py-4">
                        <img src="{{asset($ad->image)}}" style="height: 100px; height: 100px;text-align: center">
                        <label class="col-md-3 col-form-label " style="" >تصویر(درصورتی که نیاز به تغییر تصویر نیست هیچ فایلی انتخاب نکنید)  :</label>
                        <div class="col-md-7 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="time">مهارت های مورد نیاز :</label>
                        <textarea type="text" id="editor1" required=""
                                  class="form-control col-sm-7" style="height: 150px" name="skills" placeholder="مهارت های مورد نیاز" >{{$ad->skills}}</textarea>
                    </div>


                    <div class="form-group row ">
                        <label class="col-md-3 col-form-label " style="">حقوق :</label>
                        <input  type="text" placeholder="مثلا توافقی یا سه تا پنج میلیون"  name="salary" class="col-sm-7 form-control start-day example1" required value="{{$ad->salary}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">توضیح مختصر </label>

                        <textarea type="text" id="editor1" required=""
                                  class="form-control col-sm-7" style="height: 150px"  name="description" placeholder=" توضیحات درباره فرصت شغلی و یا شرکت">{{$ad->description}}</textarea>

                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ثبت تغییرات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
@include('include.footer')
</body>
</html>
