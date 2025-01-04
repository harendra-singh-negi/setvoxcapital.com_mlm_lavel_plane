<li>
    <span class="title">{{ __('Withdraw Fee') }}</span>
    <span class="info"><span class="withdrawFee">{{ $charge }}</span> {{ $currency }}</span>
</li>

@if($conversionRate != null)
    <li>
        <span class="title">{{ __('Conversion Rate') }}</span>
        <span class="info"><span class="conversion-rate">1 {{ $currency }} = {{ $conversionRate }}</span></span>
    </li>
    <li>
        <span class="title">{{ __('Pay Amount') }}</span>
        <span class="info"><span class="pay-amount"></span></span>
    </li>
@endif

<li>
    <span class="title">{{ __('Withdraw Account') }}</span>
    <span class="info">{{ $name }}</span>
</li>

@foreach($credentials as $name => $data)
    <li>
        <span class="title">{{ $name }}</span>
        <span class="info">
            @if( $data['type'] == 'file' )
            <img src="{{ asset(data_get($data, 'value')) }}" alt=""/>
            @else
                <strong>{{ data_get($data, 'value') }}</strong>
            @endif
        </span>
    </li>
@endforeach

