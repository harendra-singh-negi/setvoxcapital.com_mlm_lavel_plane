@extends('frontend::layouts.user')
@section('title')
{{ __('Withdraw Account') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-withdraw-account-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content">
                            <h3 class="rock-dashboard-tile">{{ __('Withdraw Account') }}</h3>
                        </div>
                        <a class="site-btn gradient-btn radius-12"
                            href="{{ route('user.withdraw.account.create') }}">{{ __('Add New Account') }}</a>
                    </div>
                    <div class="rock-withdraw-account-table">
                        <div class="rock-custom-table">
                            <div class="contents">
                                <div class="site-table-list site-table-head">
                                    <div class="site-table-col">{{ __('Account Info') }}</div>
                                    <div class="site-table-col">{{ __('Action') }}</div>
                                </div>
                                @foreach($accounts as $account)
                                <div class="site-table-list">
                                    <div class="site-table-col">
                                        <div class="account-description">
                                            <div class="iocn">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M3.03293 10L20.9671 10C21.9872 10 22.3878 8.64858 21.539 8.07059L13.1438 2.35375C12.4512 1.88208 11.5488 1.88208 10.8562 2.35375L2.46102 8.07059C1.61224 8.64858 2.01282 10 3.03293 10Z"
                                                        fill="white" />
                                                    <rect x="6" y="10" width="4" height="8" fill="white" />
                                                    <rect x="14" y="10" width="4" height="8" fill="white" />
                                                    <path opacity="0.4"
                                                        d="M19.3815 18C19.7603 18 20.1066 18.214 20.2759 18.5528L21.2759 20.5528C21.6084 21.2177 21.1249 22 20.3815 22L3.61759 22C2.87421 22 2.39071 21.2177 2.72316 20.5528L3.72316 18.5528C3.89255 18.214 4.23882 18 4.61759 18L19.3815 18Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <div class="content">
                                                <h4 class="title sidecar-text">{{ $account->method_name }}</h4>
                                                <p class="description">
                                                    {{ $account->method->currency .' '. __('Account') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <div class="action-btn-wrap">
                                            <a class="action-btn primary-btn"
                                                href="{{ route('user.withdraw.account.edit',$account->id) }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M2.25 21C2.25 20.5858 2.58579 20.25 3 20.25H21C21.4142 20.25 21.75 20.5858 21.75 21C21.75 21.4142 21.4142 21.75 21 21.75H3C2.58579 21.75 2.25 21.4142 2.25 21Z"
                                                        fill="white" />
                                                    <path
                                                        d="M7.31963 17.9881L10.7523 17.4977C11.2475 17.427 11.7064 17.1976 12.06 16.8439L18.6883 10.2156C18.6883 10.2156 17.0537 10.2156 15.419 8.58102C13.7844 6.94639 13.7844 5.31177 13.7844 5.31177L7.15616 11.94C6.80248 12.2937 6.57305 12.7526 6.50231 13.2477L6.01193 16.6804C5.90295 17.4433 6.5568 18.0971 7.31963 17.9881Z"
                                                        fill="white" />
                                                    <path opacity="0.4"
                                                        d="M20.3237 5.31171L18.689 3.67708C17.7863 2.77431 16.3226 2.77431 15.4198 3.67708L13.7852 5.31171C13.7852 5.31171 13.7852 6.94634 15.4198 8.58096C17.0544 10.2156 18.689 10.2156 18.689 10.2156L20.3237 8.58096C21.2264 7.67818 21.2264 6.21449 20.3237 5.31171Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($accounts) == 0)
                            <div class="alert alert-table mt-20 text-center" role="alert">
                                {{ __('No Data Found') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
