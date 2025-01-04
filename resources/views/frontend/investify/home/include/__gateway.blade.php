@php
    $gatewayList = \App\Models\Gateway::where('status',true)->pluck('logo','name')->chunk(10);
@endphp

<!-- Payment accept section start -->
<section class="rock-payment-accept-section fix section-space-bottom">
<div class="container-fluid p-0">
    <div class="row justify-content-center">
        <div class="col-xxl-8 ciol-xl-6 col-lg-6">
            <div class="section-title-wrapper-four text-center mb-80">
            <span class="subtitle-four">{{ $data['title_small'] }}</span>
            <h2 class="section-title-four mb-30">
                {{ $data['title_big'] }}
            </h2>
            </div>
        </div>
    </div>
    <div class="row gy-40">
        @foreach ($gatewayList as $gateways)
        <div class="col-xxl-12">
            <div class="swiper @if($loop->even) rock-payment-slider @else rock-payment-slider-two @endif">
            <div class="swiper-wrapper">
                @foreach ($gateways as $gateway => $logo)
                <div class="swiper-slide">
                    <div class="rock-payment-thumb">
                        <img src="{{ asset($logo) }}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
<!-- Payment accept section end -->
