<!-- Newsletter section start -->
<section class="rock-newsletter-section o-x-clip">
<div class="container p-relative">
    <div class="rock-newsletter-wrapper" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/news-latter-bg.png') }}">
        <div class="rock-newsletter-content">
            <div class="rock-newsletter-content">
            <div class="newsletter-form">
                <form action="{{ route('subscriber') }}" method="POST">
                @csrf
                    <div class="single-input">
                        <div class="input-field">
                        <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <button class="site-btn secondary-btn btn-xxs" type="submit">
                        <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0.25C9.41421 0.25 9.75 0.585786 9.75 1V3H8.25V1C8.25 0.585786 8.58579 0.25 9 0.25ZM13 0.25C13.4142 0.25 13.75 0.585786 13.75 1V3H12.25V1C12.25 0.585786 12.5858 0.25 13 0.25ZM0.25 9C0.25 8.58579 0.585786 8.25 1 8.25H3V9.75H1C0.585786 9.75 0.25 9.41421 0.25 9ZM19 8.25H21C21.4142 8.25 21.75 8.58579 21.75 9C21.75 9.41421 21.4142 9.75 21 9.75H19V8.25ZM0.25 13C0.25 12.5858 0.585786 12.25 1 12.25H3V13.75H1C0.585786 13.75 0.25 13.4142 0.25 13ZM19 12.25H21C21.4142 12.25 21.75 12.5858 21.75 13C21.75 13.4142 21.4142 13.75 21 13.75H19V12.25ZM9.75 19V21C9.75 21.4142 9.41421 21.75 9 21.75C8.58579 21.75 8.25 21.4142 8.25 21V19H9.75ZM13.75 19V21C13.75 21.4142 13.4142 21.75 13 21.75C12.5858 21.75 12.25 21.4142 12.25 21V19H13.75Z"
                                fill="white" />
                            <path opacity="0.4"
                                d="M3 7C3 4.79086 4.79086 3 7 3H15C17.2091 3 19 4.79086 19 7V15C19 17.2091 17.2091 19 15 19H7C4.79086 19 3 17.2091 3 15V7Z"
                                fill="white" />
                            <rect x="8" y="8" width="6" height="6" rx="2" fill="white" />
                        </svg>
                        </span> {{ __('Subscribe') }}
                    </button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="rock-newsletter-shapes">
        <div class="shape-one">
            <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/newsletter-shape-01.png') }}" alt="newsletter-shape">
        </div>
        <div class="shape-two">
            <img src="{{ asset('frontend/theme_base/hardrock/images/rock-shapes/newsletter-shape-02.png') }}" alt="newsletter-shape">
        </div>
    </div>
</div>
</section>
<!-- Newsletter section end -->
