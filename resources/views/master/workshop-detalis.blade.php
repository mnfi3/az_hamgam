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
            <h3 style="font-family: Vazir;"> پنل استاد </h3>
        </div>
    </div>
    @include('master.master-navbar')
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">لیست دانشجویان</h5>
                <table class="table table-striped text-center usr-table" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">شماره دانشجویی</th>
                        <th scope="col">کد ملی</th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    @php($i=0)
                    @foreach($workshop->students as $student)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$student->first_name.' '.$student->last_name}}</td>
                        <td>{{$student->student_number}}</td>
                        <td>{{$student->national_code}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4">
                        <button class="custom-btn text-center" style="max-width: 145px" onclick="excelReport(this)">گرفتن خروجی اکسل </button></td>
                    </div>
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