@php
$investors = \App\Models\Invest::with('schema')->latest()->take(6)->get();
$withdraws = \App\Models\Transaction::where('type',\App\Enums\TxnType::Withdraw)->take(6)->latest()->get();
@endphp

<!-- Investors section start -->
<section class="rock-investors-section section-space-top p-relative z-11 o-x-clip">
    <div class="container p-relative">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="section-title-wrapper-four is-white text-center section-title-space">
                    <span class="subtitle-four">{{ $data['title_small'] }}</span>
                    <h2 class="section-title-four">
                        {{ $data['title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <div class="rock-investors-grid">
                    <div class="rock-investors-wrapper">
                        <h3 class="title">{{ __('Recent Investors') }}</h3>
                        @foreach($investors as $investor)

                        @php
                        $calculateInterest = ($investor->interest*$investor->invest_amount)/100;
                        $interest = $investor->interest_type != 'percentage' ? $investor->interest :
                        $calculateInterest;
                        @endphp

                        <div class="rock-investors-item">
                            <div class="rock-investors-contents">
                                <div class="icon">
                                    <span>
                                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <ellipse opacity="0.4" cx="7" cy="14" rx="7" ry="4" fill="white" />
                                            <circle cx="7" cy="4" r="4" fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.25 10C15.25 10.4142 15.5858 10.75 16 10.75C16.4142 10.75 16.75 10.4142 16.75 10V8.75H18C18.4142 8.75 18.75 8.41421 18.75 8C18.75 7.58579 18.4142 7.25 18 7.25H16.75V6C16.75 5.58579 16.4142 5.25 16 5.25C15.5858 5.25 15.25 5.58579 15.25 6L15.25 7.25H14C13.5858 7.25 13.25 7.58579 13.25 8C13.25 8.41421 13.5858 8.75 14 8.75H15.25L15.25 10Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">{{ $investor->user->full_name }}</h3>
                                    <p class="description">{{ $investor->created_at }}</p>
                                </div>
                            </div>
                            <div class="rock-investors-bagde">
                                <span class="site-bade">{{ $investor->user->status ? __('Active') : __('DeActive') }}</span>
                            </div>
                            <div class="rock-currency">
                                <span class="small-dolar">+{{ $investor->already_return_profit*$interest }} {{ $currency }}</span>
                                <h4 class="dolar">{{ $investor->invest_amount }} {{ $currency }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="rock-investors-wrapper style-two">
                        <h3 class="title">{{ __('Recent Withdraws') }}</h3>
                        @foreach($withdraws as $withdraw)
                        <div class="rock-investors-item">
                            <div class="rock-investors-contents">
                                <div class="icon">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M3.99951 12C3.99951 10.8954 4.89494 10 5.99951 10H14.9995C16.1041 10 16.9995 10.8954 16.9995 12V12C16.9995 13.1046 16.1041 14 14.9995 14H5.99951C4.89494 14 3.99951 13.1046 3.99951 12V12Z"
                                                fill="white" />
                                            <path
                                                d="M14.9995 14H6.16618C4.96956 14 3.99951 14.8954 3.99951 16C3.99951 17.1046 4.96956 18 6.16618 18H14.9995C16.1041 18 16.9995 17.1046 16.9995 16C16.9995 14.8954 16.1041 14 14.9995 14Z"
                                                fill="white" />
                                            <path opacity="0.4"
                                                d="M20 18C20 15.7909 18.2091 14 16 14C15.8007 14 15.6047 14.0146 15.4132 14.0427C13.4823 14.3266 12 15.9902 12 18C12 20.2091 13.7909 22 16 22C18.2091 22 20 20.2091 20 18Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.249 3.39645L10.5294 4.11612C10.2365 4.40901 9.76159 4.40901 9.46869 4.11612C9.1758 3.82322 9.1758 3.34835 9.46869 3.05546L10.7616 1.76256C11.445 1.07915 12.553 1.07914 13.2365 1.76256L14.5294 3.05546C14.8222 3.34835 14.8222 3.82322 14.5294 4.11612C14.2365 4.40901 13.7616 4.40901 13.4687 4.11612L12.749 3.39645L12.749 7C12.749 7.41421 12.4132 7.75 11.999 7.75C11.5848 7.75 11.249 7.41421 11.249 7L11.249 3.39645Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="content">
                                    <h3 class="title">Withdraw With Bank Transfer-USD</h3>
                                    <p class="description">Mar 03 2024 06:27</p>
                                </div>
                            </div>
                            <div class="rock-investors-bagde">
                                <span class="site-bade warning-badge">{{ ucfirst($withdraw->status->value) }}</span>
                            </div>
                            <div class="rock-currency">
                                <span class="small-dolar">
                                    @if($withdraw->status == \App\Enums\TxnStatus::Success)
                                    +{{ $withdraw->final_amount }} {{ $currency }}
                                    @elseif($withdraw->status == \App\Enums\TxnStatus::Failed)
                                    -{{ $withdraw->final_amount }} {{ $currency }}
                                    @endif
                                </span>
                                <h4 class="dolar">{{ $withdraw->final_amount }} {{ $currency }}</h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="rock-investors-shapes">
            <div class="shape-one">
                <img src="{{ asset('frontend/theme_base/hardrock/images/investors/01.png') }}" alt="">
            </div>
            <div class="shape-two">
                <img src="{{ asset('frontend/theme_base/hardrock/images/investors/02.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Investors section end -->
