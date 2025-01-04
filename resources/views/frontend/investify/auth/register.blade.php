@extends('frontend::layouts.auth')

@section('title')
{{ __('Register') }}
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
                            <strong>{{ $error }}</strong>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form action="{{ route('register') }}" id="signUpForm" method="POST">
                            @csrf
                            <div class="row gy-24">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="first_name">{{ __('First Name') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="last_name">{{ __('Last Name') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="email">{{ __('Email Address') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="email" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                @if(getPageSetting('username_show'))
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="username">{{ __('Username') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="text" name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(getPageSetting('country_show'))
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="c-select">{{ __('Select Country') }}<span>*</span></label>
                                        <div class="input-select">
                                            <select name="country" id="countrySelect">
                                                @foreach( getCountries() as $country)
                                                <option @if( $location->country_code == $country['code']) selected
                                                    @endif value="{{ $country['name'].':'.$country['dial_code'] }}">
                                                    {{ $country['name']  }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(getPageSetting('phone_show'))
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="phonen">{{ __('Phone Number') }}<span>*</span></label>
                                        <div class="input-field input-group">
                                            <span class="input-group-text"
                                                id="dial-code">{{ getLocation()->dial_code }}</span>
                                            <input type="text" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(getPageSetting('referral_code_show'))
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="invite">{{ __('Referral Code') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="text" name="invite"
                                                value="{{ request('invite') ?? old('invite') }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="password">{{ __('Password') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="rock-input-label"
                                            for="cpassword">{{ __('Confirm Password') }}<span>*</span></label>
                                        <div class="input-field">
                                            <input type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                @if($googleReCaptcha)
                                <div class="g-recaptcha" id="feedback-recaptcha"
                                    data-sitekey="{{ json_decode($googleReCaptcha->data,true)['google_recaptcha_key'] }}">
                                </div>
                                @endif
                                <div class="rock-auth-checkbox">
                                    <input id="terms_condition" type="checkbox" name="i_agree" value="yes">
                                    <label class="terms-condition" for="terms_condition">
                                        {{ __('I agree with') }}
                                        <a href="{{url('/privacy-policy')}}">{{ __('Privacy & Policy') }}</a>
                                        {{ __('and') }}
                                        <a href="{{url('/terms-and-conditions')}}">{{ __('Terms & Condition') }}</a>
                                    </label>
                                </div>
                            </div>
                        </form>
                        <div class="rock-auth-bottm">
                            <div class="rock-auth-btn">
                                <button class="site-btn gradient-btn xs-w-100" form="signUpForm"
                                    type="submit">{{ __('Create Account') }}</button>
                            </div>
                            <p>{{ __('Already have an account?') }}
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rock-auth-shapes">
                <div class="shape-one">
                    <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/auth/auth-01.png') }}"
                        alt="auth shape">
                </div>
                <div class="shape-two">
                    <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/auth/auth-02.png') }}"
                        alt="auth shape">
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
<script>
    $('#countrySelect').on('change', function (e) {
        "use strict";
        e.preventDefault();
        var country = $(this).val();
        $('#dial-code').html(country.split(":")[1])
    })

</script>
@endsection
