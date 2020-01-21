<!--Carousel Wrapper-->
<section class="hero-area" style="max-height: 700px;margin-top: 85px">
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="">
        <!--Indicators-->
        <ol class="carousel-indicators">
            @php($i=0)
            @foreach($sliders as $slider)
                <li data-target="#carousel-example-2" data-slide-to="{{$i++}}" @if($i==1) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @php($i=0)
            @foreach($sliders as $slider)
                <div class="carousel-item bg-imge @if($i==0) active @endif" style="
                        background-image: url( '@if($slider->image != null) {{asset($slider->image)}} @endif');height: 70vh">
                    @php($i++)
                    <div class="carousel-caption p-5 ">

                        <div class="set-bg">
                            <h1 style="font-family: Vazir;  background-color: rgba(0,0,0,0.3); " class=" text-white">{{$slider->title}}</h1>
                            @if(strlen($slider->link) > 2)
                                <div class="button_cont" align="center">
                                    <a class="custom-btn" href="{{$slider->link}}" target="_blank" rel="nofollow">
                                        <span>اطلاعات بیشتر</span>
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>

</section>