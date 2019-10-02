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

        <form action="{{url('/admin/invite-industries/update')}}" method="post" enctype="multipart/form-data" class="px-3" style="direction: rtl;font-family: Vazir">
            @csrf
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">توضیح مختصر:</label>
                <div class="col-md-5">
                    <textarea type="text" id="" required=""
                              class="form-control" name="description" placeholder="توضیحات">{{$util->description}}</textarea>
                </div>

            </div>
            <div class="form-group row py-4">
                <label class="col-md-3 col-form-label ">تصویر:</label>
                <div class="col-md-5">
                    <input type="file" id="" required=""
                           class="form-control" name="image" >
                </div>
                <div class="col-md-3">
                    <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
                </div>
            </div>
        </form>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>

        <div class="row">



            <div class="col-md-4 col-sm-12">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-column p-2" style="box-shadow: 0px 0px 15px rgba(10, 10, 10, 0.6);border-radius: 5px">
                        <h5 class="text-white" style="font-family: Vazir;text-align: right">همه اخباردعوت از صاحبان صنایع</h5>
                        <ul style="direction: rtl" class="side-list2">
                            @foreach($posts as $post)
                                <li>
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <p class="text-light text-right mb-2 pr-2">{{$post->title}}</p>
                                        <a href="{{url('/admin/invite-industries/remove', $post->id)}}" class="custom-btn text-center">حذف</a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>





            <div class="col-md-8 col-sm-12 ">
                <h5 class="text-white text-right mb-2" style="font-family: Vazir">دعوت از صنایع  </h5>

                <form action="{{url('/admin/industry-post/add')}}" method="post" class="px-3" style="direction: rtl" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >موضوع  :</label>
                        <div class="col-md-10 ">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="text"
                                           class="form-control-file" name="title" placeholder="موضوع">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-2 col-form-label " style="" >تصویر  :</label>
                        <div class="col-md-10 ">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file" id="images"
                                           class="form-control-file" name="image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-3 col-form-label ">متن :</label>
                        <div class="col-md-8 mr-auto">
                    <textarea type="text" id="editor1" required=""
                              class="form-control" name="description" placeholder="محتوا"></textarea>
                            <script>
                              CKEDITOR.replace( 'editor1' );
                            </script>
                        </div>
                    </div>
                    <div class="form-group row py-4">
                        <label class="col-md-4 col-form-label " style="" for="title">فایل (در صورت وجود) :</label>
                        <div class="col-md-8 mr-auto">
                            <div  id="fileInputsContainer">
                                <div class="d-flex flex-row justify-content-between">
                                    <input type="file" id="images"
                                           class="form-control-file" name="file">
                                </div>
                            </div> </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="custom-btn text-center" type="submit" style="max-width: 120px">ذخیره</button>
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