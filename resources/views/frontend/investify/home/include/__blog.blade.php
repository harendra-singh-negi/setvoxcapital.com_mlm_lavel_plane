<!-- Blog area start -->
<div class="rock-blog-area position-relative fix section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-8 ciol-xl-6 col-lg-6">
                <div class="section-title-wrapper-four text-center mb-80">
                    <span class="subtitle-four">{{ $data['blog_title_small'] }}</span>
                    <h2 class="section-title-four mb-30">
                        {{ $data['blog_title_big'] }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="blog-main-wrapper p-relative">
            <div class="swiper rock-blog-active">
                <div class="swiper-wrapper">
                    @foreach(\App\Models\Blog::where('locale',app()->getLocale())->latest()->take(3)->get() as $blog)
                    <div class="swiper-slide">
                        <article class="rock-blog-grid-item">
                            <div class="blog-thumb">
                                <a href="{{ route('blog-details',$blog->id) }}">
                                    <img src="{{ asset($blog->cover) }}" alt="blog img not found">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-date">
                                    <span>{{ $blog->created_at }}</span>
                                </div>
                                <h3 class="blog-title">
                                    <a href="{{ route('blog-details',$blog->id) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h3>
                                <p class="description">
                                    {!! Str::limit($blog->details,100) !!}
                                </p>
                                <div class="blog-link">
                                    <a class="text-btn" href="{{ route('blog-details',$blog->id) }}">
                                        {{ __('Continue Reading') }}
                                        <span>
                                            <svg width="21" height="16"
                                                viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M21 8C21 12.4183 17.4183 16 13 16C8.58172 16 5 12.4183 5 8C5 3.58172 8.58172 0 13 0C17.4183 0 21 3.58172 21 8Z"
                                                    fill="white" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.4697 3.46967C10.7626 3.17678 11.2374 3.17678 11.5303 3.46967L15.5303 7.46963C15.671 7.61028 15.75 7.80105 15.75 7.99996C15.75 8.19887 15.671 8.38964 15.5303 8.53029L11.5303 12.5303C11.2374 12.8232 10.7626 12.8232 10.4697 12.5303C10.1768 12.2374 10.1768 11.7626 10.4697 11.4697L13.1894 8.74996H1C0.585786 8.74996 0.25 8.41418 0.25 7.99996C0.25 7.58575 0.585786 7.24996 1 7.24996H13.1893L10.4697 4.53033C10.1768 4.23744 10.1768 3.76257 10.4697 3.46967Z"
                                                    fill="white" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <div class="blog-slider-navigation">
                <button class="blog-slider-btn blog-slider-prev">
                    <img src="{{ asset('frontend/theme_base/hardrock//images/icons/arrow-right.svg') }}" alt="arrow">
                </button>
                <button class="blog-slider-btn blog-slider-next">
                    <img src="{{ asset('frontend/theme_base/hardrock//images/icons/arrow-left.svg') }}" alt="arrow">
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Blog area start -->
