@php
$landingContent =\App\Models\LandingContent::where('type','whychooseus')->where('locale',app()->getLocale())->get();
@endphp

<section class="rock-why-choose-section section-space-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 ciol-xl-6 col-lg-6">
                <div class="section-title-wrapper-four text-center section-title-space">
                    <span class="subtitle-four">{{ $data['title_small'] }}</span>
                    <h2 class="section-title-four">{{ $data['title_big'] }}</span>
                    </h2>
                </div>
            </div>
            <div class="rock-why-choose-grid">
                @foreach($landingContent as $content)
                <div class="rock-why-choose-item">
                    <div class="icon theme-bg-dark">
                        <span>
                            @if(content_exists($content->icon))
                            <img src="{{ asset($content->icon) }}">
                            @else
                            {{$content->icon}}
                            @endif
                        </span>
                    </div>
                    <div class="content">
                        <h3 class="title">{{ $content->title }}</h3>
                        <p class="description">
                            {{ $content->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
