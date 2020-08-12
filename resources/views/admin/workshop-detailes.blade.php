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

        <div class="row">
            <div class="col-md-8 col-sm-12 ml-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">جزئیات کارگاه</h5>

                <form action="{{url('/admin/workshop/edit')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <input type="hidden" name="id" value="{{$workshop->id}}">
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان کارگاه :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="title" value="{{$workshop->title}}" placeholder="نام دوره">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-9 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> مدرس دوره :</label>
                        <select class="browser-default custom-select col-md-9" name="master_id">
                            @foreach($masters as $master)
                                <option value="{{$master->id}}" @if($master->id == $workshop->master_id) selected @endif>{{$master->first_name.' '.$master->last_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3 pt-0">تاریخ برگزاری :</label>
                        <input  type="text" name="time" value="{{$workshop->time}}" class="form-control col-sm-9 start-day example1" required>
                        {{--                                <input value="{{date('Y-m-d')}}" type="text" name="start_date" >--}}

                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> ساعت برگزاری :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-9 "  name="hour" placeholder="ساعت" value="{{$workshop->hour}}">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="">مدت :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="duration" placeholder="ساعت" value="{{$workshop->duration}}">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> ظرفیت کارگاه :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="capacity" placeholder="ظرفیت" value="{{$workshop->capacity}}">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> هزینه کارگاه :</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-9 "  name="price" value="{{$workshop->price}}" placeholder="هزینه (تومان)">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                        <div class="col-md-9 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description"  placeholder="توضیحات">{{$workshop->description}}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>











        <div class="row mb-5">
            <div class="col-md-12 col-sm-12 ">

                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دانشجویان ثبت نامی</h5>
                <button class="custom-btn text-center" id="btn" style="max-width: 110px">خروجی اکسل </button>
                <table class="table table-striped text-center usr-table" id="کاربران" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">شماره دانشجویی</th>
                        <th scope="col">نمره</th>
                        <th scope="col">جرئیات</th>
                        <th scope="col">
                            ارسال گواهی

                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    <form action="{{url('/admin/workshop/send-cert')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$workshop->id}}" name="workshop_id">

                        @php($i=0)
                        @foreach($workshop->students as $student)
                            @php($bool = false)
                            <tr>
                                <td scope="row">{{++$i}}</td>
                                <td>{{$student->first_name.' '.$student->last_name}}</td>
                                <td>{{$student->mobile}}</td>
                                <td>{{$student->national_code}}</td>

                                @if(strlen($student->studentPivotWorkshops()->where('workshop_id', '=', $workshop->id)->first()->mark) > 0)
                                    <td>{{$student->studentPivotWorkshops()->where('workshop_id', '=', $workshop->id)->first()->mark}}</td>
                                @else
                                    <td>نمره وارد نشده است</td>
                                @endif

                                <td><a href="{{url('/admin/users/student-details', $student->id)}}" class="custom-btn text-center m-2 p-2" style="max-width: 110px" >مشاهده </a></td>
                                <td>
                                    @foreach($st_workshops as $stw)
                                        @if($stw->student_id == $student->id && $stw->has_certificate == 1)
                                            @php($bool=true)
                                            @break
                                        @endif
                                    @endforeach
                                    <input name="certs[]" @if($bool==true) checked @endif  type="checkbox" value="{{$student->id}}">
                                </td>
                            </tr>
                        @endforeach

                        <input class="custom-btn text-center" style="max-width: 110px" type="submit" value="ارسال">
                    </form>
                    </tbody>
                </table>

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



<script src="{{asset('js/jquery.js/jquery1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/table2excel.js')}}"></script>
<script>
    $("#btn").click(function () {
        var $table =  $('.table')
        $table.table2excel({
            name: "Excel Document Name",
            filename: "دانشجویان دوره",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true,
            columns : [0,1,2,3,4]
        })
    })

</script>

</body>
</html>
