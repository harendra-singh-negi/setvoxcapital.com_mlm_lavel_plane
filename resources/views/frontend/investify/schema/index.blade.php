@extends('frontend::layouts.user')
@section('title')
{{ __('All Schema') }}
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xxl-12">
            <!-- Pricing section srart -->
            <section class="rock-dashboard-pricing-section">
                <div class="row gy-30">
                    @foreach($schemas as $schema)
                    <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6">
                        <div class="rock-pricing-item @if($schema->featured) is-active @endif">
                            <h3 class="item-title">{{ $schema->name }}</h3>
                            <div class="price-value">
                                <span class="price-badge">{{$schema->schedule->name . ' '. ($schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $currencySymbol.$schema->return_interest ) }}</span>
                                @if($schema->featured)
                                <h4 class="price-suggest">{{ $schema->badge }}</h4>
                                @endif
                            </div>
                            <div class="price-list">
                                <ul class="icon-list">
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M2.33366 3.6665H0.666992V11.1665L4.25935 12.9627C5.18506 13.4255 6.20581 13.6665 7.24078 13.6665H14.0003C14.9208 13.6665 15.667 12.9203 15.667 11.9998C15.667 11.0794 14.9208 10.3332 14.0003 10.3332H12.6807C11.9044 10.3332 11.1389 10.1524 10.4446 9.80531L7.99365 8.57983C8.15391 8.43226 8.2863 8.24923 8.37767 8.03602C8.72231 7.23187 8.35373 6.30029 7.5522 5.94961L2.33366 3.6665Z"
                                                            fill="white" />
                                                        <path
                                                            d="M9.50695 4.09195L11.6049 6.71441C12.4056 7.71523 13.9278 7.71523 14.7284 6.71441L16.8264 4.09195C17.1545 3.68174 17.3333 3.17205 17.3333 2.64673V2.54296C17.3333 1.32257 16.344 0.333252 15.1236 0.333252H14.8758C14.4484 0.333252 14.0386 0.503021 13.7364 0.805212C13.4217 1.11985 12.9116 1.11985 12.597 0.805212C12.2948 0.503021 11.8849 0.333252 11.4575 0.333252H11.2097C9.98932 0.333252 9 1.32257 9 2.54296V2.64673C9 3.17205 9.17879 3.68174 9.50695 4.09195Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Investment') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>{{ $schema->type == 'range' ? $currencySymbol . $schema->min_amount . '-' . $currencySymbol . $schema->max_amount : $currencySymbol . $schema->fixed_amount }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M1.52777 6.51543L16.4729 6.51543C17.323 6.51543 17.6568 5.45913 16.9495 5.00736L9.95351 0.538951C9.37631 0.170285 8.62434 0.170285 8.04714 0.538951L1.05117 5.00736C0.343856 5.45913 0.677677 6.51543 1.52777 6.51543Z"
                                                            fill="white" />
                                                        <rect x="4" y="6.51538" width="3.33333" height="6.25298"
                                                            fill="white" />
                                                        <rect x="10.667" y="6.51538" width="3.33333" height="6.25298"
                                                            fill="white" />
                                                        <path opacity="0.4"
                                                            d="M15.1516 12.7683C15.4672 12.7683 15.7558 12.9356 15.8969 13.2004L16.7303 14.7636C17.0073 15.2833 16.6044 15.8948 15.9849 15.8948L2.01498 15.8948C1.3955 15.8948 0.992585 15.2833 1.26963 14.7636L2.10296 13.2004C2.24412 12.9356 2.53267 12.7683 2.84832 12.7683L15.1516 12.7683Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Capital Back') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>{{ $schema->capital_back ? __('Yes') : __('No') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.00033 7.09307C4.00033 7.44502 3.87633 7.7698 3.66707 8.03107C3.363 8.41074 2.87891 8.65632 2.33366 8.65632C1.41318 8.65632 0.666992 7.95643 0.666992 7.09307C0.666992 6.22971 1.41318 5.52983 2.33366 5.52983C3.25413 5.52983 4.00033 6.22971 4.00033 7.09307Z"
                                                            fill="white" />
                                                        <path
                                                            d="M10.667 11.7828C10.667 12.6462 9.9208 13.3461 9.00033 13.3461C8.07985 13.3461 7.33366 12.6462 7.33366 11.7828C7.33366 11.4309 7.45766 11.1061 7.66691 10.8448C7.97099 10.4651 8.45508 10.2196 9.00033 10.2196C9.34237 10.2196 9.66035 10.3162 9.92492 10.482C10.3723 10.7623 10.667 11.2403 10.667 11.7828Z"
                                                            fill="white" />
                                                        <path
                                                            d="M17.3337 2.40333C17.3337 3.26669 16.5875 3.96658 15.667 3.96658C15.3249 3.96658 15.007 3.86993 14.7424 3.70417C14.295 3.42385 14.0003 2.94587 14.0003 2.40333C14.0003 1.53998 14.7465 0.840088 15.667 0.840088C16.5875 0.840088 17.3337 1.53998 17.3337 2.40333Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Return Type') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>{{ __(ucwords($schema->return_type)) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M0.333008 9.10743C0.333008 8.24408 1.0792 7.54419 1.99967 7.54419H9.49967C10.4201 7.54419 11.1663 8.24408 11.1663 9.10743V9.10743C11.1663 9.97079 10.4201 10.6707 9.49967 10.6707H1.99967C1.0792 10.6707 0.333008 9.97079 0.333008 9.10743V9.10743Z"
                                                            fill="white" />
                                                        <path
                                                            d="M9.60309 10.6707H2.13856C1.14138 10.6707 0.333008 11.3705 0.333008 12.2339C0.333008 13.0973 1.14138 13.7971 2.13856 13.7971H9.60309C10.4665 13.7971 11.1663 13.0973 11.1663 12.2339C11.1663 11.3705 10.4665 10.6707 9.60309 10.6707Z"
                                                            fill="white" />
                                                        <path opacity="0.4"
                                                            d="M13.6667 13.7971C13.6667 12.0704 12.1743 10.6707 10.3333 10.6707C10.1672 10.6707 10.0039 10.6821 9.84434 10.7041C8.23521 10.9259 7 12.2262 7 13.7971C7 15.5239 8.49238 16.9236 10.3333 16.9236C12.1743 16.9236 13.6667 15.5239 13.6667 13.7971Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.37435 2.38279L5.77462 2.9453C5.53055 3.17423 5.13482 3.17423 4.89074 2.9453C4.64666 2.71637 4.64666 2.3452 4.89074 2.11626L5.96815 1.10571C6.53767 0.571535 7.46103 0.571534 8.03055 1.10571L9.10796 2.11626C9.35204 2.3452 9.35204 2.71637 9.10796 2.9453C8.86388 3.17423 8.46815 3.17423 8.22407 2.9453L7.62435 2.38279L7.62435 5.19941C7.62435 5.52317 7.34453 5.78563 6.99935 5.78563C6.65417 5.78563 6.37435 5.52317 6.37435 5.19941L6.37435 2.38279Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Periods') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>
                                                    {{ ($schema->return_type == 'period' ? $schema->number_of_period.' ' : __('Unlimited').' ' )  }}

                                                    @if(($schema->number_of_period == 1 && $schema->return_type == 'period'))
                                                    {{ __('Time') }}
                                                    @elseif($schema->return_type == 'period')
                                                    {{ __('Times') }}
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M17.3337 8.12165C17.3337 12.4384 13.6027 15.9379 9.00033 15.9379C4.39795 15.9379 0.666992 12.4384 0.666992 8.12165C0.666992 3.80487 4.39795 0.30542 9.00033 0.30542C13.6027 0.30542 17.3337 3.80487 17.3337 8.12165Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12.7174 5.31419C12.9898 5.51295 13.0389 5.88126 12.827 6.13682L9.48784 10.1636C8.96808 10.7904 7.9904 10.8718 7.36113 10.3406L5.24889 8.55752C4.99233 8.34093 4.97153 7.97028 5.20244 7.72963C5.43335 7.48898 5.82853 7.46947 6.0851 7.68605L8.19733 9.4691C8.28723 9.54499 8.4269 9.53337 8.50115 9.44383L11.8403 5.41702C12.0522 5.16146 12.4449 5.11542 12.7174 5.31419Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Withdraw') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>{{ __('Anytime') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-list">
                                            <div class="list-content">
                                                <span class="list-item-icon">
                                                    <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M8.35708 0.714212C9.00795 0.103726 10.0632 0.103726 10.7141 0.714212C11.365 1.3247 11.365 2.31449 10.7141 2.92498L3.64303 9.55727C2.99216 10.1678 1.93688 10.1678 1.28601 9.55727C0.635133 8.94678 0.635133 7.95699 1.28601 7.3465L8.35708 0.714212Z"
                                                            fill="white" />
                                                        <path
                                                            d="M10.7141 7.3465C11.365 7.95699 11.365 8.94678 10.7141 9.55727C10.0632 10.1678 9.00795 10.1678 8.35707 9.55727L1.28601 2.92498C0.635133 2.31449 0.635133 1.3247 1.28601 0.714212C1.93688 0.103726 2.99216 0.103726 3.64303 0.714212L10.7141 7.3465Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <p class="list-item-text">{{ __('Cancel') }}</p>
                                            </div>
                                            <div class="list-valu">
                                                <span>
                                                    @if($schema->schema_cancel)
                                                        {{ __('In').' '. $schema->expiry_minute .' '. ($schema->expiry_minute == 1 ? __('Minute') : __('Minutes')) }}
                                                    @else
                                                        {{ __('No') }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="price-btn-wrp">
                                <a class="site-btn secondary-btn btn-xxs" href="{{route('user.schema.preview',$schema->id)}}"> <span><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.4" cx="12" cy="12" r="10" transform="rotate(180 12 12)"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M22.5018 2.44254C22.8096 2.71963 22.8346 3.19385 22.5575 3.50173L13.8199 13.0991C12.8454 14.1819 11.1955 14.3168 10.0579 13.4068L6.53151 10.5857C6.20806 10.3269 6.15562 9.85493 6.41438 9.53149C6.67313 9.20804 7.1451 9.1556 7.46855 9.41436L10.995 12.2355C11.512 12.6492 12.262 12.5878 12.705 12.0956L21.4426 2.49828C21.7197 2.1904 22.1939 2.16544 22.5018 2.44254Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    {{ __('Invest Now') }}
                                </a>
                                <p class="description">* @if( null != $schema->off_days)
                                    {{ implode(', ', json_decode($schema->off_days,true))  .' '.__('are')}}
                                @else
                                    {{ __('No Profit') }}
                                @endif {{ __('Holidays') }}</p>
                            </div>
                            <div class="price-shape">
                                <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/pricing/pricing-shape-01.png') }}" alt="pricing">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- Pricing section end -->
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
