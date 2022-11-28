@extends('home_layouts.master')

@section('content')
    <section class="breadcrumb-wrap bg-f br-bg-1">
        <div class="overlay op-6 bg-black"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
                    <div class="breadcrumb-title">
                        <h2 style="color:#dbcf90;">Contact us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-wrap mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="section-title style1 text-center mb-40 pt-5">
                        <h2>Get In Touch</h2><span></span>
                        <p class="mb-3">Feel free to contact us.Give us a call or Drop us a message !</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center pt-5">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-address" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="contact-icon">
                            <i class="ri-map-pin-fill"></i>
                        </div>
                        <div class="contact-info">
                            <h5>Our Address</h5>
                            <p class="mb-0">123 Western Road,LA</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-address" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="contact-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="contact-info">
                            <h5>Call Us On</h5>
                            <p class="mb-0"><a href="9716332024">+91 9716332024</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-address"style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div class="contact-icon">
                            <i class="ri-mail-send-line"></i>
                        </div>
                        <div class="contact-info">
                            <h5>Email Us</h5>
                            <p class="mb-0"><a href="#"><span>deepak@gmail,com</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-wrap  mb-2 pt-3">
        <div class="row">
            <div class="col-lg-12 pt-3">
                <div class="section-title style1 text-center mb-40">
                    <h2>Contact</h2>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center mb-5 pt-5">
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
                                            <input type="text" class="form-control " name="name" id="name">
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
    </section>
    <section class="team-wrap mb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-3 ">
                    <div class="section-title style1 text-center mb-40">
                        <h2>Our Location</h2>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center pt-2">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <div class="team-member">
                        <div class="company-location">
                            <div class="comp-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8385385572983!2d144.95358331584498!3d-37.81725074201705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sbd!4v1612419490850!5m2!1sen!2sbd"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
