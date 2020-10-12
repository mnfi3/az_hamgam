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
        <div class="row mt-5 pt-4 " >
            <div class="col-md-3 col-sm-12 mt-5">
            </div>
            <div class="col-md-8 " style="">
                <div class="d-flex flex-row justify-content-center">
                    <img src="{{asset($ad->image)}}" alt="" style=" max-width: 650px;max-height: 300px " class="">
                </div>
                <h4 class="my-2 text-right p-3 ">{{$ad->title}}</h4>
                        <p class="card-text text-right">
                            @if($ad->industry_id > 0)
                            آگهی دهنده  : <span style="font-weight:600">  {{$ad->industry->first_name}} </span>
                            @else
                                آگهی دهنده  : <span style="font-weight:600">  مدیریت </span>
                            @endif
                        </p>


                @if(strlen($ad->skills) > 3)
						<p class="card-text text-right">
                           : مهارت های مورد نیاز
                        </p>
						<p class="card-text text-right" style="text-direction : ltr !important">
                            <span style="font-weight:600">{{$ad->skills}}</span>
                        </p>
                @endif

                @if(strlen($ad->salary) > 3)
						<p class="card-text text-right">
                             حقوق:  <span style="font-weight:600"> {{$ad->salary}}</span>
                        </p>
                @endif

						<p class="card-text text-right">
                             :توضیحات
                        </p>
						<p class="card-text text-right mb-3">
                           <span style="font-weight:600">{{$ad->description}}</span>
                        </p>


                @guest
                    <span class="col-md-6"> <p  style="text-align: right; font-family: Vazir">برای ارسال رزومه باید وارد حساب کاربری خود شوید و یا ثبت نام کنید </p></span>
                @endguest

                @auth

                @php
                    $is_sended = false;
                    foreach ($ad->users as $user){
                        if($user->id == \Illuminate\Support\Facades\Auth::user()->id){
                            $is_sended = true;
                            break;
                        }
                    }
                @endphp






                @if($is_sended == true)
                <span class="text-success text-right">شما قبلا به این فرصت شغلی رزومه ارسال کرده اید</span>
                @endif
                <form class=" ml-auto my-1" align ="center" method="post" action="{{url('/academic-guidance/job-details/upload-resume')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$ad->id}}" required>
                    <div class="row py-2">
                        <div class="col-md-4 ml-auto">
                            <div id="fileInputsContainer ">
                                <div class="d-flex flex-row">
                                    <input type="file" id="file"
                                           class="" required name="file">
                                </div>
                            </div>
                        </div>
                        <label class="col-md-4 ml-auto" style="text-align: right; font-size: 15px" >:(10MB حداکثر  )آپلود رزومه</label>
                    </div>
                    <div class="d-flex flex-row justify-content-center my-3">
                        <button  class="custom-btn text-center m-0 "type="submit" >
                            <span>ارسال</span>
                        </button>
                    </div>


                    @if(\Illuminate\Support\Facades\Session::get('mess'))
                    <span class=""> {{\Illuminate\Support\Facades\Session::get('mess')}}</span>
                    @endif

                </form>
                @endauth

                <br>
            </div>
        </div>

    </div>
</div>
@include('include.footer')
<script  src= {{asset('/js/num-animation.js')}}></script>
</body>
</html>
