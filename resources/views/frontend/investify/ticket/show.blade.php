@extends('frontend::layouts.user')
@section('title')
{{ __('Reply Ticket') }}
@endsection
@section('content')
<div class="container-fluid default-page">
    <div class="row gy-30">
        <div class="col-xl-12">
            <div class="rock-support-tickets-area">
                <div class="rock-dashboard-card">
                    <div class="rock-dashboard-title-inner">
                        <div class="content d-flex align-items-center gap-10">
                            <h3 class="rock-dashboard-tile">{{ $ticket->title.' - '.$ticket->uuid }}</h3>
                            <span class="rock-badge candle-light badge-icon">
                                @if($ticket->isOpen())
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.167969 2.71875V9.28125C0.167969 9.81581 0.373022 10.3006 0.705863 10.6554L2.65928 6.24639C3.06479 5.29843 3.96959 4.6875 4.96804 4.6875H10.2741V4.03125C10.2741 2.94394 9.42569 2.0625 8.37917 2.0625H6.42287C6.08574 2.0625 5.75471 1.96905 5.46393 1.79179L4.19909 1.02071C3.90831 0.843452 3.57728 0.75 3.24014 0.75H2.06286C1.01634 0.75 0.167969 1.63144 0.167969 2.71875Z" fill="white"></path>
                                </svg>
                                {{ __('Opened') }}
                                @else
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M11.9735 4.6665H2.02649C1.28374 4.6665 0.73009 5.35136 0.885718 6.07762L1.9381 10.9887C2.16864 12.0646 3.11938 12.8332 4.21964 12.8332H9.78036C10.8806 12.8332 11.8314 12.0646 12.0619 10.9887L13.1143 6.07762C13.2699 5.35136 12.7163 4.6665 11.9735 4.6665Z" fill="#48FFA7"/>
                                    <path d="M11.6654 4.6665V4.08317C11.6654 3.11667 10.8819 2.33317 9.91536 2.33317H8.28057C7.89087 2.33317 7.51233 2.2031 7.20493 1.96357L6.65635 1.5361C6.34896 1.29658 5.97041 1.1665 5.58071 1.1665H4.08203C3.11553 1.1665 2.33203 1.95001 2.33203 2.9165V4.6665H11.6654Z" fill="#48FFA7"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.03811 7.25425C9.21995 7.41336 9.23838 7.68976 9.07927 7.8716L7.40516 9.78487C7.04542 10.196 6.42577 10.251 5.99919 9.90978L4.97671 9.0918C4.78803 8.94086 4.75744 8.66554 4.90839 8.47686C5.05933 8.28819 5.33464 8.2576 5.52332 8.40854L6.5458 9.22652C6.60674 9.27527 6.69526 9.26741 6.74665 9.20868L8.42076 7.29541C8.57987 7.11357 8.85627 7.09514 9.03811 7.25425Z" fill="#48FFA7"/>
                                </svg>
                                {{ __('Completed') }}
                                @endif
                            </span>
                        </div>
                        <a class="site-btn gradient-btn radius-12" href="{{ route('user.ticket.close.now',$ticket->uuid) }}">{{ __('Mark As Completed') }}</a>
                    </div>
                    <div class="rock-support-tickets-wrapper">
                        <div class="rock-support-tickets-grid">
                            <div class="rock-support-tickets-item">
                                <div class="rock-support-tickets-aviator">
                                    <div class="thumb">
                                        <img src="{{ asset($ticket->user->avatar ?? 'global/materials/user.png')}}"
                                            alt="avatar">
                                    </div>
                                    <div class="contets">
                                        <h5 class="title">{{ $user->full_name }}</h5>
                                        <span class="info">{{ $user->email }}</span>
                                    </div>
                                </div>
                                <div class="rock-support-tickets-card">
                                    <div class="rock-support-tickets-content">
                                        <p class="description">
                                            {!! $ticket->message !!}
                                        </p>
                                    </div>
                                    @if($ticket->attach)
                                    <div class="rock-support-tickets-attachments">
                                        <div class="content">
                                            <h5 class="title">{{ __('Attachments') }}</h5>
                                            <a href="{{ asset($ticket->attach) }}" class="description" target="_blank">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g filter="url(#filter0_i_2356_17816)">
                                                        <path
                                                            d="M1.16797 3.50008C1.16797 2.21142 2.21264 1.16675 3.5013 1.16675H10.5013C11.79 1.16675 12.8346 2.21142 12.8346 3.50008V10.5001C12.8346 11.7887 11.79 12.8334 10.5013 12.8334H3.5013C2.21264 12.8334 1.16797 11.7887 1.16797 10.5001V3.50008Z"
                                                            fill="url(#paint0_linear_2356_17816)" />
                                                    </g>
                                                    <path
                                                        d="M1.66797 3.50008C1.66797 2.48756 2.48878 1.66675 3.5013 1.66675H10.5013C11.5138 1.66675 12.3346 2.48756 12.3346 3.50008V10.5001C12.3346 11.5126 11.5138 12.3334 10.5013 12.3334H3.5013C2.48878 12.3334 1.66797 11.5126 1.66797 10.5001V3.50008Z"
                                                        stroke="white" stroke-opacity="0.08" />
                                                    <path
                                                        d="M3.5013 12.8332H10.5013C11.79 12.8332 12.8346 11.7886 12.8346 10.4999V8.16658L11.1202 6.9322C10.2294 6.29078 9.01187 6.35707 8.19592 7.09142L5.80669 9.24173C4.99074 9.97609 3.77325 10.0424 2.88239 9.40096L1.16797 8.16658V10.4999C1.16797 11.7886 2.21264 12.8332 3.5013 12.8332Z"
                                                        fill="white" fill-opacity="0.3" />
                                                    <circle cx="4.95833" cy="4.95833" r="1.45833" fill="white"
                                                        fill-opacity="0.72" />
                                                    <defs>
                                                        <filter id="filter0_i_2356_17816" x="-2.83203" y="1.16675"
                                                            width="15.668" height="15.6667" filterUnits="userSpaceOnUse"
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
                                                                result="effect1_innerShadow_2356_17816" />
                                                        </filter>
                                                        <linearGradient id="paint0_linear_2356_17816" x1="1.16797"
                                                            y1="1.16675" x2="12.8346" y2="12.8334"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FDD819" />
                                                            <stop offset="1" stop-color="#F81717" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                {{ substr($ticket->attach,14) }}
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @foreach($ticket->messages as $message )
                            <div class="rock-support-tickets-item">
                                <div class="rock-support-tickets-aviator">
                                    <div class="thumb">
                                        @if( $message->model != 'admin')
                                        <img class="avatar avatar-round"
                                            src="{{ asset($ticket->user->avatar ?? 'global/materials/user.png' )}}" alt="" height="40"
                                            width="40">
                                        @else
                                        <img src="{{ asset($message->user->avatar ?? 'global/materials/user.png' )}}" alt="avater">
                                        @endif
                                    </div>
                                    <div class="contets">
                                        <h5 class="title">{{ $message->user->name }}</h5>
                                        <span class="info">{{ $message->user->email }}</span>
                                    </div>
                                </div>
                                <div class="rock-support-tickets-card">
                                    <div class="rock-support-tickets-content">
                                        <p class="description">
                                            {!! $message->message !!}
                                        </p>
                                    </div>
                                    @if($message->attach)
                                    <div class="rock-support-tickets-attachments">
                                        <div class="content">
                                            <h5 class="title">{{ __('Attachments') }} </h5>
                                            <a href="{{ asset($message->attach) }}" class="description">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g filter="url(#filter0_i_2356_17816)">
                                                        <path
                                                            d="M1.16797 3.50008C1.16797 2.21142 2.21264 1.16675 3.5013 1.16675H10.5013C11.79 1.16675 12.8346 2.21142 12.8346 3.50008V10.5001C12.8346 11.7887 11.79 12.8334 10.5013 12.8334H3.5013C2.21264 12.8334 1.16797 11.7887 1.16797 10.5001V3.50008Z"
                                                            fill="url(#paint0_linear_2356_17816)" />
                                                    </g>
                                                    <path
                                                        d="M1.66797 3.50008C1.66797 2.48756 2.48878 1.66675 3.5013 1.66675H10.5013C11.5138 1.66675 12.3346 2.48756 12.3346 3.50008V10.5001C12.3346 11.5126 11.5138 12.3334 10.5013 12.3334H3.5013C2.48878 12.3334 1.66797 11.5126 1.66797 10.5001V3.50008Z"
                                                        stroke="white" stroke-opacity="0.08" />
                                                    <path
                                                        d="M3.5013 12.8332H10.5013C11.79 12.8332 12.8346 11.7886 12.8346 10.4999V8.16658L11.1202 6.9322C10.2294 6.29078 9.01187 6.35707 8.19592 7.09142L5.80669 9.24173C4.99074 9.97609 3.77325 10.0424 2.88239 9.40096L1.16797 8.16658V10.4999C1.16797 11.7886 2.21264 12.8332 3.5013 12.8332Z"
                                                        fill="white" fill-opacity="0.3" />
                                                    <circle cx="4.95833" cy="4.95833" r="1.45833" fill="white"
                                                        fill-opacity="0.72" />
                                                    <defs>
                                                        <filter id="filter0_i_2356_17816" x="-2.83203" y="1.16675"
                                                            width="15.668" height="15.6667" filterUnits="userSpaceOnUse"
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
                                                                result="effect1_innerShadow_2356_17816" />
                                                        </filter>
                                                        <linearGradient id="paint0_linear_2356_17816" x1="1.16797"
                                                            y1="1.16675" x2="12.8346" y2="12.8334"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#FDD819" />
                                                            <stop offset="1" stop-color="#F81717" />
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                                {{ substr($message->attach,14) }}
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <form action="{{ route('user.ticket.reply') }}" method="post">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $ticket->uuid }}">

                                <div class="rock-support-tickets-input-wrapper">
                                    <div class="rock-support-tickets-input-inner">
                                        <div class="rock-support-tickets-input">
                                            <input type="text" name="message" placeholder="{{ __('Write Reply') }}">
                                            <div class="button-inner">
                                                <div class="button-attachments">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M21.0039 18L21.0039 10C21.0039 7.79086 19.213 6 17.0039 6L11.0039 6C8.79477 6 7.00391 7.79086 7.00391 10L7.00391 18C7.00391 20.2091 8.79477 22 11.0039 22L17.0039 22C19.213 22 21.0039 20.2091 21.0039 18Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M17.0039 14L17.0039 6C17.0039 3.79086 15.213 2 13.0039 2L9.06677 2C8.79063 2 8.56677 2.22386 8.56677 2.5L8.56677 4.54377C8.56677 6.27572 7.14174 7.70075 5.40979 7.70075C4.85483 7.70711 4.19089 7.71105 3.50322 7.71298C3.22735 7.71375 3.00391 7.93745 3.00391 8.21332L3.0039 14C3.0039 16.2091 4.79477 18 7.0039 18L13.0039 18C15.213 18 17.0039 16.2091 17.0039 14ZM7.74402 2.45867C7.74402 2.04806 7.24672 1.84419 6.96186 2.14047C6.30231 2.82563 5.328 3.83919 4.44846 4.75417C3.95338 5.26919 3.48834 5.75297 3.12635 6.12937C2.84817 6.41898 3.05204 6.89818 3.45312 6.89914C4.23623 6.90104 5.15843 6.89914 5.8234 6.89152C6.87707 6.89152 7.74402 6.02457 7.74402 4.9709L7.74402 2.45867Z"
                                                            fill="white" />
                                                    </svg>
                                                    <span>Add attachments</span>
                                                </div>
                                                <button type="button" class="site-btn gradient-btn radius-12">
                                                    {{ __('Submit') }}
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4"
                                                            d="M19 13.5C19 17.9183 15.4183 21.5 11 21.5C6.58172 21.5 3 17.9183 3 13.5C3 9.08172 6.58172 5.5 11 5.5C15.4183 5.5 19 9.08172 19 13.5Z"
                                                            fill="white" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16 4.25C15.5858 4.25 15.25 3.91421 15.25 3.5C15.25 3.08579 15.5858 2.75 16 2.75H21C21.4142 2.75 21.75 3.08579 21.75 3.5V8.5C21.75 8.91421 21.4142 9.25 21 9.25C20.5858 9.25 20.25 8.91421 20.25 8.5V5.31066L10.5303 15.0303C10.2374 15.3232 9.76256 15.3232 9.46967 15.0303C9.17678 14.7374 9.17678 14.2626 9.46967 13.9697L19.1893 4.25H16Z"
                                                            fill="white" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
