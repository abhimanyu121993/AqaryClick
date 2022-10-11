@extends('home_layouts.master')

@section("content")
<section class="breadcrumb-wrap bg-f br-bg-2">
    <div class="overlay op-6 bg-black"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                <div class="breadcrumb-title">
                    <h2>About us</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="instructor-details-wrap mt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="tab-pane fade show">
                    <div class="abouts">
                        <h3 class="instructor-title">About Us
                        </h3>
                        <span></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi maxime id rem minima cupiditate? Dolore hic vero libero necessitatibus provident.Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi maxime id rem minima cupiditate? Dolore hic vero libero necessitatibus provident.</p>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2">
                <div class="instructor-img">
                    <img src="/front/assets/img/about/about-1.jpg" alt="Image">
                </div>
            </div>
            <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2">
                <div class="instructor-img">
                    <img src="/front/assets/img/about/logo-1.png" alt="Image">
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="tab-pane fade show">
                    <div class="about-us">
                        <h3 class="instructor-title">
                            Our Story
                        </h3>
                        <span></span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi maxime id rem minima cupiditate? Dolore hic vero libero necessitatibus provident.Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eius eveniet distinctio, sed molestias dolore, voluptatem maiores nihil excepturi maxime id rem minima cupiditate? Dolore hic vero libero necessitatibus provident.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="team-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member rent-home">
                    <div class="team-member-img">
                        <img src="/front/assets/img/about/rent-1.jpg" alt="Image">
                    </div>
                    <div class="rent team-member-info">
                        <h4>Buy a home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="rent-btn  justify-content-md-center mt-2 mb-2">
                            <button type="button" class="btn btn-primary accept">Browse homes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member rent-home">
                    <div class="team-member-img">
                        <img src="/front/assets/img/about/rent-2.jpg" alt="Image">
                    </div>
                    <div class="rent team-member-info">
                        <h4>Sell a home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="rent-btn justify-content-md-center mt-2 mb-2">
                            <button type="button" class="btn btn-primary accept">See your options</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member rent-home">
                    <div class="team-member-img">
                        <img src="/front/assets/img/about/rent-3.jpg" alt="Image">
                    </div>
                    <div class="rent team-member-info">
                        <h4>Rent a home</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="rent-btn justify-content-md-center mt-2 mb-2">
                            <button type="button" class="btn btn-primary accept">Find rentals</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection