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
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                {{--<div class="d-flex flex-column">--}}
                    {{--<div class="d-flex flex-column p-2" style="box-shadow: 0px 0px 15px rgba(10, 10, 10, 0.6);border-radius: 5px">--}}
                        {{--<h5 class="text-white" style="font-family: Vazir;text-align: right">ارسال پیام به استاد</h5>--}}
                        {{--<form action="" class="px-3" style="direction: rtl;font-family: Vazir">--}}
                            {{--<div class="form-group row py-4">--}}
                                {{--<label class="col-md-3 col-form-label ">متن پیام :</label>--}}
                                {{--<div class="col-md-9 mr-auto">--}}
                    {{--<textarea type="text" id="editor1" required=""--}}
                              {{--class="form-control" name="description" placeholder="توضیحات" style="min-height: 260px"></textarea>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="d-flex justify-content-center mb-3">--}}
                                {{--<button class="custom-btn text-center" type="submit" style="max-width: 100px">ارسال</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
            <div class="col-md-7 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دوره ها و کارگاه های استاد</h5>
                <div class="row pt-5 m-auto">
                    @foreach($master->masterCourses as $course)
                    <div class="col-md-6 col-lg-6 pb-3">
                        <div class="card card-custom bg-white border-white border-0">
                            <div class="card-custom-img" style="background-image: url({{asset($course->image)}})"></div>
                            <div class="card-custom-avatar">
                                {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                            </div>
                            <div class="card-body pt-2" style="overflow-y: hidden">
                                <h4 class="card-title">{{$course->title}}</h4>
                            </div>
                            <div class="card-footer" style="background: inherit; border-color: inherit;">
                                <div align="right">
                                    {{--<a href="{{asset('/admin/course-detailes')}}">--}}
                                        {{--<button class="custom-btn text-center m-0 "type="submit" >--}}
                                            {{--<span>جزئیات</span>--}}
                                        {{--</button>--}}
                                    {{--</a>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                        @foreach($master->masterWorkshops as $workshop)
                            <div class="col-md-6 col-lg-6 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url({{asset($workshop->image)}})"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h4 class="card-title">{{$workshop->title}}</h4>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            {{--<a href="{{asset('/admin/course-detailes')}}">--}}
                                            {{--<button class="custom-btn text-center m-0 "type="submit" >--}}
                                            {{--<span>جزئیات</span>--}}
                                            {{--</button>--}}
                                            {{--</a>--}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
</body>
</html>