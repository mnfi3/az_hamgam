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
            <h3 style="font-family: Vazir;"> پنل مدیریت </h3>
        </div>
    </div>
    @include('admin.admin-navbar')
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-10 col-sm-12 ml-auto mr-auto">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">پیام و درخواست های دریافتی</h5>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نوع کاربر</th>
                        <th scope="col">نام</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">پیام دریافتی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=0)
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row">{{++$i}}</th>
                            @if($message->user_id == 0 || $message->user_id == null)
                                <td>مهمان</td>
                            @else
                                @if($message->user->role == 'master')
                                    <td>استاد</td>
                                @elseif($message->user->role == 'student')
                                    <td>دانشجو</td>
                                @elseif($message->user->role == 'consultant')
                                    <td>مشاور</td>
                                @elseif($message->user->role == 'forum')
                                    <td>انجمن</td>
                                @elseif($message->user->role == 'industry')
                                    <td>صنعت</td>
                                @endif
                            @endif
                            @if($message->user_id == 0 || $message->user_id == null)
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                            @else
                                <td>{{$message->user->first_name . ' ' . $message->user->last_name}}</td>
                                <td>{{$message->user->email}}</td>
                            @endif
                            <td><button class="custom-btn text-center" style="max-width: 150px" data-toggle="modal" data-target="#myModal{{$message->id}}">مشاهده </button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


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
                    {{$message->question}}
                </div>


                @if($message->user_id != 0 && $message->user_id != null)
                    <form action="{{url('/admin/message/answer')}}" method="post" class="mt-3 mb-3">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title text-right ml-auto">ارسال پاسخ</h5>
                        </div>

                        <input type="hidden" name="id" value="{{$message->id}}">
                        <!-- Modal body -->

                        @if(strlen($message->answer) < 2)
                            <div class="modal-body text-right">
                                 <textarea type="text" id="title" required=""
                                           class="form-control text-right "  name="answer" placeholder="پاسخ">{{$message->answer}}</textarea>
                            </div>

                            <div class="modal-footer">
                                <button  class="custom-btn btn-success" style="max-width: 60px">ارسال</button>
                            </div>
                        @else
                            <div class="modal-body text-right">
                                 <span type="text" id="title" required=""
                                           class="form-control text-right "  name="answer" placeholder="پاسخ">{{$message->answer}}</span>
                            </div>

                        @endif
                    </form>
                @endif

                <hr>




            </div>
        </div>
    </div>
    @endforeach

    </div>
    @include('include.footer')
</body>
</html>