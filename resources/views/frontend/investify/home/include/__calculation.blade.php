@php
$schemas = \App\Models\Schema::where('status',1)->with('schedule')->get(['id','name','type','min_amount','max_amount','fixed_amount']);
@endphp

<section class="investment-calculator-section o-x-clip position-relative z-index-11">
    <div class="container p-relative">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-8">
                <div class="section-title-wrapper-four is-white text-center section-title-space">
                    <span class="subtitle-four">{{ $data['calculation_title_small'] }}</span>
                    <h2 class="section-title-four">
                        {{ $data['calculation_title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row gy-30 justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-8">
                <div class="investment-calculator-form">
                    <div class="single-input">
                        <select name="selectCalculationPlan" id="selectPlan">
                            <option value="0">{{ __('---Select Plan---') }}</option>
                            @foreach($schemas as $schema)
                            <option value="{{ $schema->id }}">{{ $schema->name }}
                                ({{ $schema->type == 'range' ? $currencySymbol . $schema->min_amount . '-' . $currencySymbol . $schema->max_amount : $currencySymbol . $schema->fixed_amount }}
                                )
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="single-input">
                        <div class="input-field">
                            <input type="text" id="enter-amount" placeholder="{{ __('Enter Amount') }}">
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 3.75C10.4142 3.75 10.75 4.08579 10.75 4.5V5.35352C11.9043 5.67998 12.75 6.74122 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75C11.5858 8.75 11.25 8.41421 11.25 8C11.25 7.30964 10.6904 6.75 10 6.75C9.30964 6.75 8.75 7.30964 8.75 8C8.75 8.69036 9.30964 9.25 10 9.25C11.5188 9.25 12.75 10.4812 12.75 12C12.75 13.2588 11.9043 14.32 10.75 14.6465V15.5C10.75 15.9142 10.4142 16.25 10 16.25C9.58579 16.25 9.25 15.9142 9.25 15.5V14.6465C8.09575 14.32 7.25 13.2588 7.25 12C7.25 11.5858 7.58579 11.25 8 11.25C8.41421 11.25 8.75 11.5858 8.75 12C8.75 12.6904 9.30964 13.25 10 13.25C10.6904 13.25 11.25 12.6904 11.25 12C11.25 11.3096 10.6904 10.75 10 10.75C8.48122 10.75 7.25 9.51878 7.25 8C7.25 6.74122 8.09575 5.67998 9.25 5.35352V4.5C9.25 4.08579 9.58579 3.75 10 3.75Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                        <p class="input-description charge"></p>
                    </div>
                    <div class="single-input">
                        <div class="input-field">
                            <input type="text" id="profit" placeholder="{{ __('Profit') }}" disabled>
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 3.75C10.4142 3.75 10.75 4.08579 10.75 4.5V5.35352C11.9043 5.67998 12.75 6.74122 12.75 8C12.75 8.41421 12.4142 8.75 12 8.75C11.5858 8.75 11.25 8.41421 11.25 8C11.25 7.30964 10.6904 6.75 10 6.75C9.30964 6.75 8.75 7.30964 8.75 8C8.75 8.69036 9.30964 9.25 10 9.25C11.5188 9.25 12.75 10.4812 12.75 12C12.75 13.2588 11.9043 14.32 10.75 14.6465V15.5C10.75 15.9142 10.4142 16.25 10 16.25C9.58579 16.25 9.25 15.9142 9.25 15.5V14.6465C8.09575 14.32 7.25 13.2588 7.25 12C7.25 11.5858 7.58579 11.25 8 11.25C8.41421 11.25 8.75 11.5858 8.75 12C8.75 12.6904 9.30964 13.25 10 13.25C10.6904 13.25 11.25 12.6904 11.25 12C11.25 11.3096 10.6904 10.75 10 10.75C8.48122 10.75 7.25 9.51878 7.25 8C7.25 6.74122 8.09575 5.67998 9.25 5.35352V4.5C9.25 4.08579 9.58579 3.75 10 3.75Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                        <p class="input-description"> {{ __('Profit:') }} <span id="profit-label"></span></p>
                    </div>
                    <div class="investment-gradient-btn d-flex justify-content-center">
                        <a class="site-btn secondary-btn btn-xs" href="{{ route('register') }}"> <span><svg width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.4" cx="12" cy="12" r="10" transform="rotate(180 12 12)"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22.5018 2.44254C22.8096 2.71963 22.8346 3.19385 22.5575 3.50173L13.8199 13.0991C12.8454 14.1819 11.1955 14.3168 10.0579 13.4068L6.53151 10.5857C6.20806 10.3269 6.15562 9.85493 6.41438 9.53149C6.67313 9.20804 7.1451 9.1556 7.46855 9.41436L10.995 12.2355C11.512 12.6492 12.262 12.5878 12.705 12.0956L21.4426 2.49828C21.7197 2.1904 22.1939 2.16544 22.5018 2.44254Z"
                                        fill="white" />
                                </svg>
                            </span>
                            {{ __('Let’s Start Earning') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="investment-calculator-shapes">
        <div class="shape-one">
            <img src="{{ asset('frontend/theme_base/hardrock/images/investment-calculator/shape-01.png') }}" alt="">
        </div>
        <div class="shape-two">
            <img src="{{ asset('frontend/theme_base/hardrock/images/investment-calculator/shape-02.png') }}" alt="">
        </div>
        <div class="shape-three">
            <img src="{{ asset('frontend/theme_base/hardrock/images/investment-calculator/shape-03.png') }}" alt="">
        </div>
    </div>
</section>

@push('script')
<script>
    $('#selectPlan').on('change', function (e) {
        e.preventDefault();
        "use strict"

        var id = $(this).val();

        if (id != 0) {

            var invest_amount = $("#enter-amount");
            invest_amount.val('');
            invest_amount.attr('readonly', false);

            var url = '{{ route("user.schema.select", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                success: function (result) {
                    $('#amount-level').html('Capital Back:' + result.capital_back);
                    $('#profit-label').html(result.return_interest + ' - ' + result.number_period);

                    if (result.invest_amount > 0) {
                        invest_amount.val(result.invest_amount);
                        invest_amount.attr('readonly', true);
                    }

                    if (result.number_period === 'Unlimited Times') {
                        $('#profit').val('Unlimited');
                    } else {

                        if (result.interest_type === 'percentage') {
                            $('#profit').val(calPercentage(result.invest_amount, result.interest) *
                                result.period);

                        } else {
                            $('#profit').val(result.interest * result.period);
                        }
                    }

                }
            });
        }

    })

    $('#enter-amount').on('keyup', function (e) {
        e.preventDefault();
        "use strict"
        var id = $('#selectPlan').val();

        if (id != 0) {
            var url = '{{ route("user.schema.select", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                success: function (result) {

                    if (result.number_period === 'Unlimited Times') {
                        $('#profit').val('Unlimited');
                    } else {

                        if (result.interest_type === 'percentage') {
                            var invest_amount = $("#enter-amount").val();
                            $('#profit').val(calPercentage(invest_amount, result.interest) * result
                                .period);

                        } else {
                            $('#profit').val(result.interest * result.period);
                        }
                    }

                }
            });
        }

    })

</script>
@endpush
