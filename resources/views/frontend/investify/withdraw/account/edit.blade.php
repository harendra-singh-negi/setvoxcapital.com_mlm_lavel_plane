@extends('frontend::layouts.user')
@section('title')
    {{ __('Edit Withdraw Account') }}
@endsection
@section('content')
    <div class="container-fluid default-page">
        <div class="row gy-30">
            <div class="col-xl-12">
                <div class="rock-edit-withdraw-account-area">
                    <div class="rock-dashboard-card">
                        <div class="rock-dashboard-title-inner">
                            <div class="content">
                                <h3 class="rock-dashboard-tile">{{ __('Edit Withdraw Account') }}</h3>
                            </div>
                            <a class="site-btn gradient-btn radius-12" href="{{ route('user.withdraw.account.index') }}">{{ __('Withdraw Account') }}</a>
                        </div>
                        <div class="rock-edit-withdraw-account-form">
                            <form action="{{ route('user.withdraw.account.update',$withdrawAccount->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="withdraw_method_id" value="{{$withdrawAccount->withdraw_method_id}}">
                                <div class="row gy-50">
                                    <div class="colx-xl-12">
                                        <div class="row g-20 selectMethodRow">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 selectMethodCol">
                                                <div class="rock-single-input">
                                                    <label class="input-label" for="">{{ __('Method Name:') }}</label>
                                                    <div class="input-field">
                                                        <input type="text" class="box-input" name="method_name" placeholder="eg. Withdraw Method - USD" value="{{ $withdrawAccount->method_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach(json_decode($withdrawAccount->credentials, true) as $key => $field)
                                                @if($field['type'] == 'file')

                                                    <input type="hidden" name="credentials[{{ $key}}][type]" value="{{ $field['type'] }}">
                                                    <input type="hidden" name="credentials[{{ $key}}][validation]" value="{{ $field['validation'] }}">

                                                    <div class="col-xl-6 col-md-12">
                                                        <div class="body-title">{{ $key }}</div>
                                                        <div class="wrap-custom-file">
                                                            <input
                                                                type="file"
                                                                name="credentials[{{ $key }}][value]"
                                                                id="{{ $key }}"
                                                                value="{{ $field['value'] }}"
                                                                accept=".gif, .jpg, .png"
                                                                @if($field['validation'] == 'required') required @endif
                                                            />
                                                            <label for="{{ $key }}">
                                                                <img
                                                                    class="upload-icon"
                                                                    src="{{ asset('global/materials/upload.svg') }}"
                                                                    alt=""
                                                                />
                                                                <span>{{ __('Select '). $key }}</span>
                                                            </label>
                                                        </div>
                                                        <div class="rock-upload-input">
                                                            <label class="input-label" for="">{{ $key }}</label>
                                                            <div class="upload-custom-file without-image">
                                                                <input type="file" id="image{{ $key }}" name="credentials[{{ $key }}][value]" accept=".gif, .jpg, .png" @if($field['validation'] == 'required') required @endif
                                                                onchange="showCloseButton(event)" />
                                                                <label for="image{{ $key }}">
                                                                    <span class="upload-icon">
                                                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g filter="url(#filter0_i_2427_12057)">
                                                                        <path d="M14 18L34 18C38.4183 18 42 21.5817 42 26V34C42 38.4183 38.4183 42 34 42H14C9.58172 42 6 38.4183 6 34L6 26C6 21.5817 9.58172 18 14 18Z" fill="url(#paint0_linear_2427_12057)"/>
                                                                        </g>
                                                                        <path d="M14 18.5L34 18.5C38.1421 18.5 41.5 21.8579 41.5 26V34C41.5 38.1421 38.1421 41.5 34 41.5H14C9.85787 41.5 6.5 38.1421 6.5 34L6.5 26C6.5 21.8579 9.85786 18.5 14 18.5Z" stroke="white" stroke-opacity="0.08"/>
                                                                        <g filter="url(#filter1_i_2427_12057)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9393 13.0607C16.3536 12.4749 16.3536 11.5251 16.9393 10.9393L22.9393 4.93934C23.5251 4.35355 24.4749 4.35355 25.0607 4.93934L31.0607 10.9393C31.6464 11.5251 31.6464 12.4749 31.0607 13.0607C30.4749 13.6464 29.5251 13.6464 28.9393 13.0607C27.6701 11.7915 25.5 12.6904 25.5 14.4853L25.5 30C25.5 30.8284 24.8284 31.5 24 31.5C23.1716 31.5 22.5 30.8284 22.5 30L22.5 14.4853C22.5 12.6904 20.3299 11.7915 19.0607 13.0607C18.4749 13.6464 17.5251 13.6464 16.9393 13.0607Z" fill="url(#paint1_linear_2427_12057)"/>
                                                                        </g>
                                                                        <path d="M17.2929 12.7071C16.9024 12.3166 16.9024 11.6834 17.2929 11.2929L23.2929 5.29289C23.6834 4.90237 24.3166 4.90237 24.7071 5.29289L30.7071 11.2929C31.0976 11.6834 31.0976 12.3166 30.7071 12.7071C30.3166 13.0976 29.6834 13.0976 29.2929 12.7071C27.7087 11.1229 25 12.2449 25 14.4853L25 30C25 30.5523 24.5523 31 24 31C23.4477 31 23 30.5523 23 30L23 14.4853C23 12.2449 20.2913 11.1229 18.7071 12.7071C18.3166 13.0976 17.6834 13.0976 17.2929 12.7071Z" stroke="white" stroke-opacity="0.08"/>
                                                                        <defs>
                                                                        <filter id="filter0_i_2427_12057" x="2" y="18" width="40" height="28" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                                        <feOffset dx="-4" dy="4"/>
                                                                        <feGaussianBlur stdDeviation="5"/>
                                                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0"/>
                                                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2427_12057"/>
                                                                        </filter>
                                                                        <filter id="filter1_i_2427_12057" x="12.5" y="4.5" width="19" height="31" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                                        <feOffset dx="-4" dy="4"/>
                                                                        <feGaussianBlur stdDeviation="5"/>
                                                                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                                        <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.5 0"/>
                                                                        <feBlend mode="normal" in2="shape" result="effect1_innerShadow_2427_12057"/>
                                                                        </filter>
                                                                        <linearGradient id="paint0_linear_2427_12057" x1="6" y1="18" x2="28.1538" y2="51.2308" gradientUnits="userSpaceOnUse">
                                                                        <stop stop-color="#FDD819"/>
                                                                        <stop offset="1" stop-color="#F81717"/>
                                                                        </linearGradient>
                                                                        <linearGradient id="paint1_linear_2427_12057" x1="16.5" y1="31.5" x2="39.4245" y2="18.7641" gradientUnits="userSpaceOnUse">
                                                                        <stop stop-color="#FDD819"/>
                                                                        <stop offset="1" stop-color="#F81717"/>
                                                                        </linearGradient>
                                                                        </defs>
                                                                    </svg>
                                                                    </span>
                                                                    <span>{{ __('Select ').$key }}</span>
                                                                </label>
                                                            </div>
                                                            <button type="button" class="upload-thumb-close" onclick="removeUploadedFile(this)"><i class="fa-regular fa-xmark"></i></button>
                                                        </div>
                                                    </div>

                                                @elseif($field['type'] == 'textarea')
                                                    <input type="hidden" name="credentials[{{ $key}}][type]" value="{{ $field['type'] }}">
                                                    <input type="hidden" name="credentials[{{ $key}}][validation]" value="{{ $field['validation'] }}">

                                                    <div class="col-xl-6 col-md-12">
                                                        <div class="rock-single-input">
                                                            <label class="input-label" for="">{{ $key }}</label>
                                                            <div class="input-field">
                                                                <textarea name="credentials[{{$key}}][value]" value="{{ $field['value'] }}" @if($field['validation'] == 'required') required @endif></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="credentials[{{ $key}}][type]" value="{{ $field['type'] }}">
                                                    <input type="hidden" name="credentials[{{ $key}}][validation]" value="{{ $field['validation'] }}">

                                                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                                                        <div class="rock-single-input">
                                                            <label class="input-label" for="">{{ ucwords( str_replace('_',' ',$key) ) }}</label>
                                                            <div class="input-field">
                                                                <input type="text" class="box-input" name="credentials[{{ $key}}][value]" value="{{ $field['value'] }}" @if($field['validation'] == 'required') required @endif>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="colx-xl-12">
                                        <div class="rock-input-btn-wrap justify-content-end">
                                            <button type="submit" class="site-btn gradient-btn radius-10">
                                                {{ __('Update Withdraw Account') }}
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.4"
                                                        d="M19 13C19 17.4183 15.4183 21 11 21C6.58172 21 3 17.4183 3 13C3 8.58172 6.58172 5 11 5C15.4183 5 19 8.58172 19 13Z"
                                                        fill="white" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M16 3.75C15.5858 3.75 15.25 3.41421 15.25 3C15.25 2.58579 15.5858 2.25 16 2.25H21C21.4142 2.25 21.75 2.58579 21.75 3V8C21.75 8.41421 21.4142 8.75 21 8.75C20.5858 8.75 20.25 8.41421 20.25 8V4.81066L10.5303 14.5303C10.2374 14.8232 9.76256 14.8232 9.46967 14.5303C9.17678 14.2374 9.17678 13.7626 9.46967 13.4697L19.1893 3.75H16Z"
                                                        fill="white" />
                                                </svg>
                                            </button>
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
@endsection
@section('script')
    <script>
        $("#selectMethod").on('change', function (e) {
            "use strict"
            e.preventDefault();

            //$('.manual-row').empty();
            $('.selectMethodRow').children().not(':first').remove();

            var id = $(this).val()

            var url = '{{ route("user.withdraw.method",":id") }}';
            url = url.replace(':id', id);
            $.get(url, function (data) {
                $(data).insertAfter(".selectMethodCol");
                imagePreview()
            })
        })
    </script>
@endsection
