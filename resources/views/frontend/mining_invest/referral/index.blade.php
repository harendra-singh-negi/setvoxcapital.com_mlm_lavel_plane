@extends('frontend::layouts.user')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Referral URL') }} @if(setting('site_referral','global') == 'level')
                            {{ __('and Tree') }}
                        @endif</h3>
                </div>
                <div class="site-card-body">
                    <div class="referral-link">
                        <div class="referral-link-form">
                            <input type="text" value="{{ $getReferral->link }}" id="refLink"/>
                            <button type="submit" onclick="copyRef()">
                                <i class="anticon anticon-copy"></i>
                                <span id="copy">{{ __('Copy Url') }}</span>
                                <input id="copied" hidden value="{{ __('Copied') }}">
                            </button>
                        </div>
                        <p class="referral-joined">
                            {{ $getReferral->relationships()->count() }} {{ __('peoples are joined by using this URL') }}
                        </p>
                    </div>

                    {{-- level referral tree --}}
                    @if(setting('site_referral','global') == 'level' && auth()->user()->referrals->count() > 0)
                        <section class="management-hierarchy">
                            <div class="hv-container">
                                <div class="hv-wrapper">
                                    <!-- tree component -->
                                    @include('frontend::referral.include.__tree',['levelUser' => auth()->user(),'level' => $level,'depth' => 1, 'me' => true])
                                </div>
                            </div>
                        </section>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('All Referral Logs') }}</h3>
                    <div class="card-header-links">
                        <span
                            class="card-header-link rounded-pill"> {{ __('Referral Profit:').' '. $totalReferralProfit .' '.$currency }}</span>
                    </div>
                </div>
                <div class="site-card-body table-responsive">


                    <div class="site-tab-bars">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a
                                    href=""
                                    class="nav-link active"
                                    id="generalTarget-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#generalTarget"
                                    type="button"
                                    role="tab"
                                    aria-controls="generalTarget"
                                    aria-selected="true"
                                ><i icon-name="network"></i>{{ __('General') }}</a>
                            </li>

                            @foreach($referrals->keys() as $raw)

                                @php
                                    $target = json_decode($raw,true);
                                @endphp

                                <li class="nav-item" role="presentation">
                                    <a
                                        href=""
                                        class="nav-link"
                                        id="t{{ $target['id'] }}-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#t{{ $target['id'] }}"
                                        type="button"
                                        role="tab"
                                        aria-controls="t{{ $target['id'] }}"
                                        aria-selected="true"
                                    ><i icon-name="boxes"></i>
                                        @if(setting('site_referral','global') == 'level')
                                            Level {{ $target['the_order'] }}
                                        @else
                                            {{ $target['name'] }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="tab-content" id="pills-tabContent">

                        <div
                            class="tab-pane fade show active"
                            id="generalTarget"
                            role="tabpanel"
                            aria-labelledby="generalTarget-tab"
                        >

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 desktop-screen-show">
                                    <div class="site-datatable">
                                        <div class="row table-responsive">
                                            <div class="col-xl-12">
                                                <table class="display data-table">
                                                    <thead>
                                                    <tr>
                                                        <th>{{ __('Description') }}</th>
                                                        <th>{{ __('Transactions ID') }}</th>
                                                        <th>{{ __('Amount') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                    @foreach($generalReferrals as $raw)
                                                        <tr>
                                                            <td>
                                                                <div class="table-description">
                                                                    <div class="icon">
                                                                        <i icon-name="arrow-down-left"></i>
                                                                    </div>
                                                                    <div class="description">
                                                                        <strong>{{ $raw->description }}</strong>
                                                                        <div
                                                                            class="date">{{ $raw->created_at }}</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><strong>{{$raw->tnx}}</strong></td>
                                                            <td><strong
                                                                    class="green-color">+{{ $raw->amount.' '. $currency }} </strong>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="site-badge success">{{ $raw->status }}</div>
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>

                                                @if($generalReferrals->isEmpty())
                                                    <p class="centered">{{ __('No Data Found') }}</p>
                                                @endif

                                                {{ $generalReferrals->links() }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 mobile-screen-show">
                                    <!-- Transactions -->
                                    <div class="all-feature-mobile mobile-transactions mb-3">
                                        <div class="contents">
                                            @foreach($generalReferrals as $raw )
                                                <div class="single-transaction">
                                                    <div class="transaction-left">
                                                        <div class="transaction-des">
                                                            <div
                                                                class="transaction-title">{{ $raw->description }}</div>
                                                            <div class="transaction-id">{{ $raw->tnx }}</div>
                                                            <div
                                                                class="transaction-date">{{ $raw->created_at }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="transaction-right">
                                                        <div
                                                            class="transaction-amount add">
                                                            + {{$raw->amount .' '.$currency}}</div>
                                                        <div class="transaction-gateway">{{ $raw->method }}</div>

                                                        @if($raw->status->value == App\Enums\TxnStatus::Pending->value)
                                                            <div
                                                                class="transaction-status pending">{{ __('Pending') }}</div>
                                                        @elseif($raw->status->value ==  App\Enums\TxnStatus::Success->value)
                                                            <div
                                                                class="transaction-status success">{{ __('Success') }}</div>
                                                        @elseif($raw->status->value ==  App\Enums\TxnStatus::Failed->value)
                                                            <div
                                                                class="transaction-status canceled">{{ __('canceled') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{  $generalReferrals->onEachSide(1)->links() }}
                                    </div>

                                </div>
                            </div>


                        </div>

                        @foreach($referrals as $target => $referral)

                            @php
                                $target = json_decode($target,true);
                            @endphp

                            <div
                                class="tab-pane fade"
                                id="t{{ $target['id'] }}"
                                role="tabpanel"
                                aria-labelledby="t{{ $target['id'] }}-tab"
                            >
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 desktop-screen-show">
                                        <div class="site-datatable">
                                            <div class="row table-responsive">
                                                <div class="col-xl-12">
                                                    <table class="display data-table">
                                                        <thead>
                                                        <tr>
                                                            <th>{{ __('Description') }}</th>
                                                            <th>{{ __('Transactions ID') }}</th>
                                                            <th>{{ __('Type') }}</th>
                                                            <th>{{ __('Amount') }}</th>
                                                            <th>{{ __('Status') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($referral->sortDesc() as $raw )
                                                            <tr>
                                                                <td>
                                                                    <div class="table-description">
                                                                        <div class="icon">
                                                                            <i icon-name="arrow-down-left"></i>
                                                                        </div>
                                                                        <div class="description">
                                                                            <strong>{{ $raw->description }}</strong>
                                                                            <div
                                                                                class="date">{{ $raw->created_at }}</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td><strong>{{$raw->tnx}}</strong></td>
                                                                <td>
                                                                    <div
                                                                        class="site-badge primary-bg">{{ $raw->target_type }}</div>
                                                                </td>
                                                                <td><strong
                                                                        class="green-color">+{{ $raw->amount.' '. $currency }} </strong>
                                                                </td>
                                                                <td>
                                                                    <div
                                                                        class="site-badge success">{{ $raw->status }}</div>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mobile-screen-show">
                                        <!-- Transactions -->
                                        <div class="all-feature-mobile mobile-transactions mb-3">
                                            <div class="contents">
                                                @foreach($referral->sortDesc() as $raw )
                                                    <div class="single-transaction">
                                                        <div class="transaction-left">
                                                            <div class="transaction-des">
                                                                <div
                                                                    class="transaction-title">{{ $raw->description }}
                                                                </div>
                                                                <div class="transaction-id">{{ $raw->tnx }}</div>
                                                                <div
                                                                    class="transaction-date">{{ $raw->created_at }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="transaction-right">
                                                            <div
                                                                class="transaction-amount add">
                                                                +{{$raw->amount .' '.$currency}}</div>
                                                            <div
                                                                class="transaction-gateway"> {{  $raw->target_type }}</div>

                                                            @if($raw->status->value == App\Enums\TxnStatus::Pending->value)
                                                                <div
                                                                    class="transaction-status pending">{{ __('Pending') }}</div>
                                                            @elseif($raw->status->value ==  App\Enums\TxnStatus::Success->value)
                                                                <div
                                                                    class="transaction-status success">{{ __('Success') }}</div>
                                                            @elseif($raw->status->value ==  App\Enums\TxnStatus::Failed->value)
                                                                <div
                                                                    class="transaction-status canceled">{{ __('canceled') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function copyRef() {
            /* Get the text field */
            var copyApi = document.getElementById("refLink");
            /* Select the text field */
            copyApi.select();
            copyApi.setSelectionRange(0, 999999999); /* For mobile devices */
            /* Copy the text inside the text field */
            document.execCommand('copy');
            $('#copy').text($('#copied').val())
        }
    </script>
@endsection
