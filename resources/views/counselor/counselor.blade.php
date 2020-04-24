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
            <h3 style="font-family: Vazir;"> پنل مشاور </h3>
        </div>
    </div>
    @include('counselor.counselor-navbar')
    <div class="container my-4 " id="side-list">
        <h5 class="text-white text-right my-4" style="font-family: Vazir">پرسش ها</h5>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اطلاعات فردی</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">شماره تماس</th>
                        <th scope="col">رشته تحصیلی</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">مشاهده پرسش</th>
                        <th scope="col">پاسخ دادن</th>
                        <th scope="col">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    @php($i=0)
                    @foreach($consults as $consult)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$consult->user->first_name.' '.$consult->user->last_name}}</td>
                        <td>{{$consult->user->email}}</td>
                        <td>{{$consult->user->mobile}}</td>
                        <td>{{$consult->user->studentField->name}}</td>
                        <td>{{$consult->title}}</td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$consult->id}}">مشاهده </button></td>
                        <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal_{{$consult->id}}">پاسخ </button></td>
                        @if(strlen($consult->answer) > 0)
                        <td >پاسخ داده شده</td>
                        @else
                        <td >پاسخ داده نشده</td>
                        @endif
                    </tr>
                    @endforeach

                    </tbody>
                </table>


            </div>
            {{--<div class="pagination-section">--}}
                {{--<div class="container my-3 ">--}}
                    {{--<div class="row ">--}}
                        {{--<div class="col-8 " align="center">--}}
                            {{--<div class="pagination ">--}}
                                {{--<a href="#">&laquo;</a>--}}
                                {{--<a href="#">1</a>--}}
                                {{--<a href="#" class="active">2</a>--}}
                                {{--<a href="#">3</a>--}}
                                {{--<a href="#">4</a>--}}
                                {{--<a href="#">5</a>--}}
                                {{--<a href="#">6</a>--}}
                                {{--<a href="#">&raquo;</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>

@foreach($consults as $consult)
<!-- The Modals -->
<div class="modal fade" id="myModal{{$consult->id}}" style="font-family: Vazir">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                {{$consult->question}}
            </div>

            <div class=" row ">
                <div class="col-md-12">
                    @if(strlen($consult->question_file) > 2)
                        <button type="button" class="btn btn-primary ">
                            <a class="text-white" style="text-decoration: none" href="{{Illuminate\Support\Facades\URL::to('/') .'/'.$consult->question_file}}" download="" >دانلود فایل </a>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>
            </div>

        </div>
    </div>
</div>
@endforeach


@foreach($consults as $consult)
<div class="modal fade" id="myModal_{{$consult->id}}" style="font-family: Vazir">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-right ml-auto">نوشتن پاسخ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-right">
                @if(strlen($consult->answer) < 2)
                <form action="{{url('/counselor/send-answer')}}" method="post" class="" style="direction: rtl;font-family: Vazir" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$consult->id}}">
                    <div class="form-group row ">
                        <div class="col-md-12">
                    <textarea type="text" id="editor1" name="answer" required style="width: 100%;height: 190px;font-size: 0.8rem"
                              class="form-control" placeholder="پاسخ"></textarea>
                        </div>
                    </div>





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


                    <div class="d-flex justify-content-center ">
                        <button class="custom-btn text-center" type="submit" style="max-width: 100px">ارسال</button>
                    </div>
                </form>
                @else
                    <span type="text" id="editor1" required style="width: 100%;height: 190px;font-size: 0.8rem"
                              class="form-control">{{$consult->answer}}</span>

                    <div class=" row ">
                        <div class="col-md-12">
                            @if(strlen($consult->answer_file) > 2)
                                <button type="button" class="btn btn-primary ">
                                    <a class="text-white" style="text-decoration: none" href="{{Illuminate\Support\Facades\URL::to('/') .'/'.$consult->answer_file}}" download="" >دانلود فایل </a>
                                </button>
                            @endif
                        </div>
                    </div>

                @endif
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