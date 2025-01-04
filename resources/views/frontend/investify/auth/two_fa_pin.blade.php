@extends('frontend::layouts.auth')
@section('title')
    {{ __('2FA Security') }}
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
                                <h3 class="title">{{ __('2Step Verification') }}</h3>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                <strong>{{$error}}</strong>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <form action="{{ route('user.setting.2fa.verify') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-xxl-6">
                                        <div class="rock-single-input">
                                            <label class="rock-input-label" for="email">
                                                {{ __('Please enter the') }}
                                                <strong>{{ __('OTP') }}</strong> {{ __('generated on your Authenticator App.') }}
                                                <br> {{ __('Ensure you submit the current one because it refreshes every 30 seconds.') }}
                                            </label>
                                            <div class="input-field">
                                                <input type="password" name="one_time_password" required>
                                            </div>
                                        </div>
                                        <div class="rock-auth-btn mt-30 d-flex justify-content-center">
                                            <button class="site-btn gradient-btn"
                                                type="submit">{{ __('Authenticate Now') }}</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
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


