
<div class="col-xl-12">
    <div class="rock-profile-security-area mt-4">
        <div class="row g-20">
            @if($user->two_fa)
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <h3 class="rock-dashboard-tile">{{ __('2FA Security') }}</h3>
                    </div>

                    <div class="rock-profile-security-wrapper">
                        <div class="rock-profile-security-content">
                            @if( null != $user->google2fa_secret)
                            <p class="description">{{ __('2Two Factor Authentication (2FA) Strengthens Access Security By
                                Requiring Two Methods (also Referred To As Factors) To Verify Your Identity. Two Factor
                                Authentication Protects Against Phishing, Social Engineering And Password Brute Force
                                Attacks And Secures Your Logins From Attackers Exploiting Weak Or Stolen Credentials.') }}
                            </p>
                            <p class="description">{{ __('Scane the QR code with you Google Authenticator App') }}</p>
                            @php
                                $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

                                $inlineUrl = $google2fa->getQRCodeInline(
                                setting('site_title','global'),
                                    $user->email,
                                    $user->google2fa_secret
                                );
                            @endphp
                            @if(Str::of($inlineUrl)->startsWith('data:image/'))
                            <img src="{{ $inlineUrl }}">
                            @else
                            {!! $inlineUrl !!}
                            @endif
                            <div class="rock-profile-security-input">
                                <form action="{{ route('user.setting.action-2fa') }}" method="POST">
                                    @csrf
                                    <div class="rock-single-input">
                                        <label class="input-label">
                                            @if($user->two_fa)
                                            {{ __('Enter Your Password') }}
                                            @else
                                            {{ __('Enter the PIN from Google Authenticator App') }}
                                            @endif
                                        </label>
                                        <div class="input-field">
                                            <input type="password" id="one_time_password" name="one_time_password" class="box-input">
                                        </div>
                                    </div>
                                    <div class="rock-input-btn-wrap justify-content-end">
                                        @if($user->two_fa)
                                        <button type="submit" class="site-btn gradient-btn radius-10" value="disable" name="status">
                                            {{ __('Disable 2FA') }}
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
                                        @else
                                        <button type="submit" class="site-btn gradient-btn radius-10" value="enable" name="status">
                                            {{ __('Enable 2FA') }}
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
                                        @endif
                                    </div>
                                </form>
                            </div>
                            @else
                            <div class="rock-profile-security-input">
                                <div class="rock-input-btn-wrap justify-content-end">
                                    <a href="{{ route('user.setting.2fa') }}" class="site-btn gradient-btn radius-10">
                                        {{ __('Obtaining a Secret Key for Two-Factor Authentication') }}
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="row gy-20">
                    @if(setting('kyc_verification','permission'))
                    <div class="col-xxl-12">
                        <div class="rock-dashboard-card">
                            <div class="rock-dashboard-title-inner">
                                <h3 class="rock-dashboard-tile">{{ __('KYC') }}</h3>
                            </div>
                            <div class="rock-badge-verified-wrapper mb-80">
                                @if($user->kyc == \App\Enums\KYCStatus::Verified->value)
                                <span class="rock-badge success badge-icon"><svg width="12" height="12"
                                        viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M5.05414 0.587825L2.13874 1.88356C1.29546 2.25835 0.738969 3.09767 0.79263 4.01893C1.00242 7.62055 2.05711 9.20613 4.79768 11.0615C5.52369 11.5531 6.48069 11.5543 7.20617 11.0619C9.95517 9.19645 10.9721 7.58845 11.2003 4.0314C11.2598 3.10406 10.7024 2.25582 9.85329 1.87842L6.94945 0.587825C6.34613 0.319683 5.65746 0.319684 5.05414 0.587825Z"
                                            fill="#48FFA7" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.03811 4.50401C8.21995 4.66312 8.23838 4.93951 8.07927 5.12135L6.40516 7.03462C6.04542 7.44575 5.42577 7.5008 4.99919 7.15954L3.97671 6.34155C3.78803 6.19061 3.75744 5.9153 3.90839 5.72662C4.05933 5.53794 4.33464 5.50735 4.52332 5.65829L5.5458 6.47628C5.60674 6.52503 5.69526 6.51717 5.74665 6.45843L7.42076 4.54516C7.57987 4.36332 7.85627 4.34489 8.03811 4.50401Z"
                                            fill="#48FFA7" />
                                    </svg>
                                    {{ __('KYC Verified') }}
                                </span>
                                <br>
                                <p class="mt-3">{{ json_decode($user->kyc_credential,true)['Action Message'] ?? '' }}</p>
                                @else
                                <a class="site-btn gradient-btn radius-10" href="{{ route('user.kyc') }}">
                                    {{ __('Upload KYC') }}
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4"
                                            d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                            fill="white" />
                                    </svg>
                                </a>
                                <p class="mt-3">{{ json_decode($user->kyc_credential,true)['Action Message'] ?? '' }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-xxl-12">
                        <div class="rock-dashboard-card">
                            <div class="rock-dashboard-title-inner">
                                <h3 class="rock-dashboard-tile">{{ __('Change Password') }}</h3>
                            </div>
                            <div class="rock-profile-change-password-btn mt-75">
                                <div class="rock-input-btn-wrap justify-content-end">
                                    <a class="site-btn gradient-btn radius-10" href="{{ route('user.change.password') }}">
                                        {{ __('Change Password') }}
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
