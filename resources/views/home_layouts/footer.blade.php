</div>
<footer class="footer-wrap style1 bg-heath footer-text" style="background:#20438e!important;">
    <div class="footer-top pt-40" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget footer-footer">
                        <a href="/" class="footer-logo"><img src="/front/assets/img/logo2.png" alt="Image"></a>
                        <p style="color:#20438e;"><strong>Address :</strong> &nbsp; Gomtinager Lucknow</p>
                        <p style="color:#20438e;"><strong>Email
                                :</strong> &nbsp; &nbsp; &nbsp; &nbsp;Aqaryclick@gmail.com</p>

                        <p style="color:#20438e;"><strong>Phone :</strong> &nbsp; &nbsp;+91 5656657677</p>


                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget footer-footer ml-30">
                        <h4 class="footer-widget-title" style="color:#20438E;">Important Links</h4>
                        <ul class="footer-menu ">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            {{-- <li><a href="/properties">Properties</a></li> --}}
                            <li><a href="/contect-us">Contact Us</a></li>
                            <li><button type="button" class="btn btn-primary btn-sm login-btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Login In</button> </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 ">
                    <div class="footer-box-layout">
                        <div class=" box-footer img-thumbnail">
                            <div class="footer-text p-3">
                                <h4 style="color:#fff; pt-1">Term & Conditions</h4>
                                <p class="pt-3" style="color:#fff;">Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    sunt in culpa qui officia deserunt mollit anim id est laborum.

                                </p>
                                <button type="button" class="btn btn-primary btn-sm  pt-2" data-bs-toggle="modal"
                                    data-bs-target="#termModal" style="background:#fff;color:#20438E;">continue <i
                                        class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>



<a href="#" class="back-to-top bounce"><i class="las la-arrow-up"></i></a>


<script src="/front/assets/js/jquery.min.js"></script>

<script src="/front/assets/js/jquery-ui.min.js"></script>

<script src="/front/assets/js/bootstrap.bundle.min.js"></script>
<script src="/front/assets/js/form-validator.min.js"></script>
<script src="/front/assets/js/contact-form-script.js"></script>

<script src="/front/assets/js/swiper-min.js"></script>

<script src="/front/assets/js/jquery-magnific-popup.js"></script>

<script src="/front/assets/js/countdown.js"></script>

<script src="/front/assets/js/main.js"></script>


<!-- Internal Gallery js-->
<script src="/front/assets/gallery/picturefill.js"></script>
<script src="/front/assets/gallery/lightgallery.js"></script>
<script src="/front/assets/gallery/lightgallery-1.js"></script>
<script src="/front/assets/gallery/lg-autoplay.js"></script>
<script src="/front/assets/gallery/lg-fullscreen.js"></script>
<script src="/front/assets/gallery/lg-zoom.js"></script>
<!--Toaster Js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
{{-- <script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });

</script> --}}
<script>
    $(document).ready(function() {
        $('.show_plan').hide();
        $("#our_plan").click(function() {
            $('.hide_reg').hide();
            $('.show_plan').show();


        }).change();
    });
</script>
<script>
    $(document).ready(function() {

        function dateTime() {
            var ndate = new Date();
            var hours = ndate.getHours();
            var message = hours < 12 ? '<b><span>Good Morning !</span></b>' : hours < 18 ?
                '<b><span class="text-center">Good Afternoon !</span></b>' :
                '<b><span class="text-center">Good Evening !</span></b>';
            toastr.options.timeOut = 10000;
            toastr.success(message + "<br/><b>Welcome to AqaryClick</b>");

        }

        setTimeout(dateTime, 2000);
    });

    Number.prototype.leadingZeroes = function(len) {
        return (new Array(len).fill('0', 0).join('') + this).slice(-Math.abs(len));
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.10/sweetalert2.all.js"
    integrity="sha512-+QEgB4wm6Qoshtwrn0TqoNEuufvlGDpN36Ht5yicS4QMZolMZopGsfpMzf+ZaSUb3m7Fw3FwJ2Nu6TCgyuQ0qA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
