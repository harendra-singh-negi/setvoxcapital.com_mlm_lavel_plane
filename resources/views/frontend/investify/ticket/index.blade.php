@extends('frontend::layouts.user')
@section('title')
{{ __('Support Tickets') }}
@endsection
@section('content')
{{-- <div class="row">
    <div class="col-xl-12">
        <div class="site-card">
            <div class="site-card-header">
                <h3 class="title">{{ __('Support Tickets') }}</h3>
                <div class="card-header-links">
                    <a href="{{ route('user.ticket.new') }}" class="card-header-link">{{ __('Create Ticket') }}</a>
                </div>
            </div>
            <div class="site-card-body">
                <div class="site-transactions">
                    @foreach($tickets as $ticket)
                    <div class="single">
                        <div class="left">
                            <div class="icon">
                                <i icon-name="flag"></i>
                            </div>
                            <div class="content">
                                <div class="title">{{ $ticket->title }}</div>
                                <div class="date">{{ __('Created ').$ticket->created_at }}
                                    @if($ticket->isOpen())
                                    <span class="ms-2 status site-badge badge-pending">{{ __('Opened') }}</span>
                                    @elseif($ticket->isClosed())
                                    <span class="ms-2 status site-badge badge-success">{{ __('Completed') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="right">
                            <div class="action">

                                @if($ticket->isOpen())
                                <a href="{{ route('user.ticket.close.now',$ticket->uuid) }}" class="cancel"
                                    data-bs-toggle="tooltip" title="Complete Ticket"
                                    data-bs-original-title="Complete Ticket"><i icon-name="check"></i></a>
                                <a href="{{ route('user.ticket.show',$ticket->uuid) }}" data-bs-toggle="tooltip"
                                    title="Show Ticket" data-bs-original-title="Show Ticket"><i icon-name="eye"></i></a>
                                @elseif($ticket->isClosed())
                                <a href="#" class="cancel disabled"><i icon-name="check"></i></a>
                                <a href="{{ route('user.ticket.show',$ticket->uuid) }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Re-open the Ticket"><i icon-name="book-open"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($tickets->isEmpty())
                    <p class="centered">{{ __('No Data Found') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-support-tickets-list-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content">
                            <h3 class="rock-dashboard-tile">{{ __('Support Tickets') }}</h3>
                        </div>
                        <a class="site-btn gradient-btn radius-12" href="{{ route('user.ticket.new') }}">{{ __('Create Ticket') }}</a>
                    </div>
                    <div class="rock-support-tickets-list-table table-responsive">
                        <div class="rock-custom-table">
                            <div class="contents">
                                <div class="site-table-list site-table-head">
                                    <div class="site-table-col">{{ __('Ticket Info') }}</div>
                                    <div class="site-table-col">{{ __('Action') }}</div>
                                </div>
                                @foreach($tickets as $ticket)
                                <div class="site-table-list">
                                    <div class="site-table-col">
                                        <div class="d-flex align-items-center gap-20">
                                            <div class="description">
                                                <div class="iocn">
                                                    <svg width="19" height="22" viewBox="0 0 19 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g opacity="0.4">
                                                            <path
                                                                d="M15 11C15 12.1046 14.1046 13 13 13H5V16C5 17.1046 5.89543 18 7 18H17C18.1046 18 19 17.1046 19 16V8C19 6.89543 18.1046 6 17 6H15V11Z"
                                                                fill="white" />
                                                        </g>
                                                        <path
                                                            d="M1.75 14H13.1072C14.1526 14 15.0001 13.1046 15.0001 12V4C15.0001 2.89543 14.1526 2 13.1072 2H1.75V14Z"
                                                            fill="white" />
                                                        <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1 0.25C1.41421 0.25 1.75 0.585786 1.75 1V21C1.75 21.4142 1.41421 21.75 1 21.75C0.585786 21.75 0.25 21.4142 0.25 21V1C0.25 0.585786 0.585786 0.25 1 0.25Z"
                                                            fill="white" />
                                                    </svg>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title white-text">
                                                        <a href="">
                                                            {{ $ticket->title }}
                                                        </a>
                                                    </h4>
                                                    <p class="description">{{ __('Created ').$ticket->created_at }} </p>
                                                </div>
                                            </div>
                                            <div class="badge-wrap">
                                                @if($ticket->isOpen())
                                                <span class="rock-badge white badge-icon">
                                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.167969 2.71875V9.28125C0.167969 9.81581 0.373022 10.3006 0.705863 10.6554L2.65928 6.24639C3.06479 5.29843 3.96959 4.6875 4.96804 4.6875H10.2741V4.03125C10.2741 2.94394 9.42569 2.0625 8.37917 2.0625H6.42287C6.08574 2.0625 5.75471 1.96905 5.46393 1.79179L4.19909 1.02071C3.90831 0.843452 3.57728 0.75 3.24014 0.75H2.06286C1.01634 0.75 0.167969 1.63144 0.167969 2.71875Z" fill="white"></path>
                                                    </svg>
                                                    {{ __('Opened') }}
                                                </span>
                                                @else
                                                <span class="rock-badge white badge-icon">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4" d="M11.9735 4.6665H2.02649C1.28374 4.6665 0.73009 5.35136 0.885718 6.07762L1.9381 10.9887C2.16864 12.0646 3.11938 12.8332 4.21964 12.8332H9.78036C10.8806 12.8332 11.8314 12.0646 12.0619 10.9887L13.1143 6.07762C13.2699 5.35136 12.7163 4.6665 11.9735 4.6665Z" fill="#48FFA7"/>
                                                        <path d="M11.6654 4.6665V4.08317C11.6654 3.11667 10.8819 2.33317 9.91536 2.33317H8.28057C7.89087 2.33317 7.51233 2.2031 7.20493 1.96357L6.65635 1.5361C6.34896 1.29658 5.97041 1.1665 5.58071 1.1665H4.08203C3.11553 1.1665 2.33203 1.95001 2.33203 2.9165V4.6665H11.6654Z" fill="#48FFA7"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.03811 7.25425C9.21995 7.41336 9.23838 7.68976 9.07927 7.8716L7.40516 9.78487C7.04542 10.196 6.42577 10.251 5.99919 9.90978L4.97671 9.0918C4.78803 8.94086 4.75744 8.66554 4.90839 8.47686C5.05933 8.28819 5.33464 8.2576 5.52332 8.40854L6.5458 9.22652C6.60674 9.27527 6.69526 9.26741 6.74665 9.20868L8.42076 7.29541C8.57987 7.11357 8.85627 7.09514 9.03811 7.25425Z" fill="#48FFA7"/>
                                                    </svg>
                                                    {{ __('Completed') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <div class="action-btn-wrap">
                                            <a class="action-btn primary-btn" href="{{ route('user.ticket.close.now',$ticket->uuid) }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g filter="url(#filter0_i_2356_17196)">
                                                        <path
                                                            d="M22 19V16C22 14.3431 20.6569 13 19 13H18C17.3705 13 16.7777 13.2964 16.4 13.8L15.2 15.4C14.4446 16.4072 13.259 17 12 17C10.741 17 9.55542 16.4072 8.8 15.4L7.6 13.8C7.22229 13.2964 6.62951 13 6 13H5C3.34315 13 2 14.3431 2 16V19C2 20.6569 3.34315 22 5 22H19C20.6569 22 22 20.6569 22 19Z"
                                                            fill="url(#paint0_linear_2356_17196)" />
                                                    </g>
                                                    <g filter="url(#filter1_i_2356_17196)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5 13H6C6.62951 13 7.22229 13.2964 7.6 13.8L8.8 15.4C9.55542 16.4072 10.741 17 12 17C13.259 17 14.4446 16.4072 15.2 15.4L16.4 13.8C16.7777 13.2964 17.3705 13 18 13H19C19.3506 13 19.6872 13.0602 20 13.1707V6C20 3.79086 18.2091 2 16 2H8C5.79086 2 4 3.79086 4 6V13.1707C4.31278 13.0602 4.64936 13 5 13ZM15.5645 6.49389C15.8372 6.18216 15.8056 5.70834 15.4939 5.43558C15.1822 5.16282 14.7084 5.1944 14.4356 5.50613L11.5657 8.78603C11.4776 8.88671 11.3258 8.90019 11.2214 8.81662L9.46855 7.41436C9.1451 7.1556 8.67313 7.20804 8.41438 7.53149C8.15562 7.85494 8.20806 8.3269 8.53151 8.58566L10.2843 9.98792C11.0156 10.5729 12.0779 10.4786 12.6946 9.77378L15.5645 6.49389Z"
                                                            fill="url(#paint1_linear_2356_17196)" />
                                                    </g>
                                                    <defs>
                                                        <filter id="filter0_i_2356_17196" x="-2" y="13" width="24"
                                                            height="13" filterUnits="userSpaceOnUse"
                                                            color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                in2="BackgroundImageFix" result="shape" />
                                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                result="hardAlpha" />
                                                            <feOffset dx="-4" dy="4" />
                                                            <feGaussianBlur stdDeviation="5" />
                                                            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1"
                                                                k3="1" />
                                                            <feColorMatrix type="matrix"
                                                                values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                                            <feBlend mode="normal" in2="shape"
                                                                result="effect1_innerShadow_2356_17196" />
                                                        </filter>
                                                        <filter id="filter1_i_2356_17196" x="0" y="2" width="20"
                                                            height="19" filterUnits="userSpaceOnUse"
                                                            color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                in2="BackgroundImageFix" result="shape" />
                                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                result="hardAlpha" />
                                                            <feOffset dx="-4" dy="4" />
                                                            <feGaussianBlur stdDeviation="5" />
                                                            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1"
                                                                k3="1" />
                                                            <feColorMatrix type="matrix"
                                                                values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0" />
                                                            <feBlend mode="normal" in2="shape"
                                                                result="effect1_innerShadow_2356_17196" />
                                                        </filter>
                                                        <linearGradient id="paint0_linear_2356_17196" x1="2" y1="13"
                                                            x2="8.73597" y2="27.9688" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FDD819" />
                                                            <stop offset="1" stop-color="#F81717" />
                                                        </linearGradient>
                                                        <linearGradient id="paint1_linear_2356_17196" x1="4" y1="2"
                                                            x2="18.9688" y2="17.9667" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FDD819" />
                                                            <stop offset="1" stop-color="#F81717" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
                                            <a class="action-btn primary-btn" href="{{ route('user.ticket.show',$ticket->uuid) }}">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M3 6L3 18C3 20.2091 4.79086 22 7 22H13L21 14V6C21 3.79086 19.2091 2 17 2L7 2C4.79086 2 3 3.79086 3 6Z"
                                                        fill="white" />
                                                    <path d="M13 18L13 22L21 14L17 14C14.7909 14 13 15.7909 13 18Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.25 7C7.25 6.58579 7.58579 6.25 8 6.25L16 6.25C16.4142 6.25 16.75 6.58579 16.75 7C16.75 7.41421 16.4142 7.75 16 7.75L8 7.75C7.58579 7.75 7.25 7.41421 7.25 7Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H12C12.4142 11.25 12.75 11.5858 12.75 12C12.75 12.4142 12.4142 12.75 12 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
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
@endsection
