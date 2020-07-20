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
        <form action="{{url('/admin/job-ads/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر:</label>
                <div class="col-md-5">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                </div>

            </div>
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر:</label>
                <div class="col-md-5">
                    <input type="file" id="editor1"
                           class="form-control" name="image">
                </div>
                <div class="col-md-3">
                    <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                </div>
            </div>
        </form>
        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

        <div class="row">
            <div class="col-md-4 col-sm-12">


            </div>
            <div class="col-md-8 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">اضافه کردن فرصت شغلی</h5>

                <form action="{{url('/admin/job-ad/insert')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style=""> عنوان فرصت شغلی :</label>
                        <input type="text" id="title" required=""
                               class="form-control col-md-7 "  name="title" placeholder="فرصت شغلی">
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-7 ">
                            <div  id="">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file"  required
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3" for="time">مهارت های مورد نیاز :</label>
                        <textarea type="text" id="editor1" required=""
                                  class="form-control col-sm-7" style="height: 150px" name="skills" placeholder="مهارت و مدارک مورد نیاز" ></textarea>
                    </div>


                    <div class="form-group row ">
                        <label class="col-md-3 col-form-label " style="">حقوق :</label>
                        <input  type="text" placeholder="مثلا توافقی یا سه تا پنج میلیون"  name="salary" class="col-sm-7 form-control start-day example1" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label ">توضیح مختصر </label>

                        <textarea type="text" id="editor1" required=""
                                  class="form-control col-sm-7" style="height: 150px"  name="description" placeholder=" توضیحات درباره فرصت شغلی و یا شرکت"></textarea>

                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ثبت تغییرات</button>
                    </div>
                </form>
            </div>






            <div class="container-fluid my-4 " id="side-list">
                <h6 class="text-white text-right mb-2" style="font-family: Vazir">فرصت های شغلی ارسالی صنایع و شرکت ها</h6>

                <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 ml-auto mr-auto">
                        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان فرصت</th>
                                <th scope="col">آگهی دهنده</th>
                                <th scope="col">محتوای آگهی</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col"> رد یا تایید</th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                            </thead>
                            <tbody class="text-white" style="font-size: 0.9rem">
                            @php($i=0)
                            @foreach($ads as $ad)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                <td>{{$ad->title}}</td>
                                @if($ad->industry_id > 0)
                                    <td>{{$ad->industry->first_name}}</td>
                                @else
                                    <td>مدیریت</td>
                                @endif

                                <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$ad->id}}">مشاهده </button></td>
                                @if($ad->is_accepted == 0)
                                    <td>بررسی نشده</td>
                                @elseif($ad->is_accepted == -1)
                                    <td>رد شده</td>
                                @elseif($ad->is_accepted == 1)
                                    <td>تایید شده</td>
                                @endif

                                <td>
                                    @if($ad->is_accepted == 0 || $ad->is_accepted == -1)
                                    <a href="{{url('/admin/job-ad/accept', $ad->id)}}">
                                        <button class="btn bg-success text-center text-white mt-0" type="submit" style="max-width: 50px">تایید</button>
                                    </a>
                                    @endif

                                        @if($ad->is_accepted == 0 || $ad->is_accepted == 1)
                                            <a href="{{url('/admin/job-ad/reject', $ad->id)}}">
                                                <button class="btn bg-danger text-center text-white mt-0" type="submit" style="max-width: 50px">رد</button>
                                            </a>
                                        @endif
                                </td>
                                <td>
                                    <a href="{{url('/admin/job-ad/edit', $ad->id)}}">
                                        <button class="btn bg-success text-center text-white mt-0" type="submit" style="">ویرایش</button>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{url('/admin/job-ad/remove', $ad->id)}}">
                                        <button class="btn bg-danger text-center text-white mt-0" type="submit" style="">حذف</button>
                                    </a>
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>




        </div>
    </div>
</div>




@foreach($ads as $ad)

    <div class="modal fade" id="myModal{{$ad->id}}" style="font-family: Vazir">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-right ml-auto">محتوای فرصت شغلی</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-right">
                    <img class="text-center"  src="{{asset($ad->image)}}" style="height: 100px; width: 100px; text-align: center">
                    <br>
                    <p> عنوان: {{$ad->title}}</p>
                    <br>
                    <p> حقوق: {{$ad->salary}}</p>
                    <p> مهارت های مورد نیاز: {{$ad->skills}}</p>
                    <p> توضیحات: {{$ad->description}}</p>




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
<script type="text/javascript">
  $(document).ready(function() {
    $(".example1").pDatepicker();
  });
</script>
</body>
</html>