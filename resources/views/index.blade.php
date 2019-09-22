<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('include.page-title')
    @include('include.bootstrap')
    @include('include.nav-style-js')
</head>
<body>
@include('include.navigation')
@include('include.carousel', $sliders)
<div class="decription-section py-4" style="">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="mr-2 mt-1 " style="text-align: center">
                    درباره سامانه همگام
                </h2>
                <p class=" pb-3 mb-2">
                    @php echo $about; @endphp
                </p>
            </div>
        </div>
    </div>
</div>
<div class="statictical-section">
    <div class="dark-overlay">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-folder-open "></i>
                    <div class="count">{{$courses_count}}</div>
                    <div class="title"> دوره ارائه شده </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-star "></i>
                    <div class="count">{{$ideas_count}}</div>
                    <div class="title">ایده ثبت شده</div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-graduation-cap "></i>
                    <div class="count">{{$masters_count}}</div>
                    <div class="title"> استاد </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-users"></i>
                    <div class="count">{{$students_count}}</div>
                    <div class="title"> دانشجو </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-industry "></i>
                    <div class="count">{{$visits_count}}</div>
                    <div class="title"> بازدید از صنایع </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-building-o"></i>
                    <div class="count">{{$startups_count}}</div>
                    <div class="title">استارتاپ</div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-gears "></i>
                    <div class="count">{{$workshops_count}}</div>
                    <div class="title"> کارگاه برگزار شده </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-book "></i>
                    <div class="count">{{$fields_count}}</div>
                    <div class="title"> رشته </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="question-section py-4">
    <div class="container">
        <h2 class="mt-2 py-2 text-center"> سوالات متداول </h2>
        <div class="row my-3">

            <div class="col-md-6">
                <div class="panel-group" id="accordion">
                    @php($i=0)
                    @foreach($questions as $question)
                        @if($i % 2 == 0)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title " data-toggle="collapse" data-parent="#accordion" href="#collapse{{$question->id}}">
                                        <a >{{$question->question}}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{$question->id}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {{$question->answer}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php($i++)
                    @endforeach


                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel-group" id="accordion">
                    @php($i=0)
                    @foreach($questions as $question)
                        @if($i % 2 == 1)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title " data-toggle="collapse" data-parent="#accordion" href="#collapse{{$question->id}}">
                                        <a >{{$question->question}}</a>
                                    </h4>
                                </div>
                                <div id="collapse{{$question->id}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {{$question->answer}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php($i++)
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

<div class="question-section py-4">
    <div class="container">
        <h2 class="mt-2 py-2 text-center">آخرین اخبار و اطلاعیه ها </h2>
        <div class="row my-3">
           @foreach($posts as $post)
            <div class="col-md-4 col-lg-4 pb-3">
                <a href="{{url('/news/detailes', $post->id)}}" class="" style="color: black ;">
                    <div class="card news-card card-custom2 bg-white border-white border-0">
                        <div class="card-custom-img2" style="background-image: url('{{asset($post->image)}}');"></div>
                        <div class="card-body" style="overflow-y: auto">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p style="padding-top: 0px">
                                {{substr(strip_tags($post->description), 0, 30)}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach


        </div>
    </div>
</div>
@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>

</html>