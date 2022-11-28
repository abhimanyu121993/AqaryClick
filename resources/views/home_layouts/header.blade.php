<header class="header-wrap style1" style="">

    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-4 col-5 order-lg-1 order-md-1 order-1">
                    <div class="logo mx-2">
                        <a href="/">
                            <img class="logo-light" src="/front/assets/img/logo.png" alt="Image"
                                style="min-height:60px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-7 order-lg-2 order-md-3 order-3">
                    <div class="main-menu-wrap style1">
                        <div class="menu-close xl-none">
                            <a href="javascript:void(0)"><i class="las la-times"></i></a>
                        </div>
                        <div id="menu" class="text-center">
                            <ul class="main-menu ">
                                <li>
                                    <a class="active mx-2" href="/">HOME</a>
                                </li>
                                {{-- <li>
                                    <a href="/about-us">ABOUT US</a>
                                </li> --}}
                                <li>
                                    <a href="/about-us" class="mx-2">ABOUT US</a>
                                </li>
                                {{-- <li>
                                    <a href="/properties">PROPERTIES</a>
                                </li> --}}
                                <li>
                                    <a href="/contect-us" class="mx-2">CONTACT US</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link btn btn-light dropdown-toggle mx-2" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        style="background:#20438E; color:#fff !important;">
                                        Account
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                href="{{ route('admin') }}">Login</a></li>
                                        <li><a href="{{ url('/registration') }}">Register</a></li>
                                    </ul>
                                </li>

                                {{-- <li>
                                    <div class="dropdown mx-5">
                                        <button class="btn btn-light dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                            style="background:#20438E; color:white;">
                                            Account
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a href="{{ route('admin') }}">Login</a></li>
                                            <li><a href="{{ url('/registration') }}">Register</a></li>
                                        </ul>
                                    </div>
                                </li> --}}

                                {{-- <li class="has-children">
                                    <a href="#" class="btn btn-light pt-2 text-white text-center px-4"
                                        style="height:45px;background:#20438E;  border:1px solid #20438E;">Account</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('admin') }}">Login</a></li>
                                        <!-- <li><a href="{{ url('/registration') }}">Register</a></li> -->
                                        <li>
                                            <a type="button" data-bs-toggle="modal"
                                                data-bs-target="#registerdrop">Register Here</a>

                                        </li>
                                        <li><a href="#">Forget Password</a></li>

                                    </ul>
                                </li> --}}
                                <li>
                                    <h3 class="day-message"></h3>
                                    <!-- <li>
                                        <a href="{{ route('admin') }}" class="btn btn-sm login-btn"><span style="color: white;">Sign In</span></a>

                                    </li> -->
                                    <!-- <li>
                                        <button type="button" class="btn btn-primary btn-sm login-btn" data-bs-toggle="modal" data-bs-target="#registerdrop">Register Here</button>
                                    </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-bar-wrap">
                        <div class="mobile-menu xl-none">
                            <a href='javascript:void(0)'><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
