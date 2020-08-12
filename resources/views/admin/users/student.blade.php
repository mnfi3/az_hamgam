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
    <div class="container-fluid my-4 " id="side-list">
        <div class="row">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h6 class="text-white text-right mb-2" style="font-family: Vazir">مدیریت دانشجویان</h6>
                    <form action="{{url('/admin/users/student')}}" method="get" class="row" style="">
                        <div class="form-group col-md-8 py-4 d-flex ml-auto mr-auto">
                            <button class="custom-btn text-center m-0" type="submit" style="max-width: 60px;font-size: 0.8rem">جستجو</button>
                            <input type="number" id="title"
                                   class="form-control ml-2" value="{{\Illuminate\Support\Facades\Session::get('national_code')}}"  name="national_code" placeholder="شماره ملی">
                            <input type="text" id="title"
                                   class="form-control ml-2" value="{{\Illuminate\Support\Facades\Session::get('name')}}"  name="name" placeholder="نام یا نام خانوادگی">
                        </div>
                    </form>
                <div class="row">
                    <div class="col-md-4">
                        <button class="custom-btn text-center" id="btn" style="max-width: 110px" >خروجی اکسل </button>
                    </div>
                </div>


                <table class="table table-striped text-center" id="کاربران" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">کد ملی</th>
                        <th scope="col">شماره دانشجویی</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">رشته تحصیلی</th>
                        <th scope="col">جزئیات</th>
                        <th scope="col">تسویه حساب</th>
                    </tr>
                    </thead>
                    <tbody class="text-dark" style="font-size: 0.9rem">
                    @php($i=0)
                    @foreach($students as $student)
                    <tr style="background: transparent">
                        <td scope="row">{{++$i}}</td>
                        <td>{{$student->first_name.' '.$student->last_name}}</td>
                        <td>{{$student->national_code}}</td>
                        <td>{{$student->student_number}}</td>
                        <td>{{$student->mobile}}</td>
                        @if($student->studentField != null)
                        <td>{{$student->studentField->name}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>
                            <a href="{{url('/admin/users/student-details', $student->id)}}" class="custom-btn text-center mt-0" style="max-width: 80px;text-decoration: none">جزئیات</a>
                        </td>
                        <td>
                            <form ... onsubmit="return checkForm(this);">
                                <div class="d-flex flex-row">

                                     <input type="checkbox" name="terms">
                                    <button class="custom-btn text-center" type="submit" style="max-width: 80px;font-size: 0.8rem">ثبت  </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                     @endforeach

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<!-- The Modal -->

</div>
@include('include.footer')


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
            columns : [0,1,2,3,4,5]
        })
    })

</script>
</body>

<script>
  function checkForm(form)
  {
    if(!form.terms.checked) {
    alert("لطفا تیک تسویه حساب را بزنید");
    form.terms.focus();
    return false;
  }
    return true;
  }

</script>
</html>
