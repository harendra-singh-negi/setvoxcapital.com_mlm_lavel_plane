<script src="{{ asset('global/js/jquery.min.js') }}"></script>
<script src="{{ asset('global/js/jquery-migrate.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/sidebar.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/datepicker-full.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/meanmenu.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/odometer.min.js') }}"></script>
<script src="{{ asset('frontend/theme_base/hardrock/js/main.js') }}"></script>
<script src="{{ asset('global/js/simple-notify.min.js') }}"></script>

<script src="{{ asset('frontend/js/cookie.js') }}"></script>
<script src="{{ asset('global/js/custom.js') }}"></script>
@include('global.__t_notify')
@if(auth()->check())
    <script src="{{ asset('global/js/pusher.min.js') }}"></script>
    @include('global.__notification_script',['for'=>'user','userId' => auth()->user()->id])
@endif

@notifyJs

@yield('script')
@stack('script')

@php
    $googleAnalytics = plugin_active('Google Analytics');
    $tawkChat = plugin_active('Tawk Chat');
    $fb = plugin_active('Facebook Messenger');
@endphp

@if($googleAnalytics)
    @include('frontend::plugin.google_analytics',['GoogleAnalyticsId' => json_decode($googleAnalytics?->data,true)['app_id']])
@endif
@if($tawkChat)
    @include('frontend::plugin.tawk',['data' => json_decode($tawkChat->data, true)])
@endif
@if($fb)
    @include('frontend::plugin.fb',['data' => json_decode($fb->data, true)])
@endif



