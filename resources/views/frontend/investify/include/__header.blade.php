@if(setting('back_to_top','permission'))
<!-- Backtotop start -->
<div class="backtotop-wrap rock cursor-pointer">
<svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
</svg>
</div>
<!-- Backtotop end -->
@endif

<!-- Offcanvas area start -->
<div class="fix">
    <div class="offcanvas-area">
       <div class="offcanva-wrapper">
          <div class="offcanvas-content">
             <div class="offcanvas-top d-flex justify-content-between align-items-center">
                <div class="offcanvas-logo">
                   <a href="{{ route('home') }}">
                    <img src="{{ asset(setting('site_logo','global')) }}" alt="logo not found">
                   </a>
                </div>
                <div class="offcanvas-close">
                   <button class="offcanvas-close-icon animation--flip">
                   <span class="offcanvas-m-lines">
                   <span class="offcanvas-m-line line--1"></span><span
                      class="offcanvas-m-line line--2"></span><span
                      class="offcanvas-m-line line--3"></span>
                   </span>
                   </button>
                </div>
             </div>
             <div class="mobile-menu fix"></div>
             <div class="offcanvas-content">
                @if($socials->count() > 0)
                <div class="social-share mb-20">
                   <a class="quick-share-btn" href="#">
                      <span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <g opacity="0.4">
                         <path d="M2.41375 8.99722L15.2376 3.45504C15.8407 3.19441 16.4941 3.70157 16.3913 4.35043L14.6379 15.4138C14.5296 16.0971 13.6839 16.3585 13.2089 15.8554L10.3315 12.8074C9.76719 12.2097 9.72297 11.2898 10.2273 10.6407L12.259 8.02594C12.3751 7.87646 12.1917 7.67982 12.0345 7.78527L7.99509 10.4951C7.30961 10.955 6.47788 11.1441 5.66095 11.026L2.62506 10.5869C1.79341 10.4666 1.6424 9.33058 2.41375 8.99722Z" fill="white"/>
                         </g>
                         <path fill-rule="evenodd" clip-rule="evenodd" d="M16.1759 3.64939L12.2076 7.77699C12.1581 7.74877 12.0944 7.74509 12.0345 7.78527L7.99509 10.4951C7.30961 10.955 6.47788 11.1441 5.66095 11.026L2.62506 10.5869C1.79341 10.4666 1.6424 9.33058 2.41375 8.99722L15.2376 3.45504C15.5851 3.30488 15.9492 3.40958 16.1759 3.64939Z" fill="white"/>
                         </svg>
                      </span>
                      <span class="text">{{ $socials->last()->icon_name }}</span>
                   </a>
                </div>
                @endif
                <div class="offcanvas-btn mb-3">
                   @auth('web')
                   <a class="site-btn secondary-btn btn-xxs" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                   @else
                   <a class="site-btn secondary-btn outline-btn btn-xxs" href="{{ route('login') }}">{{ __('Login') }}</a>
                   <a class="site-btn secondary-btn btn-xxs" href="{{ route('register') }}">{{ __('Register') }}</a>
                   @endauth
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="offcanvas-overlay"></div>
 <div class="offcanvas-overlay-white"></div>
 <!-- Offcanvas area start -->

<!-- Header area start -->
<header>
    <!-- header section start -->
    <div class="header-area header-transparent header-style-four" id="header-sticky">
        <div class="header-inner">
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset(setting('site_logo','global')) }}" alt="Logo not found">
                </a>
            </div>
            <div class="header-menu d-none d-lg-inline-flex justify-content-center">
                <nav class="td-main-menu" id="mobile-menu">
                <ul>
                    @foreach($navigations as $navigation)
                        @if($navigation->page->status|| $navigation->page_id == null)
                            <li class="@if(url($navigation->url) == Request::url() ) active @endif">
                                <a href="{{ url($navigation->url) }}">{{ $navigation->tname }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-action">
                <div class="header-action-inner">
                    @if($socials->count() > 0)
                    <div class="social-share d-none d-sm-inline-flex">
                        <a class="quick-share-btn" href="{{ url($socials->first()->url) }}">
                            <span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path
                                            d="M2.41375 8.99722L15.2376 3.45504C15.8407 3.19441 16.4941 3.70157 16.3913 4.35043L14.6379 15.4138C14.5296 16.0971 13.6839 16.3585 13.2089 15.8554L10.3315 12.8074C9.76719 12.2097 9.72297 11.2898 10.2273 10.6407L12.259 8.02594C12.3751 7.87646 12.1917 7.67982 12.0345 7.78527L7.99509 10.4951C7.30961 10.955 6.47788 11.1441 5.66095 11.026L2.62506 10.5869C1.79341 10.4666 1.6424 9.33058 2.41375 8.99722Z"
                                            fill="white" />
                                    </g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.1759 3.64939L12.2076 7.77699C12.1581 7.74877 12.0944 7.74509 12.0345 7.78527L7.99509 10.4951C7.30961 10.955 6.47788 11.1441 5.66095 11.026L2.62506 10.5869C1.79341 10.4666 1.6424 9.33058 2.41375 8.99722L15.2376 3.45504C15.5851 3.30488 15.9492 3.40958 16.1759 3.64939Z"
                                        fill="white" />
                                </svg>
                            </span>
                            <span class="text">{{ $socials->last()->icon_name }}</span>
                        </a>
                    </div>
                    @endif

                    <div class="header-lang-item header-lang">
                        <span class="header-lang-toggle" id="header-lang-toggle">
                            {{ localeName() }}
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.25 7.5L9 10.5L12.75 7.5" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        <ul id="language-list">
                            @foreach(\App\Models\Language::where('status',true)->get() as $lang)
                            <li>
                                <a href="{{ route('language-update',['name'=> $lang->locale]) }}"
                                    data-lang="{{ $lang->name }}"
                                    class="{{ App::currentLocale() == $lang->locale ? 'active' : '' }}">{{ $lang->name }}
                                    <span class="icon">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.91797 7.58398L4.97505 9.22965C5.45765 9.61573 6.1576 9.55847 6.57104 9.09909L11.0846 4.08398"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="header-btn-wrap d-none d-md-inline-flex">
                        @auth('web')
                        <a class="site-btn secondary-btn btn-xxs" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                        @else
                        <a class="site-btn secondary-btn outline-btn btn-xxs" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="site-btn secondary-btn btn-xxs" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endauth
                    </div>
                </div>
                <div class="header-hamburger d-lg-none">
                    <a class="sidebar-toggle" href="javascript:void(0)">
                        <span class="menu-icon"><span></span></span>
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
</header>
<!-- Header area end -->
