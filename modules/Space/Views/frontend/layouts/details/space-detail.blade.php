<?php
//dd($row);
?>
<div class="g-header mt-5 mb-3">
    <div class="left">
        <h1>{!! clean($translation->title) !!}</h1>
        @if ($translation->address)
            <?php
            $mapLink = 'https://www.google.com/maps/place/' . trim(urlencode($row->address));
            if ($row->map_lat != null && $row->map_lng != null) {
                //$mapLink = 'https://www.google.com/maps/search/' . trim($row->map_lat) . ',' . trim($row->map_lng) . '';
            }
            ?>
            <p class="address"><i class="fa fa-map-marker mr-1"></i>
                <a href="{{ $mapLink }}" target="_blank">{{ $translation->address }}</a>
            </p>
        @elseif ($row->map_lat != null && $row->map_lng != null)
            <?php
            $mapLink = 'https://www.google.com/maps/search/' . trim($row->map_lat) . ',' . trim($row->map_lng) . '';
            ?>
            <p class="address"><i class="fa fa-map-marker mr-1"></i>
                <a href="{{ $mapLink }}" target="_blank">View On Map</a>
            </p>
        @endif
    </div>
    <script>
        function getSelectedTabIndex() {
            $('#space-tabs li a[href="#module-location"]').click();
            $('html,body').animate({
                scrollTop: '+=100px'
            });

        }
    </script>
    <div class="right">
        @if ($row->getReviewEnable() and $review_score['score_total'] != 0)
            @if ($review_score)
                <div class="review-score">
                    <div class="head">
                        <div class="score">
                            {{ $review_score['score_total'] }}</span>
                        </div>
                        <div class="left text-center ml-2">
                            <span class="head-rating">
                                <?php
                                $reviewData = $row->getScoreReview();
                                $score_total = $reviewData['score_total'];
                                ?>
                                <div class="star-rate">
                                    @for ($number = 1; $number <= $reviewData['score_total']; $number++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>
                            </span>
                            <span
                                class="text-rating">{{ __('from :number reviews', ['number' => $review_score['total_review']]) }}</span>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
<div class="g-space-feature">
    <div class="row">
        <div class="col-xs-6 col-lg col-md-6">
            <div class="item">
                <img src="{{ \App\Helpers\CodeHelper::withAppUrl('/images/desk-chair.png') }}">
                <div class="info">
                    <h4 class="name">Desks</h4>
                    <p class="value">
                        {{ $row->desk ? $row->desk : 0 }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-lg col-md-6">
            <div class="item">
                <img src="{{ \App\Helpers\CodeHelper::withAppUrl('/images/armchair.png') }}">
                <div class="info">
                    <h4 class="name">Seats</h4>
                    <p class="value">
                        {{ $row->seat ? $row->seat : 0 }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-lg col-md-6">
            <div class="item">
                <img src="{{ \App\Helpers\CodeHelper::withAppUrl('/images/guests.png') }}">
                <div class="info">
                    <h4 class="name">Guests</h4>
                    <p class="value">
                        {{ $row->max_guests }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-lg col-md-6">
            <div class="item">
                <img src="{{ \App\Helpers\CodeHelper::withAppUrl('/images/parking-area.png') }}">
                <div class="info">
                    <h4 class="name">Parking</h4>
                    <p class="value">
                        @if ($row->parking)
                            {{ 'Yes' }}
                        @else
                            {{ 'No' }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-lg col-md-6">
            <div class="item">
                <img src="{{ \App\Helpers\CodeHelper::withAppUrl('/images/open-book.png') }}">
                <div class="info">
                    <h4 class="name">RapidBook</h4>
                    <p class="value">
                        @if ($row->rapidbook)
                            {{ 'Yes' }}
                        @else
                            {{ 'No' }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", ".bravo_detail_hotel .details-hotel .g-faq .item .header", function() {
        $(this).parent().toggleClass("active");
    });
</script>
<div class="tab-content-wrapper">
    <div id="space-tabs">
        <ul class="location-module-nav nav nav-pills justify-content-center">
            <li class="active">
                <a href="#module-photos" data-toggle="tab">Photos</a>
            </li>
            <li>
                <a href="#module-description" data-toggle="tab">Description</a>
            </li>
            <li>
                <a href="#module-amenities" data-toggle="tab">Amenities</a>
            </li>
            <li>
                <a href="#module-faq" data-toggle="tab">FAQs</a>
            </li>
            <li>
                <a href="#module-location" data-toggle="tab">Location</a>
            </li>
            <li>
                <a href="#module-review" data-toggle="tab">Reviews</a>
            </li>
        </ul>
    </div>
    <div class="details-hotel tab-content clearfix">
        <div class="tab-pane active" id="module-photos">
            <div class="g-gallery">
                <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135"
                    data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
                    @if ($row->getGallery())
                        @foreach ($row->getGallery() as $key => $item)
                            <a href="{{ $item['large'] }}" data-thumb="{{ $item['thumb'] }}"
                                data-alt="{{ __('Gallery') }}"></a>
                        @endforeach
                    @endif
                </div>
                <div class="social">
                    <div class="social-share">
                        <span class="social-icon">
                            <i class="icofont-share"></i>
                        </span>
                        <ul class="share-wrapper">
                            <li>
                                <a class="facebook"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}"
                                    target="_blank" rel="noopener" original-title="{{ __('Facebook') }}">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter"
                                    href="https://twitter.com/share?url={{ $row->getDetailUrl() }}&amp;title={{ $translation->title }}"
                                    target="_blank" rel="noopener" original-title="{{ __('Twitter') }}">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="service-wishlist {{ $row->isWishList() }}" data-id="{{ $row->id }}"
                        data-type="{{ $row->type }}">
                        <i class="fa fa-heart-o"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="module-description">
            @if ($translation->content)
                <div class="g-overview">
                    <h3>{{ __('Description') }}</h3>
                    <div class="description">
                        <?php echo $translation->content; ?>
                    </div>
                </div>
            @endif
        </div>
        <div class="tab-pane" id="module-amenities">
            <div class="g-rules">
                <div class="description">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Room Type</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">Entire Home</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Property Type</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Accommodates</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">1</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Bathrooms</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">{{ $row->bathroom }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Check In Time</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">{{ date('h:i A', strtotime($row->available_from)) }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Check Out Time</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">{{ date('h:i A', strtotime($row->available_to)) }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="key">Beds</div>
                        </div>
                        <div class="col-lg-8">
                            <div class="value">{{ $row->bed }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $terms_ids = $row->terms->pluck('term_id');
                
                $attributes_terms = \Modules\Core\Models\Terms::query()
                    ->with(['translations', 'attribute'])
                    ->find($terms_ids)
                    ->pluck('id')
                    ->toArray();
                $attributes = \Modules\Core\Models\Terms::where('attr_id', 4)->get();
                
            @endphp
            <br>
            <h3>FACILITIES</h3>
            <ul class="aminitlistingul mgnT20">
                @if (!empty($terms_ids) and !empty($attributes))
                    {{-- @php --}}
                    {{-- $icons = array( --}}
                    {{-- "Air Conditioning" => "icofont-air-conditioning", --}}
                    {{-- "Wifi" => "icofont-wifi", --}}
                    {{-- "Boardroom" => "icofont-building", --}}
                    {{-- "Access Control" => "icofont-game-controller", --}}
                    {{-- "Heating" => "icofont-operation-theater", --}}
                    {{-- "Kitchen" => "icofont-food-cart", --}}
                    {{-- "Internet/Wireless Internet" => "icofont-wifi-router", --}}
                    {{-- "Breakfast/Food" => "icofont-culinary", --}}
                    {{-- "Breakfast" => "icofont-culinary", --}}
                    {{-- "Parking" => "icofont-car", --}}
                    {{-- "Pool" => "icofont-swimmer", --}}
                    {{-- "Wheelchair Accessible" => "icofont-wheelchair", --}}
                    {{-- "Pets Allowed" => "icofont-dog-alt", --}}
                    {{-- "Fire Extinguisher" => "icofont-fire-extinguisher-alt", --}}
                    {{-- "First Aid Kitr" => "icofont-first-aid", --}}
                    {{-- ); --}}


                    {{-- @endphp --}}
                    @foreach ($attributes as $attribute)
                        @if (empty($attribute['parent']['hide_in_single']))
                            @php $terms = $attribute['child'] @endphp
                            <li
                                class="detaillistingli {{ in_array($attribute->id, $attributes_terms) ? '' : 'not' }} fulwidthm mgnB10">
                                <i class="aminti_icon {{ $attribute->icon }}"></i>
                                <span class="aminidis">{{ $attribute->name }}</span>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="tab-pane bravo_content" id="module-faq">
            @if ($translation->faqs)
                <div class="g-faq">
                    @foreach ($translation->faqs as $item)
                        <div class="item">
                            <div class="header" data-parent="#accordion" data-toggle="collapse">
                                <i class="field-icon icofont-support-faq"></i>
                                <h5>{{ $item['title'] }}</h5>
                                <span class="arrow"><i class="fa fa-angle-down"></i></span>
                            </div>
                            <div class="body" class="collapse" id="accordion">
                                {{ $item['content'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="tab-pane" id="module-location">
            <div class="g-location">
                <div class="location-map">
                    <div id="map_content" style="position: relative; overflow: hidden;"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="module-review">
            @include('Space::frontend.layouts.details.space-review')
        </div>
    </div>
</div>
