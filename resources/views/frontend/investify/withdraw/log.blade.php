@extends('frontend::layouts.user')
@section('title')
{{ __('Withdraw Logs') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-withdraw-log-area">
                <div class="rock-dashboard-card">
                    <div class="support-ticket-form">
                        <form action="{{ route('user.withdraw.log') }}" method="GET">
                            <div class="common-table-form-grid">
                                <div class="input-field">
                                    <input type="text" class="box-input" value="{{ request('query') }}" name="query" placeholder="Search here...">
                                    <div class="input-icon">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://wwwI.w3.org/2000/svg">
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.9697 17.4697C17.2626 17.1768 17.7374 17.1768 18.0303 17.4697L22.5303 21.9697C22.8232 22.2626 22.8232 22.7374 22.5303 23.0303C22.2374 23.3232 21.7626 23.3232 21.4697 23.0303L16.9697 18.5303C16.6768 18.2374 16.6768 17.7626 16.9697 17.4697Z"
                                                fill="white" />
                                            <circle cx="9.5" cy="9.5" r="9.5" transform="matrix(1 0 0 -1 2 21.5)"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <input type="text" id="d_today" name="date" value="{{ request()->get('date') }}" autocomplete="off" placeholder="dd/mm/yyyy">
                                    <div class="input-icon">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4"
                                                d="M3 8C3 5.79086 4.79086 4 7 4H17C19.2091 4 21 5.79086 21 8V9.5V18.5C21 20.7091 19.2091 22.5 17 22.5H7C4.79086 22.5 3 20.7091 3 18.5V9.5V8Z"
                                                fill="white" />
                                            <path
                                                d="M17 4H7C4.79086 4 3 5.79086 3 8V9.5H21V8C21 5.79086 19.2091 4 17 4Z"
                                                fill="white" />
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 1.75C8.41421 1.75 8.75 2.08579 8.75 2.5V5.5C8.75 5.91421 8.41421 6.25 8 6.25C7.58579 6.25 7.25 5.91421 7.25 5.5V2.5C7.25 2.08579 7.58579 1.75 8 1.75ZM16 1.75C16.4142 1.75 16.75 2.08579 16.75 2.5V5.5C16.75 5.91421 16.4142 6.25 16 6.25C15.5858 6.25 15.25 5.91421 15.25 5.5V2.5C15.25 2.08579 15.5858 1.75 16 1.75Z"
                                                fill="white" />
                                            <circle cx="12" cy="15.5" r="1" fill="white" />
                                            <circle cx="16" cy="15.5" r="1" fill="white" />
                                            <circle cx="8" cy="15.5" r="1" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <button class="site-btn gradient-btn" type="submit"><i
                                        class="icon-search-normal"></i>{{ __('Search') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="rock-withdraw-log-table table-responsive">
                        <div class="rock-custom-table">
                            <div class="contents">
                                <div class="site-table-list site-table-head">
                                    <div class="site-table-col">{{ __('Description') }}</div>
                                    <div class="site-table-col">{{ __('Transaction ID') }}</div>
                                    <div class="site-table-col">{{ __('Amount') }}</div>
                                    <div class="site-table-col">{{ __('Charge') }}</div>
                                    <div class="site-table-col">{{ __('Status') }}</div>
                                    <div class="site-table-col">{{ __('Method') }}</div>
                                </div>
                                @foreach($withdraws as $raw )
                                <div class="site-table-list">
                                    <div class="site-table-col">
                                        <div class="transactions-description">
                                            <div class="iocn">
                                                {!! getIcon($raw->type) !!}
                                            </div>
                                            <div class="content">
                                                <h4 class="title green-text">{{ $raw->description }}</h4>
                                                <p class="description">{{ $raw->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="white-text">{{ $raw->tnx }}</span>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="danger-text">
                                            - {{$raw->amount .' '.$currency}}
                                            <svg width="8" height="12" viewBox="0 0 8 12"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.55545 11.4419C3.79953 11.686 4.19526 11.686 4.43934 11.4419L7.77267 8.10861C8.01675 7.86453 8.01675 7.4688 7.77267 7.22472C7.52859 6.98065 7.13286 6.98065 6.88879 7.22472L4.6224 9.49112V1C4.6224 0.654822 4.34257 0.375 3.9974 0.375C3.65222 0.375 3.3724 0.654822 3.3724 1V9.49112L1.106 7.22472C0.861927 6.98065 0.466198 6.98065 0.222121 7.22472C-0.0219569 7.4688 -0.0219569 7.86453 0.222121 8.10861L3.55545 11.4419Z"
                                                    fill="#FF3E3E" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="danger-text">- {{  $raw->charge.' '. $currency }}</span>
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
                                    <div class="site-table-col">
                                        <span class="white-text">{{ $raw->method }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($withdraws) == 0)
                            <div class="alert alert-table mt-20 text-center" role="alert">
                                {{ __('No Data Found') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{  $withdraws->onEachSide(1)->links('frontend::include.__pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
