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
<div class="content mt-5">
    <div class="container ">
        <div class="row mt-5" >
            <div class="col-md-6 mr-auto ml-auto ">
                <img src="{{asset($image)}}" alt="">
            </div>
        </div>
        <p class="my-2 text-right p-3 ">
            @php echo $description; @endphp
        </p>

        <div class="d-flex flex-row-reverse flex-wrap">
            @if(strlen($file) > 2)
                <a href="{{asset($file)}}" download>
                    <button class="custom-btn text-center m-4 "type="submit" style="max-width: 130px">
                        <span> دانلود فایل</span>
                    </button>
                </a>
            @endif
        </div>
    </div>
</div>
@include('include.footer')
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>
</html>