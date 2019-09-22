<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}" />
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
    <div class="container my-4 " id="">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="d-flex flex-column">

                    <div class="d-flex flex-column p-2" style="box-shadow: 0px 0px 15px rgba(10, 10, 10, 0.6);border-radius: 5px">
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">اخبار و اطلاعیه ها</h5>

                       @foreach($posts as $post)
                        <ul style="direction: rtl" class="side-list2">
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">{{$post->title}}</p>
                                    <a href="{{url('/admin/new/remove', $post->id)}}" class="custom-btn text-center">حذف</a>
                                </div>
                            </li>
                        </ul>
                        @endforeach


                    </div>


                </div>
            </div>
            <div class="col-md-8">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">افزودن خبر و اطلاعیه</h5>

                <form action="{{url('/admin/new/add')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-sm-2 col-form-label " style=""> عنوان خبر :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-sm-8 "  name="title" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-10 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >فایل:(در صورت وجود)</label>
                        <div class="col-md-10 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"
                                           class="form-control-file" name="file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-8">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                    </div>
                </form>

            </div>

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
<script src="{{asset('js/jquery.js/jquery.min.js')}}"></script>
<script src="{{asset('js/persian-date.min.js')}}"></script>
<script src="{{asset('js/persian-datepicker.min.js')}}"></script>
<script>
  (function ($) {
    $(document).ready(function () {
      console.log('hello Ali');
      $(".start-day").persianDatepicker({
        format: 'YYYY/MM/DD',
        timePicker: {
          enabled: false
        }
      })
    });
  })
  (window.jQuery);
</script>
</body>
</html>