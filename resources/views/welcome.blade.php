@extends('home_layouts.master')

@section("content")
<div class="contact-popup">
    <div class="contact-popup-title">
        <button type="button" class="close-popup"> <i class="ri-close-fill"></i> </button>
    </div>
    <div class="contact-popup-wrap">
        <div class="comp-info">
            <div class="comp-logo">
                <a href="index.html">
                    <img class="logo-light" src="/front/assets/img/logo.png" alt="Image">
                    <img class="logo-dark" src="/front/assets/img/logo-white.png" alt="Image">
                </a>
            </div>
            <p class="comp-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
            <!-- <ul class="footer-contact-address">
                <li><a href="tel:999762236473"> <i class="ri-phone-line"></i> +999 762 23 6473</a></li>
                <li> <i class="ri-mail-send-fill"></i> <a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#a4cdcac2cbe4c1c7cbd1d68ac7cbc9"><span class="__cf_email__" data-cfemail="e0898e868fa085838f95">[email&#160;protected]</span>r.com</a></li>
                <li> <i class="ri-earth-fill"></i> <a href="https://www.ecour.com/">www.ecour.com</a></li>
                <li>
                    <i class="ri-map-pin-fill"></i> 24th North Lane, Hill Town, New York
                </li>
            </ul> -->
        </div>
        <div class="comp-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
        </div>
        <div class="share-on text-center">
            <ul class="social-profile style2">
                <li><a target="_blank" href="https://facebook.com/"><i class="ri-facebook-fill"></i> </a></li>
                <li><a target="_blank" href="https://twitter.com/"> <i class="ri-twitter-fill"></i> </a></li>
                <li><a target="_blank" href="https://linkedin.com/"> <i class="ri-linkedin-fill"></i> </a></li>
                <li><a target="_blank" href="https://instagram.com/"> <i class="ri-instagram-line"></i> </a></li>
            </ul>
        </div>
    </div>
</div>


<div class="hero-wrap style2">
    <div class="hero-slider-two swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="hero-slider-item bg-f hero-bg-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-5">
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
                                    <h1>Explore Your Creativity
                                        With Best Online Courses</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-slider-item bg-f hero-bg-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-5">
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
                                    <h1>Best Online Education Platform For You</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="hero-slider-item bg-f hero-bg-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-5">
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
                                    <h1>Take Your Admission To The Best Online Learning Course</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-md-6 col-sm-6">

                <div class="search-area">
                    <div class="form-search">
                        <form>
                            <div class="row">

                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Enter Property, Location Landmark..">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control">
                                        <option value="">Select City</option>
                                        <option value="Azamgarh">Azamgarh</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control">
                                        <option value="">Select Area</option>
                                        <option value="Jafarpur">Jafarpur</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-success login-btn">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="team-wrap pt-40 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-member-info">
                        <h4>10K +</h4>
                        <p>Premium Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-member-info">
                        <h4>4.5+</h4>
                        <p>Happy Customers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-member-info">
                        <h4>58+</h4>
                        <p>Premium Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="course-wrap mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Best Choice</h2>
                    <span></span>
                </div>
            </div>
            <div class="col-md-10">
                <h6>Popular Residences</h6>
            </div>
            <div class="col-md-2">
                <div class="button-next-slid">
                    <button class="btn btn-primary mb-3 mr-1" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-primary mb-3 " data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
            </div>
            <div class="carousel-item">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
                    <div class="col-xl-3 col-lg-4 col-md-6">
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
            </div>
        </div>
        <div class="carousel-item">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
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
                <div class="col-xl-3 col-lg-4 col-md-6">
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
                <div class="col-xl-3 col-lg-4 col-md-6">
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
                <div class="col-xl-3 col-lg-4 col-md-6">
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
        </div>
    </div>
    </div>
    </div>
</section>




<section class="about-wrap style2 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed does the eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="ecour-faq">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        How To Get Start a Online Course On Ecour?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="single-product-text">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How To Get Start a Online Course On Ecour?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Nemo quidem atque, nobis aut eveniet ratione, adipisci nisi itaque similique explicabo, soluta vel rem facilis sunt.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Can I Upgrade After I Finsh The Course?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat possimus deleniti adipisci officia ipsa dolor atque mollitia non accusamus explicabo suscipit error, placeat quia minima. Ut fugit adipisci ullam, omnis.</p>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="row justify-content-md-center pep  mx-auto">
                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                    </div>
                    <div class="card-footer">
                        <div class="row text-center mt-10 name-p">
                            <small>Deepak</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="row justify-content-md-center pep">
                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                    </div>
                    <div class="card-footer">
                        <div class="row text-center name-p">
                            <small class="">Deepak</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-quote-right" aria-hidden="true"></i></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="row justify-content-md-center pep">
                        <img src="/front/assets/img/team/team-member-6.jpg" alt="Image">
                    </div>


                    <div class="card-footer">
                        <div class="row text-center name-p">
                            <small class="">Deepak</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-wrap mt-3 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title style1 text-center mb-40">
                    <h2>Get In Touch</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="contect-form">
                        <h4>Contact Form</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="input-icons">
                                    <label for="" class="form-label">Your Name</label>
                                    <div class="mb-3">
                                        <i class="fa fa-user icon"></i>
                                        <input type="text" class="form-control input-field" id="">
                                    </div>
                                    <label class="form-label">Contect No.</label>
                                    <div class="mb-3">
                                        <i class="fa fa-phone icon"></i>
                                        <input type="text" class="form-control input-field">
                                    </div>
                                    <label class="form-label">Email</label>
                                    <div class="mb-3">
                                        <i class="fa fa-envelope icon"></i>
                                        <input type="email" class="form-control input-field">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-icons">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control input-field" rows="9"></textarea>
                                </div>
                            </div>
                            <div class="term-btn justify-content-md-center mt-2 mb-2">
                                <button type="button" class="btn btn-primary accept">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection