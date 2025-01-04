<div id="dashboard-sticky" class="rock-page-header">
<div class="rock-dashboard-header">
<div class="header-left-content">
<!-- Show desktop-screen content -->
<div class="rock-desktop-screen-show">
<div class="content-inner">
<button class="toggle-sidebar">
<span class="bar-icon">
<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
xmlns="http://www.w3.org/2000/svg">
<path opacity="0.4"
    d="M27.3327 13.9998C27.3327 21.3636 21.3631 27.3332 13.9993 27.3332C6.63555 27.3332 0.666016 21.3636 0.666016 13.9998C0.666016 6.63604 6.63555 0.666504 13.9993 0.666504C21.3631 0.666504 27.3327 6.63604 27.3327 13.9998Z"
    fill="white" />
<path fill-rule="evenodd" clip-rule="evenodd"
    d="M18.6 7.86656C19.0418 8.19793 19.1314 8.82473 18.8 9.26656L16 12.9999C15.5556 13.5925 15.5556 14.4073 16 14.9999L18.8 18.7332C19.1314 19.1751 19.0418 19.8019 18.6 20.1332C18.1582 20.4646 17.5314 20.3751 17.2 19.9332L14.4 16.1999C13.4222 14.8962 13.4222 13.1036 14.4 11.7999L17.2 8.06656C17.5314 7.62473 18.1582 7.53519 18.6 7.86656Z"
    fill="white" />
<path fill-rule="evenodd" clip-rule="evenodd"
    d="M11.9333 7.86656C12.3752 8.19793 12.4647 8.82473 12.1333 9.26656L9.33333 12.9999C8.88889 13.5925 8.88889 14.4073 9.33333 14.9999L12.1333 18.7332C12.4647 19.1751 12.3752 19.8019 11.9333 20.1332C11.4915 20.4646 10.8647 20.3751 10.5333 19.9332L7.73333 16.1999C6.75556 14.8962 6.75556 13.1036 7.73333 11.7999L10.5333 8.06656C10.8647 7.62473 11.4915 7.53519 11.9333 7.86656Z"
    fill="white" />
</svg>
</span>
</button>
<div class="current-status">
<h4 class="title">@yield('title')</h4>
</div>
</div>
</div>
<!-- Show mobile-screen content -->
<div class="rock-mobile-screen-show">
<div class="rock-sidebar-logo">
<a href="{{ route('home') }}">
<img src="{{ asset(setting('site_logo','global')) }}" alt="logo">
</a>
</div>
</div>
</div>
@php
$userId = auth()->id();
$notifications = App\Models\Notification::where('for','user')->where('user_id',$userId)->latest()->take(10)->get();
$totalCount = App\Models\Notification::where('for','user')->where('user_id', $userId)->count();
@endphp
<div class="header-right-content">
<div class="user-action">
<ul>
<li>
<div class="notifications-box">
<div class="dropdown">
<button class="notifications-drop-btn dropdown-toggle" type="button">
    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M8 18C9.38503 18 10.5633 17.1652 11 16H5C5.43668 17.1652 6.61497 18 8 18Z"
            fill="white" />
        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
            d="M9.6896 0.754028C9.27403 0.291157 8.67102 0 8 0C6.74634 0 5.73005 1.01629 5.73005 2.26995V2.37366C3.58766 3.10719 2.0016 4.85063 1.76046 6.97519L1.31328 10.9153C1.23274 11.6249 0.933441 12.3016 0.447786 12.8721C-0.649243 14.1609 0.394434 16 2.22281 16H13.7772C15.6056 16 16.6492 14.1609 15.5522 12.8721C15.0666 12.3016 14.7673 11.6249 14.6867 10.9153L14.2395 6.97519C14.2333 6.92024 14.2262 6.86556 14.2181 6.81113C13.8341 6.93379 13.4248 7 13 7C10.7909 7 9 5.20914 9 3C9 2.16744 9.25436 1.3943 9.6896 0.754028Z"
            fill="white" />
        <circle cx="13" cy="3" r="3" fill="white" />
    </svg>
</button>
<div class="dropdown-menu">
    <div class="notifications-top-content">
        <h4 class="title">{{ __('Notifications') }}</h4>
    </div>
    <div class="notifications-info-wrapper">
        <div class="notifications-info-list">
            <ul>
                @forelse ($notifications as $notification)
                <li>
                    <a class="list-item"
                        href="{{ route($notification->for.'.read-notification', $notification->id) }}">
                        <div class="icon">
                            <svg width="16" height="18" viewBox="0 0 16 18"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 18C9.38503 18 10.5633 17.1652 11 16H5C5.43668 17.1652 6.61497 18 8 18Z"
                                    fill="white" />
                                <path opacity="0.4" fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M9.6896 0.754028C9.27403 0.291157 8.67102 0 8 0C6.74634 0 5.73005 1.01629 5.73005 2.26995V2.37366C3.58766 3.10719 2.0016 4.85063 1.76046 6.97519L1.31328 10.9153C1.23274 11.6249 0.933441 12.3016 0.447786 12.8721C-0.649243 14.1609 0.394434 16 2.22281 16H13.7772C15.6056 16 16.6492 14.1609 15.5522 12.8721C15.0666 12.3016 14.7673 11.6249 14.6867 10.9153L14.2395 6.97519C14.2333 6.92024 14.2262 6.86556 14.2181 6.81113C13.8341 6.93379 13.4248 7 13 7C10.7909 7 9 5.20914 9 3C9 2.16744 9.25436 1.3943 9.6896 0.754028Z"
                                    fill="white" />
                                <circle cx="13" cy="3" r="3" fill="white" />
                            </svg>
                        </div>
                        <div class="content">
                            <h5 class="title">
                                {{ $notification->notice }}
                            </h5>
                            <span
                                class="info">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                </li>
                @empty
                <li>
                    <a href="#" class="list-item text-center">
                        <div class="content">
                            <h5 class="title">{{ __('No Notification Found!') }}</h5>
                        </div>
                    </a>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
    @if($totalCount > 0)
    <div class="notifications-bottom-content">
        <a class="notifications-btn"
            href="{{ route('user.notification.all') }}"><span>{{ __('See All Notification') }}</span></a>
    </div>
    @endif
</div>
</div>
</div>
</li>
<li>
<div class="language-box">
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
</div>
</li>
</ul>
</div>
<div class="user-profile">
<div class="user-profile-drop">
<div class="user-profile-drop">
<div class="dropdown">
<button class="user-head-drop-btn dropdown-toggle" type="button"
data-bs-toggle="dropdown" aria-expanded="false">
<img src="{{ asset(auth()->user()->avatar) }}" alt="img not found">
</button>
<div class="dropdown-menu">
<div class="dropdown-info-list">
    <ul>
        <li>
            <a href="{{ route('user.setting.show') }}">
                <div class="content">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M12.9545 3H11.0455C9.99109 3 9.13635 3.80589 9.13635 4.8C9.13635 5.93761 7.91917 6.66087 6.92 6.11697L6.81852 6.06172C5.90541 5.56467 4.73782 5.85964 4.21064 6.72057L3.25609 8.27942C2.72891 9.14034 3.04176 10.2412 3.95487 10.7383C4.95451 11.2824 4.95451 12.7176 3.95487 13.2617C3.04176 13.7588 2.72891 14.8597 3.25609 15.7206L4.21064 17.2794C4.73782 18.1404 5.90541 18.4353 6.81851 17.9383L6.92 17.883C7.91917 17.3391 9.13635 18.0624 9.13635 19.2C9.13635 20.1941 9.99109 21 11.0455 21H12.9545C14.0089 21 14.8636 20.1941 14.8636 19.2C14.8636 18.0624 16.0808 17.3391 17.08 17.883L17.1815 17.9383C18.0946 18.4353 19.2622 18.1403 19.7894 17.2794L20.7439 15.7206C21.2711 14.8596 20.9582 13.7588 20.0451 13.2617C19.0455 12.7176 19.0455 11.2824 20.0451 10.7383C20.9582 10.2412 21.2711 9.14036 20.7439 8.27943L19.7894 6.72058C19.2622 5.85966 18.0946 5.56468 17.1815 6.06174L17.08 6.11698C16.0808 6.66088 14.8636 5.93762 14.8636 4.8C14.8636 3.80589 14.0089 3 12.9545 3Z"
                                fill="white" />
                            <circle cx="12" cy="12" r="3" fill="white" />
                        </svg>
                    </div>
                    <div class="info">
                        <span>{{ __('Settings') }}</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.change.password') }}">
                <div class="content">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.75 6C8.75 4.20507 10.2051 2.75 12 2.75C13.7949 2.75 15.25 4.20507 15.25 6V8H16C16.2563 8 16.5071 8.02411 16.75 8.0702V6C16.75 3.37665 14.6234 1.25 12 1.25C9.37665 1.25 7.25 3.37665 7.25 6V8.0702C7.49294 8.02411 7.74365 8 8 8H8.75V6Z"
                                fill="white" />
                            <path opacity="0.4"
                                d="M4 12C4 9.79086 5.79086 8 8 8H16C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12Z"
                                fill="white" />
                            <circle cx="12" cy="15" r="2" fill="white" />
                        </svg>
                    </div>
                    <div class="info">
                        <span>{{ __('Change Password') }}</span>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('user.ticket.index') }}">
                <div class="content">
                    <div class="icon">
                        <svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.7188 16.5899L13.6905 21.243C14.1205 21.9163 15.0042 22.132 15.696 21.7326C16.4363 21.3052 16.6675 20.3448 16.2029 19.6273L13.7755 15.8789L10.7188 16.5899Z"
                                fill="white" />
                            <path opacity="0.4"
                                d="M12.5144 3.98319C13.4304 2.99743 15.0388 3.17923 15.7116 4.34456L20.0037 11.7787C20.6765 12.944 20.0297 14.4279 18.7181 14.7282L7.80074 17.2675L4.80074 12.0713L12.5144 3.98319Z"
                                fill="white" />
                            <path
                                d="M7.84766 16.7268L5.34766 12.3967C4.93344 11.6793 4.01606 11.4334 3.29862 11.8477C2.58118 12.2619 2.33537 13.1793 2.74958 13.8967L5.24958 18.2268C5.66379 18.9443 6.58118 19.1901 7.29862 18.7759C8.01606 18.3616 8.26187 17.4443 7.84766 16.7268Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.0143 2.73953C20.4144 2.84673 20.6519 3.25799 20.5447 3.65809L20.1787 5.02411C20.0714 5.42421 19.6602 5.66165 19.2601 5.55444C18.86 5.44724 18.6226 5.03598 18.7298 4.63588L19.0958 3.26986C19.203 2.86976 19.6142 2.63232 20.0143 2.73953Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.7298 8.09994C20.837 7.69984 21.2482 7.4624 21.6483 7.56961L23.0143 7.93563C23.4144 8.04284 23.6519 8.45409 23.5447 8.85419C23.4375 9.25429 23.0262 9.49173 22.6261 9.38452L21.2601 9.01849C20.86 8.91129 20.6226 8.50004 20.7298 8.09994Z"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="info">
                        <span>{{ __('Support Tickets') }}</span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>
<div class="user-logout">
    <a class="user-logout-btn" href="#"
        onclick="event.preventDefault(); localStorage.clear();  $('#logout-form').submit();">
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4"
                d="M7.5 3H11.5C13.7091 3 15.5 4.79086 15.5 7V17C15.5 19.2091 13.7091 21 11.5 21H7.5C5.29086 21 3.5 19.2091 3.5 17V7C3.5 4.79086 5.29086 3 7.5 3Z"
                fill="#F81717" />
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M17.9697 8.46967C18.2626 8.17678 18.7374 8.17678 19.0303 8.46967L22.0303 11.4697C22.3232 11.7626 22.3232 12.2374 22.0303 12.5303L19.0303 15.5303C18.7374 15.8232 18.2626 15.8232 17.9697 15.5303C17.6768 15.2374 17.6768 14.7626 17.9697 14.4697L19.6893 12.75H9.5C9.08579 12.75 8.75 12.4142 8.75 12C8.75 11.5858 9.08579 11.25 9.5 11.25H19.6893L17.9697 9.53033C17.6768 9.23744 17.6768 8.76256 17.9697 8.46967Z"
                fill="#F81717" />
        </svg>
        <span>Logout</span>
    </a>
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
