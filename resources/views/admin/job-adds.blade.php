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
        <form action="{{url('/admin/job-ads/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر:</label>
                <div class="col-md-5">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                </div>

            </div>
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر:</label>
                <div class="col-md-5">
                    <input type="file" id="editor1"
                           class="form-control" name="image">
                </div>
                <div class="col-md-3">
                    <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                </div>
            </div>
        </form>
        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column p-2" style="box-shadow: 0px 0px 15px rgba(10, 10, 10, 0.6);border-radius: 5px">
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">همه مشاغل</h5>
                        <ul style="direction: rtl" class="side-list2">
                            @foreach($ads as $ad)
                                <li>
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <p class="text-light text-right mb-2 pr-2">{{$ad->title}}</p>
                                        <a href="{{url('/admin/job-ad/remove', $ad->id)}}" class="custom-btn text-center">حذف</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">اضافه کردن فرصت شغلی</h5>

                <form action="{{url('/admin/job-ad/insert')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان </label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="title" placeholder="عنوان ">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="">توضیحات</label>
                        <textarea type="text" id="title" required=""
                                  class="form-control col-md-9 "  name="description" placeholder="توضیحات"></textarea>
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
<script type="text/javascript">
  $(document).ready(function() {
    $(".example1").pDatepicker();
  });
</script>
</body>
</html>