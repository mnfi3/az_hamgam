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
{{--<div class="consult-form">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-6 mr-auto ml-auto">--}}
{{--<form class="text-right forms mt-3">--}}
{{--<div class="form-group row">--}}
{{--<input required type="email" class="col-9 form-control text-right"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=".نام و نام خانوادگی خود را اینجا وارد نمایید">--}}
{{--<label for="exampleInputEmail1" class="col-3 text-dark mt-2"> : نام و نام خانوادگی </label>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<select class="browser-default custom-select text-right col-9">--}}
{{--<option selected>نوع کاربر</option>--}}
{{--<option value="1">دانشجو</option>--}}
{{--<option value="2">صنایع</option>--}}
{{--<option value="3">مدیریت</option>--}}
{{--<option value="3">انجمن</option>--}}
{{--</select> <label for="exampleInputEmail1" class="col-3 text-dark mt-2"> : نام و نام خانوادگی </label>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<textarea required class="form-control" id="questions" placeholder="سوال و درخواست ها">--}}
{{--سوال و درخواست ها--}}
{{--</textarea>--}}
{{--</div>--}}
{{--<div class="button_cont" align="left">--}}
{{--<button class="custom-btn text-center"type="submit" >--}}
{{--<span>ارسال</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<button type="submit" class="btn btn-primary">ارسال</button>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<div>
    <div class="pt-5 mt-3 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 2rem ; text-align: center">پیشنهاد برگزاری انواع دوره های مهارتی</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="signup-section">
    <div class="container" style=" min-height: 450px">
        <div class="row">
            <div class="col-12">
                <form class="login ml-auto mr-auto mt-3" align="center" method="post" action="{{url('/skill-learning/offer-insert')}}">
                    @csrf
                    <textarea name="title" type="text" required class=" ml-auto mr-auto" placeholder="دوره پیشنهادی و توضیحات مربوطه را وارد کنید" style="min-height: 190px"></textarea>
                    @if(\Illuminate\Support\Facades\Session::get('msg') != null)
                        <p>درخواست شما ثبت شد.پاسخ دهی به درخواست ها در اسرع وقت انجام خواهد شد و نتایج آن در پنل کاربری قابل مشاهده خواهد بود</p>
                    @endif
                        <button  class="custom-btn text-center m-0 "type="submit" >
                            <span>ارسال درخواست </span>
                        </button>
                    @guest
                        <br><span>برای ارسال درخواست باید وارد حساب کاربری خود شوید </span>
                    @endguest
                </form>
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