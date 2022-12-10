@extends('frontend.layout')
@section('content-area')

    <main>   
        <div class="px-3">  
            <div class="theme-container">  
                <div class="row center-xs middle-xs my-5"> 
                    <div class="mdc-card p-3 p-relative mw-500px w-100">
                        <div class="column center-xs middle-xs text-center">  
                            <h1 class="uppercase">Sign In</h1>
                            <a href="register.html" class="mdc-button mdc-ripple-surface mdc-ripple-surface--accent accent-color normal w-100">
                                Don't have an account? Sign up now!
                            </a>  
                        </div>
                        <form action="{{route('home.login-post')}}" method='post'>  
                            @csrf
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon w-100 mt-3 custom-field @error('email') mdc-text-field--invalid @enderror">
                                <i class="material-icons mdc-text-field__icon text-muted">person</i>
                                <input class="mdc-text-field__input" name='email' type='email'>
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Username</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg">@error('email') {{$message}} @enderror</div>
                            </div>
                           
                            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon mdc-text-field--with-trailing-icon w-100 custom-field mt-3 custom-field @error('password') mdc-text-field--invalid @enderror">
                                <i class="material-icons mdc-text-field__icon text-muted">lock</i>
                                <i class="material-icons mdc-text-field__icon text-muted" tabindex="1" id="password-toggle">visibility_off</i>
                                <input class="mdc-text-field__input" type="password" name="password">
                                <div class="mdc-notched-outline">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">
                                        <label class="mdc-floating-label">Password</label>
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                </div>
                            </div> 
                            <div class="mdc-text-field-helper-line">
                                <div class="mdc-text-field-helper-text mdc-text-field-helper-text--validation-msg">@error('password')
                                    {{$message}}
                                @enderror</div>
                            </div>

                            <div class="mdc-form-field mt-3 w-100">
                                <div class="mdc-checkbox">
                                    <input type="checkbox" class="mdc-checkbox__native-control" id="keep" name="remeber"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                    <div class="mdc-checkbox__ripple"></div>
                                </div>
                                <label for="keep" class="text-muted fw-500">Keep me signed in</label>
                            </div> 
                            <div class="text-center mt-2"> 
                                <button class="mdc-button mdc-button--raised bg-accent" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Sign to My Account</span> 
                                </button>
                            </div>  
                            <div class="row flex-nowrap between-xs middle-xs mt-3">
                                <div class="divider p-relative w-100"></div>
                                <h3 class="text-muted ws-nowrap fw-500 p-2">or Sign in with one click</h3>                       
                                <div class="divider p-relative w-100"></div>
                            </div>  
                            <div class="text-center py-3"> 
                                <a href="javascript:void(0);" class="mdc-fab mdc-fab--mini primary">
                                    <span class="mdc-fab__ripple"></span>
                                    <svg class="material-icons mat-icon-md" viewBox="0 0 24 24">
                                        <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0);" class="mdc-fab mdc-fab--mini primary mx-3">
                                    <span class="mdc-fab__ripple"></span>
                                    <svg class="material-icons mat-icon-md" viewBox="0 0 24 24">
                                        <path d="M22.46,6C21.69,6.35 20.86,6.58 20,6.69C20.88,6.16 21.56,5.32 21.88,4.31C21.05,4.81 20.13,5.16 19.16,5.36C18.37,4.5 17.26,4 16,4C13.65,4 11.73,5.92 11.73,8.29C11.73,8.63 11.77,8.96 11.84,9.27C8.28,9.09 5.11,7.38 3,4.79C2.63,5.42 2.42,6.16 2.42,6.94C2.42,8.43 3.17,9.75 4.33,10.5C3.62,10.5 2.96,10.3 2.38,10C2.38,10 2.38,10 2.38,10.03C2.38,12.11 3.86,13.85 5.82,14.24C5.46,14.34 5.08,14.39 4.69,14.39C4.42,14.39 4.15,14.36 3.89,14.31C4.43,16 6,17.26 7.89,17.29C6.43,18.45 4.58,19.13 2.56,19.13C2.22,19.13 1.88,19.11 1.54,19.07C3.44,20.29 5.7,21 8.12,21C16,21 20.33,14.46 20.33,8.79C20.33,8.6 20.33,8.42 20.32,8.23C21.16,7.63 21.88,6.87 22.46,6Z" />
                                    </svg>
                                </a>  
                                <a href="javascript:void(0);" class="mdc-fab mdc-fab--mini primary">
                                    <span class="mdc-fab__ripple"></span>
                                    <svg class="material-icons mat-icon-md" viewBox="0 0 24 24">
                                        <path d="M21.35,11.1H12.18V13.83H18.69C18.36,17.64 15.19,19.27 12.19,19.27C8.36,19.27 5,16.25 5,12C5,7.9 8.2,4.73 12.2,4.73C15.29,4.73 17.1,6.7 17.1,6.7L19,4.72C19,4.72 16.56,2 12.1,2C6.42,2 2.03,6.8 2.03,12C2.03,17.05 6.16,22 12.25,22C17.6,22 21.5,18.33 21.5,12.91C21.5,11.76 21.35,11.1 21.35,11.1V11.1Z" />
                                    </svg>
                                </a>   
                            </div>     
                        </form>
                        <div class="row end-xs middle-xs"> 
                            <a href="{{route('home.forget-password')}}" class="mdc-button normal">
                                <span class="mdc-button__ripple"></span>
                                <i class="material-icons mdc-button__icon">vpn_key</i>
                                <span class="mdc-button__label">Reset Password</span> 
                            </a>  
                        </div>
                    </div>                    
                </div>  
            </div>  
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