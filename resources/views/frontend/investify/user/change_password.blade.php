@extends('frontend::layouts.user')
@section('title')
{{ __('Change Password') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-24">
        <div class="col-xl-12">
            <div class="rock-profile-change-password-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <h3 class="rock-dashboard-tile">{{ __('Change Password') }}</h3>
                    </div>
                    <div class="rock-profile-settings-wrapper">
                        <form action="{{ route('user.new.password') }}" method="POST">
                            @csrf
                            <div class="row gy-24 gx-20">
                                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="input-label" for="current_password">{{ __('Current Password') }}</label>
                                        <div class="input-field">
                                            <input type="password" id="current_password" name="current_password"
                                                class="box-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="input-label" for="new_password">{{ __('New Password') }}</label>
                                        <div class="input-field">
                                            <input type="password" id="new_password" name="new_password"
                                                class="box-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
                                    <div class="rock-single-input">
                                        <label class="input-label" for="new_confirm_password">{{ __('Confirm Password') }}</label>
                                        <div class="input-field">
                                            <input type="password" id="new_confirm_password" name="new_confirm_password"
                                                class="box-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="rock-input-btn-wrap justify-content-end">
                                        <button type="submit" class="site-btn gradient-btn radius-10">
                                            {{ __('Save Changes') }}
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
