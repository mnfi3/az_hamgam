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
            <div class="col-md-12 col-sm-12">
                <h5 class="text-white text-right my-4" style="font-family: Vazir"> دوره های مهارتی شما</h5>
                <div style="height: 1px;background-color: #721c24; margin: 10px 5px"></div>
                <div class="page-sections">
                    <div class="container">
                        <div class="row pt-5 m-auto">
                            @foreach($courses as $course)
                            <div class="col-md-4 col-lg-4 pb-1">
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
                                            <a href="{{url('/master/course-detalis', $course->id)}}">
                                                <button class="custom-btn text-center m-0 "type="submit" >
                                                    <span>جزئیات</span>
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
                {{--<div class="pagination-section">--}}
                    {{--<div class="container my-3 ">--}}
                        {{--<div class="row ">--}}
                            {{--<div class="col-8 " align="center">--}}
                                {{--<div class="pagination ">--}}
                                    {{--<a href="#">&laquo;</a>--}}
                                    {{--<a href="#">1</a>--}}
                                    {{--<a href="#" class="active">2</a>--}}
                                    {{--<a href="#">3</a>--}}
                                    {{--<a href="#">4</a>--}}
                                    {{--<a href="#">5</a>--}}
                                    {{--<a href="#">6</a>--}}
                                    {{--<a href="#">&raquo;</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
@include('include.footer')
</body>
<script>
  function addDocumentInput() {
    var referenceNode = document.getElementById('fileInputsContainer').lastChild;
    var newNode = document.createElement("DIV");
    newNode.className += 'mt-1'
    newNode.innerHTML = '<input type="file"  required=""\n' +
      '                       class="form-control-file" name="images[]">'
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }
</script>
</html>