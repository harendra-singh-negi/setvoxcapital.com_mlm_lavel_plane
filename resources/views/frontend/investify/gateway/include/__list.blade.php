
<div class="site-table-col">
    <span>{{ __('Payment Method:') }}</span>
</div>
<div class="site-table-col">
    <div class="rock-single-input">
        <div class="input-select">
            <select  name="gateway_code" id="gatewaySelect" required>
                @foreach($gateways as $gateway)
                    <option value="{{ $gateway->gateway_code }}">{{ $gateway->name}}</option>
                @endforeach
            </select>
            <p class="input-description invest-gateway-charge"></p>
        </div>
    </div>
</div>
