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
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  پیام های ارسالی </h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">پیام</th>
                <th scope="col">وضعیت</th>
                <th scope="col">پاسخ</th>
            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            @php($i=0)
            @foreach($messages as $message)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$message->question}}</td>
                @if(strlen($message->answer) > 1)
                    <td >پاسخ داده شده</td>
                @else
                    <td >پاسخ داده نشده</td>
                @endif
                <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$message->id}}">مشاهده </button></td>
            </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{$messages->links()}}
        </div>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  ارسال پیام به مدیریت </h5>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('/student/send-message')}}" method="post" class="row">
                    @csrf
                    <div class="col-6 ml-auto">
                        <div class="form-group row">
                            <textarea  class="col-md-7 form-control" name="question" required placeholder="متن پیام را وارد کنید" style="direction: rtl"></textarea>
                            <label for="name" class="col-md-4 mt-1">: متن پیام</label>
                        </div>
                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit">ارسال </button>
                            @if(\Illuminate\Support\Facades\Session::get('msg') != null)
                                <p>{{\Illuminate\Support\Facades\Session::get('msg')}}</p>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @foreach($messages as $message)
        <div class="modal fade" id="myModal{{$message->id}}" style="font-family: Vazir">
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
                              class="form-control" name="description" placeholder="پاسخی دریافت نشده است.">{{$message->answer}}</span>
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