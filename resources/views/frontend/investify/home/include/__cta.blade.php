<!-- join member section start -->
<section class="rock-join-members-section">
    <div class="container">
        <div class="join-members-main" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/join-members-bg.png') }}">
            <div class="row justify-content-center">
                <div class="col-xxl-8 ciol-xl-8 col-lg-10">
                    <div class="section-title-wrapper-four text-center">
                        <h2 class="section-title-four mb-30">
                            {{ $data['cta_title'] }}
                        </h2>
                    </div>
                    <div class="btn-wrap justify-content-center">
                        <a class="site-btn secondary-btn btn-xxs" href="{{ $data['cta_button1_url'] }}" target="{{ $data['cta_button1_target'] }}">
                            <span>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 0.25C9.41421 0.25 9.75 0.585786 9.75 1V3H8.25V1C8.25 0.585786 8.58579 0.25 9 0.25ZM13 0.25C13.4142 0.25 13.75 0.585786 13.75 1V3H12.25V1C12.25 0.585786 12.5858 0.25 13 0.25ZM0.25 9C0.25 8.58579 0.585786 8.25 1 8.25H3V9.75H1C0.585786 9.75 0.25 9.41421 0.25 9ZM19 8.25H21C21.4142 8.25 21.75 8.58579 21.75 9C21.75 9.41421 21.4142 9.75 21 9.75H19V8.25ZM0.25 13C0.25 12.5858 0.585786 12.25 1 12.25H3V13.75H1C0.585786 13.75 0.25 13.4142 0.25 13ZM19 12.25H21C21.4142 12.25 21.75 12.5858 21.75 13C21.75 13.4142 21.4142 13.75 21 13.75H19V12.25ZM9.75 19V21C9.75 21.4142 9.41421 21.75 9 21.75C8.58579 21.75 8.25 21.4142 8.25 21V19H9.75ZM13.75 19V21C13.75 21.4142 13.4142 21.75 13 21.75C12.5858 21.75 12.25 21.4142 12.25 21V19H13.75Z"
                                        fill="white" />
                                    <path opacity="0.4"
                                        d="M3 7C3 4.79086 4.79086 3 7 3H15C17.2091 3 19 4.79086 19 7V15C19 17.2091 17.2091 19 15 19H7C4.79086 19 3 17.2091 3 15V7Z"
                                        fill="white" />
                                    <rect x="8" y="8" width="6" height="6" rx="2" fill="white" />
                                </svg>
                            </span>
                            {{ $data['cta_button1_level'] }}
                        </a>
                        <a class="site-btn secondary-btn outline-btn btn-xxs" href="{{ $data['cta_button2_url'] }}" target="{{ $data['cta_button2_target'] }}">
                            <span>
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M11 0H9C4.02944 0 0 4.02944 0 9V14C0 16.2091 1.79086 18 4 18H11C15.9706 18 20 13.9706 20 9C20 4.02944 15.9706 0 11 0Z"
                                        fill="white" />
                                    <path
                                        d="M10.2656 6.91685L10.0005 7.18202L9.73529 6.91685C9.00306 6.18462 7.81587 6.18462 7.08364 6.91685C6.3514 7.64908 6.3514 8.83627 7.08364 9.5685L8.93979 11.4247C9.52558 12.0104 10.4753 12.0104 11.0611 11.4247L12.9173 9.5685C13.6495 8.83627 13.6495 7.64908 12.9173 6.91685C12.185 6.18462 10.9979 6.18462 10.2656 6.91685Z"
                                        fill="white" />
                                </svg>
                            </span>
                            {{ $data['cta_button2_lavel'] }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- join member section end -->
