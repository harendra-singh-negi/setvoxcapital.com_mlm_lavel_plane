<div class="row">
    <div class="col-12">
   @php
    $referrer = \App\Models\User::where('id', $user->ref_id)->first();
@endphp
</div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="user-ranking" @if($user->avatar) style="background: url({{ asset($user->avatar) }});" @endif>
            <h6 style="font-size:10px;margin:8px 0px">Hi, {{$user->first_name}} {{$user->last_name}}</h6>
            <h4>{{ $user->rank->ranking }}</h4>
            <p>{{ $user->rank->ranking_name }}</p>
            <h6 style="font-size:10px;margin:8px 0px"> @if($referrer)
        Sponser: {{ $referrer->first_name }} {{$referrer->last_name}}<!-- Replace with the field you want to display -->
    @else
        {{ __('No Sponser Found') }}
    @endif</h6>
            <div class="rank" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->rank->description }}">
                <img src="{{ asset( $user->rank->icon) }}" alt="">
            </div>
        </div>
    </div>
    @if(setting('sign_up_referral','permission'))
        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12"> 
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('Referral URL') }}</h3>
                </div>
                <div class="site-card-body">
                    <div class="referral-link">
                        <div class="referral-link-form">
                            <input type="text" value="{{ $referral->link }}" id="refLink"/>
                            <button type="submit" onclick="copyRef()">
                                <i class="anticon anticon-copy"></i>
                                <span id="copy">{{ __('Copy') }}</span>
                            </button>
                        </div>
                        <p class="referral-joined">
                            {{ $referral->relationships()->count() }} {{ __('peoples are joined by using this URL') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
