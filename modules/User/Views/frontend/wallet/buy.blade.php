@extends('layouts.user')
@section('head')
    <link rel="stylesheet" href="{{asset('module/booking/css/checkout.css')}}">
@endsection
@section('content')
    <h2 class="title-bar">
        {{__("Buy credits")}}
    </h2>
    @include('admin.message')
    <form action="{{route('user.wallet.buyProcess')}}" method="post">
    <div class="bravo-user-dashboard">
        <div class="panel">
            <div class="panel-title"><strong >{{__("Buy")}}</strong></div>
            <div class="panel-body">
                @csrf

                @if(setting_item('wallet_deposit_type') == 'list')
                    @if(!empty($wallet_deposit_lists))
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Price')}}</th>
                                    <th scope="col">{{__("Credit")}}</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    //print_r($wallet_deposit_lists);die;
                                @endphp
                                @foreach($wallet_deposit_lists as $k=>$item)
                                    <tr>
                                        <td>{{$k + 1}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{format_money($item['amount'])}}</td>
                                        <td>{{$item['credit']}}</td>
                                        <td><label class="btn btn-info" >
                                        <input type="radio" id="deposit_amount_<?=$k?>" name="deposit_option" value="{{$k}}"  deposit_amount_<?=$k?>="{{$item['amount']}}"> {{__("Select")}} </label></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">{{__("Sorry, no options found")}}</div>
                    @endif
                @else
                    <div class="form-section mt-3">
                        <h4 class="form-section-title">{{__("How much would you like to deposit?")}}</h4>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control update_exchange_value" name="deposit_amount" placeholder="{{__('Deposit amount')}}" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text deposit_exchange_value" data-rate="{{(float)setting_item('wallet_deposit_rate',1)}}" ></span>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="form-section mt-3">
                    <h4 class="form-section-title">{{__('Select Payment Method')}}</h4>
                    <div class="gateways-table accordion mt-3" id="accordionExample">
                        @foreach($gateways as $k=>$gateway)
                            <div class="card">
                                <div class="card-header">
                                    <strong class="mb-0">
                                        <label class="" data-toggle="collapse" data-target="#gateway_{{$k}}" >
                                            <input type="radio" name="payment_gateway" value="{{$k}}">
                                            @if($logo = $gateway->getDisplayLogo())
                                                <img src="{{$logo}}" alt="{{$gateway->getDisplayName()}}">
                                            @endif
                                            {{$gateway->getDisplayName()}}
                                        </label>
                                    </strong>
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
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                 $('input[type=radio][name=deposit_option]').on('change', function () {
                    checkDepositNow();
                  });

                    function checkDepositNow() 
                    {
                        var deposit_id = $("input[name=deposit_option]:checked").val();
                        var deposit_to_pay = $("#deposit_amount_"+deposit_id).attr("deposit_amount_"+deposit_id);
                         
                         //$('#amount').val(deposit_to_pay);
                         $.ajax({
                        url : '{{route("gateway.update")}}',
                        data:{"amount":deposit_to_pay},
                        type: 'GET',
                        success: function(data){
                            var json = $.parseJSON(data);
                            $('#amount').val(json.amount);
                            $('#orderId').val(json.orderId);
                            $('#invoiceNumber').val(json.orderId);
                            $('#txnToken').val(json.txnToken);
                            //console.log(data);
                        }
                       });
                   
                   }
                </script>
                @php   
          
                @endphp
        
                <input type="hidden" id="merchantPgIdentifier" name="merchantPgIdentifier" value="205">
                <input type="hidden" id="secret_id" name="secret_id" value="2001">
                <input type="hidden" id="currency" name="currency" value="CAD">
                <input type="hidden" id="amount" name="amount" value="">
                <input type="hidden" id="orderId" name="orderId" value="">
                <input type="hidden" id="invoiceNumber" name="invoiceNumber" value="">
                <input type="hidden" id="successUrl" name="successUrl" value="http://myofficedev.mybackpocket.co/gateway/confirm/two_checkout_gateway">
                <input type="hidden" id="errorUrl" name="errorUrl" value="http://myofficedev.mybackpocket.co/gateway/cancel/two_checkout_gateway">
                <input type="hidden" id="storeName" name="storeName" value="name205">
                <input type="hidden" id="transactionType" name="transactionType" value="">
                <input type="hidden" id="timeout" name="timeout" value="">
                <input type="hidden" id="transactionDateTime" name="transactionDateTime" value="{{date("Y-m-d")}}">
                <input type="hidden" id="language" name="language" value="EN">
                <input type="hidden" id="txnToken" name="txnToken" value=""">
                <input type="hidden" id="itemList" name="itemList" value="Deposit"> 
                <input type="hidden" id="otherInfo" name="otherInfo" value="">
                <input type="hidden" id="merchantCustomerPhone" name="merchantCustomerPhone" value="04353563535">
                <input type="hidden" id="merchantCustomerEmail" name="merchantCustomerEmail" value="customer@gmail.com">
                @php
                    $term_conditions = setting_item('booking_term_conditions');
                @endphp
                <div class="form-group mt-3">
                    <label class="term-conditions-checkbox">
                        <input type="checkbox" name="term_conditions"> {{__('I have read and accept the')}}  <a target="_blank" href="{{get_page_url($term_conditions)}}">{{__('terms and conditions')}}</a>
                    </label>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="submit">{{ __('Process now')}}</button>
            </div>
        </div>
    </div>
    </form>
@endsection
@section('footer')

@endsection
