@php
    $websiteSetting=App\Models\WebsiteSetting::get();
    

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title> 
   @include('frontend.includes.head')
</head>
<body class="mdc-theme--background"> 
   @include('frontend.includes.preloader')

@include('frontend.includes.colortool')
@include('frontend.includes.mobilemenu')
<div class="mdc-drawer-scrim sidenav-scrim"></div>  
@include('frontend.includes.topbar')

    @yield('content-area')


@include('frontend.includes.footer')


<div id="favorites-snackbar" class="mdc-snackbar">
    <div class="mdc-snackbar__surface">
        <div class="mdc-snackbar__label">The property has been added to favorites.</div>
        <div class="mdc-snackbar__actions">
            <button type="button" class="mdc-button mdc-snackbar__action">
            <div class="mdc-button__ripple"></div>
            <span class="mdc-button__label">
                <i class="material-icons warn-color">close</i>
            </span>
            </button>
        </div>
    </div>
</div> 
    <div id="back-to-top"><i class="material-icons">arrow_upward</i></div>

    @include('frontend.includes.foot')
  </body>
</html>