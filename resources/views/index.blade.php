<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" سامانه همگام  با هدف آشنایی دانشجویان عزیز با شغلهای مرتبط با رشته تحصیلی و هدایت و راهنمایی آنها در دستیابی به  فرصتهای شغلی با استفاده از مشاوران در این زمینه و همچنین امکان آموزش دوره های مهارتی لازم و برگزاری کارگاههای آموزشی و آشنایی با تجربیات دانش آموختگان موفق دانشگاه می باشد. ">
    <meta name="keyword" content="سامانه همگام،ایده،نواوری،نوآوری،مهارت آموزی،هدف،اشتغال زایی،کار آفرینی،دوره های مهارتی،کارگاه های آموزشی">
    @include('include.page-title')
    @include('include.bootstrap')
    @include('include.nav-style-js')
</head>
<body>
@include('include.navigation')
@include('include.carousel', $sliders)

<div id="latest-news">
    <div class="row ">
        <div class="col-md-10 col-sm-12 ">

            <div id="carouselContent" class="carousel slide" data-ride="carousel" style="height: 40px;padding-top: 10px">
                <div class="carousel-inner" role="listbox" style="">
                    <?php $i=0; ?>
                    @foreach($posts as $post)
                        <div class="carousel-item @if($i==0) active @endif text-center ">
                            <a href="{{url('/news/detailes', $post->id)}}" class="">{{$post->title}}</a>
                        </div>
                        <?php $i++; ?>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block" style="background: linear-gradient(to right, #8d0c35, #eb185c) !important;">
            <div class="d-flex flex-column-reverse justify-content-center align-items-center" style="height:100% " >
                <h6 class="text-center text-white mt-2"> : آخرین اخبار و اطلاعیه ها</h6>
            </div>
        </div>

    </div>

</div>

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


<div class="statictical-section" >
    <div class="dark-overlay" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="row" style="background: #151f33;border-top: 1px solid #eb185c;border-bottom: 3px solid #3d3d3d;">
            <section class="tabs col-md-10 m-auto col-sm-12">
                <div class="container ">
                    <div id="tab-1" class="tab-item ">
                        <i class="fa fa-close fa-5x"></i>
                        <p class="hide-sm">آخرین رویداد های برگزار شده</p>
                    </div>
                    <div id="tab-2" class="tab-item tab-border">
                        <i class="fa fa-clock-o fa-5x"></i>
                        <p class="hide-sm">رویداد های نزدیک</p>
                    </div>
                    <div id="tab-3" class="tab-item">
                        <i class="fa fa-universal-access fa-5x"></i>
                        <p class="hide-sm">رویداد های در حال برگزاری</p>
                    </div>
                </div>
            </section>
            {{--<div class="col-md-4 d-flex flex-column align-items-center justify-content-center">--}}
            {{--<h3 class="text-white text-center " style="font-weight: 500; font-size: 1.3rem"> ویژگی ها </h3>--}}
            {{--<h3 class=" text-center " style="font-weight: 500; font-size: 1.9rem;color:#d65611"> ایزی بازی  </h3>--}}
            {{--</div>--}}
        </div>
        <section class="tab-content">
            <div class="container">
                <!-- Tab Content 1 -->
                <div id="tab-1-content" class="tab-content-item ">
                    <div class="row m-auto">

                        @foreach($festivals2 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-1" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark m-0"> {{$course->title}} </h6>
                                        <p class="card-text mt-0">
                                            {{$course->description}}
                                        </p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->date, 'Y/m/d')}}</p>
                                        <p >ساعت : {{$course->hour}}</p>
                                    </div>
                                    <div class="card-footer pb-1" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/idea/festival-detail', $course->id)}}">
                                                <button class="custom-btn text-center m-0 m-auto "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        @foreach($free_courses2 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-1" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark m-0"> {{$course->title}} </h6>
                                        <p class="card-text mt-0">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->time, 'Y/m/d')}}</p>
                                    </div>
                                    <div class="card-footer pb-1" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/skill-learning/free-courses-detailes', $course->id)}}">
                                                <button class="custom-btn text-center m-0 m-auto "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($workshops2 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->time, 'Y/m/d')}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/gathering/workshop-detail', $course->id)}}">
                                                <button class="custom-btn text-center m-0 "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($courses2 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        <p>زمان : {{$course->time}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/skill-learning/course', $course->id)}}">
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

                <!-- Tab Content 2 -->
                <div id="tab-2-content" class="tab-content-item show">
                    <div class="row m-auto">

                        @foreach($festivals1 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->date, 'Y/m/d')}}</p>
                                        <p >ساعت : {{$course->hour}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/idea/festival-detail', $course->id)}}">
                                                <button class="custom-btn text-center m-0 "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($free_courses1 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->time, 'Y/m/d')}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/skill-learning/free-courses-detailes', $course->id)}}">
                                                <button class="custom-btn text-center m-0 "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($workshops1 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        @php($date = new \App\Http\Controllers\Util\PDate())
                                        <p >تاریخ : {{$date->toPersian($course->time, 'Y/m/d')}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/gathering/workshop-detail', $course->id)}}">
                                                <button class="custom-btn text-center m-0 "type="submit" >
                                                    <span>ثبت نام</span>
                                                </button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($courses1 as $course)
                            <div class="col-md-4 col-lg-4 pb-3">
                                <div class="card card-custom bg-white border-white border-0">
                                    <div class="card-custom-img" style="background-image: url('{{asset($course->image)}}')"></div>
                                    <div class="card-custom-avatar">
                                        {{--<img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />--}}
                                    </div>
                                    <div class="card-body pt-2" style="overflow-y: hidden">
                                        <h6 class="card-title text-dark"> {{$course->title}} </h6>
                                        <p class="card-text">
                                            {{$course->description}}
                                        </p>
                                        <p>مدرس :  {{$course->master->first_name.' '.$course->master->last_name}}</p>
                                        <p>زمان : {{$course->time}}</p>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <div align="right">
                                            <a href="{{url('/skill-learning/course', $course->id)}}">
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
        </section>
    </div>
</div>


<div class="question-section1 py-4">
    <div class="container ">
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

<div class="question-section">
    <div class="dark-overlay">
        <div class="container">

            <h2 class="mt-2 py-5 text-center text-white">آخرین اخبار و اطلاعیه ها </h2>
            <div class="row ">
                @foreach($posts as $post)
                    <div class="col-md-4 col-lg-4 pb-3">
                        <a href="{{url('/news/detailes', $post->id)}}" class="" style="color: black ;">
                            <div class="card news-card card-custom2 bg-white border-white border-0">
                                <div class="card-custom-img2" style="background-image: url('{{asset($post->image)}}');"></div>
                                <div class="card-body" style="overflow-y: auto">
                                    <h6 class="card-title">{{$post->title}}</h6>
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
</div>
@include('include.footer')

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
{{--@include('include.javascript')--}}
<script  src= {{asset('/js/num-animation.js')}}></script>
<script>
  var tabItems = document.querySelectorAll('.tab-item');
  var tabContentItems = document.querySelectorAll('.tab-content-item');

  // Select tab content item
  function selectItem(e) {
    // Remove all show and border classes
    removeBorder();
    removeShow();
    // Add border to current tab item
    this.classList.add('tab-border');
    var id = this.id;
    var trueId = "#"+id+"-content";
    // Grab content item from DOM
    var tabContentItem = document.querySelector(trueId);
    // Add show class
    tabContentItem.classList.add('show');
  }

  // Remove bottom borders from all tab items
  function removeBorder() {
    //   tabItems.forEach(item => {
    //     item.classList.remove('tab-border');
    // })
    tabItems.forEach(function (item) {

        item.classList.remove('tab-border');
      }
    );
  }

  // Remove show class from all content items
  function removeShow() {
    tabContentItems.forEach(function(item)  {
      item.classList.remove('show');
    });
  }

  // Listen for tab item click
  tabItems.forEach(function(item) {
    item.addEventListener('click', selectItem);
  });
</script>
</body>

</html>