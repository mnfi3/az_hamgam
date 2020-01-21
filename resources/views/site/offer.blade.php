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
                    <div class=" row py-4">

                        <div class="col-md-4 ">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="image">
                                </div>
                        </div>
                        <label class="col-md-8 " style="text-align: right" >: فایل (در صورت وجود)</label>
                    </div>
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