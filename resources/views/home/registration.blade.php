@extends('frontend.layout')
@section('content-area')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <style>
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /*--blog----*/

        .sec-title {
            position: relative;
            margin-bottom: 70px;
        }

        .sec-title .title {
            position: relative;
            display: block;
            font-size: 16px;
            line-height: 1em;
            color: #ff8a01;
            font-weight: 500;
            background: rgb(247, 0, 104);
            background: -moz-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            background: -webkit-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            background: linear-gradient(to left, rgba(247, 0, 104) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F70068', endColorstr='#441066', GradientType=1);
            color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 15px;
        }

        .sec-title h2 {
            position: relative;
            display: inline-block;
            font-size: 48px;
            line-height: 1.2em;
            color: #20438E;
            font-weight: 700;
        }

        .sec-title .text {
            position: relative;
            font-size: 16px;
            line-height: 28px;
            color: #888888;
            margin-top: 30px;
        }

        .sec-title.light h2,
        .sec-title.light .title {
            color: #ffffff;
            -webkit-text-fill-color: inherit;
        }

        .pricing-section {
            position: relative;
            padding: 100px 0 80px;
            overflow: hidden;
        }

        .pricing-section .outer-box {
            max-width: 1100px;
            margin: 0 auto;

        }


        .pricing-section .row {
            margin: 0 -30px;
        }

        .pricing-block {
            position: relative;
            padding: 0 30px;
            margin-bottom: 40px;
        }

        .pricing-block .inner-box {
            position: relative;
            background-color: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            padding: 0 0 30px;
            max-width: 420px;
            margin: 0 auto;
            border-bottom: 20px solid #40cbb4;
        }

        .pricing-block .icon-box {
            position: relative;
            padding: 50px 30px 0;
            background-color: #40cbb4;
            text-align: center;
        }

        .pricing-block .icon-box:before {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 75px;
            width: 100%;
            border-radius: 50% 50% 0 0;
            background-color: #ffffff;
            content: "";
        }


        .pricing-block .icon-box .icon-outer {
            position: relative;
            height: 150px;
            width: 150px;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 0 auto;
            padding: 10px;
        }

        .pricing-block .icon-box i {
            position: relative;
            display: block;
            height: 130px;
            width: 130px;
            line-height: 120px;
            border: 5px solid #40cbb4;
            border-radius: 50%;
            font-size: 50px;
            color: #40cbb4;
            -webkit-transition: all 600ms ease;
            -ms-transition: all 600ms ease;
            -o-transition: all 600ms ease;
            -moz-transition: all 600ms ease;
            transition: all 600ms ease;
        }

        .pricing-block .inner-box:hover .icon-box i {
            transform: rotate(360deg);
        }

        .pricing-block .price-box {
            position: relative;
            text-align: center;
            padding: 10px 20px;
        }

        .pricing-block .title {
            position: relative;
            display: block;
            font-size: 24px;
            line-height: 1.2em;
            color: #222222;
            font-weight: 600;
        }

        .pricing-block .price {
            display: block;
            font-size: 30px;
            color: #222222;
            font-weight: 700;
            color: #40cbb4;
        }


        .pricing-block .features {
            position: relative;
            max-width: 200px;
            margin: 0 auto 20px;
        }

        .pricing-block .features li {
            position: relative;
            display: block;
            font-size: 14px;
            line-height: 30px;
            color: #848484;
            font-weight: 500;
            padding: 5px 0;
            padding-left: 30px;
            border-bottom: 1px dashed #dddddd;
        }

        .pricing-block .features li:before {
            position: absolute;
            left: 0;
            top: 50%;
            font-size: 16px;
            color: #2bd40f;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            content: "\f058";
            font-family: "Font Awesome 5 Free";
            margin-top: -8px;
        }

        .pricing-block .features li.false:before {
            color: #e1137b;
            content: "\f057";
        }

        .pricing-block .features li a {
            color: #848484;
        }

        .pricing-block .features li:last-child {
            border-bottom: 0;
        }

        .pricing-block .btn-box {
            position: relative;
            text-align: center;
        }

        .pricing-block .btn-box a {
            position: relative;
            display: inline-block;
            font-size: 14px;
            line-height: 25px;
            color: #ffffff;
            font-weight: 500;
            padding: 8px 30px;
            background-color: #40cbb4;
            border-radius: 10px;
            border-top: 2px solid transparent;
            border-bottom: 2px solid transparent;
            -webkit-transition: all 400ms ease;
            -moz-transition: all 400ms ease;
            -ms-transition: all 400ms ease;
            -o-transition: all 400ms ease;
            transition: all 300ms ease;
        }

        .pricing-block .btn-box a:hover {
            color: none;
        }

        .pricing-block .inner-box:hover .btn-box a {
            color: #40cbb4;
            background: none;
            border-radius: 10px;
            border-color: #40cbb4;
        }

        .pricing-block:nth-child(2) .icon-box i,
        .pricing-block:nth-child(2) .inner-box {
            border-color: #81808075;
        }

        .pricing-block:nth-child(2) .btn-box a,
        .pricing-block:nth-child(2) .icon-box {
            background-color: #81808075;
        }

        .pricing-block:nth-child(2) .inner-box:hover .btn-box a {
            color: #81808075;
            background: none;
            border-radius: 10px;
            border-color: #81808075;
        }

        .pricing-block:nth-child(2) .icon-box i,
        .pricing-block:nth-child(2) .price {
            color: #81808075;
        }

        .pricing-block:nth-child(3) .icon-box i,
        .pricing-block:nth-child(3) .inner-box {
            border-color: #ffc20b;
        }

        .pricing-block:nth-child(3) .btn-box a,
        .pricing-block:nth-child(3) .icon-box {
            background-color: #ffc20b;
        }


        .pricing-block:nth-child(3) .icon-box i,
        .pricing-block:nth-child(3) .price {
            color: #ffc20b;
        }

        .pricing-block:nth-child(3) .inner-box:hover .btn-box a {
            color: #ffc20b;
            background: none;
            border-radius: 10px;
            border-color: #ffc20b;
        }

        .pricing-block:nth-child(4) .icon-box i,
        .pricing-block:nth-child(4) .inner-box {
            border-color: #20438e;
        }

        .pricing-block:nth-child(4) .btn-box a,
        .pricing-block:nth-child(4) .icon-box {
            background-color: #20438e;
        }

        .pricing-block:nth-child(4) .icon-box i,
        .pricing-block:nth-child(4) .price {
            color: #20438e;
        }

        .pricing-block:nth-child(4) .inner-box:hover .btn-box a {
            color: #20438e;
            background: none;
            border-radius: 10px;
            border-color: #20438e;
        }

        .pricing1 {
            color: white !important;
        }

        .pricing1:hover {
            color: #40cbb4 !important;
        }

        .pricing2 {
            color: #40cbb4 !important;
        }

        .pricing2:hover {
            color: #81808075 !important;
        }

        .pricing3 {
            color: #81808075 !important;
        }

        .pricing3:hover {
            color: #ffc20b !important;
        }

        .pricing4 {
            color: #ffc20b !important;
        }

        .pricing4:hover {
            color: #20438e !important;
        }

        .inner-box:hover .pricing1 .pricing2 .pricing3 .pricing4 {
            color: #f57e1a !important;
        }

        /* .inner-box:hover{
                color: #ff4f1e !important;
            } */
    </style>
 <main>
<div class="show_plan mt-3">
    <section class="pricing-section" style="margin: 0 !important;padding: 0 !important;">
        <div class="container">
            <div class="sec-title text-center">
                <span class="title">To Become A Member</span>
                <h2>Choose a Plan</h2>
            </div>

            <div class="outer-box">
                <div class="row">

             @foreach ($membership as $member)
                <div class="pricing-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><img src="{{ asset($member->icon) }}" height="50%" width="50%" style=" border-radius:25%; margin-top:30px"/></div>
                            </div>
                            <div class="price-box">
                                <div class="title">{{$member->title}}</div>
                                <h4 class="price">{{$member->price}}</h4>
                            </div>
                            <ul class="features">
                                <li class="true">{{$member->user_count}}</li>
                            </ul>
                            <div class="btn-box" >
                                <a href="#" class="theme-btn pricing1">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <!-- Pricing Block -->
                    <!-- <div class="pricing-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa fa-paper-plane"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title"> Basic Plan</div>
                                <h4 class="price">Free</h4>
                            </div>
                            <ul class="features">
                                <li class="true">1 User</li>
                            </ul>
                            <div class="btn-box">
                                <a href="#" class="theme-btn pricing1">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div> -->

                    <!-- Pricing Block -->
                    <!-- <div class="pricing-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa fa-gem"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Silver Plan</div>
                                <h4 class="price">$99.99</h4>
                            </div>
                            <ul class="features">
                                <li class="true">2 User</li>
                            </ul>
                            <div class="btn-box">
                                <a href="#" class="theme-btn pricing2">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div> -->

                    <!-- Pricing Block -->
                    <!-- <div class="pricing-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa fa-rocket"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Gold Plan</div>
                                <h4 class="price">$199.99</h4>
                            </div>
                            <ul class="features">
                                <li class="true">3 User</li>
                            </ul>
                            <div class="btn-box">
                                <a href="#" class="theme-btn pricing3" >SUBSCRIBE</a>
                            </div>
                        </div>
                    </div> -->

                    <!-- Pricing Block -->
                    <!-- <div class="pricing-block col-lg-3

                     col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <div class="icon-outer"><i class="fa fa-bolt"></i></div>
                            </div>
                            <div class="price-box">
                                <div class="title">Platinum User</div>
                                <h4 class="price">$399.99</h4>
                            </div>
                            <ul class="features">
                                <li class="true">4 User</li>
                            </ul>
                            <div class="btn-box">
                                <a href="{{route('paypal.pay',1)}}" class="theme-btn pricing4">SUBSCRIBE</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>
 </main>
        @endsection

        @section('script-area')
<script>
    $(document).ready(function(){
        $('.toolbar-1').removeClass('has-bg-image');
    });
   </script>
@endsection
