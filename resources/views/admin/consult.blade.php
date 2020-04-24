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
    <div class="container-fluid my-4 " id="side-list">
        <form action="{{url('/admin/consult/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر :</label>
                <div class="col-md-8">
                    <textarea type="text" id="editor1" required="" style="font-size: 0.8rem"
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                </div>
            </div>

            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر :</label>
                <div class="col-md-5">
                    <input type="file" id="editor1" required=""
                           class="form-control" name="image">
                </div>
                <div class="col-md-3">
                    <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                </div>
            </div>
        </form>
        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                <h6 class="text-white text-right mb-2" style="font-family: Vazir">مشاوره (توجه: برای پاسخ دهی فقط یکی از گزینه های ارسال به مشاور و یا پاسخ خود مدیریت انتخاب شود.)</h6>
                <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام</th>
                        <th scope="col">جزئیات</th>
                        <th scope="col">موضوع</th>
                        <th scope="col">مشاهده پرسش</th>
                        <th scope="col">ارسال به مشاور</th>
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
                            <td><a class="custom-btn text-center mt-0" href="{{url('/admin/users/student-detailes', $consult->user->id)}}">جزئیات</a></td>
                            <td>{{$consult->title}}</td>
                            <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$consult->id}}">مشاهده </button></td>

                            <td>
                                @if(($consult->adviser_id == 0 || $consult->adviser_id == null) && strlen($consult->answer) < 2)
                                    <form action="{{url('/admin/consult/send-to-consultant')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="consult_id" value="{{$consult->id}}">
                                        <div class="d-flex  p-2 justify-content-between">
                                            <select name="consultant_id" class=" custom-select ml-2" style="font-size: 0.7rem;min-width: 120px">
                                                @foreach($consultants as $consultant)
                                                    <option value="{{$consultant->id}}">{{$consultant->first_name.' '.$consultant->last_name}}</option>
                                                @endforeach
                                            </select>
                                            <button class="custom-btn text-center mt-0" type="submit" style="max-width: 50px">ارسال</button>

                                        </div>
                                    </form>
                                @elseif($consult->adviser_id != 0 && $consult->adviser_id != null)
                                    <div class="d-flex  p-2 justify-content-between">
                                    <span class=" custom-select ml-2" style="font-size: 0.7rem;min-width: 120px">
                                        {{$consult->user->first_name.' '.$consult->user->last_name}}
                                    </span>
                                    </div>
                                @else
                                    <div class="d-flex  p-2 justify-content-between">
                                    <span class=" custom-select  ml-2" style="font-size: 0.7rem;min-width: 120px">
                                       قبلا پاسخ داده شده
                                    </span>
                                    </div>
                                @endif

                            </td>
                            <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal_{{$consult->id}}">پاسخ </button></td>

                            @if($consult->adviser_id > 0 && $consult->adviser_id != null)
                                <td>ارسال شده به مشاور</td>
                            @elseif(strlen($consult->answer) > 1)
                                <td >پاسخ داده شده</td>
                            @else
                                <td>پاسخ داده نشده</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

        {{$consults->links()}}
    </div>
</div>
@foreach($consults as $consult)
    <!-- The Modal -->
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

                <div class="  row mt-3">
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
                    <h4 class="modal-title text-right ml-auto"> پاسخ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-right">
                    @if(($consult->adviser_id == null || $consult->adviser_id == 0) && (strlen($consult->answer) < 2))
                        <form action="{{url('/admin/consult/answer')}}" method="post" class="" style="direction: rtl;font-family: Vazir">
                            @csrf
                            <input type="hidden" name="consult_id" value="{{$consult->id}}">
                            <div class="form-group row ">
                                <div class="col-md-12">
                    <textarea type="text" id="editor1" required="" style="width: 100%;height: 100%;font-size: 0.8rem"
                              class="form-control" name="answer" placeholder="پاسخ">{{$consult->answer}}</textarea>
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
                        <span type="text" id="editor1" required="" style="width: 100%;height: 100%;font-size: 0.8rem"
                              class="form-control" name="description" placeholder="پاسخ">{{$consult->answer}}</span>


                        <div class="  row mt-3">
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


    </div>
    @include('include.footer')
</body>
</html>