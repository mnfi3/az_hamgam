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
<div>
    <div class="pt-5 mt-3 ">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-5 mr-auto ml-auto bottom-line">
                    <h2 class="text-center  p-2 mt-5 text-dark" style="font-family: Vazir; font-size: 3rem ; text-align: center">ثبت نام</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="signup-section">
    <div class="container" style=" min-height: 450px">
        <div class="row">
            <div class="col-12">
                <form class="login ml-auto mr-auto my-3" align ="center" method="post" action="{{route('register')}}">
                    @csrf

                    <input name="first_name" value="{{old('first_name')}}" type="text" required class=" ml-auto mr-auto" placeholder="نام">
                    @error('first_name')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror
                    <input name="last_name"  value="{{old('last_name')}}" type="text" required class=" ml-auto mr-auto" placeholder="نام خانوادگی">
                    @error('last_name')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror
                    <select name="is_male"  class="browser-default custom-select" >
                        <option value="1" selected>مرد</option>
                        <option value="0">زن</option>
                    </select>

                    <input name="mobile"  value="{{old('mobile')}}" type="tel" required class=" ml-auto mr-auto" placeholder="شماره موبایل">
                    @error('mobile')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror
                    <input name="student_number" value="{{old('student_number')}}" type="number"  class=" ml-auto mr-auto" style="direction: rtl" placeholder="شماره دانشجویی (برای دانشجویان) ">
                    @error('student_number')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror
                    <input name="national_code" value="{{old('national_code')}}" type="number" required class=" ml-auto mr-auto" style="direction: rtl" placeholder="کدملی">
                    @error('national_code')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror
                    @php($fields = \App\Field::all())
                    <select name="field_id" class="browser-default custom-select" >
                            <option value="" ></option>
                        @foreach($fields as $field)
                            <option value="{{$field->id}}" selected>{{$field->name}}</option>
                        @endforeach
                    </select>
                    <input name="email"  value="{{old('email')}}" type="email" required class=" ml-auto mr-auto" placeholder="ایمیل">
                    @error('email')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror

                    <input name="password" type="password" required class=" ml-auto mr-auto" placeholder="رمز عبور">
                    <input name="password_confirmation" type="password" required class=" ml-auto mr-auto" placeholder="تکرار رمز عبور">
                    @error('password')
                    <p style="color: #721c24;text-align: right;font-family: Vazir;font-size: 0.8rem">{{ $message }}</p>
                    @enderror


                    <button class="custom-btn text-center m-0 "type="submit" >
                        <span>ثبت نام</span>
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

@include('include.footer')
</body>

</html>