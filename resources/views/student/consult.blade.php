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
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">مشاوره </h5>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">سوال</th>
                        <th scope="col">فایل ارسالی</th>
                        <th scope="col">مشاور</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">پاسخ</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    @php($i=0)
                    @foreach($consults as $consult)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$consult->title}}</td>
                        <td>{{$consult->question}}</td>

                        @if(strlen($consult->question_file) > 2)
                            <td>
                            <button type="button" class="btn btn-primary ">
                                <a class="text-white" style="text-decoration: none" href="{{Illuminate\Support\Facades\URL::to('/') .'/'.$consult->question_file}}" download="" >دانلود </a>
                            </button>
                            </td>
                        @else
                            <td>ندارد</td>
                        @endif
                        @if($consult->consultant != null)
                        <td>{{$consult->consultant->first_name.' '. $consult->consultant->last_name}}</td>
                        @else
                        <td></td>
                        @endif
                        @if(strlen($consult->answer) > 0)
                            <td >پاسخ داده شده</td>
                        @else
                            <td >پاسخ داده نشده</td>
                        @endif
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$consult->id}}">مشاهده </button></td>



                    </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="signup-section">
        <div class="container" style=" min-height: 450px">
            <div class="row">
                <div class="col-12">
                    <form class="login ml-auto mr-auto mt-3" align ="center" method="post" action="{{url('/academic-guidance/consult-insert')}}" enctype="multipart/form-data">
                        <h6>از این قسمت میتوانید سوال خود را مطرح کنید</h6>
                        @csrf
                        <input name="title" type="text" required class=" ml-auto mr-auto" placeholder="موضوع سوال">
                        <textarea name="question" type="text" required class=" ml-auto mr-auto" placeholder="متن سوال" style="min-height: 190px"></textarea>

                        <label for="is_male" class="text-right ml-auto d-flex flex-row-reverse ">: نام و سمت مشاور   </label>
                        <select name="consultant_id"  class="browser-default custom-select mb-4" >
                            @foreach($consultants as $consultant)
                                <option value="{{$consultant->id}}">{{$consultant->first_name.' '.$consultant->last_name}}</option>
                            @endforeach
                        </select>
                        @if(\Illuminate\Support\Facades\Session::get('msg') != null)
                            <p>سوال شما ثبت شد.پاسخ دهی به پرسش ها در اسرع وقت انجام خواهد شد و نتایج آن در پنل کاربری قابل مشاهده خواهد بود</p>
                        @endif
                        <div class="row py-2">

                            <label class="col-md-6 ml-auto" style="text-align: right; font-size: 15px" >:انتخاب صوت یا ویدئو</label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="fileInputsContainer ">
                                    <div class="d-flex flex-row">
                                        <input type="file" id="file"
                                               class=""  name="file">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button  class="custom-btn text-center m-0 mt-3"type="submit" >
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
</div>



@foreach($consults as $consult)
<div class="modal fade" id="myModal{{$consult->id}}" style="font-family: Vazir">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-right ml-auto">پاسخ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                <form action="" class="" style="direction: rtl;font-family: Vazir">
                    <div class="form-group row ">
                        <div class="col-md-12">
                    <span type="text" id="editor1" required="" style="width: 100%;height: 190px;font-size: 0.8rem"
                              class="form-control" name="description" placeholder="پاسخ دریافتی">{{$consult->answer}}</span>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <div class="col-md-12">
                            @if(strlen($consult->answer_file) > 2)
                                <button type="button" class="btn btn-primary ">
                                    <a class="text-white" style="text-decoration: none" href="{{Illuminate\Support\Facades\URL::to('/') .'/'.$consult->answer_file}}" download="" >دانلود فایل </a>
                                </button>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>
            </div>

        </div>
    </div>
</div>
@endforeach
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