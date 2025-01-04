@php
$landingContent = \App\Models\LandingContent::where('type','howitworks')->where('locale',app()->getLocale())->get();
@endphp

<!-- How it works section start -->
<section class="rock-how-it-works-section section-space-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 ciol-xl-6 col-lg-8">
                <div class="section-title-wrapper-four text-center section-title-space">
                    <span class="subtitle-four">{{ $data['title_small'] }}</span>
                    <h2 class="section-title-four">
                        {{ $data['title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="rock-how-it-main">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="rock-how-it-works-grid">
                        @foreach($landingContent as $content)
                        <div class="rock-how-it-works-item">
                            <div class="icon">
                                <span>
                                    <img src="{{ asset($content->icon) }}" alt="works icon">
                                </span>
                            </div>
                            <div class="content">
                                <h3 class="title">{{ $content->title }}</h3>
                                <p class="description">
                                    {{ $content->description }}
                                </p>
                            </div>
                            <div class="line"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How it works section end -->
