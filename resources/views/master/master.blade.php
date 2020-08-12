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
            <h3 style="font-family: Vazir;"> پنل استاد </h3>
        </div>
    </div>
    @include('master.master-navbar')
    <div class="container my-4 " id="side-list">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h5 class="text-white text-right my-4" style="font-family: Vazir"> دوره های مهارتی شما</h5>
                <hr>

                <table class="table table-striped text-center usr-table" id="کاربران" style="direction: rtl;font-family: Vazir">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام دوره</th>
                        <th scope="col">تاریخ برگزاری</th>
                        <th scope="col">جرئیات</th>
                    </tr>
                    </thead>
                    <tbody class="text-white">
                        @csrf
                        @php($i=0)
                        @foreach($courses as $course)
                            <tr>
                                <td scope="row">{{++$i}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->time}}</td>
                                <td><a href="{{url('/master/course-detalis', $course->id)}}" class="custom-btn text-center m-2 p-2" style="max-width: 110px" >مشاهده </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
