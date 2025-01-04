<!DOCTYPE html>
<html lang="en">
@include('frontend::include.__head')

<body class="rock-dashboard-bg {{ session()->get('site-color-mode') ?? 'dark-theme' }}">
    @include('notify::components.notify')

    <!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Preloder start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloder start -->

    <!-- Page-wrapper Start-->
    <div class="page-wrapper">

        @include('frontend::include.__user_header')

        <!-- Page Body Start-->
        <div class="rock-page-body-wrapper">
            @include('frontend::include.__user_side_nav')
            <div class="rock-page-body">
                @yield('content')
            </div>
        </div>
        <!-- Page Body Ends-->
    </div>
    <!-- Page-wrapper end-->

    <!-- Show in 575px in Mobile Screen Start -->
    <div class="rock-mobile-screen-show">
        <div class="rock-bottom-appbar">
            <ul>
                <li @if(Route::is('user.dashboard')) class="active" @endif>
                    <a href="{{ route('user.dashboard') }}">
                        <span class="icon"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_i_2565_13566)">
                                    <g filter="url(#filter1_i_2565_13566)">
                                        <path
                                            d="M26.25 22.4586V12.6879C26.25 11.1742 25.5754 9.74062 24.4127 8.78315L18.1627 3.63668C16.3221 2.1211 13.6779 2.12111 11.8373 3.63668L5.58733 8.78315C4.42456 9.74062 3.75 11.1742 3.75 12.6879V22.4586C3.75 25.2429 5.98858 27.5 8.75 27.5H21.25C24.0114 27.5 26.25 25.2429 26.25 22.4586Z"
                                            fill="url(#paint0_linear_2565_13566)" />
                                    </g>
                                    <path
                                        d="M25.75 12.6879V22.4586C25.75 24.9706 23.7314 27 21.25 27H8.75C6.2686 27 4.25 24.9706 4.25 22.4586V12.6879C4.25 11.3228 4.85839 10.0311 5.90516 9.16914L12.1552 4.02267C13.8111 2.65911 16.1889 2.65911 17.8448 4.02266L24.0948 9.16914C25.1416 10.0311 25.75 11.3228 25.75 12.6879Z"
                                        stroke="white" stroke-opacity="0.08" />
                                    <g filter="url(#filter2_i_2565_13566)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.0625 15C9.0625 14.4822 9.48223 14.0625 10 14.0625H20C20.5178 14.0625 20.9375 14.4822 20.9375 15C20.9375 15.5178 20.5178 15.9375 20 15.9375H10C9.48223 15.9375 9.0625 15.5178 9.0625 15Z"
                                            fill="white" />
                                    </g>
                                    <path
                                        d="M9.5625 15C9.5625 14.7584 9.75838 14.5625 10 14.5625H20C20.2416 14.5625 20.4375 14.7584 20.4375 15C20.4375 15.2416 20.2416 15.4375 20 15.4375H10C9.75838 15.4375 9.5625 15.2416 9.5625 15Z"
                                        stroke="white" stroke-opacity="0.08" />
                                    <g filter="url(#filter3_i_2565_13566)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.0625 20C9.0625 19.4822 9.48223 19.0625 10 19.0625H20C20.5178 19.0625 20.9375 19.4822 20.9375 20C20.9375 20.5178 20.5178 20.9375 20 20.9375H10C9.48223 20.9375 9.0625 20.5178 9.0625 20Z"
                                            fill="white" />
                                    </g>
                                    <path
                                        d="M9.5625 20C9.5625 19.7584 9.75838 19.5625 10 19.5625H20C20.2416 19.5625 20.4375 19.7584 20.4375 20C20.4375 20.2416 20.2416 20.4375 20 20.4375H10C9.75838 20.4375 9.5625 20.2416 9.5625 20Z"
                                        stroke="white" stroke-opacity="0.08" />
                                </g>
                                <defs>
                                    <filter id="filter0_i_2565_13566" x="-0.25" y="2.5" width="26.5" height="29"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                            result="shape" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dx="-4" dy="4" />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2565_13566" />
                                    </filter>
                                    <filter id="filter1_i_2565_13566" x="-0.25" y="2.5" width="26.5" height="29"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                            result="shape" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dx="-4" dy="4" />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2565_13566" />
                                    </filter>
                                    <filter id="filter2_i_2565_13566" x="5.0625" y="14.0625" width="15.875"
                                        height="5.875" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                            result="shape" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dx="-4" dy="4" />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2565_13566" />
                                    </filter>
                                    <filter id="filter3_i_2565_13566" x="5.0625" y="19.0625" width="15.875"
                                        height="5.875" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix"
                                            result="shape" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dx="-4" dy="4" />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2565_13566" />
                                    </filter>
                                    <linearGradient id="paint0_linear_2565_13566" x1="3.75" y1="2.5" x2="28.6119"
                                        y2="24.8757" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FDD819" />
                                        <stop offset="1" stop-color="#F81717" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span>
                        <span class="text">{{ __('Home') }}</span>
                    </a>
                </li>
                <li @if(Route::is('user.deposit.*')) class="active" @endif>
                    <a href="{{ route('user.deposit.amount') }}">
                        <span class="icon"><svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M28 15C28 21.9036 22.4036 27.5 15.5 27.5C8.59644 27.5 3 21.9036 3 15C3 8.09644 8.59644 2.5 15.5 2.5C22.4036 2.5 28 8.09644 28 15Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.5 7.1875C16.0178 7.1875 16.4375 7.60723 16.4375 8.125V9.1919C17.8803 9.59998 18.9375 10.9265 18.9375 12.5C18.9375 13.0178 18.5178 13.4375 18 13.4375C17.4822 13.4375 17.0625 13.0178 17.0625 12.5C17.0625 11.6371 16.3629 10.9375 15.5 10.9375C14.6371 10.9375 13.9375 11.6371 13.9375 12.5C13.9375 13.3629 14.6371 14.0625 15.5 14.0625C17.3985 14.0625 18.9375 15.6015 18.9375 17.5C18.9375 19.0735 17.8803 20.4 16.4375 20.8081V21.875C16.4375 22.3928 16.0178 22.8125 15.5 22.8125C14.9822 22.8125 14.5625 22.3928 14.5625 21.875V20.8081C13.1197 20.4 12.0625 19.0735 12.0625 17.5C12.0625 16.9822 12.4822 16.5625 13 16.5625C13.5178 16.5625 13.9375 16.9822 13.9375 17.5C13.9375 18.3629 14.6371 19.0625 15.5 19.0625C16.3629 19.0625 17.0625 18.3629 17.0625 17.5C17.0625 16.6371 16.3629 15.9375 15.5 15.9375C13.6015 15.9375 12.0625 14.3985 12.0625 12.5C12.0625 10.9265 13.1197 9.59998 14.5625 9.1919V8.125C14.5625 7.60723 14.9822 7.1875 15.5 7.1875Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Deposit') }}</span>
                    </a>
                </li>
                <li @if(Route::is('user.schema.*')) class="active" @endif>
                    <a href="{{ route('user.schema') }}">
                        <span class="icon"><svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M14.4662 27.0297L4.25423 22.3879C3.27723 21.9438 3.27724 20.5561 4.25423 20.112L14.4662 15.4702C15.1235 15.1714 15.8779 15.1714 16.5352 15.4702L26.7472 20.112C27.7242 20.5561 27.7242 21.9438 26.7472 22.3879L16.5352 27.0297C15.8779 27.3285 15.1235 27.3285 14.4662 27.0297Z"
                                    fill="white" />
                                <path
                                    d="M14.4662 20.7797L4.25423 16.1379C3.27723 15.6938 3.27724 14.3061 4.25423 13.862L14.4662 9.22018C15.1235 8.9214 15.8779 8.9214 16.5352 9.22018L26.7472 13.862C27.7242 14.3061 27.7242 15.6938 26.7472 16.1379L16.5352 20.7797C15.8779 21.0785 15.1235 21.0785 14.4662 20.7797Z"
                                    fill="white" />
                                <path opacity="0.4"
                                    d="M14.4662 14.5297L4.25423 9.88791C3.27723 9.44382 3.27724 8.05608 4.25423 7.61199L14.4662 2.97018C15.1235 2.6714 15.8779 2.6714 16.5352 2.97018L26.7472 7.61199C27.7242 8.05608 27.7242 9.44382 26.7472 9.88791L16.5352 14.5297C15.8779 14.8285 15.1235 14.8285 14.4662 14.5297Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Schemas') }}</span>
                    </a>
                </li>
                <li @if(Route::is('user.referral.*')) class="active" @endif>
                    <a href="{{ route('user.referral') }}">
                        <span class="icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M25 13.75C25 7.5368 19.9632 2.5 13.75 2.5C7.5368 2.5 2.5 7.5368 2.5 13.75C2.5 19.9632 7.5368 25 13.75 25C19.9632 25 25 19.9632 25 13.75Z"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5867 17.1875C12.2474 17.1912 10.916 17.557 9.13354 18.3556C8.66103 18.5673 8.10637 18.3558 7.89467 17.8833C7.68298 17.4108 7.89441 16.8561 8.36692 16.6444C10.2668 15.7933 11.8727 15.3173 13.5815 15.3125C15.2828 15.3078 16.9939 15.7707 19.1045 16.632C19.5838 16.8276 19.8139 17.3748 19.6182 17.8542C19.4226 18.3336 18.8754 18.5636 18.396 18.368C16.3813 17.5458 14.9335 17.1838 13.5867 17.1875Z"
                                    fill="white" />
                                <circle cx="3.75" cy="3.75" r="3.75" transform="matrix(1 0 0 -1 10 13.75)"
                                    fill="white" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23.4375 20C23.4375 19.4822 23.0178 19.0625 22.5 19.0625C21.9822 19.0625 21.5625 19.4822 21.5625 20V21.5625H20C19.4822 21.5625 19.0625 21.9822 19.0625 22.5C19.0625 23.0178 19.4822 23.4375 20 23.4375H21.5625V25C21.5625 25.5178 21.9822 25.9375 22.5 25.9375C23.0178 25.9375 23.4375 25.5178 23.4375 25V23.4375H25C25.5178 23.4375 25.9375 23.0178 25.9375 22.5C25.9375 21.9822 25.5178 21.5625 25 21.5625H23.4375V20Z"
                                    fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Referral') }}</span>
                    </a>
                </li>
                <li @if(Route::is('user.settings.*')) class="active" @endif>
                    <a href="{{ route('user.setting.show') }}">
                        <span class="icon">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M16.1932 3.75H13.8068C12.4889 3.75 11.4204 4.75736 11.4204 6C11.4204 7.42202 9.89896 8.32609 8.65 7.64621L8.52314 7.57716C7.38176 6.95584 5.92228 7.32455 5.2633 8.40071L4.07011 10.3493C3.41113 11.4254 3.8022 12.8015 4.94359 13.4228C6.19314 14.103 6.19314 15.897 4.94358 16.5772C3.8022 17.1985 3.41113 18.5746 4.07011 19.6507L5.2633 21.5993C5.92228 22.6754 7.38176 23.0442 8.52314 22.4228L8.65 22.3538C9.89896 21.6739 11.4204 22.578 11.4204 24C11.4204 25.2426 12.4889 26.25 13.8068 26.25H16.1932C17.5111 26.25 18.5796 25.2426 18.5796 24C18.5796 22.578 20.1011 21.6739 21.35 22.3538L21.4769 22.4228C22.6182 23.0441 24.0777 22.6754 24.7367 21.5993L25.9299 19.6507C26.5889 18.5746 26.1978 17.1985 25.0564 16.5772C23.8069 15.897 23.8069 14.103 25.0564 13.4228C26.1978 12.8015 26.5889 11.4254 25.9299 10.3493L24.7367 8.40073C24.0777 7.32457 22.6182 6.95585 21.4769 7.57717L21.35 7.64622C20.101 8.3261 18.5796 7.42202 18.5796 6C18.5796 4.75736 17.5111 3.75 16.1932 3.75Z"
                                    fill="white" />
                                <circle cx="15" cy="15" r="3.75" fill="white" />
                            </svg>
                        </span>
                        <span class="text">{{ __('Settings') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Show in 575px in Mobile Screen End -->

    @include('frontend::include.__script')
</body>

</html>
