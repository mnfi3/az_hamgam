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
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  پیام های ارسالی </h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">سوال</th>
                <th scope="col">وضعیت</th>
                <th scope="col">پاسخ</th>
            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            <tr>
                <th scope="row">1</th>
                <td> امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان</td>
                <td >پاسخ داده نشده</td>
                <td><button class="custom-btn text-center" style="max-width: 100px" data-toggle="modal" data-target="#myModal">مشاهده </button></td>



            </tr>
            </tbody>
        </table>

        <div style="height: 2px;border-radius: 1px;margin: 10px 30px; background: #721c24; "></div>
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  ارسال پیام به مدیریت </h5>
        <div class="row">
            <div class="col-md-12">
                <form action=" " class="row">
                    <div class="col-6 ml-auto">
                        <div class="form-group row">
                            <textarea type="password" class="col-md-7 form-control" name="name" required placeholder="" style="direction: rtl"></textarea>
                            <label for="name" class="col-md-4 mt-1">: متن پیام</label>
                        </div>

                        <div class="form-group row">
                            <button class="custom-btn text-center" type="submit">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal" style="font-family: Vazir">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-right ml-auto">محتوای پیام</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body text-right">
                        سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="custom-btn btn-danger" data-dismiss="modal" style="max-width: 60px">بستن</button>
                    </div>

                </div>
            </div>
        </div>
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