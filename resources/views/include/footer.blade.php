<div class="mian-footer " >
    <div class="dark-overlay py-5">
        <div class="container-fluid px-5">
            <div class="row my-2">
                <div class="col-md-4">
                    <h5 class="footer-title">
                        لینک های مرتبط
                    </h5>
                    <div class="d-flex flex-column justify-content-center footer-links">
                        <div class="flex-item">
                             <a href=" {{\App\Util::get(\App\Util::KEY_LINK1)->description}}" target="_blank">
                                 {{\App\Util::get(\App\Util::KEY_LINK1)->title}}
                            </a>
                        </div>
                        <div class="flex-item">
                            <a href=" {{\App\Util::get(\App\Util::KEY_LINK2)->description}}" target="_blank">
                                {{\App\Util::get(\App\Util::KEY_LINK2)->title}}
                            </a>
                        </div>
                        <div class="flex-item">
                            <a href=" {{\App\Util::get(\App\Util::KEY_LINK3)->description}}" target="_blank">
                                {{\App\Util::get(\App\Util::KEY_LINK3)->title}}
                            </a>
                        </div>
                        <div class="flex-item">
                            <a href=" {{\App\Util::get(\App\Util::KEY_LINK4)->description}}" target="_blank">
                                {{\App\Util::get(\App\Util::KEY_LINK4)->title}}
                            </a>
                        </div>

                    </div>


                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">
                        ارسال سوالات و درخواست ها
                    </h5>
                    <form method="post" action="{{url('/question-add')}}" class="text-right forms mt-3">
                        @csrf
                        <div class="form-group">
                            <input required type="text" class="form-control text-right" name="name" id="name" aria-describedby="name" placeholder="نام خود را وارد کنید">
                        </div>
                        <div class="form-group">
                            <input required type="email" class="form-control text-right" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ایمیل خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <textarea required class="form-control" id="questions" name="message" placeholder="پیام خود را وارد کنید"></textarea>
                        </div>
                        <div class="button_cont" align="left">
                            <button class="custom-btn text-center"type="submit" >
                                <span>ارسال</span>
                            </button>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::get('msg') != null)
                            <p class="text-success">{{\Illuminate\Support\Facades\Session::get('msg')}}</p>
                        @endif


                        {{--<button type="submit" class="btn btn-primary">ارسال</button>--}}
                    </form>
                </div>
                <div class="col-md-4">
                    <h5 class="footer-title">
                        ارتباط با ما
                    </h5>
                    <br>

                    <div class="d-flex flex-column justify-content-center">

                        <h7 class="text-right">
                            تلفن تماس
                        </h7>
                        <div class="flex-item">
                             <span>
                               {{\App\Util::get(\App\Util::KEY_PHONE)->description}}
                            </span>
                            <i class="fa fa-phone ml-1" style="color: #ffffff"></i>
                        </div>


                        <h7 class="text-right mt-1">
                            آدرس
                        </h7>
                        <div class="flex-item">
                                <span >{{\App\Util::get(\App\Util::KEY_ADDRESS)->description}}</span>
                                <i class="fa fa-address-book  ml-1" style="color: #ffffff"></i>

                        </div>


                        <h7 class="text-right mt-1">
                            آدرس ایمیل
                        </h7>
                        <div class="flex-item">
                             <span>
                                {{\App\Util::get(\App\Util::KEY_EMAIL)->description}}
                            </span>
                            <i class="fa fa-envelope ml-1" style="color: #ffffff"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="developer-footer" id="dev-footer">
    <div class="container ">
        <div class="d-flex flex-row justify-content-between py-1 text-light">
                <p >.تمامی حقوق برای دانشگاه شهید مدنی آذربایجان محفوظ می باشد
                </p>
                <p>
                    طراحی و توسعه به وسیله<a href="http://www.ezitech.ir/" target="_blank" style="text-decoration: none; color: #00a885;"> ایزی تک </a>

                </p>
        </div>
    </div>
</div>