<div class="form-section">
    <h4 class="form-section-title">{{__('Select Payment Method')}}</h4>
    <div class="gateways-table accordion" id="accordionExample">
        @foreach($gateways as $k=>$gateway)
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <label class="" data-toggle="collapse" data-target="#gateway_{{$k}}" >
                            <input type="radio" name="payment_gateway" value="{{$k}}">
                            @if($logo = $gateway->getDisplayLogo())
                                <img src="{{$logo}}" alt="{{$gateway->getDisplayName()}}">
                            @endif
                            {{$gateway->getDisplayName()}}
                        </label>
                    </h4>
                </div>
                <div id="gateway_{{$k}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="gateway_name">
                            {!! $gateway->getDisplayName() !!}
                        </div>
                        {!! $gateway->getDisplayHtml() !!}

                    </div>
                </div>
            </div>
        @endforeach
        @php     
        $amount=str_replace("$","",format_money($booking->total*1.13));
        $token = "name205"."CAD"."2001".date("Y-m-d").$amount.$booking->id;
        $preHash = "name205"."CAD"."2001".date("Y-m-d").'-amount-'.$booking->id;
        $hashedToken = hash('sha256', $token);
        @endphp

<input type="hidden" id="merchantPgIdentifier" name="merchantPgIdentifier" value="205">
<input type="hidden" id="secret_id" name="secret_id" value="2001">
<input type="hidden" id="currency" name="currency" value="CAD">
<input type="hidden" id="amount" name="amount" value="{{abs($amount)}}" class="pay_amount">
<input type="hidden" id="payment_type" name="paymentType" value="" class="payment_type">
<input type="hidden" id="pre_hash" name="preHash" value="{{$preHash}}" class="pre_hash"> 
<input type="hidden" id="orderId" name="orderId" value="{{$booking->id}}">
<input type="hidden" id="invoiceNumber" name="invoiceNumber" value="{{$booking->id}}">
<input type="hidden" id="successUrl" name="successUrl" value="http://myofficedev.mybackpocket.co/booking/confirm/two_checkout_gateway">
<input type="hidden" id="errorUrl" name="errorUrl" value="http://myofficedev.mybackpocket.co/booking/cancel/two_checkout_gateway">
<input type="hidden" id="storeName" name="storeName" value="name205">
<input type="hidden" id="transactionType" name="transactionType" value="">
<input type="hidden" id="timeout" name="timeout" value="">
<input type="hidden" id="transactionDateTime" name="transactionDateTime" value="{{date("Y-m-d")}}">
<input type="hidden" id="language" name="language" value="EN">
<input type="hidden" id="txnToken" name="txnToken" value="{{$hashedToken}}" class="txnToken">
<input type="hidden" id="itemList" name="itemList" value="list">
<input type="hidden" id="otherInfo" name="otherInfo" value="">
<input type="hidden" id="credits" name="credits" value="{{$user->balance}}">
<input type="hidden" id="merchantCustomerPhone" name="merchantCustomerPhone" value="04353563535">
<input type="hidden" id="merchantCustomerEmail" name="merchantCustomerEmail" value="customer@gmail.com">
    </div>
</div> 
