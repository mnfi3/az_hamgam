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
<div class="container py-5 " style="margin-top: 150px; background-color: #4fa1bf;margin-bottom: 150px; border-radius: 10px">
    <div class="d-flex flex-row-reverse">
        <div class="text-white text-right ">
            <h3 style="font-family: Vazir;"> پنل کاربر </h3>
        </div>
    </div>
    @include('student.student-navbar')
    <div class="container my-4 " id="profile">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/student/profile-update')}}" method="post" class="row">
                    @csrf
                    <div class="col-6">
                        <div class="form-group row">
                            <input  type="text" class="col-md-7 form-control" name="last_name" required placeholder="نام خانوادگی" value="{{$user->last_name}}">
                            <label for="name" class="col-md-4 mt-1">: نام خانوادگی </label>
                        </div>
                        <div class="form-group row">
                            <select name="field_id" class="col-md-7 form-control" >
                                @foreach($fields as $field)
                                    <option value="{{$field->id}}" @if($user->studentField->id ==  $field->id) selected @endif>{{$field->name}}</option>
                                @endforeach
                            </select>
                            <label for="name" class="col-md-4 mt-1">: رشته تحصیلی </label>
                        </div>
                        <div class="form-group row">
                            <input type="number" class="col-md-7 form-control" name="student_number" required placeholder="شماره دانشجویی" value="{{$user->student_number}}">
                            <label for="name" class="col-md-4 mt-1">: شماره دانشجویی </label>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <input type="text" class="col-md-8 form-control" name="first_name" required placeholder="نام" value="{{$user->first_name}}">
                            <label for="name" class="col-md-3 mt-1">: نام </label>
                        </div>
                        <div class="form-group row">
                            <input type="number" class="col-md-8 form-control" name="mobile" required placeholder="شماره موبایل" value="{{$user->mobile}}">
                            <label for="name" class="col-md-3 mt-1">: شماره موبایل </label>
                        </div>
                        <div class="form-group row">
                            <input type="number" class="col-md-8 form-control" name="national_code" required placeholder="کد ملی" value="{{$user->national_code}}">
                            <label for="name" class="col-md-3 mt-1">: کد ملی </label>
                        </div>

                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit">ویرایش</button>
                            @if(\Illuminate\Support\Facades\Session::get('update') != null)
                                <p>{{\Illuminate\Support\Facades\Session::get('update')}}</p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
            <h5 style="text-align: right;color: #ffffff" class="py-3">:  تغییر رمز عبور </h5>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/student/change-password')}}" method="post" class="row">
                    @csrf
                    <div class="col-6 ml-auto">
                        <div class="form-group row">
                            <input type="password" class="col-md-7 form-control" name="old_password" required placeholder="رمز قبلی">
                            <label for="name" class="col-md-4 mt-1">: رمز قبلی</label>
                        </div>
                        <div class="form-group row">
                            <input type="password" class="col-md-7 form-control" name="password" required placeholder="رمز جدید (حداقل 6 کاراکتر)" value="">
                            <label for="name" class="col-md-4 mt-1">:  رمز جدید</label>
                        </div>
                        <div class="form-group row">
                            <input type="password" class="col-md-7 form-control" name="password_confirmation" required placeholder="تکرار رمز جدید" value="">
                            <label for="name" class="col-md-4 mt-1">: تکرار رمز جدید</label>
                        </div>
                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit">ثبت تغییرات</button>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::get('password') != null)
                        <p>{{\Illuminate\Support\Facades\Session::get('password')}}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('include.footer')
</body>
<script>
  function addDocumentInput() {
    var referenceNode = document.getElementById('fileInputsContainer').lastChild;
    var newNode = document.createElement("DIV");
    newNode.className += 'mt-1'
    newNode.innerHTML = '<input type="file"  required=""\n' +
      '                       class="form-control-file" name="images[]">'
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
  }
</script>
</html>