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
    <link type="text/css" rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}" />

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
        <form action="{{url('/admin/free-courses/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر:</label>
                <div class="col-md-8">
                    <textarea type="text" id="editor1" required="" style="font-size: 0.8rem"
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                </div>
            </div>

            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر :</label>
                <div class="col-md-5">
                    <input type="file" id="editor1" required=""
                           class="form-control" name="image" >
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
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">همه دوره های آزاد</h5>
                        <ul style="direction: rtl" class="side-list2">
                            @foreach($courses as $course)
                                <li>
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <p class="text-light text-right mb-2 pr-2">{{$course->title}}</p>
                                        <a href="{{url('/admin/free-courses/remove', $course->id)}}" class="custom-btn text-center">حذف</a>
                                        <a href="{{url('/admin/free-course-details', $course->id)}}" class="custom-btn text-center">جزئیات</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دوره های آزاد</h5>

                <form action="{{url('/admin/free-course/add')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> عنوان دوره :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="title" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> کد دوره :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="code" placeholder="کد دوره">
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
                        <label class="col-md-2 col-form-label " style=""> مدرس دوره :</label>
                        <select class="browser-default custom-select col-md-8" name="master_id">
                            @foreach($masters as $master)
                                <option value="{{$master->id}}">{{$master->first_name.' '.$master->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0" for="time">تاریخ برگزاری :</label>
                        <div class="col-sm-10">
                            <input  type="text"  name="time" class="form-control start-day example1" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0" for="time">ساعت برگزاری :</label>
                        <div class="col-sm-10">
                            <input  type="text"  name="hour" class="form-control col-md-10" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0" for="time">مدت (ساعت) :</label>
                        <div class="col-sm-10">
                            <input  type="number"  name="duration" placeholder="ساعت" class="form-control col-md-10" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> ظرفیت دوره</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-10 "  name="capacity" placeholder="ظرفیت">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> هزینه دوره</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-10 "  name="price" placeholder="هزینه (تومان)">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">توضیح مختصر </label>
                        <div class="col-md-9 mr-auto">
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
