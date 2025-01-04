

<li class="@if($child) child @endif">
    <div class="rock-referral-tree-item @if($child) tree-children @else tree-parent @endif">
        <div class="rock-referral-tree-card-inner">
            <div class="rock-referral-tree-card {{ !$child ? 'tree-parent' : '' }}">
                <div class="thumb">
                    <img src="{{ asset($levelUser->avatar) }}">
                </div>
                <div class="content">
                    @if($me)
                    <h5 class="title">{{ __('It\'s Me') }} ({{ $levelUser->full_name }})</h5>
                    @else
                    <h5 class="title">{{ $levelUser->full_name }}</h5>
                    <p class="info">
                        @if(setting('deposit_level'))
                        {{ __('Deposit') }} {{ $currencySymbol.$levelUser->totalDeposit() }}, <br>
                        @endif
                        @if(setting('investment_level'))
                        {{ __('Invest') }} {{ $currencySymbol.$levelUser->totalInvestment() }}, <br>
                        @endif
                        @if(setting('profit_level'))
                        {{ __('ROI Profit') }} {{ $currencySymbol.$levelUser->totalRoiProfit() }} <br>
                        @endif
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($depth && $level >= $depth && $levelUser->referrals->count() > 0)
        <ul>
            @foreach($levelUser->referrals as $referral)
                @include('frontend::referral.include.__tree', ['levelUser' => $referral, 'level' => $level, 'depth' => $depth + 1, 'child' => true, 'me' => false])
            @endforeach
        </ul>
    @endif
</li>

