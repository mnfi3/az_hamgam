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
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">همه دوره ها</h5>
                        <ul style="direction: rtl" class="side-list2">
                            @foreach($courses as $course)
                            <li>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <p class="text-light text-right mb-2 pr-2">{{$course->title}}</p>
                                    <a href="{{url('/admin/skill-course/remove', $course->id)}}" class="custom-btn text-center">حذف</a>
                                    <a href="{{url('/admin/course-detailes', $course->id)}}" class="custom-btn text-center">جزئیات</a>
                                </div>
                            </li>
                            @endforeach


                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 ">
                <form action="{{url('/admin/skill-courses/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر دوره های مهارتی :</label>
                        <div class="col-md-9">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">تصویر :</label>
                        <div class="col-md-5">
                            <input type="file" id="editor1"
                                   class="form-control" name="image" >
                        </div>
                        <div class="col-md-3">
                            <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                        </div>
                    </div>
                </form>


                <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>


                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دوره های مهارتی</h5>

                <form action="{{url('/admin/skill-course/add')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-sm-2 col-form-label " style=""> عنوان دوره :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-sm-8 "  name="title" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-sm-2 col-form-label " style=""> کد دوره :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-sm-8 "  name="code" placeholder="کد دوره">
                    </div>
                    <div class="form-group row py-4 ">
                        <label class="col-md-2 col-form-label " style=""> رشته های مرتبط:</label>
                        <div class="col-md-8">
                            <div class="bg-light d-flex flex-wrap align-items-stretch justify-content-start p-2 set-font bg-danger" style="border-radius: 5px;min-height: 200px;width: 100%">
                                @foreach($fields as $field)
                                    <div class=" p-1 mr-2 ">
                                <span class="custom-control " style="">
                                         <input type="checkbox" class="custom-control-input" id="defaultUnchecked{{$field->id}}" name="fields[]" value="{{$field->id}}">
                                         <label class="custom-control-label text-dark set-font" for="defaultUnchecked{{$field->id}}">{{$field->name}}</label>
                                </span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
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
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0">زمان برگزاری :</label>
                        <div class="col-sm-8">
                            <input  type="text"  name="time" class="form-control" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0">مدت (ساعت) :</label>
                        <div class="col-sm-8">
                            <input  type="number"  name="duration" class="form-control" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
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
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> نیم سال:</label>
                        <select class="browser-default custom-select col-md-8" name="term">
                            <option value="1">اول</option>
                            <option value="2">دوم</option>
                            <option value="3">تابستان</option>
                        </select>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> جنسیت:</label>
                        <select class="browser-default custom-select col-sm-8" name="gender">
                            <option value="mixed" selected>مشترک</option>
                            <option value="male">مرد</option>
                            <option value="female">زن</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0">ظرفیت (نفر): </label>
                        <div class="col-sm-8">
                            <input  type="number"  name="capacity" class="form-control" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 pt-0">هزینه (تومان) : </label>
                        <div class="col-sm-8">
                            <input  type="number"  name="price" class="form-control" value="0" required>
                            {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <legend class="col-form-label col-sm-2 pt-0">آخرین مهلت ثبت نام</legend>
                        <div class="col-sm-8">
                            <input  type="text" name="deadline" class="form-control start-day example1" required>
                        </div>
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-8 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات"></textarea>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label ">پیش نیاز (در صورت وجود):</label>
                        <div class="col-md-8 d-flex flex-wrap p-2" style="box-shadow: 0px 0px 5px rgba(0,0,0,0.4); border-radius: 5px">

                            @foreach($courses as $course)
                            <label class="checkbox-inline mr-3">
                                <input type="checkbox" name="prerequisite[]" class="mr-1 ml-1" value="{{$course->id}}" >{{$course->title}}
                            </label>
                            @endforeach

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
