@extends('frontend::layouts.user')
@section('title',__('Send Money'))
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xxl-12">
            <div class="rock-send-money-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content">
                            <h3 class="rock-dashboard-tile">{{ __('Send Money') }}</h3>
                        </div>
                        <a class="site-btn gradient-btn radius-12" href="{{ route('user.send-money.log') }}">{{ __('Send Money Log') }}</a>
                    </div>
                    <div class="rock-send-mony-wrapper">
                        <form action="{{ route('user.send-money.now') }}" method="POST">
                            @csrf
                            <div class="row gy-30">
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="rock-single-input">
                                        <label class="input-label" for="">{{ __('User Email') }}</label>
                                        <div class="input-field">
                                            <input type="email" name="email"  class="box-input userCheck" placeholder="{{ __('Enter user email') }}">
                                            <p class="input-description notifyUser"></p>
                                        </div>
                                    </div>
                                    <div class="rock-single-input">
                                        <label class="input-label" for="">{{ __('Enter Amount') }}</label>
                                        <div class="input-field">
                                            <input type="text" class="box-input sendAmount" name="amount" placeholder="{{ __('Enter amount') }}">
                                            <span class="input-icon">
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V7.85352C13.9043 8.17998 14.75 9.24122 14.75 10.5C14.75 10.9142 14.4142 11.25 14 11.25C13.5858 11.25 13.25 10.9142 13.25 10.5C13.25 9.80964 12.6904 9.25 12 9.25C11.3096 9.25 10.75 9.80964 10.75 10.5C10.75 11.1904 11.3096 11.75 12 11.75C13.5188 11.75 14.75 12.9812 14.75 14.5C14.75 15.7588 13.9043 16.82 12.75 17.1465V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.1465C10.0957 16.82 9.25 15.7588 9.25 14.5C9.25 14.0858 9.58579 13.75 10 13.75C10.4142 13.75 10.75 14.0858 10.75 14.5C10.75 15.1904 11.3096 15.75 12 15.75C12.6904 15.75 13.25 15.1904 13.25 14.5C13.25 13.8096 12.6904 13.25 12 13.25C10.4812 13.25 9.25 12.0188 9.25 10.5C9.25 9.24122 10.0957 8.17998 11.25 7.85352V7C11.25 6.58579 11.5858 6.25 12 6.25Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                        </div>
                                        <p class="input-description">
                                            {{ 'Minimum '. setting('min_send','fee').' '.$currency.' and Maximum '. setting('max_send','fee').' '.$currency }}
                                        </p>
                                    </div>
                                    <div class="rock-single-input">
                                        <label class="input-label" for="">{{ __('Send Money Note (Optional)') }}</label>
                                        <div class="input-field">
                                            <textarea placeholder="Send Money Note" name="note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div class="rock-add-mony-details">
                                            <h4 class="title">{{ __('Review Details') }}</h4>
                                            <div class="rock-add-mony-list">
                                                <ul>
                                                    <li>
                                                        <span class="title">{{ __('Amount') }}</span>
                                                        <span class="info"><span class="previewAmount"></span> {{ $currency }}</span>

                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('Charge') }}</span>
                                                        <span class="info"><span class="previewCharge"></span> {{ $currency }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">{{ __('User Email') }}</span>
                                                        <span class="title userEmail"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="rock-input-btn-wrap justify-content-end">
                                            <button type="submit" class="site-btn gradient-btn radius-10"> {{ __('Send Money') }}
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
        </div>
    </div>
</div>
@endsection
@section('script')

<script>
    $('.userCheck').on('change', function (e) {
        "use strict"
        var email = $(this).val();

        $('.userEmail').text(email)

        var url = '{{ route("user.exist",":email") }}';
        url = url.replace(':email', email);
        $.get(url, function (data) {
            $('.notifyUser').text(data)
        })
    })

    $('.sendAmount').on('keyup', function (e) {
        "use strict"
        var amount = $(this).val();
        $('.previewAmount').text(amount);

        var charge = @json(setting('send_charge', 'fee'));
        var chargeType = @json(setting('send_charge_type', 'fee'));


        if (chargeType === 'percentage') {
            var finalCharge = calPercentage(amount, charge)
        } else {
            var finalCharge = charge

        }
        $('.previewCharge').text(finalCharge);
    })

</script>
@endsection
