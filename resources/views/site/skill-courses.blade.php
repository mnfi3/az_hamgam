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
    <link rel="stylesheet" href={{asset('css/pagination.css')}}>
</head>


<body>
@include('include.navigation')
<div>
    <div class="pt-5 mt-5 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 1.8rem ; text-align: center"> دوره های مهارتی ارائه شده </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="filter-section mt-2">
    <div class="container  mt-4">
        <div class="d-flex flex-row-reverse flex-wrap align-content-center ">
            <div class="flex-item text-dark">
                <h6>: فیلتر براساس  </h6>
            </div>


            <form method="get" action="{{url('/skill-learning/courses')}}">
                <div class="flex-item text-dark  mr-5 ">
                    <p>: دانشکده  </p>
                </div>
                <div class="flex-item text-dark">
                    <select class="browser-default custom-select " id="faculties" name="">
                        <option selected>همه دانشکده ها</option>
                        <option value="1"> فنی</option>
                        <option value="2">علوم پایه</option>
                        <option value="3">کامپیوتر</option>
                        <option value="3">برق</option>
                    </select>
                </div>
                <div class="flex-item text-dark  mr-2 ">
                    <p>: رشته  </p>
                </div>

                <div class="flex-item text-dark ">
                    <select class="browser-default custom-select" id="fields" name="field_id">
                        <option value="0" selected>همه رشته ها</option>
                        @foreach($fields as $field)
                        <option value="{{$field->id}}" @if($field_id == $field->id) selected @endif> {{$field->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-item text-dark  mr-2 ">
                    <p>: نیم سال  </p>
                </div>

                <div class="flex-item text-dark ">
                    <select class="browser-default custom-select" id="schedule" name="term">
                        <option value="0" selected>همه</option>
                        <option value="1" @if($term == 1) selected @endif> اول</option>
                        <option value="2" @if($term == 2) selected @endif>دوم</option>
                        <option value="3" @if($term == 3) selected @endif>تابستان</option>
                    </select>
                </div>
                <div class="flex-item text-dark ">
                    <a href="{{url('/')}}">
                        <button class="custom-btn text-center mr-2 "type="submit" style="max-width: 130px">
                            <span>جستجو</span>
                        </button>
                    </a>
                </div>
            </form>



        </div>
    </div>
</div>


<div class="page-sections">
    <div class="container bg-light">
        <div class="row pt-5 m-auto">
            @foreach($courses as $course)
            <div class="col-md-4 col-lg-4 pb-3">
                <div class="card card-custom bg-white border-white border-0">
                    <div class="card-custom-img" style="background-image: url({{asset($course->image)}})"></div>
                    <div class="card-custom-avatar">
                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                    </div>
                    <div class="card-body pt-2" style="overflow-y: hidden">
                        <h4 class="card-title"> {{$course->title}}</h4>
                        <p class="card-text">
                            @php echo $course->description; @endphp
                        </p>
                        <p>مدرس :  {{$course->master->first_name . ' ' . $course->master->last_name}}</p>
                        <p>زمان : {{$course->time}}</p>
                        @if(count($course->prerequisites) == 0)
                        <p>: پیش نیاز
                        <br>
                        <br>
                            ندارد
                        </p>
                        @else
                            <p> : پیش نیاز
                                <br>
                                <br>
                            @foreach($course->prerequisites as $prerequisite)
                                   <span class="m-auto bg-primary p-1"> {{$prerequisite->title}}</span>
                            @endforeach
                            </p>
                        @endif
                    </div>
                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                        <div align="right">
                            <a href="{{url('skill-learning/course', $course->id)}}">
                                <button class="custom-btn text-center m-0 "type="submit" >
                                    <span>ثبت نام</span>
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>
<div class="pagination-section">
    <div class="container my-3 ">
        <div class="row ">
            <div class="col-8 " align="center">
                <div class="pagination ">
                    {{$courses->links()}}

                    {{--<a href="#">&laquo;</a>--}}
                    {{--<a href="#">1</a>--}}
                    {{--<a href="#" class="active">2</a>--}}
                    {{--<a href="#">3</a>--}}
                    {{--<a href="#">4</a>--}}
                    {{--<a href="#">5</a>--}}
                    {{--<a href="#">6</a>--}}
                    {{--<a href="#">&raquo;</a>--}}
                </div>
            </div>
        </div>

    </div>
</div>
@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script src="{{asset('js/pagination.js')}}"></script>
</body>

</html>