@extends('frontend::layouts.user')
@section('title',__('Deposit Success'))
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xxl-12">
            <div class="rock-dashboard-card">
                <div class="rock-dashboard-title-inner">
                    <div class="content">
                        <h3 class="rock-dashboard-tile">{{ __('Deposit Success') }}</h3>
                    </div>
                    <a class="site-btn gradient-btn radius-12" href="{{ route('user.deposit.log') }}">{{ __('Deposit History') }}</a>
                </div>
                <div class="rock-add-mony-modal">
                    <div class="rock-add-mony-content">
                        <div class="thumb">
                            <img src="{{ asset('frontend/theme_base/hardrock/images/icons/checkbox.svg') }}" alt="information-circle">
                        </div>
                        <h4 class="title">{{$notify['title']}}</h4>
                        <p class="description">{{$notify['p']}}</p>
                        <span class="transaction-badge">{{ $notify['strong'] }}</span>
                        <div class="btn-inner">
                            <a class="site-btn gradient-btn radius-12" href="{{ $notify['action'] }}">{{ $notify['a'] }}
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                            fill="white" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
