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
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  جشنواره هایی که شرکت کرده اید: </h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان </th>
                <th scope="col">تاریخ</th>
                <th scope="col">فایل جشنواره</th>
                <th scope="col">فایل ارسال شده توسط شما</th>
                <th>مبلغ پرداختی</th>

            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            @php($i=0)
            @foreach($festivals as $festival)
            <tr>
                <td>{{++$i}}</td>
                <td><a href="{{url('/idea/festival-detail', $festival->id)}}">{{$festival->title}}</a></td>
                <td>{{(new \App\Http\Controllers\Util\PDate())->toPersian($festival->date, 'Y/m/d')}}</td>
                @if(strlen($festival->file) > 3)
                    <td><a class="btn-primary p-2" href="{{asset($festival->file)}}" download>دانلود</a></td>
                @else
                    <td class="text-danger">فایلی وجود ندارد</td>
                @endif
                @php($student_festival = \App\StudentFestivals::where('student_id', '=', \Illuminate\Support\Facades\Auth::user()->id)->where('festival_id', '=', $festival->id)->first())
                @if(strlen($student_festival->file) > 3))
                    <td><a class="btn-primary p-2" href="{{asset($student_festival->file)}}" download>دانلود</a></td>
                @else
                    <td class="text-danger">فایلی ارسال نکرده اید</td>
                @endif
                @php($payment = \App\Payment::where('paymentable_type', '=', 'App\Festival')
                ->where('paymentable_id', '=', $festival->id)->where('user_id', '=', \Illuminate\Support\Facades\Auth::user()->id)->first())
                @if($payment != null)
                 <td>{{number_format($payment->amount)}} تومان</td>
                @else
                 <td> 0 تومان</td>
                @endif

            </tr>
            @endforeach

            </tbody>
        </table>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  آپلود فرم و اطلاعات   </h5>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/student/festival/send-file')}}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    <div class="col-6 ml-auto">
                        <div class="form-group row">
                            <select name="festival_id"  class="col-md-9 browser-default custom-select mb-4" >
                                @foreach($festivals as $festival)
                                    <option value="{{$festival->id}}">{{$festival->title}}</option>
                                @endforeach

                            </select>
                            <label for="name" class="col-md-3 mt-1">: عنوان جشنواره </label>
                        </div>
                        <div class="form-group row py-2">
                            <div class="col-md-7">
                                <div  id="fileInputsContainer">
                                    <div class="d-flex flex-row justify-content-between">
                                        <input type="file" id="images"
                                               class="form-control-file" name="file">
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-3" >: انتخاب فایل </label>
                        </div>
                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit" style="max-width: 70px">ارسال</button>
                        </div>
                    </div>
                </form>


                @if(\Illuminate\Support\Facades\Session::get('success') != null)
                    <p style=" color: #1e7e34;text-align: right;font-family: Vazir;font-size: 1.5rem">{{ \Illuminate\Support\Facades\Session::get('success') }}</p>
                @endif

            </div>
        </div>

    </div>
    <!-- Modal footer -->

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