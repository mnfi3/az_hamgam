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
            <div class="col-md-4">
                <button class="custom-btn text-center" type="submit" style="max-width: 110px" onclick="excelReport(this)" >خروجی اکسل </button></td>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دانشجویان ثبت نامی</h5>
                <table class="table table-striped text-center usr-table" id="کاربران" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
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
                                <th scope="row">{{++$i}}</th>
                                <td>{{$student->first_name.' '.$student->last_name}}</td>
                                <td><a href="{{url('/admin/users/student-detailes', $student->id)}}" class="custom-btn text-center m-2 p-2" style="max-width: 110px" >مشاهده </a></td>
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




            <div class="col-md-6 col-sm-12 ">
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
                        <label class="col-md-2 col-form-label " style=""> ساعت برگزاری</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-10 "  name="hour" placeholder="ساعت" value="{{$workshop->hour}}">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="">مدت</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-10 "  name="duration" placeholder="ساعت" value="{{$workshop->duration}}">
                    </div>

                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> ظرفیت کارگاه</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-10 "  name="capacity" placeholder="ظرفیت" value="{{$workshop->capacity}}">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style=""> هزینه کارگاه</label>
                        <input type="number" id="title" required=""
                               class="form-control col-md-10 "  name="price" value="{{$workshop->price}}" placeholder="هزینه (تومان)">
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


<script>
  window.excelReport = function (elm) {
    var sheetname = " لیست ";
    var tableId = "کاربران";
    tableToExcel(tableId, sheetname);
  }
  $(document).on('click', '#exportreptoexcelfile', function (event) {
    //working great with Arabic without filename
    console.log(event)
    var sheetname = $("#chainnames").children(":selected").text();
    tableToExcel('students', sheetname);

  });

  var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
      ,
      template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table border="2px"><tr>{table}</table></body></html>'
      , base64 = function (s) {
        return window.btoa(unescape(encodeURIComponent(s)))
      }
      , format = function (s, c) {
        return s.replace(/{(\w+)}/g, function (m, p) {
          return c[p];
        })
      }
    return function (table, name) {
      var tableId = table
      if (!table.nodeType) table = document.getElementById(table)
      var orginalTable = table.innerHTML
      var lastColValid = false
      if ($(table).hasClass('course-payment')) {
        lastColValid = true
      }
      for (var j = 0; j < table.rows.length; j++) {
        if (j == 3) {
          table.rows[j].cells[1].width = 180
          table.rows[j].cells[2].width = 180
          table.rows[j].cells[3].width = 180
          try {
            table.rows[j].cells[4].width = 180
          } catch (err) {
          }
        }
        if (!lastColValid) {
          var lastIndex = $(table.rows[j]).children(":last").index()
          var firstElm = $(table.rows[j]).children(":first")
          if ($(firstElm).attr("type") == "hidden") {
            lastIndex = lastIndex - 1
            table.rows[j].deleteCell(lastIndex)
            table.rows[j].deleteCell(lastIndex - 1)
            table.rows[j].deleteCell(lastIndex - 2)
          } else if (lastIndex >= 5) {
            table.rows[j].deleteCell(lastIndex)
            table.rows[j].deleteCell(lastIndex - 1)
          }
        }
      }
      // table.innerHTML=table.innerHTML.replace('/?????/g','')
      var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      table.innerHTML = orginalTable
      // window.location.href = uri + base64(format(template, ctx))
      var dt = new Date();
      var day = dt.getDate();
      var month = dt.getMonth() + 1;
      var year = dt.getFullYear();
      var postfix = day + "." + month + "." + year;
      var result = uri + base64(format(template, ctx));
      var a = document.createElement('a');
      a.href = result;
      a.download = name + tableId + ' _ ' + postfix + '.xls';
      a.click();
      return true;
    }
  })()


</script>

</body>
</html>