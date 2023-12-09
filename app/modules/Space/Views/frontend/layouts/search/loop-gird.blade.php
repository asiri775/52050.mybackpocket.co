@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp

<div class="item-loop ">
    <div class="thumb-image">
        <a @if(!empty($blank)) target="_blank"
           @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                    <img src="{{$row->image_url}}"
                    class="img-responsive lazy loaded" alt=""
                    data-src="{{$row->image_url}}"
                    data-was-processed="true">
                @else
                    {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
                @endif
            @endif
        </a>
        <div class="userimageresult  text-center">
            <a href="http://mofront.myoffice.ca/index.php?page=user/profile/20/Heather-Larkin">
                <img src="userdata/Profile/20/images.png" alt="Heather Larkin" title="Heather Larkin">
            </a>
        </div>
        @if($row->discount)
        <div class="featured-off">
            {{$row->discount}}% OFF
        </div>
        @endif
    </div>
    <div class="row location-header">
        
            @if($row->price and $row->daily=='')
            <div class="price-tab w-100">
            <div class="tab-content">
            <div class="tab-pane active" id="25price-tab">
            <span class="onsale">{{ $row->display_sale_price }}</span>
            <span class="text-price">{{ $row->display_price }}</span>
           </div>
           </div>
           <ul class="nav nav-tabs justify-content-center">
            <li class="active"><a href="#25price-tab" data-toggle="tab">Hourly</a></li>	
             </ul>
           </div>
            @else
            <div class="price-tab">
            <div class="tab-content">
                @if($row->hourly)
                <div class="tab-pane active" id="1price-tab">
                    @if($row->discount)
                    @php 
                    $hourly_discounted=number_format((float)$row->hourly*(1-($row->discount/100)), 2, '.', ''); 
                    @endphp
                   <span class="onsale">${{ $row->hourly }}</span>
                   <span class="text-price">${{ $hourly_discounted }}</span>
                    @else
                    <span class="text-price">${{ $row->hourly }}</span>
                    @endif
                 </div>
                 @endif
                 @if($row->daily)
                 <div class="tab-pane" id="2price-tab">
                    @if($row->discount)
                    @php 
                    $daily_discounted=number_format((float)$row->daily*(1-($row->discount/100)), 2, '.', ''); 
                    @endphp
                   <span class="onsale">${{ $row->daily }}</span>
                   <span class="text-price">${{ $daily_discounted }}</span>
                    @else
                    <span class="text-price">${{ $row->daily }}</span>
                    @endif
                 </div>
                 @endif
                 @if($row->weekly)
                 <div class="tab-pane" id="3price-tab">
                    @if($row->discount)
                    @php 
                    $weekly_discounted=number_format((float)$row->weekly*(1-($row->discount/100)), 2, '.', ''); 
                    @endphp
                   <span class="onsale">${{ $row->weekly }}</span>
                   <span class="text-price">${{ $weekly_discounted }}</span>
                    @else
                    <span class="text-price">${{ $row->weekly }}</span>
                    @endif
                 </div>
                 @endif
                 @if($row->monthly)
                 <div class="tab-pane" id="4price-tab">
                    @if($row->discount)
                    @php 
                    $monthly_discounted=number_format((float)$row->monthly*(1-($row->discount/100)), 2, '.', ''); 
                    @endphp
                   <span class="onsale">${{ $row->monthly }}</span>
                   <span class="text-price">${{ $monthly_discounted }}</span>
                    @else
                    <span class="text-price">${{ $row->monthly }}</span>
                    @endif
                 </div>
                 @endif
               </div>
               <ul class="nav nav-tabs">
                @if($row->hourly)<li class="active"><a href="#1price-tab" data-toggle="tab">Hourly</a></li>@endif
                @if($row->daily)<li><a href="#2price-tab" data-toggle="tab">Daily</a></li>@endif
                @if($row->weekly)<li><a href="#3price-tab" data-toggle="tab">Weekly</a></li>@endif
                @if($row->monthly)<li><a href="#4price-tab" data-toggle="tab">Monthly</a></li>@endif
              </ul>
            </div>
            @endif
       
        <div class="col-sm-7 col-xs-7 pl-3 pr-0">
            <div class="item-title">
                <a @if(!empty($blank)) target="_blank"
                @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
                 @if($row->is_instant)
                     <i class="fa fa-bolt d-none"></i>
                 @endif
                 {!! clean($translation->title) !!}
               </a>
                <div class="div-line"></div>
            </div>
            <div class="location" style="height: 18px;">
                @if(!empty($row->address))
                        @php 
                        $location = explode(",", $row->address);
                        @endphp
                        {{(count($location)>1)?$location[1]:$location[0]}}
                    @endif
            </div>
        </div>
        <?php
		$review_score = $row->review_data;
        $score_total = $review_score['score_total'];
        ?>
        <div class="col-sm-5 location-rating mt-4 text-center p-2">
            @if($score_total!=0)
                <div class="mb-2"><span   class="star-div">{{ $score_total }}</span></div>
                <div class="rating_stars fulwidthm left pr-4">
                    @for($number = 1; $number <= $score_total;  $number++)
                        <i class="fa fa-star yellowtext"></i>
                    @endfor
                </div>
		        @if($review_score['total_review'] > 1)
                <div class="text-rating">
                        {{ __(":number Reviews",["number"=>$review_score['total_review'] ]) }}
                </div>
		        @endif
            @endif
        </div>
    </div>
    <div class="amenities search-icon">
        <a class="pop" href="#"><span class="amenity total">
                <i class="input-icon field-icon icofont-people"></i> Host</span>
            <div class="popup">
                @php $user = \App\User::where('id', $row->create_user)->first(); @endphp
                <div class="author">
                    <img
                        src="{{ asset('uploads/demo/general') . '/' . $user->avatar  }}"
                        alt="Eva Hicks">
                    <div class="author-meta">
                        <h4>{{ $user->name }}</h4>
                        <div class="star">
                            <i class="fa fa-star yellowtext"></i>
                            <i class="fa fa-star yellowtext"></i>
                            <i class="fa fa-star yellowtext"></i>
                            <i class="fa fa-star yellowtext"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h3>Since {{ date_format($user->created_at, "Y") }}</h3>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{$row->getDetailUrl($include_param ?? true)}}"><span class="amenity bed" data-toggle="tooltip"
                                                                       title="" data-original-title="Manually Book">
                <i class="input-icon field-icon icofont-ui-calendar"></i>Book</span>
        </a>
        <a href="#"><span class="amenity bath" data-toggle="tooltip" title="" data-original-title="Contact Us">
                <i class="input-icon field-icon icofont-envelope"></i> Contact</span>
        </a>
    </div>
</div>
