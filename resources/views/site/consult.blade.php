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
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 3rem ; text-align: center">مشاوره با متخصصان دانشگاه</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="signup-section">
    <div class="container" style=" min-height: 450px">
        <div class="row">
            <div class="col-12">
                <form class="login ml-auto mr-auto mt-3" align ="center" method="post" action="{{url('/academic-guidance/consult-insert')}}">
                    @csrf
                    <input name="title" type="text" required class=" ml-auto mr-auto" placeholder="موضوع سوال">
                    <textarea name="question" type="text" required class=" ml-auto mr-auto" placeholder="متن سوال" style="min-height: 190px"></textarea>
                    @if(\Illuminate\Support\Facades\Session::get('msg') != null)
                        <p>سوال شما ثبت شد.پاسخ دهی به پرسش ها در اسرع وقت انجام خواهد شد و نتایج آن در پنل کاربری قابل مشاهده خواهد بود</p>
                    @endif
                    <label for="is_male" class="text-right ml-auto d-flex flex-row-reverse ">: نام و سمت مشاور   </label>
                    <select name="consultant_id"  class="browser-default custom-select mb-4" >
                        @foreach($consultants as $consultant)
                            <option value="{{$consultant->id}}">{{$consultant->first_name.' '.$consultant->last_name}}</option>
                        @endforeach
                    </select>
                    <button  class="custom-btn text-center m-0 "type="submit" >
                        <span>ارسال پرسش </span>
                    </button>
                    @guest
                        <br><span>برای ارسال سوال باید وارد حساب کاربری خود شوید </span>
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