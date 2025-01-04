@extends('frontend::layouts.auth')
@section('title')
    {{ __('Verify Email') }}
@endsection
@section('content')
    {{-- <section class="section-style site-auth">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-12">
                    <div class="auth-content">
                        <div class="logo">
                            <a href="{{ route('home')}}"><img src="{{ asset(setting('site_logo','global')) }}" alt=""/></a>
                        </div>
                        <div class="title">
                            <h2>👋 {{ __('Welcome Back!') }}</h2>
                            <p>{{ __('verify your email address by clicking on the link we just emailed to you') }}</p>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <div class="site-auth-form">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <button type="submit" class="site-btn-big primary-btn w-100">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </form>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="site-btn-big black-btn w-100">
                                    {{ __('Log Out') }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


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
                            <h3 class="title">{{ __('Verify Your Email') }}</h3>
                            <p class="description">{{ __('Verify your email address by clicking on the link we just emailed to you') }}</p>
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">
                                    <div class="rock-auth-btn mt-30 d-flex justify-content-center">
                                        <button class="site-btn gradient-btn"
                                            type="submit">{{ __('Resend Verification Email') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xxl-6">
                                    <div class="rock-auth-btn mt-30 d-flex justify-content-center">
                                        <button class="site-btn gradient-btn"
                                            type="submit">{{ __('Log Out') }}
                                        </button>
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



