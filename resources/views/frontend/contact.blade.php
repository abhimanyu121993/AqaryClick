@extends('frontend.layout')
@section('content-area')
<main class="content-offset-to-top">
    <div class="header-image-wrapper">
        <div class="bg" style="background-image: asset('home2/assets/images/others/contact.jpg');"></div>
        <div class="mask"></div>
        <div class="header-image-content offset-bottom">
            <h1 class="title">Contact Us</h1>
            <p class="desc">Got a question? We'll give you straight answer</p>
        </div>
    </div>
    <div class="px-3">
        <div class="theme-container">
            <div class="mdc-card main-content-header mb-5">
                <div class="row around-xs">
                    <div class="col-xs-12 col-sm-4">
                        <div class="column center-xs middle-xs text-center">
                            <i class="material-icons mat-icon-lg primary-color">home</i>
                            <h3 class="primary-color py-1">ADDRESS :</h3>
                            <span class="text-muted fw-500">{!! $websiteSetting->where('name','location')->pluck('value')[0]??'location Not Set' !!}</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="column center-xs middle-xs text-center">
                            <i class="material-icons mat-icon-lg primary-color">call</i>
                            <h3 class="primary-color py-1">PHONES :</h3>
                            <span class="text-muted fw-500">{!! $websiteSetting->where('name','mobile')->pluck('value')[0]??'Mobile Not Set' !!}</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="column center-xs middle-xs text-center">
                            <i class="material-icons mat-icon-lg primary-color">mail_outline</i>
                            <h3 class="primary-color py-1">E-MAIL :</h3>
                            <span class="text-muted fw-500">{!! $websiteSetting->where('name','email')->pluck('value')[0]??'location Not Set' !!}</span>
                        </div>
                    </div>
                    <div class="col-xs-12 mt-3 px-3 p-relative">
                        <div class="divider w-100"></div>
                    </div>
                    <h3 class="w-100 text-center py-3">CONTACT US</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="color:red"><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('home.contact-user')}}" method="post" class="contact-form row" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-4 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined w-100">
                                <input class="mdc-text-field__input" name="name" value="" placeholder="Name is required">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Name</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined w-100">
                                <input class="mdc-text-field__input" name="email" value="" placeholder="Email is required">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Email</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined w-100">
                                <input class="mdc-text-field__input" name="phone" value="" placeholder="Phone is required">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Phone</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 p-2">
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea w-100">
                                <textarea class="mdc-text-field__input" name="message" rows="5" placeholder="Message is required"></textarea>
                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Message</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 w-100 py-3 text-center">
                            <button class="mdc-button mdc-button--raised" type="submit">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mt-5">
                    <div id="contact-map"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection