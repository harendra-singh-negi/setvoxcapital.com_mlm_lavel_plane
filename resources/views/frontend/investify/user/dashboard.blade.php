@extends('frontend::layouts.user')
@section('title')
{{ __('Dashboard') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-24 gy-xs-16">
        @include('frontend::user.include.__kyc_info')
        <div class="col-xxl-12">
            <!-- Show desktop-screen content -->
            <div class="rock-desktop-screen-show">
                <div class="rock-dashboard-level-area">
                    <div class="dashboard-card">
                        <div class="rock-dashboard-level-wrapper">
                            <div class="rock-dashboard-level-contents" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/level-bg.png') }}">
                                <div class="thumb">
                                    <img src="{{ asset($user->rank->icon) }}" alt="level">
                                </div>
                                <div class="content">
                                    <span class="lavel">{{ $user->rank->ranking }}</span>
                                    <h4 class="lavel-title">{{ $user->rank->ranking_name }}</h4>
                                </div>
                            </div>
                            @if(setting('sign_up_referral','permission'))
                            <div class="rock-dashboard-referral">
                                <div class="contents">
                                    <h4 class="link-title">{{ __('Referral URL') }}</h4>
                                    <div class="referral-link">
                                        <p class="referral-url-copy">{{ $referral->link }}</p>
                                        <button class="referral-url-copy-btn" onclick="copyToClipboard()">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M8 6C8 3.79086 9.79086 2 12 2H18C20.2092 2 22 3.79086 22 6V12C22 14.2091 20.2092 16 18 16H12C9.79086 16 8 14.2091 8 12V6Z"
                                                    fill="white" />
                                                <path
                                                    d="M2 12C2 9.79086 3.79086 8 6 8H12C14.2092 8 16 9.79086 16 12V18C16 20.2091 14.2092 22 12 22H6C3.79086 22 2 20.2091 2 18V12Z"
                                                    fill="white" />
                                            </svg>
                                        </button>
                                        <span id="copy-message" class="copy-message">{{ __('Copied!') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <div class="rock-dashboard-level-area">
                    <div class="rock-dashboard-level-contents">
                        <div class="thumb" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/mobile-level-bg.png') }}">
                            <img src="{{ asset($user->rank->icon) }}" alt="level">
                        </div>
                        <div class="content">
                            <span class="lavel">{{ $user->rank->ranking_name }}</span>
                            <h4 class="lavel-title">{{ $user->rank->ranking }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <div class="rock-account-card-main">
                    <div class="rock-account-card">
                        <div class="content-inner">
                            <div class="card-content">
                                <h4 class="title">{{ $currencySymbol.$user->balance }}</h4>
                                <div class="info">
                                    <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M22 6H6C3.79086 6 2 7.79086 2 10V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6Z"
                                                fill="white" />
                                            <path d="M22 6C22 3.79086 20.2091 2 18 2H12C9.79086 2 8 3.79086 8 6H22Z"
                                                fill="white" />
                                            <path
                                                d="M2 12L2 16L6 16C7.10457 16 8 15.1046 8 14C8 12.8954 7.10457 12 6 12L2 12Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <h5 class="info-text">{{ __('Main Wallet') }}</h5>
                                </div>
                            </div>
                            <div class="card-content">
                                <h4 class="title">{{ $currencySymbol.$user->profit_balance }}</h4>
                                <div class="info">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z"
                                                fill="white" />
                                            <path opacity="0.4"
                                                d="M5.68453 10.2103C6.4673 7.7055 8.7871 6 11.4114 6H12.5891C15.2134 6 17.5332 7.7055 18.316 10.2104L19.566 14.2104C20.7734 18.0739 17.887 22 13.8391 22H10.1614C6.11357 22 3.22716 18.0739 4.43453 14.2104L5.68453 10.2103Z"
                                                fill="white" />
                                            <path
                                                d="M12 20C12 18.8954 12.8954 18 14 18H20C21.1046 18 22 18.8954 22 20C22 21.1046 21.1046 22 20 22H14C12.8954 22 12 21.1046 12 20Z"
                                                fill="white" />
                                            <path
                                                d="M12 16C12 14.8954 12.8954 14 14 14H19.3333H20C21.1046 14 22 14.8954 22 16C22 17.1046 21.1046 18 20 18H14C12.8954 18 12 17.1046 12 16Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <h5 class="info-text">{{ __('Profit Wallet') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-shape">
                            <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/card-shape.png') }}" alt="">
                        </div>
                    </div>
                    <div class="account-bg-shape">
                        <img src="{{ asset('frontend/theme_base/hardrock/images/bg/ac-balance-bg.png') }}" alt="">
                    </div>
                </div>
                <div class="rock-shortcut-btn-wrap">
                    <a class="rock-shortcut-btn" href="{{ route('user.deposit.amount') }}">
                        <span class="icon"><svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M2.66602 4H0.666016V13L4.97685 15.1554C6.08769 15.7108 7.3126 16 8.55456 16H16.666C17.7706 16 18.666 15.1046 18.666 14C18.666 12.8954 17.7706 12 16.666 12H15.0824C14.151 12 13.2323 11.7831 12.3991 11.3666L9.45801 9.896C9.65031 9.7189 9.80919 9.49927 9.91883 9.24342C10.3324 8.27844 9.8901 7.16054 8.92826 6.73973L2.66602 4Z"
                                    fill="white" />
                                <circle cx="16.666" cy="4" r="4" fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Deposit') }}</span>
                    </a>
                    <a class="rock-shortcut-btn" href="{{ route('user.schema') }}">
                        <span class="icon"><svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M2.66602 4H0.666016V13L4.97685 15.1554C6.08769 15.7108 7.3126 16 8.55456 16H16.666C17.7706 16 18.666 15.1046 18.666 14C18.666 12.8954 17.7706 12 16.666 12H15.0824C14.151 12 13.2323 11.7831 12.3991 11.3666L9.45801 9.896C9.65031 9.7189 9.80919 9.49927 9.91883 9.24342C10.3324 8.27844 9.8901 7.16054 8.92826 6.73973L2.66602 4Z"
                                    fill="white" />
                                <circle cx="16.666" cy="4" r="4" fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Invest') }}</span>
                    </a>
                    <a class="rock-shortcut-btn" href="{{ route('user.withdraw.view') }}">
                        <span class="icon"><svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M2.66602 4H0.666016V13L4.97685 15.1554C6.08769 15.7108 7.3126 16 8.55456 16H16.666C17.7706 16 18.666 15.1046 18.666 14C18.666 12.8954 17.7706 12 16.666 12H15.0824C14.151 12 13.2323 11.7831 12.3991 11.3666L9.45801 9.896C9.65031 9.7189 9.80919 9.49927 9.91883 9.24342C10.3324 8.27844 9.8901 7.16054 8.92826 6.73973L2.66602 4Z"
                                    fill="white" />
                                <circle cx="16.666" cy="4" r="4" fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Withdraw') }}</span>
                    </a>
                </div>
            </div>
            <!-- Show desktop-screen content -->
            <div class="rock-desktop-screen-show">
                <div class="rock-dashboard-grid">
                    <div class="rock-account-card-wrapper">
                        <h3 class="title">{{ __('Account Balance') }}</h3>
                        <div class="rock-account-card-main">
                            <div class="rock-account-card">
                                <div class="content-inner">
                                    <div class="card-content">
                                        <h4 class="title">{{ $currencySymbol.$user->balance }}</h4>
                                        <div class="info">
                                            <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M22 6H6C3.79086 6 2 7.79086 2 10V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V6Z"
                                                        fill="white" />
                                                    <path
                                                        d="M22 6C22 3.79086 20.2091 2 18 2H12C9.79086 2 8 3.79086 8 6H22Z"
                                                        fill="white" />
                                                    <path
                                                        d="M2 12L2 16L6 16C7.10457 16 8 15.1046 8 14C8 12.8954 7.10457 12 6 12L2 12Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                            <h5 class="info-text">{{ __('Main Wallet') }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="title">{{ $currencySymbol.$user->profit_balance }}</h4>
                                        <div class="info">
                                            <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z"
                                                        fill="white" />
                                                    <path opacity="0.4"
                                                        d="M5.68453 10.2103C6.4673 7.7055 8.7871 6 11.4114 6H12.5891C15.2134 6 17.5332 7.7055 18.316 10.2104L19.566 14.2104C20.7734 18.0739 17.887 22 13.8391 22H10.1614C6.11357 22 3.22716 18.0739 4.43453 14.2104L5.68453 10.2103Z"
                                                        fill="white" />
                                                    <path
                                                        d="M12 20C12 18.8954 12.8954 18 14 18H20C21.1046 18 22 18.8954 22 20C22 21.1046 21.1046 22 20 22H14C12.8954 22 12 21.1046 12 20Z"
                                                        fill="white" />
                                                    <path
                                                        d="M12 16C12 14.8954 12.8954 14 14 14H19.3333H20C21.1046 14 22 14.8954 22 16C22 17.1046 21.1046 18 20 18H14C12.8954 18 12 17.1046 12 16Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                            <h5 class="info-text">{{ __('Profit Wallet') }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-shape">
                                    <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/card-shape.png') }}" alt="">
                                </div>
                            </div>
                            <div class="rock-account-btn">
                                <a class="site-btn gradient-btn" href="{{ route('user.deposit.amount') }}">
                                    <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M4 8H2V17L6.31083 19.1554C7.42168 19.7108 8.64658 20 9.88854 20H18C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16H16.4164C15.4849 16 14.5663 15.7831 13.7331 15.3666L10.792 13.896C10.9843 13.7189 11.1432 13.4993 11.2528 13.2434C11.6664 12.2784 11.2241 11.1605 10.2622 10.7397L4 8Z"
                                                fill="white" />
                                            <circle cx="18" cy="8" r="4" fill="white" />
                                        </svg>
                                    </span>
                                    {{ __('Deposit') }}
                                </a>
                                <a class="site-btn outline-opcity-btn" href="{{ route('user.schema') }}"> <span><svg width="24"
                                            height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M19 13.5C19 17.9183 15.4183 21.5 11 21.5C6.58172 21.5 3 17.9183 3 13.5C3 9.08172 6.58172 5.5 11 5.5C15.4183 5.5 19 9.08172 19 13.5Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 4.25C15.5858 4.25 15.25 3.91421 15.25 3.5C15.25 3.08579 15.5858 2.75 16 2.75H21C21.4142 2.75 21.75 3.08579 21.75 3.5V8.5C21.75 8.91421 21.4142 9.25 21 9.25C20.5858 9.25 20.25 8.91421 20.25 8.5V5.31066L10.5303 15.0303C10.2374 15.3232 9.76256 15.3232 9.46967 15.0303C9.17678 14.7374 9.17678 14.2626 9.46967 13.9697L19.1893 4.25H16Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    {{ __('Invest Now') }}
                                </a>
                            </div>
                            <div class="account-bg-shape">
                                <img src="{{ asset('frontend/theme_base/hardrock/images/bg/ac-balance-bg.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="rock-single-card-grid">
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M2 4C2 2.89543 2.89543 2 4 2H12C13.1046 2 14 2.89543 14 4V8C14 9.10457 13.1046 10 12 10H4C2.89543 10 2 9.10457 2 8V4Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M10 16C10 14.8954 10.8954 14 12 14H20C21.1046 14 22 14.8954 22 16V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V16Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.6036 6.75L19.8839 7.46967C19.591 7.76256 19.591 8.23744 19.8839 8.53033C20.1768 8.82322 20.6517 8.82322 20.9445 8.53033L22.2374 7.23744C22.9209 6.55402 22.9209 5.44598 22.2374 4.76256L20.9445 3.46967C20.6517 3.17678 20.1768 3.17678 19.8839 3.46967C19.591 3.76256 19.591 4.23744 19.8839 4.53033L20.6036 5.25L16 5.25C15.5858 5.25 15.25 5.58579 15.25 6C15.25 6.41421 15.5858 6.75 16 6.75L20.6036 6.75Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.39645 18.75L4.11612 19.4697C4.40901 19.7626 4.40901 20.2374 4.11612 20.5303C3.82322 20.8232 3.34835 20.8232 3.05546 20.5303L1.76256 19.2374C1.07915 18.554 1.07914 17.446 1.76256 16.7626L3.05546 15.4697C3.34835 15.1768 3.82322 15.1768 4.11612 15.4697C4.40901 15.7626 4.40901 16.2374 4.11612 16.5303L3.39645 17.25L8 17.25C8.41421 17.25 8.75 17.5858 8.75 18C8.75 18.4142 8.41421 18.75 8 18.75L3.39645 18.75Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $dataCount['total_transaction'] }}</h3>
                                <p class="description">{{ __('All Transactions') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M4 8H2V17L6.31083 19.1554C7.42168 19.7108 8.64658 20 9.88854 20H18C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16H16.4164C15.4849 16 14.5663 15.7831 13.7331 15.3666L10.792 13.896C10.9843 13.7189 11.1432 13.4993 11.2528 13.2434C11.6664 12.2784 11.2241 11.1605 10.2622 10.7397L4 8Z"
                                            fill="black" />
                                        <circle cx="18" cy="8" r="4" fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_deposit'] }}</h3>
                                <p class="description">{{ __('Total Deposit') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 5.75C12.4142 5.75 12.75 6.08579 12.75 6.5V7.35352C13.9043 7.67998 14.75 8.74122 14.75 10C14.75 10.4142 14.4142 10.75 14 10.75C13.5858 10.75 13.25 10.4142 13.25 10C13.25 9.30964 12.6904 8.75 12 8.75C11.3096 8.75 10.75 9.30964 10.75 10C10.75 10.6904 11.3096 11.25 12 11.25C13.5188 11.25 14.75 12.4812 14.75 14C14.75 15.2588 13.9043 16.32 12.75 16.6465V17.5C12.75 17.9142 12.4142 18.25 12 18.25C11.5858 18.25 11.25 17.9142 11.25 17.5V16.6465C10.0957 16.32 9.25 15.2588 9.25 14C9.25 13.5858 9.58579 13.25 10 13.25C10.4142 13.25 10.75 13.5858 10.75 14C10.75 14.6904 11.3096 15.25 12 15.25C12.6904 15.25 13.25 14.6904 13.25 14C13.25 13.3096 12.6904 12.75 12 12.75C10.4812 12.75 9.25 11.5188 9.25 10C9.25 8.74122 10.0957 7.67998 11.25 7.35352V6.5C11.25 6.08579 11.5858 5.75 12 5.75Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_investment'] }}
                                </h3>
                                <p class="description">{{ __('Total Investment') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M5.68355 10.2103C6.46632 7.7055 8.78612 6 11.4104 6H12.5881C15.2125 6 17.5323 7.7055 18.315 10.2104L19.565 14.2104C20.7724 18.0739 17.886 22 13.8381 22H10.1604C6.11259 22 3.22618 18.0739 4.43355 14.2104L5.68355 10.2103Z"
                                            fill="black" />
                                        <path
                                            d="M12 20C12 18.8954 12.8954 18 14 18H20C21.1046 18 22 18.8954 22 20C22 21.1046 21.1046 22 20 22H14C12.8954 22 12 21.1046 12 20Z"
                                            fill="black" />
                                        <path
                                            d="M12 16C12 14.8954 12.8954 14 14 14H19.3333H20C21.1046 14 22 14.8954 22 16C22 17.1046 21.1046 18 20 18H14C12.8954 18 12 17.1046 12 16Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_profit'] }}</h3>
                                <p class="description">{{ __('Total Profit') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_transfer'] }}</h3>
                                <p class="description">{{ __('Total Transfer') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M4 12C4 10.8954 4.89543 10 6 10H15C16.1046 10 17 10.8954 17 12C17 13.1046 16.1046 14 15 14H6C4.89543 14 4 13.1046 4 12Z"
                                            fill="black" />
                                        <path
                                            d="M15 14H6.16667C4.97005 14 4 14.8954 4 16C4 17.1046 4.97005 18 6.16667 18H15C16.1046 18 17 17.1046 17 16C17 14.8954 16.1046 14 15 14Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M20 18C20 15.7909 18.2091 14 16 14C15.8007 14 15.6047 14.0146 15.4132 14.0427C13.4823 14.3266 12 15.9902 12 18C12 20.2091 13.7909 22 16 22C18.2091 22 20 20.2091 20 18Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.25 3.39645L10.5303 4.11612C10.2374 4.40901 9.76256 4.40901 9.46967 4.11612C9.17678 3.82322 9.17678 3.34835 9.46967 3.05546L10.7626 1.76256C11.446 1.07915 12.554 1.07914 13.2374 1.76256L14.5303 3.05546C14.8232 3.34835 14.8232 3.82322 14.5303 4.11612C14.2374 4.40901 13.7626 4.40901 13.4697 4.11612L12.75 3.39645L12.75 7C12.75 7.41421 12.4142 7.75 12 7.75C11.5858 7.75 11.25 7.41421 11.25 7L11.25 3.39645Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_withdraw'] }}</h3>
                                <p class="description">{{ __('Total Withdraw') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M9.41266 4.68911C10.2496 3.85219 11.4055 3.41786 12.5771 3.50011L16.5414 3.77844C18.5209 3.91741 20.0839 5.48041 20.2228 7.45987L20.5011 11.4242C20.5834 12.5958 20.1491 13.7517 19.3122 14.5886L12.7468 21.154C11.1635 22.7373 8.61357 22.7545 7.05148 21.1924L2.80884 16.9498C1.24674 15.3877 1.26396 12.8378 2.8473 11.2545L9.41266 4.68911Z"
                                            fill="black" />
                                        <circle cx="14.8281" cy="9.17218" r="2" transform="rotate(45 14.8281 9.17218)"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    <span>{{ $currencySymbol }}</span>{{ $dataCount['total_referral_profit'] }}</h3>
                                <p class="description">{{ __('Referral Bonus') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.39225 8.15257C8.55313 7.47687 9.15686 7 9.85145 7H14.1485C14.8431 7 15.4469 7.47687 15.6078 8.15257L16.5601 12.1526C16.7846 13.0951 16.0698 14 15.1009 14H8.89907C7.93016 14 7.21544 13.0951 7.43986 12.1526L8.39225 8.15257Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M3.39229 15.1526C3.55317 14.4769 4.15691 14 4.8515 14H9.14859C9.84318 14 10.4469 14.4769 10.6078 15.1526L11.5602 19.1526C11.7846 20.0951 11.0699 21 10.101 21H3.89912C2.93021 21 2.21549 20.0951 2.43991 19.1526L3.39229 15.1526Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M13.3923 15.1526C13.5532 14.4769 14.1569 14 14.8515 14H19.1486C19.8432 14 20.4469 14.4769 20.6078 15.1526L21.5602 19.1526C21.7846 20.0951 21.0699 21 20.101 21H13.8991C12.9302 21 12.2155 20.0951 12.4399 19.1526L13.3923 15.1526Z"
                                            fill="black" />
                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V4C12.75 4.41421 12.4142 4.75 12 4.75C11.5858 4.75 11.25 4.41421 11.25 4V3C11.25 2.58579 11.5858 2.25 12 2.25Z"
                                            fill="black" />
                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.5303 3.46967C18.8232 3.76256 18.8232 4.23744 18.5303 4.53033L17.5303 5.53033C17.2374 5.82322 16.7626 5.82322 16.4697 5.53033C16.1768 5.23744 16.1768 4.76256 16.4697 4.46967L17.4697 3.46967C17.7626 3.17678 18.2374 3.17678 18.5303 3.46967Z"
                                            fill="black" />
                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.46967 3.46967C5.76256 3.17678 6.23744 3.17678 6.53033 3.46967L7.53033 4.46967C7.82322 4.76256 7.82322 5.23744 7.53033 5.53033C7.23744 5.82322 6.76256 5.82322 6.46967 5.53033L5.46967 4.53033C5.17678 4.23744 5.17678 3.76256 5.46967 3.46967Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['deposit_bonus'] }}</h3>
                                <p class="description">{{ __('Deposit Bonus') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M18.1459 4.79337L15.8382 7.10105C14.6835 6.17734 13.2187 5.625 11.625 5.625C7.89708 5.625 4.875 8.64708 4.875 12.375C4.875 16.1029 7.89708 19.125 11.625 19.125C15.3529 19.125 18.375 16.1029 18.375 12.375C18.375 11.3006 18.124 10.2849 17.6774 9.38322L20.0597 7.00094C21.0507 8.55306 21.625 10.397 21.625 12.375C21.625 17.8978 17.1478 22.375 11.625 22.375C6.10215 22.375 1.625 17.8978 1.625 12.375C1.625 6.85215 6.10215 2.375 11.625 2.375C14.1165 2.375 16.3951 3.28613 18.1459 4.79337Z"
                                            fill="black" />
                                        <path
                                            d="M14.7691 8.17019C13.8927 7.51379 12.8042 7.125 11.625 7.125C8.7255 7.125 6.375 9.4755 6.375 12.375C6.375 15.2745 8.7255 17.625 11.625 17.625C14.5245 17.625 16.875 15.2745 16.875 12.375C16.875 11.7227 16.756 11.0982 16.5386 10.522L14.3554 12.7053C14.1922 14.0683 13.032 15.125 11.625 15.125C10.1062 15.125 8.875 13.8938 8.875 12.375C8.875 10.8562 10.1062 9.625 11.625 9.625C12.1118 9.625 12.5692 9.75151 12.9658 9.97346L14.7691 8.17019Z"
                                            fill="black" />
                                        <path
                                            d="M22.1553 2.90533L12.8626 12.1981C12.8708 12.2559 12.875 12.3149 12.875 12.375C12.875 13.0654 12.3154 13.625 11.625 13.625C10.9346 13.625 10.375 13.0654 10.375 12.375C10.375 11.6846 10.9346 11.125 11.625 11.125C11.6851 11.125 11.7441 11.1292 11.8019 11.1374L21.0947 1.84467C21.3876 1.55178 21.8624 1.55178 22.1553 1.84467C22.4482 2.13756 22.4482 2.61244 22.1553 2.90533Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['investment_bonus'] }}
                                </h3>
                                <p class="description">{{ __('Investment Bonus') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.8694 13.75C9.79795 13.753 8.7328 14.0456 7.30683 14.6844C6.92882 14.8538 6.4851 14.6847 6.31574 14.3066C6.14638 13.9286 6.31553 13.4849 6.69354 13.3156C8.21341 12.6346 9.49813 12.2538 10.8652 12.25C12.2263 12.2463 13.5951 12.6166 15.2836 13.3056C15.6671 13.4621 15.8511 13.8999 15.6946 14.2834C15.5381 14.6669 15.1003 14.8509 14.7168 14.6944C13.105 14.0366 11.9468 13.747 10.8694 13.75Z"
                                            fill="black" />
                                        <circle cx="3" cy="3" r="3" transform="matrix(1 0 0 -1 8 11)" fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18.75 16C18.75 15.5858 18.4142 15.25 18 15.25C17.5858 15.25 17.25 15.5858 17.25 16V17.25H16C15.5858 17.25 15.25 17.5858 15.25 18C15.25 18.4142 15.5858 18.75 16 18.75H17.25V20C17.25 20.4142 17.5858 20.75 18 20.75C18.4142 20.75 18.75 20.4142 18.75 20V18.75H20C20.4142 18.75 20.75 18.4142 20.75 18C20.75 17.5858 20.4142 17.25 20 17.25H18.75V16Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $dataCount['total_referral'] }}</h3>
                                <p class="description">{{ __('Total Referral') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 16.1074V20.523C7 21.2304 7.71453 21.7142 8.37139 21.4514L11.6286 20.1486C11.867 20.0532 12.133 20.0532 12.3714 20.1486L15.6286 21.4514C16.2855 21.7142 17 21.2304 17 20.523V16.1074C16.7817 16.204 16.5443 16.2657 16.2949 16.2856L15.358 16.3604C14.9028 16.3967 14.4706 16.5757 14.123 16.872L13.4077 17.4815C12.5965 18.1728 11.4035 18.1728 10.5923 17.4815L9.87701 16.872C9.52941 16.5757 9.09722 16.3967 8.64196 16.3604L7.70513 16.2856C7.4557 16.2657 7.21832 16.204 7 16.1074Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M10.5923 2.51845C11.4035 1.82718 12.5965 1.82718 13.4077 2.51845L14.123 3.12803C14.4706 3.42425 14.9028 3.60327 15.358 3.6396L16.2949 3.71436C17.3572 3.79914 18.2009 4.64275 18.2856 5.70513L18.3604 6.64196C18.3967 7.09722 18.5757 7.52941 18.872 7.87701L19.4815 8.59231C20.1728 9.40347 20.1728 10.5965 19.4815 11.4077L18.872 12.123C18.5757 12.4706 18.3967 12.9028 18.3604 13.358L18.2856 14.2949C18.2009 15.3572 17.3572 16.2009 16.2949 16.2856L15.358 16.3604C14.9028 16.3967 14.4706 16.5757 14.123 16.872L13.4077 17.4815C12.5965 18.1728 11.4035 18.1728 10.5923 17.4815L9.87701 16.872C9.52941 16.5757 9.09722 16.3967 8.64196 16.3604L7.70513 16.2856C6.64275 16.2009 5.79914 15.3572 5.71436 14.2949L5.6396 13.358C5.60327 12.9028 5.42425 12.4706 5.12803 12.123L4.51845 11.4077C3.82718 10.5965 3.82718 9.40347 4.51845 8.59231L5.12803 7.87701C5.42425 7.52941 5.60327 7.09722 5.6396 6.64196L5.71436 5.70513C5.79914 4.64275 6.64275 3.79914 7.70513 3.71436L8.64196 3.6396C9.09722 3.60327 9.52941 3.42425 9.87701 3.12803L10.5923 2.51845Z"
                                            fill="black" />
                                    </svg>

                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $dataCount['rank_achieved'] }}</h3>
                                <p class="description">{{ __('Rank Achieved') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.7188 16.5889L13.6905 21.2421C14.1205 21.9154 15.0042 22.1311 15.696 21.7316C16.4363 21.3042 16.6675 20.3438 16.2029 19.6263L13.7755 15.8779L10.7188 16.5889Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M12.5134 3.98368C13.4294 2.99791 15.0378 3.17971 15.7106 4.34505L20.0027 11.7792C20.6755 12.9445 20.0287 14.4283 18.7171 14.7287L7.79977 17.268L4.79977 12.0718L12.5134 3.98368Z"
                                            fill="black" />
                                        <path
                                            d="M7.84766 16.7273L5.34766 12.3972C4.93344 11.6797 4.01606 11.4339 3.29862 11.8481C2.58118 12.2624 2.33537 13.1797 2.74958 13.8972L5.24958 18.2273C5.66379 18.9447 6.58118 19.1906 7.29862 18.7763C8.01606 18.3621 8.26187 17.4447 7.84766 16.7273Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.0143 2.73953C20.4144 2.84673 20.6519 3.25799 20.5447 3.65809L20.1787 5.02411C20.0714 5.42421 19.6602 5.66165 19.2601 5.55444C18.86 5.44724 18.6226 5.03598 18.7298 4.63588L19.0958 3.26986C19.203 2.86976 19.6142 2.63232 20.0143 2.73953Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.7298 8.09994C20.837 7.69984 21.2482 7.4624 21.6483 7.56961L23.0143 7.93563C23.4144 8.04284 23.6519 8.45409 23.5447 8.85419C23.4375 9.25429 23.0262 9.49173 22.6261 9.38452L21.2601 9.01849C20.86 8.91129 20.6226 8.50004 20.7298 8.09994Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $dataCount['total_ticket'] }}</h3>
                                <p class="description">{{ __('Total Ticket') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <!-- rock all navigation start -->
                <div class="rock-all-navigation-mobile">
                    <h6 class="rock-mobile-title">{{ __('All Navigations') }}</h6>
                    <div class="all-navigation-inner">
                        <div class="all-navigation-grid">
                            <div class="single-navigation-item">
                                <a href="{{ route('user.schema') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M11.1718 21.6242L3.00221 17.9107C2.22062 17.5554 2.22062 16.4453 3.00221 16.09L11.1718 12.3765C11.6976 12.1375 12.3012 12.1375 12.827 12.3765L20.9966 16.09C21.7782 16.4453 21.7782 17.5554 20.9966 17.9107L12.827 21.6242C12.3012 21.8632 11.6976 21.8632 11.1718 21.6242Z"
                                                fill="white" />
                                            <path
                                                d="M11.1718 16.6242L3.00221 12.9107C2.22062 12.5554 2.22062 11.4453 3.00221 11.09L11.1718 7.37653C11.6976 7.13751 12.3012 7.13751 12.827 7.37653L20.9966 11.09C21.7782 11.4453 21.7782 12.5554 20.9966 12.9107L12.827 16.6242C12.3012 16.8632 11.6976 16.8632 11.1718 16.6242Z"
                                                fill="white" />
                                            <path opacity="0.4"
                                                d="M11.1718 11.6242L3.00221 7.91071C2.22062 7.55544 2.22062 6.44525 3.00221 6.08998L11.1718 2.37653C11.6976 2.13751 12.3012 2.13751 12.827 2.37653L20.9966 6.08998C21.7782 6.44525 21.7782 7.55544 20.9966 7.91072L12.827 11.6242C12.3012 11.8632 11.6976 11.8632 11.1718 11.6242Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Schemas') }}</span>
                                </a>
                            </div>
                            <div class="single-navigation-item">
                                <a href="{{ route('user.invest-logs') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M4 8H2V17L6.31083 19.1554C7.42168 19.7108 8.64658 20 9.88854 20H18C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16H16.4164C15.4849 16 14.5663 15.7831 13.7331 15.3666L10.792 13.896C10.9843 13.7189 11.1432 13.4993 11.2528 13.2434C11.6664 12.2784 11.2241 11.1605 10.2622 10.7397L4 8Z"
                                                fill="white" />
                                            <circle cx="18" cy="8" r="4" fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Invest Logs') }}</span>
                                </a>
                            </div>
                            <div class="single-navigation-item">
                                <a href="{{ route('user.transactions') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M2 4C2 2.89543 2.89543 2 4 2H12C13.1046 2 14 2.89543 14 4V8C14 9.10457 13.1046 10 12 10H4C2.89543 10 2 9.10457 2 8V4Z"
                                                fill="white" />
                                            <path opacity="0.4"
                                                d="M10 16C10 14.8954 10.8954 14 12 14H20C21.1046 14 22 14.8954 22 16V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V16Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.6036 6.75L19.8839 7.46967C19.591 7.76256 19.591 8.23744 19.8839 8.53033C20.1768 8.82322 20.6517 8.82322 20.9445 8.53033L22.2374 7.23744C22.9209 6.55402 22.9209 5.44598 22.2374 4.76256L20.9445 3.46967C20.6517 3.17678 20.1768 3.17678 19.8839 3.46967C19.591 3.76256 19.591 4.23744 19.8839 4.53033L20.6036 5.25L16 5.25C15.5858 5.25 15.25 5.58579 15.25 6C15.25 6.41421 15.5858 6.75 16 6.75L20.6036 6.75Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.39645 18.75L4.11612 19.4697C4.40901 19.7626 4.40901 20.2374 4.11612 20.5303C3.82322 20.8232 3.34835 20.8232 3.05546 20.5303L1.76256 19.2374C1.07915 18.554 1.07914 17.446 1.76256 16.7626L3.05546 15.4697C3.34835 15.1768 3.82322 15.1768 4.11612 15.4697C4.40901 15.7626 4.40901 16.2374 4.11612 16.5303L3.39645 17.25L8 17.25C8.41421 17.25 8.75 17.5858 8.75 18C8.75 18.4142 8.41421 18.75 8 18.75L3.39645 18.75Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Transactions') }}</span>
                                </a>
                            </div>
                            <div class="single-navigation-item">
                                <a href="{{ route('user.deposit.amount') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5.75C12.4142 5.75 12.75 6.08579 12.75 6.5V7.35352C13.9043 7.67998 14.75 8.74122 14.75 10C14.75 10.4142 14.4142 10.75 14 10.75C13.5858 10.75 13.25 10.4142 13.25 10C13.25 9.30964 12.6904 8.75 12 8.75C11.3096 8.75 10.75 9.30964 10.75 10C10.75 10.6904 11.3096 11.25 12 11.25C13.5188 11.25 14.75 12.4812 14.75 14C14.75 15.2588 13.9043 16.32 12.75 16.6465V17.5C12.75 17.9142 12.4142 18.25 12 18.25C11.5858 18.25 11.25 17.9142 11.25 17.5V16.6465C10.0957 16.32 9.25 15.2588 9.25 14C9.25 13.5858 9.58579 13.25 10 13.25C10.4142 13.25 10.75 13.5858 10.75 14C10.75 14.6904 11.3096 15.25 12 15.25C12.6904 15.25 13.25 14.6904 13.25 14C13.25 13.3096 12.6904 12.75 12 12.75C10.4812 12.75 9.25 11.5188 9.25 10C9.25 8.74122 10.0957 7.67998 11.25 7.35352V6.5C11.25 6.08579 11.5858 5.75 12 5.75Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Deposit') }}</span>
                                </a>
                            </div>
                            <div class="single-navigation-item">
                                <a href="{{ route('user.deposit.log') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M20 13C20 17.9706 15.9706 22 11 22C6.02944 22 2 17.9706 2 13C2 8.02944 6.02944 4 11 4C15.9706 4 20 8.02944 20 13Z"
                                                fill="white" />
                                            <path
                                                d="M21.8025 10.0128C21.0104 6.08419 17.9158 2.98956 13.9872 2.19745C12.9045 1.97914 12 2.89543 12 4V10C12 11.1046 12.8954 12 14 12H20C21.1046 12 22.0209 11.0955 21.8025 10.0128Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Deposit Log') }}</span>
                                </a>
                            </div>
                            <div class="single-navigation-item">
                                <a href="{{ route('user.wallet-exchange') }}">
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 5.75C12.4142 5.75 12.75 6.08579 12.75 6.5V7.35352C13.9043 7.67998 14.75 8.74122 14.75 10C14.75 10.4142 14.4142 10.75 14 10.75C13.5858 10.75 13.25 10.4142 13.25 10C13.25 9.30964 12.6904 8.75 12 8.75C11.3096 8.75 10.75 9.30964 10.75 10C10.75 10.6904 11.3096 11.25 12 11.25C13.5188 11.25 14.75 12.4812 14.75 14C14.75 15.2588 13.9043 16.32 12.75 16.6465V17.5C12.75 17.9142 12.4142 18.25 12 18.25C11.5858 18.25 11.25 17.9142 11.25 17.5V16.6465C10.0957 16.32 9.25 15.2588 9.25 14C9.25 13.5858 9.58579 13.25 10 13.25C10.4142 13.25 10.75 13.5858 10.75 14C10.75 14.6904 11.3096 15.25 12 15.25C12.6904 15.25 13.25 14.6904 13.25 14C13.25 13.3096 12.6904 12.75 12 12.75C10.4812 12.75 9.25 11.5188 9.25 10C9.25 8.74122 10.0957 7.67998 11.25 7.35352V6.5C11.25 6.08579 11.5858 5.75 12 5.75Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.88648 8.71859C5.18395 5.51328 8.32685 3.25 12.0002 3.25C16.351 3.25 19.9602 6.42553 20.6364 10.5853L21.5502 9.9C21.8815 9.65147 22.3516 9.71863 22.6002 10.05C22.8487 10.3814 22.7815 10.8515 22.4502 11.1L21.439 11.8584C20.6057 12.4833 19.4908 12.5839 18.5592 12.118L17.6648 11.6708C17.2943 11.4856 17.1441 11.0351 17.3293 10.6646C17.5146 10.2941 17.9651 10.1439 18.3356 10.3292L19.1395 10.7311C18.5395 7.33207 15.5714 4.75 12.0002 4.75C8.95872 4.75 6.35296 6.62306 5.27689 9.28141C5.12147 9.66536 4.68422 9.85062 4.30027 9.6952C3.91632 9.53978 3.73106 9.10254 3.88648 8.71859ZM3.32897 13.1794C3.29555 13.1926 3.26253 13.2073 3.23 13.2236L2.33557 13.6708C1.96509 13.8561 1.51459 13.7059 1.32934 13.3354C1.1441 12.9649 1.29427 12.5144 1.66475 12.3292L2.55918 11.882C3.49084 11.4161 4.60572 11.5167 5.43902 12.1416L6.45016 12.9C6.78154 13.1485 6.84869 13.6186 6.60016 13.95C6.35164 14.2814 5.88154 14.3485 5.55016 14.1L4.93635 13.6396C5.67946 16.8539 8.56 19.25 12.0002 19.25C15.0416 19.25 17.6474 17.3769 18.7234 14.7186C18.8789 14.3346 19.3161 14.1494 19.7001 14.3048C20.084 14.4602 20.2693 14.8975 20.1139 15.2814C18.8164 18.4867 15.6735 20.75 12.0002 20.75C7.56763 20.75 3.90489 17.4541 3.32897 13.1794Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <span class="title">{{ __('Wallet Exch.') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="moretext">
                            <div class="all-navigation-grid">
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.send-money.view') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Transfer') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.send-money.log') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 12H8C10.2091 12 12 13.7909 12 16V18C12 20.2091 10.2091 22 8 22H6C3.79086 22 2 20.2091 2 18V16C2 13.7909 3.79086 12 6 12Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M10 2H18C20.2091 2 22 3.79086 22 6V14C22 16.2091 20.2091 18 18 18H10C7.79086 18 6 16.2091 6 14V6C6 3.79086 7.79086 2 10 2Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.25 7C11.25 6.58579 11.5858 6.25 12 6.25H17C17.4142 6.25 17.75 6.58579 17.75 7V12C17.75 12.4142 17.4142 12.75 17 12.75C16.5858 12.75 16.25 12.4142 16.25 12V8.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L15.1893 7.75H12C11.5858 7.75 11.25 7.41421 11.25 7Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Transfer Log') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.withdraw.view') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M4 12C4 10.8954 4.89543 10 6 10H15C16.1046 10 17 10.8954 17 12C17 13.1046 16.1046 14 15 14H6C4.89543 14 4 13.1046 4 12Z"
                                                    fill="white" />
                                                <path
                                                    d="M15 14H6.16667C4.97005 14 4 14.8954 4 16C4 17.1046 4.97005 18 6.16667 18H15C16.1046 18 17 17.1046 17 16C17 14.8954 16.1046 14 15 14Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M20 18C20 15.7909 18.2091 14 16 14C15.8007 14 15.6047 14.0146 15.4132 14.0427C13.4823 14.3266 12 15.9902 12 18C12 20.2091 13.7909 22 16 22C18.2091 22 20 20.2091 20 18Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.25 3.39645L10.5303 4.11612C10.2374 4.40901 9.76256 4.40901 9.46967 4.11612C9.17678 3.82322 9.17678 3.34835 9.46967 3.05546L10.7626 1.76256C11.446 1.07915 12.554 1.07914 13.2374 1.76256L14.5303 3.05546C14.8232 3.34835 14.8232 3.82322 14.5303 4.11612C14.2374 4.40901 13.7626 4.40901 13.4697 4.11612L12.75 3.39645L12.75 7C12.75 7.41421 12.4142 7.75 12 7.75C11.5858 7.75 11.25 7.41421 11.25 7L11.25 3.39645Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Withdraw') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.withdraw.log') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M18 4C19.1046 4 20 4.89543 20 6C20 7.10457 19.1046 8 18 8L10 8C8.89543 8 8 7.10457 8 6C8 4.89543 8.89543 4 10 4L18 4Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M18 12C19.1046 12 20 12.8954 20 14C20 15.1046 19.1046 16 18 16L10 16C8.89543 16 8 15.1046 8 14C8 12.8954 8.89543 12 10 12L18 12Z"
                                                    fill="white" />
                                                <rect x="16" y="8" width="4" height="12" rx="2"
                                                    transform="rotate(90 16 8)" fill="white" />
                                                <rect x="17" y="16" width="4" height="12" rx="2"
                                                    transform="rotate(90 17 16)" fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Withdraw Log') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.ranking-badge') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17 10.101V4C17 2.89543 16.1046 2 15 2H9C7.89543 2 7 2.89543 7 4V10.101C8.27052 8.80447 10.0413 8 12 8C13.9587 8 15.7295 8.80447 17 10.101Z"
                                                    fill="white" />
                                                <circle opacity="0.4" cx="12" cy="15" r="7" fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M22.5303 9.46967C22.8232 9.76256 22.8232 10.2374 22.5303 10.5303L21.5303 11.5303C21.2374 11.8232 20.7626 11.8232 20.4697 11.5303C20.1768 11.2374 20.1768 10.7626 20.4697 10.4697L21.4697 9.46967C21.7626 9.17678 22.2374 9.17678 22.5303 9.46967Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20.4697 18.4697C20.7626 18.1768 21.2374 18.1768 21.5303 18.4697L22.5303 19.4697C22.8232 19.7626 22.8232 20.2374 22.5303 20.5303C22.2374 20.8232 21.7626 20.8232 21.4697 20.5303L20.4697 19.5303C20.1768 19.2374 20.1768 18.7626 20.4697 18.4697Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.46967 9.46967C1.17678 9.76256 1.17678 10.2374 1.46967 10.5303L2.46967 11.5303C2.76256 11.8232 3.23744 11.8232 3.53033 11.5303C3.82322 11.2374 3.82322 10.7626 3.53033 10.4697L2.53033 9.46967C2.23744 9.17678 1.76256 9.17678 1.46967 9.46967Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.53033 18.4697C3.23744 18.1768 2.76256 18.1768 2.46967 18.4697L1.46967 19.4697C1.17678 19.7626 1.17678 20.2374 1.46967 20.5303C1.76256 20.8232 2.23744 20.8232 2.53033 20.5303L3.53033 19.5303C3.82322 19.2374 3.82322 18.7626 3.53033 18.4697Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12.3945 11.362C12.6156 11.4987 12.7502 11.7401 12.7502 12V17.25H13.0002C13.4144 17.25 13.7502 17.5858 13.7502 18C13.7502 18.4142 13.4144 18.75 13.0002 18.75H11.0002C10.586 18.75 10.2502 18.4142 10.2502 18C10.2502 17.5858 10.586 17.25 11.0002 17.25H11.2502V13.2072C10.8984 13.3321 10.5006 13.1778 10.3293 12.8354C10.1441 12.4649 10.2943 12.0144 10.6648 11.8292L11.6648 11.3292C11.8972 11.2129 12.1734 11.2254 12.3945 11.362Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Ranking') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.referral') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.8694 13.75C9.79795 13.753 8.7328 14.0456 7.30683 14.6844C6.92882 14.8538 6.4851 14.6847 6.31574 14.3066C6.14638 13.9286 6.31553 13.4849 6.69354 13.3156C8.21341 12.6346 9.49813 12.2538 10.8652 12.25C12.2263 12.2463 13.5951 12.6166 15.2836 13.3056C15.6671 13.4621 15.8511 13.8999 15.6946 14.2834C15.5381 14.6669 15.1003 14.8509 14.7168 14.6944C13.105 14.0366 11.9468 13.747 10.8694 13.75Z"
                                                    fill="white" />
                                                <circle cx="3" cy="3" r="3" transform="matrix(1 0 0 -1 8 11)"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.75 16C18.75 15.5858 18.4142 15.25 18 15.25C17.5858 15.25 17.25 15.5858 17.25 16V17.25H16C15.5858 17.25 15.25 17.5858 15.25 18C15.25 18.4142 15.5858 18.75 16 18.75H17.25V20C17.25 20.4142 17.5858 20.75 18 20.75C18.4142 20.75 18.75 20.4142 18.75 20V18.75H20C20.4142 18.75 20.75 18.4142 20.75 18C20.75 17.5858 20.4142 17.25 20 17.25H18.75V16Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Referral') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.setting.show') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M12.9545 3H11.0455C9.99109 3 9.13635 3.80589 9.13635 4.8C9.13635 5.93761 7.91917 6.66087 6.92 6.11697L6.81852 6.06172C5.90541 5.56467 4.73782 5.85964 4.21064 6.72057L3.25609 8.27942C2.72891 9.14034 3.04176 10.2412 3.95487 10.7383C4.95451 11.2824 4.95451 12.7176 3.95487 13.2617C3.04176 13.7588 2.72891 14.8597 3.25609 15.7206L4.21064 17.2794C4.73782 18.1404 5.90541 18.4353 6.81851 17.9383L6.92 17.883C7.91917 17.3391 9.13635 18.0624 9.13635 19.2C9.13635 20.1941 9.99109 21 11.0455 21H12.9545C14.0089 21 14.8636 20.1941 14.8636 19.2C14.8636 18.0624 16.0808 17.3391 17.08 17.883L17.1815 17.9383C18.0946 18.4353 19.2622 18.1403 19.7894 17.2794L20.7439 15.7206C21.2711 14.8596 20.9582 13.7588 20.0451 13.2617C19.0455 12.7176 19.0455 11.2824 20.0451 10.7383C20.9582 10.2412 21.2711 9.14036 20.7439 8.27943L19.7894 6.72058C19.2622 5.85966 18.0946 5.56468 17.1815 6.06174L17.08 6.11698C16.0808 6.66088 14.8636 5.93762 14.8636 4.8C14.8636 3.80589 14.0089 3 12.9545 3Z"
                                                    fill="white" />
                                                <circle cx="12" cy="12" r="3" fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Settings') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.ticket.index') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.7188 16.5889L13.6905 21.2421C14.1205 21.9154 15.0042 22.1311 15.696 21.7316C16.4363 21.3042 16.6675 20.3438 16.2029 19.6263L13.7755 15.8779L10.7188 16.5889Z"
                                                    fill="white" />
                                                <path opacity="0.4"
                                                    d="M12.5125 3.98416C13.4284 2.9984 15.0369 3.1802 15.7097 4.34554L20.0017 11.7796C20.6746 12.945 20.0278 14.4288 18.7161 14.7292L7.79879 17.2685L4.79879 12.0723L12.5125 3.98416Z"
                                                    fill="white" />
                                                <path
                                                    d="M7.84766 16.7268L5.34766 12.3967C4.93344 11.6793 4.01606 11.4334 3.29862 11.8477C2.58118 12.2619 2.33537 13.1793 2.74958 13.8967L5.24958 18.2268C5.66379 18.9443 6.58118 19.1901 7.29862 18.7759C8.01606 18.3616 8.26187 17.4443 7.84766 16.7268Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20.0143 2.73953C20.4144 2.84673 20.6519 3.25799 20.5447 3.65809L20.1787 5.02411C20.0714 5.42421 19.6602 5.66165 19.2601 5.55444C18.86 5.44724 18.6226 5.03598 18.7298 4.63588L19.0958 3.26986C19.203 2.86976 19.6142 2.63232 20.0143 2.73953Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M20.7298 8.09994C20.837 7.69984 21.2482 7.4624 21.6483 7.56961L23.0143 7.93563C23.4144 8.04284 23.6519 8.45409 23.5447 8.85419C23.4375 9.25429 23.0262 9.49173 22.6261 9.38452L21.2601 9.01849C20.86 8.91129 20.6226 8.50004 20.7298 8.09994Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Support') }}</span>
                                    </a>
                                </div>
                                <div class="single-navigation-item">
                                    <a href="{{ route('user.notification.all') }}">
                                        <span class="icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 21C13.385 21 14.5633 20.1652 15 19H9C9.43668 20.1652 10.615 21 12 21Z"
                                                    fill="white" />
                                                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.6896 3.75403C13.274 3.29116 12.671 3 12 3C10.7463 3 9.73005 4.01629 9.73005 5.26995V5.37366C7.58766 6.10719 6.0016 7.85063 5.76046 9.97519L5.31328 13.9153C5.23274 14.6249 4.93344 15.3016 4.44779 15.8721C3.35076 17.1609 4.39443 19 6.22281 19H17.7772C19.6056 19 20.6492 17.1609 19.5522 15.8721C19.0666 15.3016 18.7673 14.6249 18.6867 13.9153L18.2395 9.97519C18.2333 9.92024 18.2262 9.86556 18.2181 9.81113C17.8341 9.93379 17.4248 10 17 10C14.7909 10 13 8.20914 13 6C13 5.16744 13.2544 4.3943 13.6896 3.75403Z"
                                                    fill="white" />
                                                <circle cx="17" cy="6" r="3" fill="white" />
                                            </svg>
                                        </span>
                                        <span class="title">{{ __('Notifications') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-15">
                        <button class="rock-moreless-button site-btn transparent-btn">{{ __('Load more') }}</button>
                    </div>
                </div>
                <!-- rock all navigation start -->
            </div>
        </div>
        <div class="col-xl-12">
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <div class="rock-mobile-common-table mt-30 mb-30">
                    <h6 class="rock-mobile-title mb-15">{{ __('All Statistic') }}</h6>
                    <!-- rock all navigation start -->
                    <div class="rock-single-card-grid">
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M2 4C2 2.89543 2.89543 2 4 2H12C13.1046 2 14 2.89543 14 4V8C14 9.10457 13.1046 10 12 10H4C2.89543 10 2 9.10457 2 8V4Z"
                                            fill="black" />
                                        <path opacity="0.4"
                                            d="M10 16C10 14.8954 10.8954 14 12 14H20C21.1046 14 22 14.8954 22 16V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V16Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.6036 6.75L19.8839 7.46967C19.591 7.76256 19.591 8.23744 19.8839 8.53033C20.1768 8.82322 20.6517 8.82322 20.9445 8.53033L22.2374 7.23744C22.9209 6.55402 22.9209 5.44598 22.2374 4.76256L20.9445 3.46967C20.6517 3.17678 20.1768 3.17678 19.8839 3.46967C19.591 3.76256 19.591 4.23744 19.8839 4.53033L20.6036 5.25L16 5.25C15.5858 5.25 15.25 5.58579 15.25 6C15.25 6.41421 15.5858 6.75 16 6.75L20.6036 6.75Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.39645 18.75L4.11612 19.4697C4.40901 19.7626 4.40901 20.2374 4.11612 20.5303C3.82322 20.8232 3.34835 20.8232 3.05546 20.5303L1.76256 19.2374C1.07915 18.554 1.07914 17.446 1.76256 16.7626L3.05546 15.4697C3.34835 15.1768 3.82322 15.1768 4.11612 15.4697C4.40901 15.7626 4.40901 16.2374 4.11612 16.5303L3.39645 17.25L8 17.25C8.41421 17.25 8.75 17.5858 8.75 18C8.75 18.4142 8.41421 18.75 8 18.75L3.39645 18.75Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $dataCount['total_transaction'] }}</h3>
                                <p class="description">{{ __('All Transactions') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M4 8H2V17L6.31083 19.1554C7.42168 19.7108 8.64658 20 9.88854 20H18C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16H16.4164C15.4849 16 14.5663 15.7831 13.7331 15.3666L10.792 13.896C10.9843 13.7189 11.1432 13.4993 11.2528 13.2434C11.6664 12.2784 11.2241 11.1605 10.2622 10.7397L4 8Z"
                                            fill="black" />
                                        <circle cx="18" cy="8" r="4" fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_deposit'] }}</h3>
                                <p class="description">{{ __('Total Deposit') }}</p>
                            </div>
                        </div>
                        <div class="rock-single-card">
                            <div class="icon">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            fill="black" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 5.75C12.4142 5.75 12.75 6.08579 12.75 6.5V7.35352C13.9043 7.67998 14.75 8.74122 14.75 10C14.75 10.4142 14.4142 10.75 14 10.75C13.5858 10.75 13.25 10.4142 13.25 10C13.25 9.30964 12.6904 8.75 12 8.75C11.3096 8.75 10.75 9.30964 10.75 10C10.75 10.6904 11.3096 11.25 12 11.25C13.5188 11.25 14.75 12.4812 14.75 14C14.75 15.2588 13.9043 16.32 12.75 16.6465V17.5C12.75 17.9142 12.4142 18.25 12 18.25C11.5858 18.25 11.25 17.9142 11.25 17.5V16.6465C10.0957 16.32 9.25 15.2588 9.25 14C9.25 13.5858 9.58579 13.25 10 13.25C10.4142 13.25 10.75 13.5858 10.75 14C10.75 14.6904 11.3096 15.25 12 15.25C12.6904 15.25 13.25 14.6904 13.25 14C13.25 13.3096 12.6904 12.75 12 12.75C10.4812 12.75 9.25 11.5188 9.25 10C9.25 8.74122 10.0957 7.67998 11.25 7.35352V6.5C11.25 6.08579 11.5858 5.75 12 5.75Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_investment'] }}
                                </h3>
                                <p class="description">{{ __('Total Investment') }}</p>
                            </div>
                        </div>
                        <div class="moretext-2 rock-single-card-grid">
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M5.68355 10.2103C6.46632 7.7055 8.78612 6 11.4104 6H12.5881C15.2125 6 17.5323 7.7055 18.315 10.2104L19.565 14.2104C20.7724 18.0739 17.886 22 13.8381 22H10.1604C6.11259 22 3.22618 18.0739 4.43355 14.2104L5.68355 10.2103Z"
                                                fill="black" />
                                            <path
                                                d="M12 20C12 18.8954 12.8954 18 14 18H20C21.1046 18 22 18.8954 22 20C22 21.1046 21.1046 22 20 22H14C12.8954 22 12 21.1046 12 20Z"
                                                fill="black" />
                                            <path
                                                d="M12 16C12 14.8954 12.8954 14 14 14H19.3333H20C21.1046 14 22 14.8954 22 16C22 17.1046 21.1046 18 20 18H14C12.8954 18 12 17.1046 12 16Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_profit'] }}</h3>
                                    <p class="description">{{ __('Total Profit') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_transfer'] }}</h3>
                                    <p class="description">{{ __('Total Transfer') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M4 12C4 10.8954 4.89543 10 6 10H15C16.1046 10 17 10.8954 17 12C17 13.1046 16.1046 14 15 14H6C4.89543 14 4 13.1046 4 12Z"
                                                fill="black" />
                                            <path
                                                d="M15 14H6.16667C4.97005 14 4 14.8954 4 16C4 17.1046 4.97005 18 6.16667 18H15C16.1046 18 17 17.1046 17 16C17 14.8954 16.1046 14 15 14Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M20 18C20 15.7909 18.2091 14 16 14C15.8007 14 15.6047 14.0146 15.4132 14.0427C13.4823 14.3266 12 15.9902 12 18C12 20.2091 13.7909 22 16 22C18.2091 22 20 20.2091 20 18Z"
                                                fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.25 3.39645L10.5303 4.11612C10.2374 4.40901 9.76256 4.40901 9.46967 4.11612C9.17678 3.82322 9.17678 3.34835 9.46967 3.05546L10.7626 1.76256C11.446 1.07915 12.554 1.07914 13.2374 1.76256L14.5303 3.05546C14.8232 3.34835 14.8232 3.82322 14.5303 4.11612C14.2374 4.40901 13.7626 4.40901 13.4697 4.11612L12.75 3.39645L12.75 7C12.75 7.41421 12.4142 7.75 12 7.75C11.5858 7.75 11.25 7.41421 11.25 7L11.25 3.39645Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['total_withdraw'] }}</h3>
                                    <p class="description">{{ __('Total Withdraw') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M9.41266 4.68911C10.2496 3.85219 11.4055 3.41786 12.5771 3.50011L16.5414 3.77844C18.5209 3.91741 20.0839 5.48041 20.2228 7.45987L20.5011 11.4242C20.5834 12.5958 20.1491 13.7517 19.3122 14.5886L12.7468 21.154C11.1635 22.7373 8.61357 22.7545 7.05148 21.1924L2.80884 16.9498C1.24674 15.3877 1.26396 12.8378 2.8473 11.2545L9.41266 4.68911Z"
                                                fill="black" />
                                            <circle cx="14.8281" cy="9.17218" r="2" transform="rotate(45 14.8281 9.17218)"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">
                                        <span>{{ $currencySymbol }}</span>{{ $dataCount['total_referral_profit'] }}</h3>
                                    <p class="description">{{ __('Referral Bonus') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.39225 8.15257C8.55313 7.47687 9.15686 7 9.85145 7H14.1485C14.8431 7 15.4469 7.47687 15.6078 8.15257L16.5601 12.1526C16.7846 13.0951 16.0698 14 15.1009 14H8.89907C7.93016 14 7.21544 13.0951 7.43986 12.1526L8.39225 8.15257Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M3.39229 15.1526C3.55317 14.4769 4.15691 14 4.8515 14H9.14859C9.84318 14 10.4469 14.4769 10.6078 15.1526L11.5602 19.1526C11.7846 20.0951 11.0699 21 10.101 21H3.89912C2.93021 21 2.21549 20.0951 2.43991 19.1526L3.39229 15.1526Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M13.3923 15.1526C13.5532 14.4769 14.1569 14 14.8515 14H19.1486C19.8432 14 20.4469 14.4769 20.6078 15.1526L21.5602 19.1526C21.7846 20.0951 21.0699 21 20.101 21H13.8991C12.9302 21 12.2155 20.0951 12.4399 19.1526L13.3923 15.1526Z"
                                                fill="black" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 2.25C12.4142 2.25 12.75 2.58579 12.75 3V4C12.75 4.41421 12.4142 4.75 12 4.75C11.5858 4.75 11.25 4.41421 11.25 4V3C11.25 2.58579 11.5858 2.25 12 2.25Z"
                                                fill="black" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.5303 3.46967C18.8232 3.76256 18.8232 4.23744 18.5303 4.53033L17.5303 5.53033C17.2374 5.82322 16.7626 5.82322 16.4697 5.53033C16.1768 5.23744 16.1768 4.76256 16.4697 4.46967L17.4697 3.46967C17.7626 3.17678 18.2374 3.17678 18.5303 3.46967Z"
                                                fill="black" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.46967 3.46967C5.76256 3.17678 6.23744 3.17678 6.53033 3.46967L7.53033 4.46967C7.82322 4.76256 7.82322 5.23744 7.53033 5.53033C7.23744 5.82322 6.76256 5.82322 6.46967 5.53033L5.46967 4.53033C5.17678 4.23744 5.17678 3.76256 5.46967 3.46967Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['deposit_bonus'] }}</h3>
                                    <p class="description">{{ __('Deposit Bonus') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M18.1459 4.79337L15.8382 7.10105C14.6835 6.17734 13.2187 5.625 11.625 5.625C7.89708 5.625 4.875 8.64708 4.875 12.375C4.875 16.1029 7.89708 19.125 11.625 19.125C15.3529 19.125 18.375 16.1029 18.375 12.375C18.375 11.3006 18.124 10.2849 17.6774 9.38322L20.0597 7.00094C21.0507 8.55306 21.625 10.397 21.625 12.375C21.625 17.8978 17.1478 22.375 11.625 22.375C6.10215 22.375 1.625 17.8978 1.625 12.375C1.625 6.85215 6.10215 2.375 11.625 2.375C14.1165 2.375 16.3951 3.28613 18.1459 4.79337Z"
                                                fill="black" />
                                            <path
                                                d="M14.7691 8.17019C13.8927 7.51379 12.8042 7.125 11.625 7.125C8.7255 7.125 6.375 9.4755 6.375 12.375C6.375 15.2745 8.7255 17.625 11.625 17.625C14.5245 17.625 16.875 15.2745 16.875 12.375C16.875 11.7227 16.756 11.0982 16.5386 10.522L14.3554 12.7053C14.1922 14.0683 13.032 15.125 11.625 15.125C10.1062 15.125 8.875 13.8938 8.875 12.375C8.875 10.8562 10.1062 9.625 11.625 9.625C12.1118 9.625 12.5692 9.75151 12.9658 9.97346L14.7691 8.17019Z"
                                                fill="black" />
                                            <path
                                                d="M22.1553 2.90533L12.8626 12.1981C12.8708 12.2559 12.875 12.3149 12.875 12.375C12.875 13.0654 12.3154 13.625 11.625 13.625C10.9346 13.625 10.375 13.0654 10.375 12.375C10.375 11.6846 10.9346 11.125 11.625 11.125C11.6851 11.125 11.7441 11.1292 11.8019 11.1374L21.0947 1.84467C21.3876 1.55178 21.8624 1.55178 22.1553 1.84467C22.4482 2.13756 22.4482 2.61244 22.1553 2.90533Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><span>{{ $currencySymbol }}</span>{{ $dataCount['investment_bonus'] }}
                                    </h3>
                                    <p class="description">{{ __('Investment Bonus') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C15.9706 20 20 15.9706 20 11Z"
                                                fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.8694 13.75C9.79795 13.753 8.7328 14.0456 7.30683 14.6844C6.92882 14.8538 6.4851 14.6847 6.31574 14.3066C6.14638 13.9286 6.31553 13.4849 6.69354 13.3156C8.21341 12.6346 9.49813 12.2538 10.8652 12.25C12.2263 12.2463 13.5951 12.6166 15.2836 13.3056C15.6671 13.4621 15.8511 13.8999 15.6946 14.2834C15.5381 14.6669 15.1003 14.8509 14.7168 14.6944C13.105 14.0366 11.9468 13.747 10.8694 13.75Z"
                                                fill="black" />
                                            <circle cx="3" cy="3" r="3" transform="matrix(1 0 0 -1 8 11)" fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18.75 16C18.75 15.5858 18.4142 15.25 18 15.25C17.5858 15.25 17.25 15.5858 17.25 16V17.25H16C15.5858 17.25 15.25 17.5858 15.25 18C15.25 18.4142 15.5858 18.75 16 18.75H17.25V20C17.25 20.4142 17.5858 20.75 18 20.75C18.4142 20.75 18.75 20.4142 18.75 20V18.75H20C20.4142 18.75 20.75 18.4142 20.75 18C20.75 17.5858 20.4142 17.25 20 17.25H18.75V16Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">{{ $dataCount['total_referral'] }}</h3>
                                    <p class="description">{{ __('Total Referral') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 16.1074V20.523C7 21.2304 7.71453 21.7142 8.37139 21.4514L11.6286 20.1486C11.867 20.0532 12.133 20.0532 12.3714 20.1486L15.6286 21.4514C16.2855 21.7142 17 21.2304 17 20.523V16.1074C16.7817 16.204 16.5443 16.2657 16.2949 16.2856L15.358 16.3604C14.9028 16.3967 14.4706 16.5757 14.123 16.872L13.4077 17.4815C12.5965 18.1728 11.4035 18.1728 10.5923 17.4815L9.87701 16.872C9.52941 16.5757 9.09722 16.3967 8.64196 16.3604L7.70513 16.2856C7.4557 16.2657 7.21832 16.204 7 16.1074Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M10.5923 2.51845C11.4035 1.82718 12.5965 1.82718 13.4077 2.51845L14.123 3.12803C14.4706 3.42425 14.9028 3.60327 15.358 3.6396L16.2949 3.71436C17.3572 3.79914 18.2009 4.64275 18.2856 5.70513L18.3604 6.64196C18.3967 7.09722 18.5757 7.52941 18.872 7.87701L19.4815 8.59231C20.1728 9.40347 20.1728 10.5965 19.4815 11.4077L18.872 12.123C18.5757 12.4706 18.3967 12.9028 18.3604 13.358L18.2856 14.2949C18.2009 15.3572 17.3572 16.2009 16.2949 16.2856L15.358 16.3604C14.9028 16.3967 14.4706 16.5757 14.123 16.872L13.4077 17.4815C12.5965 18.1728 11.4035 18.1728 10.5923 17.4815L9.87701 16.872C9.52941 16.5757 9.09722 16.3967 8.64196 16.3604L7.70513 16.2856C6.64275 16.2009 5.79914 15.3572 5.71436 14.2949L5.6396 13.358C5.60327 12.9028 5.42425 12.4706 5.12803 12.123L4.51845 11.4077C3.82718 10.5965 3.82718 9.40347 4.51845 8.59231L5.12803 7.87701C5.42425 7.52941 5.60327 7.09722 5.6396 6.64196L5.71436 5.70513C5.79914 4.64275 6.64275 3.79914 7.70513 3.71436L8.64196 3.6396C9.09722 3.60327 9.52941 3.42425 9.87701 3.12803L10.5923 2.51845Z"
                                                fill="black" />
                                        </svg>

                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">{{ $dataCount['rank_achieved'] }}</h3>
                                    <p class="description">{{ __('Rank Achieved') }}</p>
                                </div>
                            </div>
                            <div class="rock-single-card">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.7188 16.5889L13.6905 21.2421C14.1205 21.9154 15.0042 22.1311 15.696 21.7316C16.4363 21.3042 16.6675 20.3438 16.2029 19.6263L13.7755 15.8779L10.7188 16.5889Z"
                                                fill="black" />
                                            <path opacity="0.4"
                                                d="M12.5134 3.98368C13.4294 2.99791 15.0378 3.17971 15.7106 4.34505L20.0027 11.7792C20.6755 12.9445 20.0287 14.4283 18.7171 14.7287L7.79977 17.268L4.79977 12.0718L12.5134 3.98368Z"
                                                fill="black" />
                                            <path
                                                d="M7.84766 16.7273L5.34766 12.3972C4.93344 11.6797 4.01606 11.4339 3.29862 11.8481C2.58118 12.2624 2.33537 13.1797 2.74958 13.8972L5.24958 18.2273C5.66379 18.9447 6.58118 19.1906 7.29862 18.7763C8.01606 18.3621 8.26187 17.4447 7.84766 16.7273Z"
                                                fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.0143 2.73953C20.4144 2.84673 20.6519 3.25799 20.5447 3.65809L20.1787 5.02411C20.0714 5.42421 19.6602 5.66165 19.2601 5.55444C18.86 5.44724 18.6226 5.03598 18.7298 4.63588L19.0958 3.26986C19.203 2.86976 19.6142 2.63232 20.0143 2.73953Z"
                                                fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.7298 8.09994C20.837 7.69984 21.2482 7.4624 21.6483 7.56961L23.0143 7.93563C23.4144 8.04284 23.6519 8.45409 23.5447 8.85419C23.4375 9.25429 23.0262 9.49173 22.6261 9.38452L21.2601 9.01849C20.86 8.91129 20.6226 8.50004 20.7298 8.09994Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">{{ $dataCount['total_ticket'] }}</h3>
                                    <p class="description">{{ __('Total Ticket') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="rock-moreless-button-2 site-btn transparent-btn">{{ __('Load more') }}</button>
                        </div>
                    </div>
                    <!-- rock all navigation start -->
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <!-- Show desktop-screen content -->
            <div class="rock-desktop-screen-show">
                <div class="rock-recent-transactions-area">
                    <div class="rock-dashboard-card">
                        <div class="rock-dashboard-title-inner">
                            <h3 class="rock-dashboard-tile">{{ __('Recent Transactions') }}</h3>
                        </div>
                        <div class="rock-recent-transactions-table">
                            <div class="rock-custom-table">
                                <div class="contents">
                                    <div class="site-table-list site-table-head">
                                        <div class="site-table-col">{{ __('Description') }}</div>
                                        <div class="site-table-col">{{ __('Transaction ID') }}</div>
                                        <div class="site-table-col">{{ __('Type') }}</div>
                                        <div class="site-table-col">{{ __('Amount') }}</div>
                                        <div class="site-table-col">{{ __('Charge') }}</div>
                                        <div class="site-table-col">{{ __('Status') }}</div>
                                        <div class="site-table-col">{{ __('Gateway') }}</div>
                                    </div>
                                    @foreach($recentTransactions as $transaction)
                                    <div class="site-table-list">
                                        <div class="site-table-col">
                                            <div class="transactions-description">
                                                <div class="iocn">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M4 8H2V17L6.31083 19.1554C7.42168 19.7108 8.64658 20 9.88854 20H18C19.1046 20 20 19.1046 20 18C20 16.8954 19.1046 16 18 16H16.4164C15.4849 16 14.5663 15.7831 13.7331 15.3666L10.792 13.896C10.9843 13.7189 11.1432 13.4993 11.2528 13.2434C11.6664 12.2784 11.2241 11.1605 10.2622 10.7397L4 8Z"
                                                            fill="#E9D8A6" />
                                                        <circle cx="18" cy="8" r="4" fill="#E9D8A6" />
                                                    </svg>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title pinkDiamond-text">
                                                        {{ $transaction->description }}
                                                    </h4>
                                                    <p class="description">{{ $transaction->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="site-table-col">
                                            <span class="white-text">{{ $transaction->tnx }}</span>
                                        </div>
                                        <div class="site-table-col">
                                            <span
                                                class="kittensEye-text">{{ ucwords(str_replace('_',' ',$transaction->type->value)) }}</span>
                                        </div>
                                        @php
                                        $minusSvg ='<svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.55545 11.4419C3.79953 11.686 4.19526 11.686 4.43934 11.4419L7.77267 8.10861C8.01675 7.86453 8.01675 7.4688 7.77267 7.22472C7.52859 6.98065 7.13286 6.98065 6.88879 7.22472L4.6224 9.49112V1C4.6224 0.654822 4.34257 0.375 3.9974 0.375C3.65222 0.375 3.3724 0.654822 3.3724 1V9.49112L1.106 7.22472C0.861927 6.98065 0.466198 6.98065 0.222121 7.22472C-0.0219569 7.4688 -0.0219569 7.86453 0.222121 8.10861L3.55545 11.4419Z"
                                                fill="#FF3E3E" />
                                        </svg>';

                                        $plusSvg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.55545 4.55806C9.79953 4.31398 10.1953 4.31398 10.4393 4.55806L13.7727 7.89139C14.0167 8.13547 14.0167 8.5312 13.7727 8.77528C13.5286 9.01935 13.1329 9.01935 12.8888 8.77528L10.6224 6.50888V15C10.6224 15.3452 10.3426 15.625 9.9974 15.625C9.65222 15.625 9.3724 15.3452 9.3724 15V6.50888L7.106 8.77528C6.86193 9.01935 6.4662 9.01935 6.22212 8.77528C5.97804 8.5312 5.97804 8.13547 6.22212 7.89139L9.55545 4.55806Z"
                                                fill="#85FFC4" />
                                        </svg>';
                                        @endphp
                                        <div class="site-table-col">
                                            <span
                                                class="{{ txn_type($transaction->type->value,['success-text','danger-text'],'hardrock') }}">
                                                {{ txn_type($transaction->type->value,['+','-'],'hardrock') }}
                                                {{ $transaction->amount }} {{ $currency }}

                                                @if(txn_type($transaction->type->value,['+','-'],'hardrock') == '-')
                                                {!! $minusSvg !!}
                                                @else
                                                {!! $plusSvg !!}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="site-table-col">
                                            <span class="white-text">{{ $transaction->charge }} {{ $currency }}</span>
                                        </div>
                                        <div class="site-table-col">
                                            <span @class([ 'rock-badge' , 'badge-success'=> $transaction->status->value ==
                                                'success',
                                                'danger' => $transaction->status->value == 'failed',
                                                'warning' => $transaction->status->value == 'pending',
                                                ])>
                                                {{ ucfirst($transaction->status->value) }}
                                            </span>
                                        </div>
                                        <div class="site-table-col">
                                            <span class="white-text">{{ $transaction->method }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <div class="rock-mobile-common-table">
                    <h6 class="rock-mobile-title mb-15">{{ __('Recent Transactions') }}</h6>
                    @foreach($recentTransactions as $transaction)
                    <div class="rock-mobile-table-card">
                        <div class="transactions-description">
                            <div class="iocn">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10Z"
                                        fill="#FFD6FF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 3.75C10.4142 3.75 10.75 4.08579 10.75 4.5V5.35352C11.9043 5.67998 12.75 6.74122 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75C11.5858 8.75 11.25 8.41421 11.25 8C11.25 7.30964 10.6904 6.75 10 6.75C9.30964 6.75 8.75 7.30964 8.75 8C8.75 8.69036 9.30964 9.25 10 9.25C11.5188 9.25 12.75 10.4812 12.75 12C12.75 13.2588 11.9043 14.32 10.75 14.6465V15.5C10.75 15.9142 10.4142 16.25 10 16.25C9.58579 16.25 9.25 15.9142 9.25 15.5V14.6465C8.09575 14.32 7.25 13.2588 7.25 12C7.25 11.5858 7.58579 11.25 8 11.25C8.41421 11.25 8.75 11.5858 8.75 12C8.75 12.6904 9.30964 13.25 10 13.25C10.6904 13.25 11.25 12.6904 11.25 12C11.25 11.3096 10.6904 10.75 10 10.75C8.48122 10.75 7.25 9.51878 7.25 8C7.25 6.74122 8.09575 5.67998 9.25 5.35352V4.5C9.25 4.08579 9.58579 3.75 10 3.75Z"
                                        fill="#FFD6FF" />
                                </svg>
                            </div>
                            <div class="content">
                                <h4 class="title pinkDiamond-text">{{ $transaction->description }}</h4>
                                <p class="description">{{ $transaction->created_at }}</p>
                            </div>
                        </div>
                        @php
                        $minusSvg ='<svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.55545 11.4419C3.79953 11.686 4.19526 11.686 4.43934 11.4419L7.77267 8.10861C8.01675 7.86453 8.01675 7.4688 7.77267 7.22472C7.52859 6.98065 7.13286 6.98065 6.88879 7.22472L4.6224 9.49112V1C4.6224 0.654822 4.34257 0.375 3.9974 0.375C3.65222 0.375 3.3724 0.654822 3.3724 1V9.49112L1.106 7.22472C0.861927 6.98065 0.466198 6.98065 0.222121 7.22472C-0.0219569 7.4688 -0.0219569 7.86453 0.222121 8.10861L3.55545 11.4419Z"
                                fill="#FF3E3E" />
                        </svg>';

                        $plusSvg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.55545 4.55806C9.79953 4.31398 10.1953 4.31398 10.4393 4.55806L13.7727 7.89139C14.0167 8.13547 14.0167 8.5312 13.7727 8.77528C13.5286 9.01935 13.1329 9.01935 12.8888 8.77528L10.6224 6.50888V15C10.6224 15.3452 10.3426 15.625 9.9974 15.625C9.65222 15.625 9.3724 15.3452 9.3724 15V6.50888L7.106 8.77528C6.86193 9.01935 6.4662 9.01935 6.22212 8.77528C5.97804 8.5312 5.97804 8.13547 6.22212 7.89139L9.55545 4.55806Z"
                                fill="#85FFC4" />
                        </svg>';
                        @endphp
                        <div class="transactions-short-content">
                            <span
                                class="{{ txn_type($transaction->type->value,['success-text','danger-text'],'hardrock') }}">
                                {{ txn_type($transaction->type->value,['+','-'],'hardrock') }}
                                {{ $transaction->amount }} {{ $currency }}

                                @if(txn_type($transaction->type->value,['+','-'],'hardrock') == '-')
                                {!! $minusSvg !!}
                                @else
                                {!! $plusSvg !!}
                                @endif
                            </span>
                            <span class="white-text d-block">
                                -{{ $transaction->charge }} {{ $currency }}
                            </span>
                            <span class="white-text d-block">
                                {{ $transaction->method }}
                            </span>
                        </div>
                        <div class="transaction-id">
                            <span class="white-text d-block">
                                {{ $transaction->tnx }}
                            </span>
                        </div>
                        <div class="transactions-badge">
                            <span @class([ 'rock-badge' , 'success'=> $transaction->status->value == 'success',
                                'danger' => $transaction->status->value == 'failed',
                                'warning' => $transaction->status->value == 'pending',
                                ])>
                                {{ ucfirst($transaction->status->value) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if(setting('sign_up_referral','permission'))
        <div class="col-xl-12">
            <!-- Show mobile-screen content -->
            <div class="rock-mobile-screen-show">
                <div class="rock-dashboard-referral-mobile mt-30">
                    <div class="rock-dashboard-referral">
                        <div class="contents">
                            <h4 class="link-title">{{ __('Referral URL') }}</h4>
                            <div class="referral-link">
                                <p class="referral-url-copy">{{ $referral->link }}</p>
                                <button class="referral-url-copy-btn" onclick="copyToClipboard()">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M8 6C8 3.79086 9.79086 2 12 2H18C20.2092 2 22 3.79086 22 6V12C22 14.2091 20.2092 16 18 16H12C9.79086 16 8 14.2091 8 12V6Z"
                                            fill="white" />
                                        <path
                                            d="M2 12C2 9.79086 3.79086 8 6 8H12C14.2092 8 16 9.79086 16 12V18C16 20.2091 14.2092 22 12 22H6C3.79086 22 2 20.2091 2 18V12Z"
                                            fill="white" />
                                    </svg>
                                </button>
                                <span id="copy-message" class="copy-message">{{ __('Copied!') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const copyButtons = document.querySelectorAll('.referral-url-copy-btn');

      copyButtons.forEach(button => {
        button.addEventListener('click', (event) => {
          const referralLink = button.previousElementSibling.textContent;
          copyToClipboard(referralLink, button.nextElementSibling);
        });
      });
    });

    function copyToClipboard(linkText, copyMessageElement) {
      const textArea = document.createElement('textarea');
      textArea.value = linkText;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand('copy');
      document.body.removeChild(textArea);

      copyMessageElement.style.opacity = 1;
      setTimeout(() => {
        copyMessageElement.style.opacity = 0;
      }, 2000);
    }

    // Load More
    $('.rock-moreless-button').click(function () {
      $('.moretext').slideToggle();
      if ($('.rock-moreless-button').text() == "Load more") {
        $(this).text("Load less")
      } else {
        $(this).text("Load more")
      }
    });

    $('.rock-moreless-button-2').click(function () {
      let moreText = $('.moretext-2');
      let button = $(this);

      if (moreText.css('display') === 'none') {
        moreText.css('display', 'flex').hide();
        moreText.stop().slideDown('slow', function () {
          $(this).css('height', 'auto');
        });
        button.text("Load less");
      } else {
        moreText.stop().slideUp('slow', function () {
          $(this).css('display', 'none');
        });
        button.text("Load more");
      }
    });
</script>
@endsection
