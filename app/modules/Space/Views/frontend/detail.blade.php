@extends('layouts.common_new')
@section('head')
    <link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>

@endsection
@section('content')
    <div class="layout1 bravo_wrap">
        <div id="msg-success" align="left" class="alert alert-success" style="display:none;"></div>

        <div class=" container-fixed-lg">
            <div class="bravo_detail_hotel">
                @include('Space::frontend.layouts.details.space-banner')
                <div class="bravo_content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 mb-5 page-template-content">
                                @php $review_score = $row->review_data @endphp
                                @include('Space::frontend.layouts.details.space-detail')
                                @include('Space::frontend.layouts.details.space-related')
                            </div>
                            <div class="col-md-4 col-lg-4 mb-5">
                                @include('Space::frontend.layouts.details.space-form-book')
                                <div class="clearfix"></div>
                                <div class="add-btn mt-3 mb-3">
                                    @php
                                        $favourite = App\Models\AddToFavourite::where('user_id', Auth::id())->where('object_id', $row->id)->first();
                                    @endphp
                                    <a href="javascript:void(0)" data-id="{{$row->id}}"
                                       onclick="addToFavourite(event.target)"
                                       @if($favourite != '') style="pointer-events: none" @endif class="btn btn-large">
                                        @if($favourite != '')Added To Favourites
                                        @else Add To Favourites
                                        @endif
                                    </a>
                                    <span id="success-message" style="color: green;"></span>
                                </div>

                                <div class="clearfix"></div>
                                <div class="contact-info mt-3 mb-3">
                                    @include('Tour::frontend.layouts.details.vendor')
                                    <div class="host-btn">
                                        <a href="#">Contact Host</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row end_tour_sticky">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
                @include('Space::frontend.layouts.details.space-form-book-mobile')
            </div>

            @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script>
                function addToFavourite(event) {
                    var space_id = $(event).data("id");

                    let _url = `/space/add-to-favourite`;
                    let _token = $('meta[name="csrf-token"]').attr('content');


                    $.ajax({
                        url: _url,
                        type: "POST",
                        data: {
                            space_id: space_id,
                            _token: _token
                        },
                        success: function (response) {
                            $('#success-message').append(response.success);
                        }
                    });
                }
            </script>


            <script>
                var bookingCore = {
                    url: 'http://myoffice.mybackpocket.co',
                    url_root: 'http://myoffice.mybackpocket.co',
                    booking_decimals: 0,
                    thousand_separator: '.',
                    decimal_separator: ',',
                    currency_position: 'left',
                    currency_symbol: '$',
                    currency_rate: '1',
                    date_format: 'MM/DD/YYYY',
                    map_provider: 'gmap',
                    map_gmap_key: 'AIzaSyCRu_qlT0HNjPcs45NXXiOSMd3btAUduSc',
                    map_options: {
                        map_lat_default: '',
                        map_lng_default: '',
                        map_clustering: 'on',
                        map_fit_bounds: 'on',
                    },
                    routes: {
                        login: 'http://myoffice.mybackpocket.co/login',
                        register: 'http://myoffice.mybackpocket.co/register',
                        checkout: 'http://myoffice.mybackpocket.co/booking/doCheckout'
                    },
                    module: {
                        hotel: 'http://myoffice.mybackpocket.co/hotel',
                        car: 'http://myoffice.mybackpocket.co/car',
                        tour: 'http://myoffice.mybackpocket.co/tour',
                        space: 'http://myoffice.mybackpocket.co/space',
                        flight: "http://myoffice.mybackpocket.co/flight"
                    },
                    currentUser: 0,
                    isAdmin: 0,
                    rtl: 0,
                    markAsRead: 'http://myoffice.mybackpocket.co/notify/markAsRead',
                    markAllAsRead: 'http://myoffice.mybackpocket.co/notify/markAllAsRead',
                    loadNotify: 'http://myoffice.mybackpocket.co/notify/notifications',
                    pusher_api_key: '',
                    pusher_cluster: '',
                };
                var i18n = {
                    warning: "Warning",
                    success: "Success",
                };
                var daterangepickerLocale = {
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "first_day_of_week": 1,
                    "daysOfWeek": [
                        "Su",
                        "Mo",
                        "Tu",
                        "We",
                        "Th",
                        "Fr",
                        "Sa"
                    ],
                    "monthNames": [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December"
                    ],
                };
            </script>
            @section('footer')
                {!! App\Helpers\MapEngine::scripts() !!}
                <script>
                    jQuery(function ($) {
                        @if($row->map_lat && $row->map_lng)
                        new BravoMapEngine('map_content', {
                            disableScripts: true,
                            fitBounds: true,
                            center: [{{$row->map_lat}}, {{$row->map_lng}}],
                            zoom: {{$row->map_zoom ?? "8"}},
                            ready: function (engineMap) {
                                engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                                    icon_options: {
                                        iconUrl: "{{get_file_url(setting_item("space_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                                    }
                                });
                            }
                        });
                        @endif
                    })
                </script>
                <script>
                    var bravo_booking_data = {!! json_encode($booking_data) !!}
                        var
                    bravo_booking_i18n = {
                        no_date_select: '{{__('Please select Start and End date')}}',
                        no_guest_select: '{{__('Please select at least one guest')}}',
                        load_dates_url: '{{route('space.vendor.availability.loadDates')}}',
                        name_required: '{{ __("Name is Required") }}',
                        email_required: '{{ __("Email is Required") }}',
                    };
                </script>
                <script type="text/javascript"
                        src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
                <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
                <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
                <script type="text/javascript"
                        src="{{ asset('module/space/js/single-space.js?_ver='.config('app.version')) }}"></script>
@endsection
