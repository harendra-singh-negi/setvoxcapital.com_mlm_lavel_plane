@php
$footerContent =
json_decode(\App\Models\LandingPage::where('locale',app()->getLocale())->where('status',true)->where('code','footer')->first()->data,true);
@endphp

<!-- Footer area start -->
<footer>
    <div class="footer-section rock-footer p-relative z-11 section-space-top">
        <div class="footer-pattern"
            data-background="{{ asset('frontend/theme_base/hardrock/images/bg/footer-pattern.png') }}">
        </div>
        <div class="container">
            <div class="footer-intro-area">
                <div class="footer-intro-main">
                    <div class="footer-intro-log">
                        <img src="{{ asset($footerContent['right_img']) }}" alt="logo not found">
                    </div>
                    <div class="footer-intro-content">
                        <h4 class="text-white mb-2">{{ $footerContent['widget_left_title'] }}</h4>
                        <p class="description">
                            {{ $footerContent['widget_left_description'] }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="footer-main">
                @foreach($navigations as $navigation)
                <div class="footer-widget">
                    <div class="footer-wg-title">
                        <h5>{{ $footerContent['widget_title_'.$loop->iteration] ?? '' }}</h5>
                    </div>
                    <div class="footer-links">
                        <ul>
                            @foreach($navigation as $menu)
                            @if($menu->page->status|| $menu->page_id == null)
                            <li>
                                <a href="{{ url($menu->url) }}">{{ $menu->tname }}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="footer-widget">
                    <div class="footer-social-content">
                       <div class="footer-social">
                            @foreach(\App\Models\Social::all() as $social)
                            <a href="{{ url($social->url) }}">
                                <i class="{{ $social->class_name }}"></i>
                            </a>
                            @endforeach
                       </div>
                    </div>
                 </div>
            </div>
            <div class="rock-footer-bottom">
                <div class="rock-footer-copyright">
                    <p class="description">{{ $footerContent['copyright_text'] }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer area end -->
