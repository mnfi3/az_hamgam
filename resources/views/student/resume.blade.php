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
        <h5 style="text-align: right;color: #ffffff" class="py-3">:  رزومه های ارسالی </h5>
        <table class="table table-striped text-center" style="direction: rtl;font-family: Vazir">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">عنوان شغلی</th>
                <th scope="col">آگهی دهنده</th>
                <th scope="col">وضعیت</th>
                <th scope="col">رزومه ارسالی</th>
            </tr>
            </thead>
            <tbody class="text-white" style="font-size: 0.9rem">
            @php($i=0)
            @foreach($user_ads as $user_ad)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <th scope="row">{{$user_ad->jobAd->title}}</th>
                    @if($user_ad->jobAd->industry_id > 0)
                    <th scope="row">{{$user_ad->jobAd->industry->first_name}}</th>
                    @else
                    <th scope="row">سایت</th>
                    @endif

                    @if($user_ad->is_seen == 0)
                    <td>در انتظار مشاهده </td>
                    @else
                    <td>مشاهده شده </td>
                    @endif


                    <td>
                    <a href="{{\Illuminate\Support\Facades\URL::to('/').'/'.$user_ad->file}}" download="">
                        <button class="btn bg-success text-center text-white mt-0" type="submit" style="">دانلود</button>
                    </a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- Modal footer -->

</div>
@include('include.footer')


</body>
<script>
    // function addDocumentInput() {
    //     var referenceNode = document.getElementById('fileInputsContainer').lastChild;
    //     var newNode = document.createElement("DIV");
    //     newNode.className += 'mt-1'
    //     newNode.innerHTML = '<input type="file"  required=""\n' +
    //         '                       class="form-control-file" name="images[]">'
    //     referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    // }
</script>
</html>
