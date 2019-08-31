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
@include('include.carousel', $sliders)
<div class="decription-section py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="mr-2 mt-3" style="text-align: center">
                    درباره سامانه همگام
                </h2>
                <p class=" py-3 my-2">
                    {{$about}}
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
                    <i class="fa fa-search-plus  "></i>
                    <div class="count">{{$ideas_count}}</div>
                    <div class="title">ایده ثبت شده</div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 text-center my-1">
                    <i class="fa fa-user "></i>
                    <div class="count">{{$masters_count}}</div>
                    <div class="title"> استاد </div>
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
@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>

</html>