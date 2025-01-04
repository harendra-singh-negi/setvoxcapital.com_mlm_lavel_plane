@extends('frontend::layouts.user')
@section('title')
{{ __('Dashboard') }}
@endsection
@section('content')


<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-referral-area">
                <div class="row gy-24">
                    <div class="col-xxl-12">
                        <div class="rock-referral-tree-form" data-background="{{ asset('frontend/theme_base/hardrock/images/bg/referral-pattern-bg.png') }}">
                            <h3 class="title">{{ __('Referral ') }} @if(setting('site_referral','global') == 'level')
                                {{ __('and Tree') }} @endif
                            </h3>
                            <form action="#">
                                <div class="rock-referral-tree-form-grid">
                                    <div class="rock-single-input">
                                        <div class="input-field">
                                            <input type="text" id="referralInputLink" name="referralInputLink"
                                                class="box-input" required
                                                value="{{ $getReferral->link }}">
                                            <button type="button" id="referralCopyBtn"
                                                class="site-btn gradient-btn radius-12">
                                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M8.5 6C8.5 3.79086 10.2909 2 12.5 2H18.5C20.7092 2 22.5 3.79086 22.5 6V12C22.5 14.2091 20.7092 16 18.5 16H12.5C10.2909 16 8.5 14.2091 8.5 12V6Z"
                                                        fill="white" />
                                                    <path
                                                        d="M2.5 12C2.5 9.79086 4.29086 8 6.5 8H12.5C14.7092 8 16.5 9.79086 16.5 12V18C16.5 20.2091 14.7092 22 12.5 22H6.5C4.29086 22 2.5 20.2091 2.5 18V12Z"
                                                        fill="white" />
                                                </svg>
                                                {{ __('Copy') }}
                                            </button>
                                        </div>
                                        <p class="description">
                                            {{ $getReferral->relationships()->count() }} {{ __('peoples are joined by using this URL') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="rock-referral-tree-wrapper">
                                    <div class="rock-referral-tree">
                                        <ul>
                                            @include('frontend::referral.include.__tree',['levelUser' => auth()->user(),'level' => $level,'depth' => 1,'child' => false, 'me' => true])
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xxl-12">
                        <div class="rock-referral-logs">
                            <div class="rock-dashboard-card">
                                <div class="rock-dashboard-title-inner">
                                    <h3 class="rock-dashboard-tile">{{ __('All Referral Logs') }}</h3>
                                    <span class="rock-badge badge-icon white-opcity">{{ __('Referral Profit:').' '. $totalReferralProfit .' '.$currency }}</span>
                                </div>
                                <div class="rock-referral-logs-table table-responsive">
                                    <div class="rock-referral-logs-tab td-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="referral-general-tab"
                                                    data-bs-toggle="tab" data-bs-target="#referral-general-tab-pane"
                                                    type="button" role="tab" aria-controls="referral-general-tab-pane"
                                                    aria-selected="true">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M11.1738 21.6237L3.00417 17.9102C2.22257 17.555 2.22257 16.4448 3.00417 16.0895L11.1738 12.376C11.6996 12.137 12.3031 12.137 12.829 12.376L20.9986 16.0895C21.7801 16.4448 21.7801 17.555 20.9986 17.9102L12.829 21.6237C12.3031 21.8627 11.6996 21.8627 11.1738 21.6237Z"
                                                            fill="white" />
                                                        <path
                                                            d="M11.1738 16.6237L3.00417 12.9102C2.22257 12.555 2.22257 11.4448 3.00417 11.0895L11.1738 7.37604C11.6996 7.13702 12.3031 7.13702 12.829 7.37604L20.9986 11.0895C21.7801 11.4448 21.7801 12.555 20.9986 12.9102L12.829 16.6237C12.3031 16.8627 11.6996 16.8627 11.1738 16.6237Z"
                                                            fill="white" />
                                                        <path opacity="0.4"
                                                            d="M11.1738 11.6237L3.00417 7.91023C2.22257 7.55496 2.22257 6.44476 3.00417 6.08949L11.1738 2.37604C11.6996 2.13702 12.3031 2.13702 12.829 2.37604L20.9986 6.08949C21.7801 6.44476 21.7801 7.55496 20.9986 7.91023L12.829 11.6237C12.3031 11.8627 11.6996 11.8627 11.1738 11.6237Z"
                                                            fill="white" />
                                                    </svg>
                                                    {{ __('General') }}</button>
                                            </li>
                                            @foreach($referrals->keys() as $raw)
                                            @php
                                            $target = json_decode($raw,true);
                                            @endphp
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="referral-target{{ $target['id'] }}-tab"
                                                    data-bs-toggle="tab" data-bs-target="#referral-target{{ $target['id'] }}-tab-pane"
                                                    type="button" role="tab"
                                                    aria-controls="referral-target{{ $target['id'] }}-tab-pane" aria-selected="false">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M11.1738 21.6237L3.00417 17.9102C2.22257 17.555 2.22257 16.4448 3.00417 16.0895L11.1738 12.376C11.6996 12.137 12.3031 12.137 12.829 12.376L20.9986 16.0895C21.7801 16.4448 21.7801 17.555 20.9986 17.9102L12.829 21.6237C12.3031 21.8627 11.6996 21.8627 11.1738 21.6237Z"
                                                            fill="white" />
                                                        <path
                                                            d="M11.1738 16.6237L3.00417 12.9102C2.22257 12.555 2.22257 11.4448 3.00417 11.0895L11.1738 7.37604C11.6996 7.13702 12.3031 7.13702 12.829 7.37604L20.9986 11.0895C21.7801 11.4448 21.7801 12.555 20.9986 12.9102L12.829 16.6237C12.3031 16.8627 11.6996 16.8627 11.1738 16.6237Z"
                                                            fill="white" />
                                                        <path opacity="0.4"
                                                            d="M11.1738 11.6237L3.00417 7.91023C2.22257 7.55496 2.22257 6.44476 3.00417 6.08949L11.1738 2.37604C11.6996 2.13702 12.3031 2.13702 12.829 2.37604L20.9986 6.08949C21.7801 6.44476 21.7801 7.55496 20.9986 7.91023L12.829 11.6237C12.3031 11.8627 11.6996 11.8627 11.1738 11.6237Z"
                                                            fill="white" />
                                                    </svg>
                                                    @if(setting('site_referral','global') == 'level')
                                                    Level {{ $target['the_order'] }}
                                                    @else
                                                    {{ $target['name'] }}
                                                    @endif
                                                </button>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="referral-general-tab-pane"
                                                role="tabpanel" aria-labelledby="referral-general-tab" tabindex="0">
                                                <div class="rock-custom-table">
                                                    <div class="contents">
                                                        <div class="site-table-list site-table-head">
                                                            <div class="site-table-col">{{ __('Description') }}</div>
                                                            <div class="site-table-col">{{ __('Transaction ID') }}</div>
                                                            <div class="site-table-col">{{ __('Type') }}</div>
                                                            <div class="site-table-col">{{ __('Amount') }}</div>
                                                            <div class="site-table-col">{{ __('Status') }}</div>
                                                        </div>
                                                        @foreach($generalReferrals as $raw )
                                                        <div class="site-table-list">
                                                            <div class="site-table-col">
                                                                <div class="description">
                                                                    <div class="iocn">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.4"
                                                                                d="M9.41266 4.68911C10.2496 3.85219 11.4055 3.41786 12.5771 3.50011L16.5414 3.77844C18.5209 3.91741 20.0839 5.48041 20.2228 7.45987L20.5011 11.4242C20.5834 12.5958 20.1491 13.7517 19.3122 14.5886L12.7468 21.154C11.1635 22.7373 8.61357 22.7545 7.05148 21.1924L2.80884 16.9498C1.24674 15.3877 1.26396 12.8378 2.8473 11.2545L9.41266 4.68911Z"
                                                                                fill="#86A8FF" />
                                                                            <circle cx="14.8281" cy="9.17218" r="2"
                                                                                transform="rotate(45 14.8281 9.17218)"
                                                                                fill="#86A8FF" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="title kittensEye-text fw-7">{{ $raw->description }}</h4>
                                                                        <p class="description">{{ $raw->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="white-text">{{ $raw->tnx }}</span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="pinkDiamond-text">{{ ucfirst($raw->type) }}</span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="success-text">+{{$raw->amount .' '.$currency}}
                                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9.55545 4.55806C9.79953 4.31398 10.1953 4.31398 10.4393 4.55806L13.7727 7.89139C14.0167 8.13547 14.0167 8.5312 13.7727 8.77528C13.5286 9.01935 13.1329 9.01935 12.8888 8.77528L10.6224 6.50888V15C10.6224 15.3452 10.3426 15.625 9.9974 15.625C9.65222 15.625 9.3724 15.3452 9.3724 15V6.50888L7.106 8.77528C6.86193 9.01935 6.4662 9.01935 6.22212 8.77528C5.97804 8.5312 5.97804 8.13547 6.22212 7.89139L9.55545 4.55806Z"
                                                                            fill="#85FFC4" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                @if($raw->status->value == App\Enums\TxnStatus::Pending->value)
                                                                <div class="rock-badge warning">{{ __('Pending') }}</div>
                                                                @elseif($raw->status->value == App\Enums\TxnStatus::Success->value)
                                                                <div class="rock-badge badge-success">{{ __('Success') }}</div>
                                                                @elseif($raw->status->value == App\Enums\TxnStatus::Failed->value)
                                                                <div class="rock-badge danger">{{ __('canceled') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @if(count($generalReferrals) == 0)
                                                    <div class="alert alert-table mt-20 text-center" role="alert">
                                                        {{ __('No Data Found') }}
                                                    </div>
                                                    @endif
                                                </div>
                                                {{ $generalReferrals->links('frontend::include.__pagination') }}
                                            </div>
                                            @foreach($referrals as $target => $referral)
                                            @php
                                            $target = json_decode($target,true);
                                            @endphp
                                            <div class="tab-pane fade" id="referral-{{ $target['id'] }}-tab-pane"
                                                role="tabpanel" aria-labelledby="referral-{{ $target['id'] }}-tab" tabindex="0">
                                                <div class="rock-custom-table">
                                                    <div class="contents">
                                                        <div class="site-table-list site-table-head">
                                                            <div class="site-table-col">{{ __('Description') }}</div>
                                                            <div class="site-table-col">{{ __('Transaction ID') }}</div>
                                                            <div class="site-table-col">{{ __('Type') }}</div>
                                                            <div class="site-table-col">{{ __('Amount') }}</div>
                                                            <div class="site-table-col">{{ __('Status') }}</div>
                                                        </div>
                                                        @foreach($referral->sortDesc() as $raw )
                                                        <div class="site-table-list">
                                                            <div class="site-table-col">
                                                                <div class="description">
                                                                    <div class="iocn">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path opacity="0.4"
                                                                                d="M9.41266 4.68911C10.2496 3.85219 11.4055 3.41786 12.5771 3.50011L16.5414 3.77844C18.5209 3.91741 20.0839 5.48041 20.2228 7.45987L20.5011 11.4242C20.5834 12.5958 20.1491 13.7517 19.3122 14.5886L12.7468 21.154C11.1635 22.7373 8.61357 22.7545 7.05148 21.1924L2.80884 16.9498C1.24674 15.3877 1.26396 12.8378 2.8473 11.2545L9.41266 4.68911Z"
                                                                                fill="#86A8FF" />
                                                                            <circle cx="14.8281" cy="9.17218" r="2"
                                                                                transform="rotate(45 14.8281 9.17218)"
                                                                                fill="#86A8FF" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="title kittensEye-text fw-7">{{ $raw->description }}</h4>
                                                                        <p class="description">{{ $raw->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="white-text">{{ $raw->tnx }}</span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="pinkDiamond-text">{{ ucfirst($raw->type) }}</span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                <span class="success-text">+{{$raw->amount .' '.$currency}}
                                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M9.55545 4.55806C9.79953 4.31398 10.1953 4.31398 10.4393 4.55806L13.7727 7.89139C14.0167 8.13547 14.0167 8.5312 13.7727 8.77528C13.5286 9.01935 13.1329 9.01935 12.8888 8.77528L10.6224 6.50888V15C10.6224 15.3452 10.3426 15.625 9.9974 15.625C9.65222 15.625 9.3724 15.3452 9.3724 15V6.50888L7.106 8.77528C6.86193 9.01935 6.4662 9.01935 6.22212 8.77528C5.97804 8.5312 5.97804 8.13547 6.22212 7.89139L9.55545 4.55806Z"
                                                                            fill="#85FFC4" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="site-table-col">
                                                                @if($raw->status->value == App\Enums\TxnStatus::Pending->value)
                                                                <div class="rock-badge warning">{{ __('Pending') }}</div>
                                                                @elseif($raw->status->value == App\Enums\TxnStatus::Success->value)
                                                                <div class="rock-badge badge-success">{{ __('Success') }}</div>
                                                                @elseif($raw->status->value == App\Enums\TxnStatus::Failed->value)
                                                                <div class="rock-badge danger">{{ __('canceled') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.getElementById('referralCopyBtn').addEventListener('click', function () {
      var referralCopyText = document.getElementById('referralInputLink');
      referralCopyText.select();
      referralCopyText.setSelectionRange(0, 99999); // For mobile devices

      navigator.clipboard.writeText(referralCopyText.value).then(function () {
        var referralCopyButton = document.getElementById('referralCopyBtn');
        var originalButtonContent = referralCopyButton.innerHTML;
        referralCopyButton.innerHTML = 'Copied';

        setTimeout(function () {
          referralCopyButton.innerHTML = originalButtonContent;
        }, 2000); // Reset button content after 2 seconds
      }, function (err) {
        console.error('Could not copy text: ', err);
      });
    });
</script>
@endsection
