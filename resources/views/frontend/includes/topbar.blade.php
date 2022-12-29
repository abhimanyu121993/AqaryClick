<header class="toolbar-1 has-bg-image">  
    <div id="top-toolbar" class="mdc-top-app-bar"> 
        <div class="theme-container row between-xs middle-xs h-100">
            <div class="row start-xs middle-xs">  
                <button id="sidenav-toggle" class="mdc-button mdc-ripple-surface d-md-none d-lg-none d-xl-none">
                    <span class="mdc-button__ripple"></span>
                    <i class="material-icons">menu</i>
                </button>
                <div class="row start-xs middle-xs fw-500 d-none d-md-flex d-lg-flex d-xl-flex"> 
                    <span class="d-flex center-xs middle-xs item">
                        <i class="material-icons mat-icon-sm">call</i>
                        <span class="px-1">{!! $websiteSetting->where('name','mobile')->pluck('value')[0]??'Mobile Not Set' !!}</span>
                    </span>
                    <span class="v-divider"></span> 
                    <span class="d-flex center-xs middle-xs item">
                        <i class="material-icons mat-icon-sm">location_on</i> 
                        <span class="px-1">{!! $websiteSetting->where('name','location')->pluck('value')[0]??'location Not Set' !!}</span>
                    </span>
                    <span class="v-divider"></span>
                    <span class="d-flex center-xs middle-xs item">
                        <i class="material-icons mat-icon-sm">mail</i>  
                        <span class="px-1">{!! $websiteSetting->where('name','email')->pluck('value')[0]??'Email Not Set' !!}</span>
                    </span>  
                </div>       
            </div> 
            <div class="row start-xs middle-xs d-none d-lg-flex d-xl-flex">
                <a href="https://www.facebook.com/" target="blank" class="social-icon">
                    <svg class="material-icons" viewBox="0 0 24 24">
                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" />
                    </svg>
                </a>
                <a href="https://twitter.com/" target="blank" class="social-icon">
                    <svg class="material-icons" viewBox="0 0 24 24">
                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" />
                    </svg> 
                </a>
                <a href="https://www.linkedin.com/" target="blank" class="social-icon"> 
                    <svg class="material-icons" viewBox="0 0 24 24">
                        <path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" />
                    </svg>
                </a>
                <a href="https://plus.google.com/" target="blank" class="social-icon"> 
                    <svg class="material-icons" viewBox="0 0 24 24">
                        <path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" />
                    </svg>
                </a>
            </div>  
            <div class="row end-xs middle-xs">
                <div class="mdc-menu-surface--anchor"> 
                    <button class="mdc-button mdc-ripple-surface mutable"> 
                        <span class="mdc-button__ripple"></span>
                        <span class="mdc-button__label"><span class="mutable">usd</span></span>
                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                    </button> 
                    <div class="mdc-menu mdc-menu-surface">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                            <li class="mdc-list-item" role="menuitem">
                                <span class="mdc-list-item__text">usd</span>
                            </li>
                            <li class="mdc-list-item" role="menuitem">
                                <span class="mdc-list-item__text">eur</span>
                            </li> 
                        </ul>
                    </div> 
                </div>
                <div class="mdc-menu-surface--anchor"> 
                    <button class="mdc-button mdc-ripple-surface mutable">
                        <span class="mdc-button__ripple"></span> 
                        <img src="{{asset('home2/assets/images/flags/gb.svg')}}" alt="" width="18">
                        <span class="mdc-button__label flag-name d-none d-lg-flex d-xl-flex"><span class="mutable">English</span></span>
                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                    </button> 
                    <div class="mdc-menu mdc-menu-surface">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                            <li class="mdc-list-item" role="menuitem">
                                <img src="{{asset('home2/assets/images/flags/gb.svg')}}" alt="" width="18" class="mdc-elevation--z1"> 
                                <span class="mdc-list-item__text flag-name">English</span>
                            </li>
                            <li class="mdc-list-item" role="menuitem">
                                <img src="{{asset('home2/assets/images/flags/de.svg')}}" alt="" width="18" class="mdc-elevation--z1"> 
                                <span class="mdc-list-item__text flag-name">German</span>
                            </li> 
                            <li class="mdc-list-item" role="menuitem">
                                <img src="{{asset('home2/assets/images/flags/fr.svg')}}" alt="" width="18" class="mdc-elevation--z1"> 
                                <span class="mdc-list-item__text flag-name">French</span>
                            </li> 
                            <li class="mdc-list-item" role="menuitem">
                                <img src="{{asset('home2/assets/images/flags/ru.svg')}}" alt="" width="18" class="mdc-elevation--z1"> 
                                <span class="mdc-list-item__text flag-name">Russian</span>
                            </li> 
                            <li class="mdc-list-item" role="menuitem">
                                <img src="{{asset('home2/assets/images/flags/tr.svg')}}" alt="" width="18" class="mdc-elevation--z1"> 
                                <span class="mdc-list-item__text flag-name">Turkish</span>
                            </li> 
                        </ul>
                    </div> 
                </div>  
                @if(Auth::user())
                <div class="mdc-menu-surface--anchor"> 
                    <button class="mdc-button mdc-ripple-surface"> 
                        <span class="mdc-button__ripple"></span>
                        <i class="material-icons mdc-button__icon mx-1">person</i>
                        <span class="mdc-button__label">account</span>
                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                    </button> 
                    <div class="mdc-menu mdc-menu-surface user-menu">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                            <li class="user-info row start-xs middle-xs">                   
                                <img src="{{asset('home2/assets/images/others/user.jpg')}}" alt="user-image" width="50">
                                <p class="m-0">{{Auth::user()->name}} <br> <small><i> </i></small></p>
                            </li>
                            <li role="separator" class="mdc-list-divider m-0"></li> 
                            <li>
                                <a href="submit-property.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">add_circle</i> 
                                    <span class="mdc-list-item__text px-3">Submit Property</span>
                                </a> 
                            </li>
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">home</i> 
                                    <span class="mdc-list-item__text px-3">Go To Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="favorites.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">favorite_border</i> 
                                    <span class="mdc-list-item__text px-3">Favorites
                                        <span class="badge warn">2</span>
                                    </span> 
                                </a>
                            </li>
                            <li>
                                <a href="compare.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">compare_arrows</i> 
                                    <span class="mdc-list-item__text px-3">Compare
                                        <span class="badge primary">3</span>
                                    </span> 
                                </a>
                            </li> 
                            <li>
                                <a href="#" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">search</i> 
                                    <span class="mdc-list-item__text px-3">Saved Searches</span>
                                </a>
                            </li>
                            <li>
                                <a href="profile.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">edit</i> 
                                    <span class="mdc-list-item__text px-3">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="lock-screen.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">lock</i> 
                                    <span class="mdc-list-item__text px-3">Lock screen</span>
                                </a>
                            </li>
                            <li>
                                <a href="faqs.html" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">help</i> 
                                    <span class="mdc-list-item__text px-3">Help</span>
                                </a>
                            </li>
                            <li role="separator" class="mdc-list-divider m-0"></li>
                            <li>
                                <a href="{{route('home.logout')}}" class="mdc-list-item" role="menuitem">
                                    <i class="material-icons mat-icon-sm text-muted">power_settings_new</i> 
                                    <span class="mdc-list-item__text px-3">Sign Out</span>
                                </a>
                            </li> 
                        </ul>
                    </div> 
                </div> 
                @else
                <div class="mdc-menu-surface--anchor"> 
                    <button class="mdc-button mdc-ripple-surface"> 
                        <span class="mdc-button__ripple"></span>
                        <i class="material-icons mdc-button__icon mx-1">person</i>
                        <span class="mdc-button__label">account</span>
                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                    </button> 
                    <div class="mdc-menu mdc-menu-surface user-menu">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                            
                        <li>
                                <a href="{{route('home.login')}}" class="mdc-list-item" role="menuitem"> 
                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    <span class="mdc-list-item__text px-3">Login</span>
                                </a>
                            </li> 
                            <li role="separator" class="mdc-list-divider m-0"></li>
                            <li>
                                <a href="{{route('home.registerIndex')}}" class="mdc-list-item" role="menuitem">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                 <span class="mdc-list-item__text px-3">Register</span>
                                </a>
                            </li> 
                        </ul>
                    </div> 
                </div> 
                @endif

            </div> 
        </div> 
    </div>  
 @include('frontend.includes.menubar')
</header>  