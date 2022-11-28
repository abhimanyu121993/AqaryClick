@extends('home_layouts.master')

@section('content')

    <div class="hero-wrap style2">
        <div class="hero-slider-two swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-slider-item bg-f hero-bg-5">
                        <div class="container">
                            <div class="row">
                                <div class=" text-start">
                                    <div class="hero-content">
                                        <div class="hero-shape-2 md-none">
                                            <!-- <img src="/front/assets/img/hero/dot-shape-2.png" alt="Image"> -->
                                        </div>
                                        <div class="hero-shape-3 md-none">
                                            <!-- <img src="/front/assets/img/hero/dot-shape-3.png" alt="Image"> -->
                                        </div>
                                        <div class="hero-shape-4 md-none">
                                            <!-- <img src="/front/assets/img/hero/circle-shape-2.png" alt="Image"> -->
                                        </div>
                                        <h1 class=" md-display" style="color:#dbcf90;">Discover<br> Most
                                            Suitable
                                            Property</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="swiper-slide">
                    <div class="hero-slider-item bg-f hero-bg-4">
                        <div class="container">
                            <div class=" text-start">
                                <div class="hero-content">
                                    <div class="hero-shape-2 md-none">

                                    </div>
                                    <div class="hero-shape-3 md-none">

                                    </div>
                                    <div class="hero-shape-4 md-none">

                                    </div>
                                    <h2 class="mb-4" style="color:#dbcf90;font-size:45px;">Discover<br> Most Suitable
                                        Property</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="swiper-slide">
                    <div class="hero-slider-item bg-f hero-bg-1"
                        style="padding: 524px 0 114px;
                    position: relative;  min-height:100%">
                        <div class="container">
                            <div class=" text-start">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center ">
                <div class="col-lg-8 col-md-8 col-sm-10">

                    <div class="search-area d-sm-none d-md-block d-none d-sm-block">
                        <div class="form-search">
                            <form>
                                <div class="row col-md-12">

                                    <div class="col-md-3 col-sm-4 col-12 ">
                                        <input type="text" class="form-control"
                                            placeholder="Enter Property, Location Landmark..">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-12 ">
                                        <select class="form-control">
                                            <option value="">Select City</option>
                                            <option value="Azamgarh">Azamgarh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-12 ">
                                        <select class="form-control">
                                            <option value="">Select Area</option>
                                            <option value="Jafarpur">Jafarpur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-12 " style="background:white;">
                                        <img src="{{ asset('front/assets/img/slider/Search-button.png') }}" alt=""
                                            srcset="" class="p-2">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    {{-- <section class="team-wrap pt-255">
        <div class="container">
            <div class="row">
                <div class="search-area d-sm-block d-md-none">
                    <div class="form-search" style="position:absolute; ">
                        <form>
                            <div class="row col-md-12">

                                <div class="col-md-3 col-sm-4 col-12 ">
                                    <input type="text" class="form-control"
                                        placeholder="Enter Property, Location Landmark..">
                                </div>
                                <div class="col-md-3 col-sm-3 col-12 ">
                                    <select class="form-control">
                                        <option value="">Select City</option>
                                        <option value="Azamgarh">Azamgarh</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-12 ">
                                    <select class="form-control">
                                        <option value="">Select Area</option>
                                        <option value="Jafarpur">Jafarpur</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-2 col-12 ">
                                    <img src="{{ asset('front/assets/img/slider/Search-button.png') }}" alt=""
                                        srcset="">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="team-wrap pt-40 mb-3 pt-5">
        <div class="container">
            {{-- <div class="row"> --}}
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="d-sm-block d-md-none"
                    style="background: rgb(255 255 255 / 45%);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                    <form style="background: rgb(255 255 255 / 45%);">
                        <div class="row col-md-12">

                            <div class="col-md-3 col-sm-4 col-12 ">
                                <input type="text" class="form-control"
                                    placeholder="Enter Property, Location Landmark..">
                            </div>
                            <div class="col-md-3 col-sm-3 col-12 ">
                                <select class="form-control">
                                    <option value="">Select City</option>
                                    <option value="Azamgarh">Azamgarh</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-12 ">
                                <select class="form-control">
                                    <option value="">Select Area</option>
                                    <option value="Jafarpur">Jafarpur</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-2 col-12" style="background: white;">
                                <img src="{{ asset('front/assets/img/slider/Search-button.png') }}" alt=""
                                    srcset="" class="p-2">

                            </div>
                        </div>
                    </form>

                </div>
            </div>



        </div>
    </section>


    <section class="team-wrap pt-3 mb-3 ">
        <div class="container">
            <div class="row col-md-10 d-flex justify-content-center offset-md-1">
                <div class="col-lg-4 col-md-12 col-sm-12 p-5 ">
                    <div class="team-member" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="team-member-info pt-4 mb-4">
                            <h2 class="">{{ $buildings->count() . ' +' ?? '' }}</h2>
                            <h3 style="color:gray">Premium Buildings</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 p-5">
                    <div class="team-member"style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="team-member-info pt-4 mb-4">
                            <h2 class="">{{ App\Models\Tenant::count() . ' +' ?? '' }}</h2>
                            <h3 style="color:gray">Happy Tenants</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4
                                col-md-12 col-sm-12 p-5">
                    <div class="team-member" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="team-member-info pt-4 mb-4">
                            <h2 class="">{{ App\Models\Unit::where('unit_status', 3)->count() . ' +' ?? '' }}
                            </h2>
                            <h3 style="color:gray">Vacant<br> Units</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
















    <section class="course-wrap mb-3">
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Best Choice</h2>
                        <span></span>
                    </div>
                </div>
                <div class="col-md-10 mb-5">
                    <h6>Popular Residences</h6>
                </div>

            </div>
        </div>
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($buildings as $building)
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                    <div class="course-card style1"
                                        style="border:none;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <div class="course-img">
                                            <a href="#"><img
                                                    src="{{ asset('upload/building/' . $building->building_pic) }}"
                                                    alt="Image" style="height: 200px;width:310px;"></a>
                                        </div>
                                        <div class="course-info">
                                            <i class="fa fa-usd ic"></i> <span>{{ $building->building_value ?? '' }}</span>
                                            <h3><a href="#">{{ $building->name ?? '' }}</a></h3>
                                            <p>{{ Illuminate\Support\Str::limit($building->remark ?? '', 40, ' ...') }} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                    {{-- <div class="carousel-item">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="course-card style1">
                            <div class="course-img">
                                <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                            </div>
                            <div class="course-info">
                                <i class="fa fa-usd ic"></i> <span>2000</span>
                                <h3><a href="#">Aliva Garden Jardin</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
                </div>
                {{-- <div class="carousel-item">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="course-card style1">
                        <div class="course-img">
                            <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                        </div>
                        <div class="course-info">
                            <i class="fa fa-usd ic"></i> <span>2000</span>
                            <h3><a href="#">Aliva Garden Jardin</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="course-card style1">
                        <div class="course-img">
                            <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                        </div>
                        <div class="course-info">
                            <i class="fa fa-usd ic"></i> <span>2000</span>
                            <h3><a href="#">Aliva Garden Jardin</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="course-card style1">
                        <div class="course-img">
                            <i class="fa fa-usd ic"></i> <span>2000</span>
                            <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                        </div>
                        <div class="course-info">

                            <h3><a href="#">Aliva Garden Jardin</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="course-card style1">
                        <div class="course-img">
                            <i class="fa fa-usd ic"></i> <span>2000</span>
                            <a href="#"><img src="/front/assets/img/course/course-1.jpg" alt="Image"></a>
                        </div>
                        <div class="course-info">
                            <h3><a href="#">Aliva Garden Jardin</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ipsum dolor iste! </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            </div>
        </div>

        </div>
        </div>
    </section>









    <section class="about-wrap style2 mb-3">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb-5">
                        <h2>Our Value</h2>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="about-img value-img">
                    <img src="/front/assets/img/about/about-img-2.png" class="img-thumbnail" alt="Image">
                </div>
                <div class="about-content">
                    <div class="section-title text-left style1">
                        <h2>Value We Give To You.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed does the eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                        <div class="ecour-faq">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            How To Get Start a Online Course On Ecour?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="single-product-text">
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            How To Get Start a Online Course On Ecour?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse "
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Nemo quidem atque,
                                                nobis aut eveniet ratione, adipisci nisi itaque similique explicabo, soluta
                                                vel rem facilis sunt.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Can I Upgrade After I Finsh The Course?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat possimus
                                                deleniti adipisci officia ipsa dolor atque mollitia non accusamus explicabo
                                                suscipit error, placeat quia minima. Ut fugit adipisci ullam, omnis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-wrap mt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title style1 text-center mb-40">
                        <h2>What People Say</h2>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card h-100" style="border:none;">
                        <div class="card-body"
                            style="background:white;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                            <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="row justify-content-md-center pep  mx-auto">
                            <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                        </div>
                        <div class="card-footer">
                            <div class="row text-center mt-10 name-p">
                                <small>Test Demo</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card h-100" style="border:none;">
                        <div class="card-body"
                            style="background:white;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                            <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                        </div>
                        <div class="row justify-content-md-center pep">
                            <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                        </div>
                        <div class="card-footer">
                            <div class="row text-center name-p">
                                <small class="">Test</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card h-100" style="border:none;">
                        <div class="card-body"
                            style="background:white;box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                            <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This card has even longer content than the first to show that equal
                                height action.</p>
                        </div>
                        <div class="row justify-content-md-center pep">
                            <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                        </div>


                        <div class="card-footer">
                            <div class="row text-center name-p">
                                <small class="">Test</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-wrap mt-3 mb-5">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-12 pt-5 mb-5">
                    <div class="section-title style1 text-center mb-40">
                        <h2>Get In Touch</h2>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center mb-5">
                <div class="col-lg-10 col-md-12 col-sm-12" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="contect-form p-5 mb-5">

                            <form action="{{ route('contactus') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-icons">
                                            <label for="name" class="form-label">Your Name</label>
                                            <div class="mb-3">
                                                <i class="fa fa-user icon"></i>
                                                <input type="text" class="form-control " name="name"
                                                    id="name">
                                            </div>
                                            <label class="form-label">Contact No.</label>
                                            <div class="mb-3">
                                                <i class="fa fa-phone icon"></i>
                                                <input type="number" name="phone" class="form-control ">
                                            </div>
                                            <label class="form-label">Email</label>
                                            <div class="mb-3">
                                                <i class="fa fa-envelope icon"></i>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-icons">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control " name="message" rows="9"></textarea>
                                        </div>
                                    </div>
                                    <div class="term-btn justify-content-md-center mt-2 mb-2">
                                        <button type="submit" class="btn btn-primary accept">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
