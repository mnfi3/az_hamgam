<h5 class="text-right mr-r text-white" style="font-family: Vazir"> اطلاعات کاربری : {{$student->first_name. ' ' . $student->last_name}}  </h5>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> جنسیت : @if($student->is_male == 1) پسر @else دختر @endif </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> شماره موبایل : {{$student->mobile}} </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> شماره دانشجویی : {{$student->student_number}} </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> کد ملی : {{$student->national_code}} </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> رشته تحصیلی : @if($student->studentField != null)  {{$student->studentField->name}} @endif</h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> ایمیل : {{$student->email}} </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> شغل : {{$student->job_name}} </h6>
<h6 class="text-right mr-r text-white" style="font-family: Vazir"> شرکت : {{$student->job_company}} </h6>




<div class="container py-3">
    <div class="card-header m-auto " style="width: 60%;background-color: #151f33;border-radius: 7px">
        <ul class="nav nav-tabs card-header-tabs d-flex justify-content-between ">
            <li class="nav-item"><a  id="adminCardNavPass"  class="nav-link text-white " href="{{url('/admin/users/student/reset-password', $student->id)}}">
                    تغییر رمز <i class="fa fa-key mr-1"></i>

                </a></li>
            <li  class="nav-item "><a id="adminCardNavBooks"  class="nav-link text-white" href="{{url('/admin/users/student/report-card', $student->id)}}">
                    صدور کارنامه    <i class="fa fa-file-excel-o  mr-1"></i>
                </a>
            </li>
            <li  class="nav-item dropdown-toggle ">
                <a id="adminCardNavBooks"  class="nav-link text-white" href="#">
                    آموزش <i class="fa fa-graduation-cap  mr-1"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarSite" style="left: -70px">
                    <a class="dropdown-item" href="{{url('/admin/users/student/details/skill-courses', $student->id)}}">دوره های مهارتی</a>
                    <a class="dropdown-item" href="{{url('/admin/users/student/details/free-courses', $student->id)}}">دوره های آزاد</a>
                    <a class="dropdown-item" href="{{url('/admin/users/student/details/workshops', $student->id)}}">کارگاه های آموزشی</a>

                </div>
            </li>

        </ul>
    </div>
</div>


