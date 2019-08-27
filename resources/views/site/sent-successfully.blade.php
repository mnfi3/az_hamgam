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
    <div class="pt-5 mt-5 sent-data">
        <div class="container-fluid">
            <div class="d-flex flex-column mt-5 sent-data">
                <div class=" mr-auto ml-auto ">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 1.5rem ; text-align: center">.اطلاعات با موفقیت ارسال شد</h2>
                </div>
                    <a href="{{url('/')}}" class="text-white mr-auto ml-auto">
                        <button  class="custom-btn text-center "type="submit" >
                            <span>بازگشت به صفحه اصلی </span>
                        </button>
                    </a>
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