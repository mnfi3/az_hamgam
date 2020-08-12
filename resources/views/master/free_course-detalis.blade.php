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
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">لیست دانشجویان {{$free_course->title}}</h5>
                <button class="custom-btn text-center" id="btn" style="max-width: 110px">خروجی اکسل </button>
                <table class="table table-striped text-center usr-table" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">شماره دانشجویی</th>
                        <th scope="col">کد ملی</th>
                        <th scope="col">نمره</th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                    @php($i=0)
                    @foreach($free_course->students as $student)
                    <tr>
                        <td scope="row">{{++$i}}</td>
                        <td>{{$student->first_name.' '.$student->last_name}}</td>
                        <td>{{$student->student_number}}</td>
                        <td>{{$student->national_code}}</td>
                        @if(strlen($student->studentPivotFreeCourses()->where('free_course_id', '=', $free_course->id)->first()->mark) == 0)
                            <td style="width: 290px">
                                <form action="{{url('/master/free-course-detalis/add-mark')}}" method="post"  class="px-3" style="direction: rtl;font-family: Vazir">
                                    @csrf
                                    <input type="hidden" name="free_course_id" value="{{$free_course->id}}">
                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                    <div class="form-group row py-4">
                                        <input type="number" id="title" required=""
                                               class="form-control col-md-6 col-sm-12 mx-2"  name="mark" value="" placeholder="نمره به عدد">
                                        <button class="btn btn-warning col-md-3 col-sm-8 text-center" type="submit" style="width: 120px;text-align: center">ثبت</button>
                                    </div>
                                </form>
                            </td>
                        @else
                            <td>{{$student->studentPivotFreeCourses()->where('free_course_id', '=', $free_course->id)->first()->mark}}</td>
                        @endif
                    </tr>
                    @endforeach
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
            columns : [0,1,2,3]
        })
    })

</script>
</body>
</html>
