@extends('frontend::layouts.user')
@section('title')
{{ __('All Notifications') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-all-notifications-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content">
                            <h3 class="rock-dashboard-tile">{{ __('All Notifications') }}</h3>
                        </div>
                    </div>
                    <div class="all-notifications-wrapper">
                        <div class="rock-all-notifications-table">
                            <div class="rock-custom-table">
                                <div class="contents">
                                    @foreach($notifications as $notification)
                                    <div class="site-table-list">
                                        <div class="site-table-col">
                                            <div class="description">
                                                <div class="iocn">
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
                                                </div>
                                                <div class="content">
                                                    <h4 class="title white-text"><a href="{{ route('user.read-notification', $notification->id) }}">{{ $notification->notice }}</a></h4>
                                                    <p class="description">{{ $notification->created_at->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="site-table-col">
                                            <div class="action-btn-wrap">
                                                <a class="site-btn gradient-btn btn-xxxs" href="{{ route('user.read-notification', $notification->id) }}">
                                                    {{ __('Explore') }}
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M4.08333 2.9165H8.75C10.0387 2.9165 11.0833 3.96117 11.0833 5.24984V9.9165C11.0833 11.2052 10.0387 12.2498 8.75 12.2498H4.08333C2.79467 12.2498 1.75 11.2052 1.75 9.9165V5.24984C1.75 3.96117 2.79467 2.9165 4.08333 2.9165Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M8.7487 1.3125L12.2487 1.3125C12.4903 1.3125 12.6862 1.50838 12.6862 1.75L12.6862 5.24999C12.6862 5.49162 12.4903 5.6875 12.2487 5.6875C12.0071 5.6875 11.8112 5.49162 11.8112 5.25L11.8112 2.80622L6.14139 8.47602C5.97054 8.64688 5.69353 8.64688 5.52267 8.47602C5.35182 8.30517 5.35182 8.02816 5.52267 7.8573L11.1925 2.1875L8.7487 2.1875C8.50707 2.1875 8.3112 1.99163 8.3112 1.75C8.3112 1.50838 8.50707 1.3125 8.7487 1.3125Z"
                                                            fill="white" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @if(count($notifications) == 0)
                                <div class="alert alert-table mt-20 text-center" role="alert">
                                    {{ __('No Data Found') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        {{ $notifications->links('frontend::include.__pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
