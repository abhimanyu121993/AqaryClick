@extends('home_layouts.master')

@section("content")
<section class="breadcrumb-wrap bg-f br-bg-3">
    <div class="overlay op-6 bg-black"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                <div class="breadcrumb-title">
                    <h2>WELCOME TO AQARYCLICK</h2>
                </div>
            </div>
        </div>
</div>
</section>


<section class=" course-wrap mt-5 mb-3">
    <div class="container">
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-5">
                    <h2>Registration Plan</h2>
                    <span></span>
                </div>
            </div>
        </div> -->
        <div class="row hide_reg">
        <div class="card col-3 account-li" style="width: 18rem;">
  <div class="card-header">
    Already Register <span><i class="fa fa-user" aria-hidden="true" style="float: right;"></i></span>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Already Register with us? if so, click the button below to login to our client area from where you can manage your account</li>
    <li class="list-group-item">Login <span><i class="fa fa-sign-in" aria-hidden="true" style="float: right;"></i></span></li>
    <li class="list-group-item">Reset Forget Password <span><i class="fa fa-key" aria-hidden="true" style="float: right;"></i></span></li>
  </ul>
</div>
<div class="alert alert-danger col-9" role="alert" style="height:50px; margin-left:10px;">
 To create an account Please View <a href="#" id="our_plan">Our Plans</a>
</div>
        </div>
<div class="show_plan">
<h5>Rent Property</h5>
        <div class="row justify-content-md-center">
           
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="course-card style1">
                    <div class="course-img">
                        <a href="/propertie-details"><img src="/front/assets/img/property/p-2.jpg" alt="Image"></a>
                    </div>
                    <div class="course-info">
                        <h3><a href="/propertie-details">Pinkvilla</a></h3>
                        <div class="course-rating">
                            <ul>
                                <li><i class="fa fa-usd" aria-hidden="true"></i> 230,0000</li>
                            </ul>
                            <span>111 sqft</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="course-card style1">
                    <div class="course-img">
                        <a href="/propertie-details"><img src="/front/assets/img/property/p-3.jpg" alt="Image"></a>
                    </div>
                    <div class="course-info">
                        <h3><a href="/propertie-details">Pinkvilla</a></h3>
                        <div class="course-rating">
                            <ul>
                                <li><i class="fa fa-usd" aria-hidden="true"></i> 230,0000</li>
                            </ul>
                            <span>111 sqft</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="course-card style1">
                    <div class="course-img">
                        <a href="/propertie-details"><img src="/front/assets/img/property/p-4.jpg" alt="Image"></a>
                    </div>
                    <div class="course-info">
                        <h3><a href="/propertie-details">Pinkvilla</a></h3>
                        <div class="course-rating">
                            <ul>
                                <li><i class="fa fa-usd" aria-hidden="true"></i> 230,0000</li>
                            </ul>
                            <span>111 sqft</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
@endsection