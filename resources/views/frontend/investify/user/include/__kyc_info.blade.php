@if($user->kyc != \App\Enums\KYCStatus::Verified->value)
<div class="col-xxl-12">
    <!-- Show desktop-screen content -->
    <div class="rock-desktop-screen-show">
        <div class="alert rock-alert fade show customAlert" role="alert">
            <div class="alert-content-inner">
                <div class="alert-content">
                    <div class="icon">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.9999 6.99997V12M3.32789 19H18.6721C20.4445 19 21.5649 17.1433 20.7041 15.6324L13.032 2.16592C12.1464 0.611358 9.85365 0.611361 8.96798 2.16592L1.29587 15.6324C0.435104 17.1433 1.55546 19 3.32789 19Z"
                                stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <strong>
                        @if($user->kyc == \App\Enums\KYCStatus::Pending->value)
                            <strong>{{ __('KYC Pending') }}</strong>
                        @else
                            {{ __('You need to submit your') }}
                            <strong>{{ __('KYC and Other Documents') }}</strong> {{ __('before proceed to the system.') }}
                        @endif
                    </strong>
                </div>
                @if($user->kyc != \App\Enums\KYCStatus::Pending->value)
                <div class="alert-btn-groupe">
                    <a class="site-btn btn-xxs gradient-btn radius-10" href="{{ route('user.kyc') }}">
                        {{ __('Submit Now') }}
                    </a>
                    <button type="button" data-bs-dismiss="alert" aria-label="Close" class="site-btn btn-xxs outline-opcity-btn radius-10 rock-btn-close">{{ __('Later') }}</button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Show mobile-screen content -->
    <div class="rock-mobile-screen-show">
        <div class="alert rock-alert-mobile mb-0 fade show customAlert" role="alert">
            <div class="alert-content-inner">
                <div class="alert-content">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M10.3708 2.36419L5.33248 4.71069C3.87515 5.38942 2.91343 6.90939 3.00617 8.57773C3.36871 15.1001 5.1914 17.9715 9.92759 21.3315C11.1823 22.2216 12.8361 22.2238 14.0899 21.3322C18.8406 17.9539 20.5981 15.0419 20.9925 8.60032C21.0953 6.92095 20.1321 5.38485 18.6646 4.70139L13.6462 2.36419C12.6036 1.8786 11.4134 1.8786 10.3708 2.36419Z"
                                fill="#FFA336" />
                            <path
                                d="M11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17Z"
                                fill="#FFA336" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 14.75C11.5858 14.75 11.25 14.4142 11.25 14L11.25 7C11.25 6.58579 11.5858 6.25 12 6.25C12.4142 6.25 12.75 6.58579 12.75 7L12.75 14C12.75 14.4142 12.4142 14.75 12 14.75Z"
                                fill="#FFA336" />
                        </svg>
                    </div>
                    <strong>
                        @if($user->kyc == \App\Enums\KYCStatus::Pending->value)
                            <strong>{{ __('KYC Pending') }}</strong>
                        @else
                            {{ __('You need to submit your') }}
                            <strong>{{ __('KYC and Other Documents') }}</strong> {{ __('before proceed to the system.') }}
                        @endif
                    </strong>

                </div>
                @if($user->kyc != \App\Enums\KYCStatus::Pending->value)
                <div class="alert-btn-groupe">
                    <a class="site-btn btn-xxs gradient-btn radius-10" href="{{ route('user.kyc') }}">
                        {{ __('Submit Now') }}
                    </a>
                    <button type="button" data-bs-dismiss="alert" aria-label="Close" class="site-btn btn-xxs outline-opcity-btn radius-10 rock-btn-close">{{ __('Later') }}</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
