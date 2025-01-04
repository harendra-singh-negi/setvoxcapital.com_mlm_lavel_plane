@extends('frontend::layouts.user')
@section('title')
{{ __('Schema Logs') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-schema-logs-area">
                <div class="rock-dashboard-card">
                    <div class="rock-filter-table">
                        <form action="">
                            <div class="rock-filter-table-form">
                                <div class="rock-single-input">
                                    <div class="input-field">
                                        <input type="text" class="box-input" name="query" value="{{ request('query') }}" placeholder="Search here...">
                                        <div class="input-icon">
                                            <button type="submit">
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.9697 17.4697C17.2626 17.1768 17.7374 17.1768 18.0303 17.4697L22.5303 21.9697C22.8232 22.2626 22.8232 22.7374 22.5303 23.0303C22.2374 23.3232 21.7626 23.3232 21.4697 23.0303L16.9697 18.5303C16.6768 18.2374 16.6768 17.7626 16.9697 17.4697Z"
                                                    fill="white" />
                                                <circle cx="9.5" cy="9.5" r="9.5" transform="matrix(1 0 0 -1 2 21.5)"
                                                    fill="white" />
                                            </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-length">
                                    <div class="filter-length-select">
                                        <select name="limit">
                                            <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                                            <option value="15" {{ request('limit') == 15 ? 'selected' : '' }}>15</option>
                                            <option value="20" {{ request('limit') == 20 ? 'selected' : '' }}>20</option>
                                            <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                                            <option value="30" {{ request('limit') == 30 ? 'selected' : '' }}>30</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @php
                        $logs = $data->when(request('query'),function($query){
                            $query->whereHas('schema',function($schemaQuery){
                                $schemaQuery->where('name','LIKE','%'.request('query').'%');
                            });
                        })->paginate(request()->integer('limit',15))->withQueryString();
                    @endphp
                    <div class="rock-schema-logs-table">
                        <div class="rock-custom-table">
                            <div class="contents">
                                <div class="site-table-list site-table-head">
                                    <div class="site-table-col"><span>{{ __('Schema') }}</span></div>
                                    <div class="site-table-col"><span>{{ __('ROI') }}</span></div>
                                    <div class="site-table-col"><span>{{ __('Profit') }}</span></div>
                                    <div class="site-table-col"><span>{{ __('Period Remaining') }}</span></div>
                                    <div class="site-table-col"><span>{{ __('Capital Back') }}</span></div>
                                    <div class="site-table-col"><span>{{ __('Timeline') }}</span></div>
                                </div>
                                @foreach ($logs as $invest)
                                <div class="site-table-list">
                                    <div class="site-table-col">
                                        <div class="description">
                                            <div class="iocn">
                                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M2 4H0V13L4.31083 15.1554C5.42168 15.7108 6.64658 16 7.88854 16H16C17.1046 16 18 15.1046 18 14C18 12.8954 17.1046 12 16 12H14.4164C13.4849 12 12.5663 11.7831 11.7331 11.3666L8.792 9.896C8.9843 9.7189 9.14317 9.49927 9.25282 9.24342C9.66638 8.27844 9.22409 7.16054 8.26225 6.73973L2 4Z"
                                                        fill="#E9D8A6" />
                                                    <circle cx="16" cy="4" r="4" fill="#E9D8A6" />
                                                </svg>
                                            </div>
                                            <div class="content">
                                                <h4 class="title gradient-text-1 fw-7">{{ $invest->schema->name }} >> {{ $currencySymbol.$invest->invest_amount }}</h4>
                                                <p class="description">{{ $invest->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="white-text">{{ $invest->interest_type == 'percentage' ? $invest->interest.'%' : $currencySymbol.$invest->interest }}</span>
                                    </div>
                                    @php
                                        $calculateInterest = ($invest->interest*$invest->invest_amount)/100;
                                        $interest = $invest->interest_type != 'percentage' ? $invest->interest : $calculateInterest;
                                    @endphp
                                    <div class="site-table-col">
                                        <span class="white-text">{{ $invest->already_return_profit .' x '.$interest .' = '. ($invest->already_return_profit*$interest).' '. $currency }}</span>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="white-text">{{ $invest->return_type != 'period' ? __('Unlimited') : $invest->number_of_period . ($invest->number_of_period < 2 ? ' Time' : ' Times') }}</span>
                                    </div>
                                    <div class="site-table-col">
                                        <span class="success-text">{{ $invest->capital_back ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div class="site-table-col">
                                        @if($invest->status->value == 'ongoing')
                                        <div class="timeline-grid">
                                            <span class="white-text">
                                                <span id="days{{ $invest->id }}"></span>D : <span id="hours{{ $invest->id }}"></span>H : <span
                                                id="minutes{{ $invest->id }}"></span>M : <span id="seconds{{ $invest->id }}"></span>S
                                            </span>
                                            <div class="single-progress">
                                                <div class="progress">
                                                    <div class="progress-bar" id="time-progress{{ $invest->id }}" role="progressbar" style="width: 100%;"
                                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="white-text" id="percent-text{{ $invest->id }}">100%</span>
                                        </div>
                                        @section('script')
                                        <script>

                                            (function ($) {
                                                "use strict";
                                                // Countdown
                                                const second = 1000,
                                                    minute = second * 60,
                                                    hour = minute * 60,
                                                    day = hour * 24;
                                                let timezone = @json(setting('site_timezone','global'));


                                                let countDown = new Date('{{$invest->next_profit_time}}').getTime()
                                                var start = new Date('{{ $invest->last_profit_time ?? $invest->created_at}}').getTime()
                                                setInterval(function () {

                                                    let utc_datetime_str = new Date().toLocaleString("en-US", {timeZone: timezone});
                                                    let now = new Date(utc_datetime_str).getTime();

                                                    let distance = countDown - now;


                                                    var progress = (((now - start) / (countDown - start)) * 100).toFixed(2);


                                                    $("#time-progress{{ $invest->id }}").css("width", progress + '%');

                                                    $("#percentage{{ $invest->id }}").text(progress >= 100 ? 100 + '%' : progress + '%');
                                                    $('#percent-text{{ $invest->id }}').text(progress >= 100 ? 100 + '%' : progress + '%')

                                                    document.getElementById('days{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : distance / (day)),
                                                        document.getElementById('hours{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (day)) / (hour)),
                                                        document.getElementById('minutes{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (hour)) / (minute)),
                                                        document.getElementById('seconds{{ $invest->id }}').innerText = Math.floor(distance < 0 ? 0 : (distance % (minute)) / second);

                                                }, second)

                                            })(jQuery)

                                        </script>
                                        @endsection
                                        @elseif($invest->status->value == 'pending')
                                        <span class="rock-badge warning">{{ __('Pending') }}</span>
                                        @elseif($invest->status->value == 'completed')
                                        <div class="d-flex gap-10">
                                            <span class="rock-badge success">{{ __('Success') }}</span>
                                            <span class="rock-badge success">100%</span>
                                          </div>
                                        @else
                                        <span class="rock-badge warning">{{ __('Cancelled') }}</span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(count($logs) == 0)
                            <div class="alert alert-table mt-20 text-center" role="alert">
                                {{ __('No Data Found') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    {{ $logs->links('frontend::include.__pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
