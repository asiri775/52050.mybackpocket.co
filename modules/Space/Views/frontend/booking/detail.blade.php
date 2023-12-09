
@php 
use App\Helpers\CodeHelper;
$lang_local = app()->getLocale() @endphp
<div class="booking-review">
    <h4 class="booking-review-title">{{__("Your Booking")}}</h4>
    <div class="booking-review-content">
        <div class="review-section">
           
            <div class="service-info">
                <div>
                    @php
                        $service_translation = $service->translateOrOrigin($lang_local);
                    @endphp
                    <h3 class="service-name"><a href="{{$service->getDetailUrl()}}">{!! clean($service_translation->title) !!}</a></h3>
                    @if($service_translation->address)
                        <p class="address"><i class="fa fa-map-marker"></i>
                            {{$service_translation->address}}
                        </p>
                    @endif
                </div>
                <div>
                    @if($image_url = $service->image_url)
                        @if(!empty($disable_lazyload))
                            <img src="{{$service->image_url}}" class="img-responsive" alt="{!! clean($service_translation->title) !!}">
                        @else
                            {!! get_image_tag($service->image_id,'medium',['class'=>'img-responsive','alt'=>$service_translation->title]) !!}
                        @endif
                    @endif
                </div>
                @php $vendor = $service->author; @endphp
                @if($vendor->hasPermissionTo('dashboard_vendor_access') and !$vendor->hasPermissionTo('dashboard_access'))
                    <div class="mt-2">
                        <i class="icofont-info-circle"></i>
                        {{ __("Vendor") }}: <a href="{{route('user.profile',['id'=>$vendor->id])}}" target="_blank" >{{$vendor->getDisplayName()}}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="review-section">
            <p class="service-name-booking-text">{{__("Booking Details")}}</p>
            <ul class="review-list">
                @if($booking->start_date)
                    <li>
                        <div class="label">{{__('Start date:')}}</div>
                        <div class="val">
                            {!! display_datetime_custom($booking->start_date) !!}
                        </div>
                    </li>
                    <li>
                        <div class="label">{{__('End date:')}}</div>
                        <div class="val">
                            {!! display_datetime_custom($booking->end_date) !!}
                        </div>
                    </li>
                    @php
                    $price_item = $booking->total_before_extra_price;
                    $d1= new DateTime($booking->start_date); // first date
                    $d2= new DateTime($booking->end_date); // second date
                    $interval= $d1->diff($d2); // get difference between two dates
                    //echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
                    $days=$interval->days;
                    $stat_date= $d1->format('Y-m-d');
                    $end_date= $d2->format('Y-m-d');
                    $weeks= CodeHelper::numWeeks($stat_date, $end_date);
                    $months=$interval->format('%m');

                    if($interval->h !='' AND $interval->h<24 AND $months==0 AND $days==0 AND $weeks==0)
                    {
                       $book_qty=$interval->h; 
                       $book_units='Hours';
                       $book_rate=$service->hourly;
                       $book_amount=$interval->h*$service->hourly;
                    }
                    else if($days !='' AND $days>=1 AND $weeks==0 AND $months==0)
                    {
                       $book_qty=$interval->days; 
                       $book_units='Days';
                       $book_rate=$service->daily;
                       $book_amount=$interval->days*$service->daily;

                    }
                    else if($weeks !='' AND $weeks>=1 AND $months==0)
                    {
                       $book_qty=$interval->days; 
                       $book_units='Weeks';
                       $book_rate=$service->weekly;
                       $book_amount=$weeks*$service->weekly;
                    }
                    else if($months !='' AND $months>=1)
                    {
                       $book_qty=$months; 
                       $book_units='Months';
                       $book_rate=$service->monthly;
                       $book_amount=$months*$service->monthly;

                    }
                    else {
                       $book_qty=1; 
                       $book_units='Fixed';
                       $book_rate=$price_item;
                       $book_amount=$price_item;
                    }
                    @endphp
                    <table class="booking-table-listing">
                        <thead>
                            <tr>
                                <th width="25%">QTY</th>
                                <th width="25%">Units</th>
                                <th width="25%">Rate</th>
                                <th width="25%">Amount</th>
                            </tr>
                        </thead>
                        @if($book_amount!='')
                        <tbody>
                            <tr>
                                <td>{{$book_qty}}</td>
                                <td>{{$book_units}}</td>
                                <td>{{format_money($book_rate)}}</td>
                                <td>{{format_money($book_amount)}}</td>
                            </tr>
                        </tbody>
                        @endif
                     </table>

                @endif
                @if($meta = $booking->getMeta('adults'))
                    <li>
                        <div class="label">{{__('Adults:')}}</div>
                        <div class="val">
                            {{$meta}}
                        </div>
                    </li>
                @endif
                @if($meta = $booking->getMeta('children'))
                    <li>
                        <div class="label">{{__('Children:')}}</div>
                        <div class="val">
                            {{$meta}}
                        </div>
                    </li>
                @endif

            </ul>
        </div>
        <div class="review-section" >
            <div class="review-list">
            <table class="booking-table-listing">   
                <tbody>
                    <tr>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                    </tr>
                    @if(!empty($price_item))
                    <tr>
                        <td width="50%">&nbsp;</td>
                        <td width="30%">{{__('TOTAL')}}</td>
                        <td width="20%">{{format_money( $price_item)}}</td>
                    </tr>
                    @endif
                    @php $extra_price = $booking->getJsonMeta('extra_price') @endphp
                    @if(!empty($extra_price))
                    <tr>
                        <td width="40%">&nbsp;</td>
                        <td width="40%">{{__("Extra Prices:")}}</td>
                        <td width="20%"> 
                            <ul>
                            @foreach($extra_price as $type)
                                <li>
                                    <div class="label">{{$type['name_'.$lang_local] ?? $type['name']}}:</div>
                                    <div class="val">
                                        {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        </td>
                    </tr>
                    @endif
                    @php
                        $list_all_fee = [];
                        if(!empty($booking->buyer_fees)){
                            $buyer_fees = json_decode($booking->buyer_fees , true);
                            $list_all_fee = $buyer_fees;
                        }
                        if(!empty($vendor_service_fee = $booking->vendor_service_fee)){
                            $list_all_fee = array_merge($list_all_fee , $vendor_service_fee);
                        }
                    @endphp
                    @if(!empty($list_all_fee))
                        @foreach ($list_all_fee as $item)
                            @php
                                $fee_price = $item['price'];
                                if(!empty($item['unit']) and $item['unit'] == "percent"){
                                    $fee_price = ( $booking->total_before_fees / 100 ) * $item['price'];
                                }
                            @endphp
                    <tr>
                        <td width="5%">&nbsp;</td>
                        <td width="75%" style="text-transform: uppercase;">
                            {{$item['name_'.$lang_local] ?? $item['name']}}
                                <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $item['desc_'.$lang_local] ?? $item['desc'] }}"></i>
                                @if(!empty($item['per_person']) and $item['per_person'] == "on")
                                    : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                                @endif
                        </td>
                        <td width="20%">
                        @if(!empty($item['per_person']) and $item['per_person'] == "on")
                            {{ format_money( $fee_price * $booking->total_guests ) }}
                        @else
                            {{ format_money( $fee_price ) }}
                        @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                        <td style="border-top: 1px solid #eaeef3;"></td>
                    </tr>
                    <tr>
                        <td width="50%">&nbsp;</td>
                        <td width="30%">{{__('SUBTOTAL')}}</td>
                        <td width="20%">{{format_money($booking->total)}}</td>
                    </tr>
                    <tr>
                        <td width="50%">&nbsp;</td>
                        <td width="30%">{{__('TAX (13%)')}}</td>
                        <td width="20%">{{format_money(($booking->total*0.13))}}</td>
                    </tr>
                </tbody>
            </table>
            <div  style="margin-top:10px;">
                  @includeIf('Coupon::frontend/booking/checkout-coupon')
            </div>
            </div>
              <div class="review-list">
                <table class="booking-table-listing" style="font-size: 16px;font-weight: 450;">     
                        <tbody>
                            <tr>
                                <td width="30%">&nbsp;</td>
                                <td width="50%">{{__("GRAND TOTAL")}}</td>
                                <td width="20%">{{format_money($booking->total*1.13)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if($booking->status !='draft')
                <div class="review-list">
                 <table class="booking-table-listing" style="font-size: 14px;font-weight: 550;color: #007bff;">     
                   <tbody>
                      <tr>
                         <td width="30%">&nbsp;</td>
                         <td width="50%">{{__("Paid:")}}</td>
                         <td width="20%">{{format_money($booking->paid)}}</td>
                       </tr>
           
                   </tbody>
                 </table>
                 @if($booking->paid < $booking->total )
                 <table class="booking-table-listing" style="font-size: 16px;font-weight: 550;border: 2px solid rgb(177, 173, 173);margin:5px;">     
                    <tbody>
                    <tr>
                    <td width="30%">&nbsp;</td>
                    <td width="50%">{{__("BALANCE")}}</td>
                    <td width="20%">{{format_money($booking->total*1.13 - $booking->paid)}}</td>
                   </tr>
                </tbody>
               </table>
                @endif
                </div>  
                @endif

                @include ('Booking::frontend/booking/checkout-deposit-amount')
        </div>
    </div>
</div>

<?php
$dateDetail = $service->detailBookingEachDate($booking);
;?>
<div class="modal fade" id="detailBookingDate{{$booking->code}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">{{__('Detail')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <ul class="review-list list-unstyled">
                            <li class="mb-3 pb-1 border-bottom">
                                <h6 class="label text-center font-weight-bold mb-1"></h6>
                                    <div>
                                        @includeIf("Space::frontend.booking.detail-date",['rows'=>$dateDetail])
                                    </div>
                                <div class="d-flex justify-content-between font-weight-bold px-2">
                                    <span>{{__("Total:")}}</span>
                                    <span>{{format_money(array_sum(\Illuminate\Support\Arr::pluck($dateDetail,['price'])))}}</span>
                                </div>
                            </li>
                    </ul>
            </div>
        </div>
    </div>
</div>
