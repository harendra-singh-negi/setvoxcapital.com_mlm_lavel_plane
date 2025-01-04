@php
$landingContent =\App\Models\LandingContent::where('type','faq')->where('locale',app()->getLocale())->get();
@endphp

<!-- FAQ section start -->
<section class="rock-faq-section section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 ciol-xl-8 col-lg-8">
                <div class="section-title-wrapper-four text-center">
                    <span class="subtitle-four">{{ $data['title_small'] }}</span>
                    <h2 class="section-title-four mb-30">
                        {{ $data['title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xxl-7 col-xl-8 col-lg-8">
                <div class="accordion-wrapper site-faq">
                    <div class="accordion" id="faq">
                        @foreach($landingContent as $key => $content)
                        <div class="accordion-item">
                            <h6 class="accordion-header" id="heading{{ $key }}">
                                <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 0.25C7.41421 0.25 7.75 0.585786 7.75 1V13C7.75 13.4142 7.41421 13.75 7 13.75C6.58579 13.75 6.25 13.4142 6.25 13V1C6.25 0.585786 6.58579 0.25 7 0.25Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M13.75 7C13.75 7.41421 13.4142 7.75 13 7.75L1 7.75C0.585786 7.75 0.25 7.41421 0.25 7C0.25 6.58579 0.585786 6.25 1 6.25L13 6.25C13.4142 6.25 13.75 6.58579 13.75 7Z"
                                                fill="white" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.7728 2.22711C12.0657 2.52 12.0657 2.99487 11.7728 3.28777L3.28748 11.773C2.99459 12.0659 2.51971 12.0659 2.22682 11.773C1.93393 11.4802 1.93393 11.0053 2.22682 10.7124L10.7121 2.22711C11.005 1.93421 11.4799 1.93421 11.7728 2.22711Z"
                                                fill="white" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.7726 11.773C11.4798 12.0659 11.0049 12.0659 10.712 11.773L2.22671 3.28772C1.93381 2.99483 1.93381 2.51996 2.22671 2.22706C2.5196 1.93417 2.99447 1.93417 3.28737 2.22706L11.7726 10.7123C12.0655 11.0052 12.0655 11.4801 11.7726 11.773Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    {{ $content->title }}
                                </button>
                            </h6>
                            <div id="collapse{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}"
                                data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <p>
                                        {!! nl2br(e($content->description)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ section end -->
