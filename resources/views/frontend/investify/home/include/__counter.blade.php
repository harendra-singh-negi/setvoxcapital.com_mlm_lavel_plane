@php
    $landingContent =\App\Models\LandingContent::where('type','counter')->where('locale',app()->getLocale())->get();
@endphp

<section class="rock-fun-fact-area o-x-clip">
    <div class="container p-relative">
        <div class="row align-items-center">
            <div class="col-xxl-12">
                <div class="fun-fact-counter-grid">
                    @foreach($landingContent as $content)
                    <div class="single-counter-item">
                        <div class="icon">
                            <img src="{{ asset($content->icon) }}" alt="counter icon">
                        </div>
                        <div class="content">
                            <p class="description">{{ $content->title }}</p>
                            <h6 class="title"><span class="odometer" data-count="{{ $content->description }}"></span></h6>
                        </div>
                    </div>
                    @endforeach

                    <div class="fun-fact-bg" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/fun-fact-glow.png') }}"></div>
                </div>
            </div>
        </div>
        <div class="rock-fun-fact-shapes">
            <div class="shape-one">
                <img src="{{ asset('frontend/theme_base/hardrock/images/fun-fact/01.png') }}" alt="">
            </div>
            <div class="shape-two">
                <img src="{{ asset('frontend/theme_base/hardrock/images/fun-fact/02.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
