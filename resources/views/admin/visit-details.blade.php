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
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-6 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">کاربران ثبت نامی</h5>
                <table class="table table-striped text-center usr-table" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">شماره تماس</th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    @php($i=0)
                    @foreach($visit->users as $user)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$user->first_name.' '.$user->last_name}}</td>
                        <td class="">{{$user->mobile}}</td>
                    </tr>
                    @endforeach


                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4">
                        <button class="custom-btn text-center" style="max-width: 110px" onclick="" >دریافت خروجی اکسل </button></td>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">جزئیات بازدید</h5>

                <form action="{{url('/admin/visit-industries/edit')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <input type="hidden" name="id" value="{{$visit->id}}">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان بازدید :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="title" value="{{$visit->title}}" placeholder="عنوان">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-10 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> مکان بازدید :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="time_place" value="{{$visit->time_place}}" placeholder=" مکان">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> ظرفیت :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="capacity" value="{{$visit->capacity}}" placeholder=" ظرفیت">
                    </div>
                    <div class="form-group row py-4 ">
                        <label class="col-md-3 col-form-label">  زمان :</label>
                        <input  type="text" name="deadline" class="form-control col-sm-9 start-day example1" value="{{$visit->deadline}}" required>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-9 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description"  placeholder="توضیحات">{{$visit->description}}</textarea>
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