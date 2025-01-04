<!-- Side Socials -->
<div class="side-socials-fixed">
    @foreach($socials as $social)
    <a href="{{ url($social->url) }}" class="{{ Str::lower($social->icon_name) }}"><i
            class="{{ $social->class_name }}"></i></a>
    @endforeach
</div>

<section class="banner-area banner-style-four p-relative o-x-clip">
    <div class="container">
        <div class="row p-relative gy-50 align-items-center">
            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-8">
                <div class="banner-content p-relative">
                    <h1 class="banner-title">{{ $data['hero_title'] }}</h1>
                    <p class="description">
                        {{ $data['hero_content'] }}
                    </p>
                    <div class="btn-wrap">
                        <a class="site-btn secondary-btn btn-xxs" href="{{ $data['hero_button1_url'] }}">
                            <span>
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M2 4H0V13L4.31083 15.1554C5.42168 15.7108 6.64658 16 7.88854 16H16C17.1046 16 18 15.1046 18 14C18 12.8954 17.1046 12 16 12H14.4164C13.4849 12 12.5663 11.7831 11.7331 11.3666L8.792 9.896C8.9843 9.7189 9.14317 9.49927 9.25282 9.24342C9.66638 8.27844 9.22409 7.16054 8.26225 6.73973L2 4Z"
                                        fill="white" />
                                    <circle cx="16" cy="4" r="4" fill="white" />
                                </svg>
                            </span> {{ $data['hero_button1_level'] }}
                        </a>

                        <a class="site-btn secondary-btn outline-btn btn-xxs" href="{{ $data['hero_button2_url'] }}">
                            <span>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                        fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                        fill="white" />
                                </svg>
                            </span>
                            {{ $data['hero_button2_lavel'] }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-4">
                <div class="banner-thumb-wrapper">
                    <div class="banner-thumb">
                        <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/banner-thumb.png') }}" alt="banner thumb">
                    </div>
                    <div class="banner-cercle">
                        <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/round-cercle.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="banner-dot">
                <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/banner-dot.png') }}" alt="banner-dot">
            </div>
        </div>
    </div>
    <div class="banner-four-shapes">
        <div class="shape-one">
            <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/shape-01.png') }}" alt="banner-shape">
        </div>
        <div class="shape-two">
            <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/shape-02.png') }}" alt="banner-shape">
        </div>
        <span class="round-one">
            <img src="{{ asset('frontend/theme_base/hardrock/images/banner/banner-four/banner-glow.png') }}" alt="banner-glow">
        </span>
    </div>
</section>
