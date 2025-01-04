@extends('frontend::layouts.auth')

@section('title')
    {{ __('Login') }}
@endsection
@section('content')

    <section class="rock-auth-section fix">
        <div class="container">
           <div class="rock-auth-wrapper">
              <div class="rock-auth-main">
                 <div class="rock-auth-logo">
                    <a href="{{ route('home') }}">
                       <img src="{{ asset(setting('site_logo','global')) }}" alt="logo">
                    </a>
                 </div>
                 <div class="rock-auth-main-inner">
                    <div class="rock-auth-from">
                       <div class="rock-auth-content">
                          <h3 class="title">{{ $data['title'] }}</h3>
                          <p class="description">{{ $data['bottom_text'] }}</p>
                       </div>
                       @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                    <strong>{{$error}}</strong>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                       <form action="{{ route('login') }}" method="POST" id="loginForm">
                            @csrf
                          <div class="row justify-content-center">
                             <div class="col-xxl-6">
                                <div class="rock-single-input">
                                   <label class="rock-input-label" for="email">{{ __('Email Or Username') }}<span>*</span></label>
                                   <div class="input-field">
                                      <input type="email" name="email">
                                   </div>
                                </div>
                                <div class="rock-single-input">
                                   <label class="rock-input-label" for="password">{{ __('Password') }}<span>*</span></label>
                                   <div class="input-field">
                                      <input type="password" name="password">
                                   </div>
                                </div>
                                @if($googleReCaptcha)
                                    <div class="g-recaptcha mb-3" id="feedback-recaptcha"
                                         data-sitekey="{{ json_decode($googleReCaptcha->data,true)['google_recaptcha_key'] }}">
                                    </div>
                                @endif
                                <div class="rock-auth-remember-inner">
                                   <div class="rock-auth-checkbox">
                                      <input id="terms_condition" type="checkbox">
                                      <label class="terms-condition" for="terms_condition">{{ __('Remember me') }}</label>
                                   </div>
                                   @if (Route::has('password.request'))
                                   <div class="rock-auth-forgot">
                                      <p><a href="{{ route('password.request') }}">{{ __('Forget Password') }}</a></p>
                                   </div>
                                   @endif
                                </div>
                             </div>
                          </div>
                       </form>
                       <div class="rock-auth-bottm">
                          <div class="rock-auth-btn">
                             <button type="submit" form="loginForm" class="site-btn gradient-btn">{{ __('Account Login') }}</button>
                          </div>
                          <p class="description">
                            {{ __("Don't have an account?") }}
                            <a href="{{route('register')}}">{{ __('Signup for free') }}</a>
                        </p>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="rock-auth-shapes">
                 <div class="shape-one">
                    <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/auth/auth-01.png') }}" alt="auth shape">
                 </div>
                 <div class="shape-two">
                    <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/auth/auth-02.png') }}" alt="auth shape">
                 </div>
              </div>
           </div>
        </div>
     </section>

@endsection
@section('script')
    @if($googleReCaptcha)
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif
@endsection
