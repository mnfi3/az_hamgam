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
            <h3 style="font-family: Vazir;"> پنل انجمن </h3>
        </div>
    </div>
    @include('forum.forum-navbar')
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h5 class="text-white text-right my-4" style="font-family: Vazir">پیشنهاد برگزاری انواع دوره ها مهارتی و کارگاه ها</h5>
                <div style="height: 1px;background-color: #721c24; margin: 10px 5px"></div>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">درخواست</th>
                        <th scope="col">  پاسخ دریافتی</th>
                        <th scope="col">وضعیت</th>
                    </tr>
                    </thead>
                    <tbody class="text-white" style="font-size: 0.9rem">
                    @php($i=0)
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            <td>{{$message->question}} </td>
                            <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$message->id}}">مشاهده </button></td>
                            @if(strlen($message->answer ) > 0)
                                <td >پاسخ داده شده</td>
                            @else
                            <td >پاسخ داده نشده</td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
                <h5 style="text-align: right;color: #ffffff" class="py-3">:  ارسال درخواست به مدیریت </h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('/forum/send-message')}}" method="post" class="row">
                            @csrf
                            <div class="col-6 ml-auto">
                                <div class="form-group row">
                                    <textarea type="text" class="col-md-7 form-control" name="question" required placeholder="" style="direction: rtl"></textarea>
                                    <label for="name" class="col-md-4 mt-1">: متن درخواست </label>
                                </div>


                                <div class="form-group row">
                                    <button class="custom-btn text-center" type="submit">ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>
        </div>
    </div>
</div>

@foreach($messages as $message)
    <div class="modal fade" id="myModal{{$message->id}}" style="font-family: Vazir">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-right">
                    {{$message->answer}}
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