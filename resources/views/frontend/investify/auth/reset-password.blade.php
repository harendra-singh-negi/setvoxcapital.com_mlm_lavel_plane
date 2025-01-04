@extends('frontend::layouts.auth')
@section('title')
    {{ __('Reset Password') }}
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
                                <h3 class="title">{{ __('Reset Password') }}</h3>
                                <p class="description">{{  __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                <strong>{{$error}}</strong>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @if(session('status'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session('status') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="row justify-content-center">
                                    <div class="col-xxl-6">
                                        <div class="rock-single-input">
                                            <label class="rock-input-label" for="email">{{ __('Email Address') }}</label>
                                            <div class="input-field">
                                                <input type="email" name="email" required value="{{ old('email',$request->email) }}">
                                            </div>
                                        </div>
                                        <div class="rock-single-input">
                                            <label class="rock-input-label" for="password">{{ __('New Password') }}<span>*</span></label>
                                            <div class="input-field">
                                               <input type="password" name="password">
                                            </div>
                                         </div>
                                         <div class="rock-single-input">
                                            <label class="rock-input-label" for="password">{{ __('Confirm Password') }}<span>*</span></label>
                                            <div class="input-field">
                                               <input type="password" name="password_confirmation">
                                            </div>
                                         </div>
                                        <div class="rock-auth-btn mt-30 d-flex justify-content-center">
                                            <button class="site-btn gradient-btn" type="submit">{{ __('Reset Password') }}</button>
                                        </div>
                                        <div class="rock-auth-bottm">
                                            <p class="description">
                                                {{ __("Already have an account?") }}
                                                <a href="{{route('login')}}">{{ __('Login') }}</a>
                                            </p>
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

