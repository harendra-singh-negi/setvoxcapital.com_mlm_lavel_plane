@extends('frontend::layouts.user')
@section('title',__('Deposit'))
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xxl-12">
            <div class="rock-add-money-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content">
                            <h3 class="rock-dashboard-tile">{{ __('Deposit Amount') }}</h3>
                            <p class="description">{{ __('Enter your deposit details') }}</p>
                        </div>
                        <a class="site-btn gradient-btn radius-12" href="{{ route('user.deposit.log') }}">{{ __('Deposit History') }}</a>
                    </div>
                    <div class="rock-add-mony-wrapper">
                        <form action="{{ route('user.deposit.now') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-30">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 ">
                                    <div class="rock-single-input">
                                        <label class="input-label" for="">{{ __('Payment Method') }}</label>
                                        <div class="input-select">
                                            <select name="gateway_code" id="gatewaySelect" class="site-nice-select">
                                                <option selected disabled>--{{ __('Select Gateway') }}--</option>
                                                @foreach($gateways as $gateway)
                                                <option value="{{ $gateway->gateway_code }}">{{ $gateway->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="input-description charge"></p>
                                    </div>
                                    <div class="rock-single-input">
                                        <label class="input-label" for="">{{ __('Enter Amount:') }}</label>
                                        <div class="input-field">
                                            <input type="text" class="box-input" name="amount" id="amount" oninput="this.value = validateDouble(this.value)" aria-label="Amount">
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
                                        <p class="input-description min-max"></p>
                                    </div>

                                    <div class="row manual-row"></div>
                                </div>

                                <div class="col-xxl-6 col-xl-6 col-lg-6 ">
                                    <div class="rock-add-mony-details">
                                        <h4 class="title">{{ __('Review Details') }}</h4>
                                        <div class="rock-add-mony-list">
                                            <ul>
                                                <li>
                                                    <span class="title">{{ __('Amount') }}</span>
                                                    <span class="info"><span class="amount"></span> <span class="currency"></span></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Charge') }}</span>
                                                    <span class="info charge2"></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Payment Method') }}</span>
                                                    <span class="tumb" id="logo">
                                                        <img src="" class="payment-method">
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Total') }}</span>
                                                    <span class="title total"></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Conversion Rate') }}</span>
                                                    <span class="info conversion-rate"></span>
                                                </li>
                                                <li>
                                                    <span class="title">{{ __('Pay Amount') }}</span>
                                                    <span class="info pay-amount"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="rock-input-btn-wrap justify-content-end">
                                    <button type="submit" class="site-btn gradient-btn radius-10">
                                        {{ __('Proceed to Payment') }}
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
    var globalData;
    var currency = @json($currency)

    $("#gatewaySelect").on('change', function (e) {
        "use strict"
        e.preventDefault();
        $('.manual-row').empty();
        var code = $(this).val()
        var url = '{{ route("user.deposit.gateway",":code") }}';
        url = url.replace(':code', code);
        $.get(url, function (data) {

            globalData = data;
            $('.charge').text('Charge ' + data.charge + ' ' + (data.charge_type === 'percentage' ?
                ' % ' : currency))
            $('.conversion-rate').text('1' + ' ' + currency + ' = ' + data.rate + ' ' + data.currency)


            $('.min-max').text('Minimum ' + data.minimum_deposit + ' ' + currency + ' and ' +
                'Maximum ' + data.maximum_deposit + ' ' + currency)
            $('#logo').html(`<img class="payment-method" src='${data.gateway_logo}'>`);
            var amount = $('#amount').val()

            if (Number(amount) > 0) {
                $('.amount').text((Number(amount)))
                var charge = data.charge_type === 'percentage' ? calPercentage(amount, data.charge) :
                    data.charge
                $('.charge2').text(charge + ' ' + currency)
                $('.total').text((Number(amount) + Number(charge)) + ' ' + currency)
            }

            if (data.credentials !== undefined) {
                $('.manual-row').append(data.credentials)
                imagePreview()
            }

        });

        $('#amount').on('keyup', function (e) {
            "use strict"
            var amount = $(this).val()
            $('.amount').text((Number(amount)))
            $('.currency').text(currency)

            var charge = globalData.charge_type === 'percentage' ? calPercentage(amount, globalData
                .charge) : globalData.charge
            $('.charge2').text(charge + ' ' + currency)

            var total = (Number(amount) + Number(charge));

            $('.total').text(total + ' ' + currency)

            $('.pay-amount').text(total * globalData.rate + ' ' + globalData.currency)
        })


    });
    function showCloseButton(event) {
      const button = event.target.parentElement.nextElementSibling;
      button.style.display = 'block';
    }

    function removeUploadedFile(button) {
        const label = button.previousElementSibling.querySelector('label.file-ok');
        const input = button.previousElementSibling.querySelector('input[type="file"]');
        label.classList.remove('file-ok');
        label.removeAttribute('style');
        label.innerHTML = `
                <span class="upload-icon">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_i_2427_12057)">
                    <path d="M14 18L34 18C38.4183 18 42 21.5817 42 26V34C42 38.4183 38.4183 42 34 42H14C9.58172 42 6 38.4183 6 34L6 26C6 21.5817 9.58172 18 14 18Z" fill="url(#paint0_linear_2427_12057)"/>
                    </g>
                    <path d="M14 18.5L34 18.5C38.1421 18.5 41.5 21.8579 41.5 26V34C41.5 38.1421 38.1421 41.5 34 41.5H14C9.85787 41.5 6.5 38.1421 6.5 34L6.5 26C6.5 21.8579 9.85786 18.5 14 18.5Z" stroke="white" stroke-opacity="0.08"/>
                    <g filter="url(#filter1_i_2427_12057)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9393 13.0607C16.3536 12.4749 16.3536 11.5251 16.9393 10.9393L22.9393 4.93934C23.5251 4.35355 24.4749 4.35355 25.0607 4.93934L31.0607 10.9393C31.6464 11.5251 31.6464 12.4749 31.0607 13.0607C30.4749 13.6464 29.5251 13.6464 28.9393 13.0607C27.6701 11.7915 25.5 12.6904 25.5 14.4853L25.5 30C25.5 30.8284 24.8284 31.5 24 31.5C23.1716 31.5 22.5 30.8284 22.5 30L22.5 14.4853C22.5 12.6904 20.3299 11.7915 19.0607 13.0607C18.4749 13.6464 17.5251 13.6464 16.9393 13.0607Z" fill="url(#paint1_linear_2427_12057)"/>
                    </g>
                    <path d="M17.2929 12.7071C16.9024 12.3166 16.9024 11.6834 17.2929 11.2929L23.2929 5.29289C23.6834 4.90237 24.3166 4.90237 24.7071 5.29289L30.7071 11.2929C31.0976 11.6834 31.0976 12.3166 30.7071 12.7071C30.3166 13.0976 29.6834 13.0976 29.2929 12.7071C27.7087 11.1229 25 12.2449 25 14.4853L25 30C25 30.5523 24.5523 31 24 31C23.4477 31 23 30.5523 23 30L23 14.4853C23 12.2449 20.2913 11.1229 18.7071 12.7071C18.3166 13.0976 17.6834 13.0976 17.2929 12.7071Z" stroke="white" stroke-opacity="0.08"/>
                    <defs>
                    <filter id="filter0_i_2427_12057" x="2" y="18" width="40" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dx="-4" dy="4"/>
                        <feGaussianBlur stdDeviation="5"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0"/>
                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2427_12057"/>
                    </filter>
                    <filter id="filter1_i_2427_12057" x="12.5" y="4.5" width="19" height="31" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dx="-4" dy="4"/>
                        <feGaussianBlur stdDeviation="5"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0"/>
                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2427_12057"/>
                    </filter>
                    <linearGradient id="paint0_linear_2427_12057" x1="6" y1="18" x2="28.1538" y2="51.2308" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FDD819"/>
                        <stop offset="1" stop-color="#F81717"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_2427_12057" x1="16.5" y1="31.5" x2="39.4245" y2="18.7641" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#FDD819"/>
                        <stop offset="1" stop-color="#F81717"/>
                    </linearGradient>
                    </defs>
                </svg>
                </span>
                <span>Select Image</span>
            `;
        input.value = ''; // Reset file input
        button.style.display = 'none';
    }

</script>
@endsection
