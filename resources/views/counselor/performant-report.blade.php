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
    @include('counselor.counselor-navbar')
    <div class="container my-4 " id="profile">
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  گزارش های ارسالی شما</h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">متن گزارش</th>

            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            @php $i=0; @endphp
            @foreach($reports as $report)
                <tr>
                    <td scope="row">{{++$i}}</td>
                    <td >
                        <button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal{{$report->id}}">مشاهده </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  ارسال گزارش  به مدیریت </h5>
        <div class="row">
            <div class="col-md-12">

                <form action="{{url('/counselor/performant-report-send')}}" method="post" class="row">
                    @csrf
                    <div class="col-12 ">
                        <div class="form-group row mt-1">
                             <div class="col-md-12 mr-auto">
                          <textarea type="text" id="editor1" required
                                    class="form-control" name="message" placeholder="متن گزارش رااینجا بنویسید" ></textarea>
                                <script>
                                 // CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>
                        </div>

                        <div class="form-group row d-flex flex-row justify-content-center">
                            <button class="custom-btn text-center" type="submit">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @foreach($reports as $report)
            <div class="modal fade" id="myModal{{$report->id}}" style="font-family: Vazir">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body text-right">
                           @php echo $report->message; @endphp
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