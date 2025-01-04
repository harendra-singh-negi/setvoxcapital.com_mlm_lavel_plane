@extends('frontend::layouts.user')
@section('title')
{{ __('Schema Preview') }}
@endsection
@section('content')
<!-- Schema Preview section start -->
<div class="rock-schema-preview-area">
    <div class="rock-dashboard-card">
        <div class="rock-dashboard-title-inner">
            <div class="content">
                <h3 class="rock-dashboard-tile">{{ __('Review and Confirm Investment') }}</h3>
            </div>
        </div>
        <div class="rock-schema-preview-forrm">
            <form action="{{ route('user.invest-now') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="schema-preview-table table-responsive">
                    <div class="rock-custom-table">
                        <div class="contents">
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Select Schema:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <div class="rock-single-input">
                                        <div class="input-select">
                                            <select id="select-schema" name="schema_id" required>
                                                @foreach($schemas as $plan)
                                                    <option value="{{$plan->id}}"@if($plan->id == $schema->id ) selected @endif>{{$plan->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Profit Holiday:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span id="holiday">
                                        @if( null != $schema->off_days)
                                        {{ implode(', ', json_decode($schema->off_days,true))  }}
                                        @else
                                        {{ __('No') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Amount:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span id="amount">
                                        {{ $schema->type == 'range' ? 'Minimum ' . $schema->min_amount .' '.$currency. ' - ' . 'Maximum ' . $schema->max_amount.' '.$currency :  $schema->fixed_amount.' '.$currency }}
                                    </span>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Enter Amount:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <div class="rock-single-input">
                                        <div class="input-field input-group">
                                            <input type="text" placeholder="{{ __('Enter Amount') }}" @if($schema->type == 'fixed') value="{{ $schema->fixed_amount }}" readonly @endif placeholder="Enter Amount" oninput="this.value = validateDouble(this.value)" name="invest_amount" id="enter-amount" required>
                                            <span class="input-group-text">{{ $currency }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Select Wallet:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <div class="rock-single-input">
                                        <div class="input-select">
                                            <select name="wallet" required id="selectWallet">
                                                <option value="main">
                                                    {{ __('Main Wallet ( ') . $user->balance.' '. $currency }} )
                                                </option>
                                                <option value="profit">
                                                    {{ __('Profit Wallet ( ') . $user->profit_balance.' '. $currency }} )
                                                </option>
                                                <option value="gateway">{{ __('Direct Gateway') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="site-table-list gatewaySelect"></div>
                            <div class="site-table-list manual-row"></div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Return of Interest:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span id="return-interest">
                                        {{ ($schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $schema->return_interest.' '.$currency ) .' ('.$schema->schedule->name .')' }}
                                    </span>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Number of Period:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span id="number-period">
                                        {{( $schema->return_type == 'period' ? $schema->number_of_period : 'Unlimited').($schema->number_of_period == 1 ? ' Time' : ' Times' )  }}
                                    </span>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Capital Back:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span id="capital_back">{{ $schema->capital_back ? 'Yes' : 'No' }}</span>
                                </div>
                            </div>
                            <div class="site-table-list">
                                <div class="site-table-col">
                                    <span>{{ __('Total Investment Amount:') }}</span>
                                </div>
                                <div class="site-table-col">
                                    <span>
                                        {{ $schema->fixed_amount ?? '' }} {{ $currency }}
                                    </span>
                                </div>
                            </div>
                            <div class="rock-input-btn-wrap mt-30">
                                <button type="submit" class="site-btn gradient-btn radius-10" href="add-money-successfully.html">
                                    {{ __('Invest Now') }}
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
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Schema Preview section end -->
@endsection
@section('script')
<script>
    $("#select-schema").on('change', function (e) {
        "use strict";
        e.preventDefault();
        var id = $(this).val();
        var invest_amount = $("#enter-amount");
        invest_amount.val('');
        invest_amount.attr('readonly', false);

        var url = '{{ route("user.schema.select", ":id") }}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            success: function (result) {
                $('#amount').html(result.amount_range);
                $('#holiday').html(result.holiday);
                $('#return-interest').html(result.return_interest);
                $('#number-period').html(result.number_period);
                $('#capital_back').html(result.capital_back);

                if (result.invest_amount > 0) {
                    invest_amount.val(result.invest_amount);
                    invest_amount.attr('readonly', true);
                }

            }
        });
    });

    $("#enter-amount").on('keyup', function (e) {
        "use strict";
        e.preventDefault();
        var amount = $(this).val();
        $("#total-amount").html(amount);
    })

    $("#selectWallet").on('change', function (e) {
        "use strict";
        $('.gatewaySelect').empty();
        $('.manual-row').empty();
        var wallet = $(this).val();
        if (wallet === 'gateway') {
            $.get('{{ route('gateway.list') }}',
                function (data) {
                    $('.gatewaySelect').append(data)
                    $('select').niceSelect();

                });
        }

    })
    $('body').on('change', '#gatewaySelect', function (e) {
        "use strict"
        e.preventDefault();
        $('.manual-row').empty();
        var code = $(this).val()
        var url = '{{ route("user.deposit.gateway",":code") }}';
        url = url.replace(':code', code);
        $.get(url, function (data) {
            $('.invest-gateway-charge').text('Charge ' + data.charge_gateway)
            if (data.credentials !== undefined) {
                $('.manual-row').append(data.credentials)
                imagePreview()
            }
        });
    });

</script>
@endsection
