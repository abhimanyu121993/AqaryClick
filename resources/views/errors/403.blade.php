
@extends('frontend.layout')
@section('content-area')
<body class="mdc-theme--background">

    <div class="row center-xs middle-xs h-100">
        <div class="col-xs-10 col-sm-8 col-md-4">
            <div class="mdc-card p-0 mdc-elevation--z6 box">
                <div class="bg-primary box-header">
                    <i class="material-icons mat-icon-xlg">error</i>
                    <h1 class="error">403</h1>
                </div>
                <div class="box-content">
                    <div class="mdc-card mdc-elevation--z8 box-content-inner">
                        <p class="box-text">Opps, A client is forbidden.</p>
                        <p class="box-text">Please proceed to home.</p>
                        <div class="mdc-text-field mdc-text-field--outlined w-100 custom-field">
                            <input class="mdc-text-field__input" placeholder="Enter search keyword...">
                            {{-- <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label class="mdc-floating-label">Search keyword</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url('home') }}" class="mdc-button mdc-button--raised mx-1">
                            <span class="mdc-button__ripple"></span>
                            <i class="material-icons">home</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/libs/jquery.min.js"></script>
    <script src="js/libs/material-components-web.min.js"></script>
    <script src="js/libs/swiper.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1rF9bttCxRmsNdZYjW7FzIoyrul5jb-s&callback=initMap" async defer></script>
    @endsection

    @section('script-area')
    <script>
        $(document).ready(function(){
            $('.toolbar-1').removeClass('has-bg-image');
        });
       </script>
    @endsection
