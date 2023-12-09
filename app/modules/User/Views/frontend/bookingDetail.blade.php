@extends('layouts.new_user')
@section('head')
    <div class="header p-r-0">
        <div class="header-inner header-md-height">
            <a href="#" class="btn-link toggle-sidebar d-lg-none text-white sm-p-l-0 btn-icon-link"
               data-toggle="horizontal-menu">
                <i class="pg-icon">menu</i>
            </a>
            <div class="">
                <div class="brand inline no-border d-sm-inline-block">
                    <img
                        src="{{ asset('user_assets/img/logo-black.jpg')}}" alt="logo"
                        data-src="{{ asset('user_assets/img/logo-black.jpg')}}"
                        data-src-retina="{{ asset('user_assets/img/logo-black.jpg')}}" width="232" height="65">
                </div>
            </div>
            <div class="header-wrap header-wrap-block justify-content-start">
                <div class="menu-bar header-sm-height">
                    <a href="#" class="btn-link header-icon toggle-sidebar d-lg-none" data-toggle="horizontal-menu">
                        <i class="pg-icon">close</i>
                    </a>
                    <ul>
                        <li class=" active">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="javascript:;"><span class="title">Bookings</span>
                                <span class=" arrow"></span></a>
                            <ul class="">
                                <li class="">
                                    <a href="#">Scheduled</a>
                                </li>
                                <li class="">
                                    <a href="#">History</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="title">Favourites</span></a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="search-link d-lg-inline-block d-none" data-toggle="search"><i
                        class="pg-icon">search</i> <span>Search
                    for a booking or Invoice</span></a>
            </div>

            <div class="header-wrap justify-content-end">
                <!-- START NOTIFICATION LIST -->
                <ul class="d-lg-inline-block d-none  notification-list no-margin b-grey b-l b-r no-style p-l-30 p-r-20">
                    <li class="p-r-10 inline">
                        <div class="dropdown">
                            <a href="javascript:;" id="notification-center" class="header-icon btn-icon-link"
                               data-toggle="dropdown">
              <span class="material-icons">
                notifications
              </span>
                                <span class="bubble"></span>
                            </a>
                            <!-- START Notification Dropdown -->
                            <div class="dropdown-menu notification-toggle" role="menu"
                                 aria-labelledby="notification-center">
                                <!-- START Notification -->
                                <div class="notification-panel">
                                    <!-- START Notification Body-->
                                    <div class="notification-body scrollable">
                                        <!-- START Notification Item-->
                                        <div class="notification-item unread clearfix">
                                            <!-- START Notification Item-->
                                            <div class="heading open">
                                                <a href="#" class="text-complete pull-left d-flex align-items-center">
                                                    <i class="pg-icon m-r-10">map</i>
                                                    <span class="bold">Carrot Design</span>
                                                    <span class="fs-12 m-l-10">David Nester</span>
                                                </a>
                                                <div class="pull-right">
                                                    <div
                                                        class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                        <div><i class="pg-icon">chevron_down</i>
                                                        </div>
                                                    </div>
                                                    <span class=" time">few sec ago</span>
                                                </div>
                                                <div class="more-details">
                                                    <div class="more-details-inner">
                                                        <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation
                                                            <br>
                                                            distinguishes between <br>
                                                            A leader and a follower.”</h5>
                                                        <p class="small hint-text">
                                                            Commented on john Smiths wall.
                                                            <br> via pages framework.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Notification Item-->
                                            <!-- START Notification Item Right Side-->
                                            <div class="option" data-toggle="tooltip" data-placement="left"
                                                 title="mark as read">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- START Notification Body-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item  clearfix">
                                            <div class="heading">
                                                <a href="#" class="text-danger pull-left">
                                                    <i class="pg-icon m-r-10">alert_warning</i>
                                                    <span class="bold">98% Server Load</span>
                                                    <span class="fs-12 m-l-10">Take Action</span>
                                                </a>
                                                <span class="pull-right time">2 mins ago</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item  clearfix">
                                            <div class="heading">
                                                <a href="#" class="text-warning pull-left">
                                                    <i class="pg-icon m-r-10">alert_warning</i>
                                                    <span class="bold">Warning Notification</span>
                                                    <span class="fs-12 m-l-10">Buy Now</span>
                                                </a>
                                                <span class="pull-right time">yesterday</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item unread clearfix">
                                            <div class="heading">
                                                <div
                                                    class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                                                    <img width="30" height="30"
                                                         data-src-retina="{{ asset('user_assets/img/profiles/1.jpg')}}"
                                                         data-src="{{ asset('user_assets/img/profiles/1.jpg')}}" alt=""
                                                         src="{{ asset('user_assets/img/profiles/1.jpg')}}">
                                                </div>
                                                <a href="#" class="text-complete pull-left">
                                                    <span class="bold">Revox Design Labs</span>
                                                    <span class="fs-12 m-l-10">Owners</span>
                                                </a>
                                                <span class="pull-right time">11:00pm</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option" data-toggle="tooltip" data-placement="left"
                                                 title="mark as read">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                    </div>
                                    <!-- END Notification Body-->
                                    <!-- START Notification Footer-->
                                    <div class="notification-footer text-center">
                                        <a href="#" class="">Read all notifications</a>
                                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                            <i class="pg-refresh_new"></i>
                                        </a>
                                    </div>
                                    <!-- START Notification Footer-->
                                </div>
                                <!-- END Notification -->
                            </div>
                            <!-- END Notification Dropdown -->
                        </div>
                    </li>
                    <li class="p-r-10 inline">
                        <div class="dropdown">
                            <a href="javascript:;" id="notification-center" class="header-icon btn-icon-link"
                               data-toggle="dropdown">
              <span class="material-icons">
                mail
              </span>
                                <span class="bubble"></span>
                            </a>
                            <!-- START Notification Dropdown -->
                            <div class="dropdown-menu notification-toggle" role="menu"
                                 aria-labelledby="notification-center">
                                <!-- START Notification -->
                                <div class="notification-panel">
                                    <!-- START Notification Body-->
                                    <div class="notification-body scrollable">
                                        <!-- START Notification Item-->
                                        <div class="notification-item unread clearfix">
                                            <!-- START Notification Item-->
                                            <div class="heading open">
                                                <a href="#" class="text-complete pull-left d-flex align-items-center">
                                                    <i class="pg-icon m-r-10">map</i>
                                                    <span class="bold">Carrot Design</span>
                                                    <span class="fs-12 m-l-10">David Nester</span>
                                                </a>
                                                <div class="pull-right">
                                                    <div
                                                        class="thumbnail-wrapper d16 circular inline m-t-15 m-r-10 toggle-more-details">
                                                        <div><i class="pg-icon">chevron_down</i>
                                                        </div>
                                                    </div>
                                                    <span class=" time">few sec ago</span>
                                                </div>
                                                <div class="more-details">
                                                    <div class="more-details-inner">
                                                        <h5 class="semi-bold fs-16">“Apple’s Motivation - Innovation
                                                            <br>
                                                            distinguishes between <br>
                                                            A leader and a follower.”</h5>
                                                        <p class="small hint-text">
                                                            Commented on john Smiths wall.
                                                            <br> via pages framework.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Notification Item-->
                                            <!-- START Notification Item Right Side-->
                                            <div class="option" data-toggle="tooltip" data-placement="left"
                                                 title="mark as read">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- START Notification Body-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item  clearfix">
                                            <div class="heading">
                                                <a href="#" class="text-danger pull-left">
                                                    <i class="pg-icon m-r-10">alert_warning</i>
                                                    <span class="bold">98% Server Load</span>
                                                    <span class="fs-12 m-l-10">Take Action</span>
                                                </a>
                                                <span class="pull-right time">2 mins ago</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item  clearfix">
                                            <div class="heading">
                                                <a href="#" class="text-warning pull-left">
                                                    <i class="pg-icon m-r-10">alert_warning</i>
                                                    <span class="bold">Warning Notification</span>
                                                    <span class="fs-12 m-l-10">Buy Now</span>
                                                </a>
                                                <span class="pull-right time">yesterday</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                        <!-- START Notification Item-->
                                        <div class="notification-item unread clearfix">
                                            <div class="heading">
                                                <div
                                                    class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                                                    <img width="30" height="30"
                                                         data-src-retina="{{ asset('user_assets/img/profiles/1.jpg')}}"
                                                         data-src="{{ asset('user_assets/img/profiles/1.jpg')}}" alt=""
                                                         src="{{ asset('user_assets/img/profiles/1.jpg')}}">
                                                </div>
                                                <a href="#" class="text-complete pull-left">
                                                    <span class="bold">Revox Design Labs</span>
                                                    <span class="fs-12 m-l-10">Owners</span>
                                                </a>
                                                <span class="pull-right time">11:00pm</span>
                                            </div>
                                            <!-- START Notification Item Right Side-->
                                            <div class="option" data-toggle="tooltip" data-placement="left"
                                                 title="mark as read">
                                                <a href="#" class="mark"></a>
                                            </div>
                                            <!-- END Notification Item Right Side-->
                                        </div>
                                        <!-- END Notification Item-->
                                    </div>
                                    <!-- END Notification Body-->
                                    <!-- START Notification Footer-->
                                    <div class="notification-footer text-center">
                                        <a href="#" class="">Read all notifications</a>
                                        <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                                            <i class="pg-refresh_new"></i>
                                        </a>
                                    </div>
                                    <!-- START Notification Footer-->
                                </div>
                                <!-- END Notification -->
                            </div>
                            <!-- END Notification Dropdown -->
                        </div>
                    </li>
                </ul>
                <!-- END NOTIFICATIONS LIST -->
                <div class="d-flex align-items-center">
                    <!-- START User Info-->
                    <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none text-white">
                        <span class="semi-bold">Amanda</span>
                    </div>
                    <div class="dropdown pull-right d-lg-block">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" aria-label="profile dropdown">
            <span class="thumbnail-wrapper d32 circular inline">
              <img src="{{ asset('user_assets/img/profiles/avatar.jpg')}}" alt=""
                   data-src="{{ asset('user_assets/img/profiles/avatar.jpg')}}"
                   data-src-retina="{{ asset('user_assets/img/profiles/avatar_small2x.jpg')}}" width="32" height="32">
            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                            <a href="#" class="dropdown-item"><span>Signed in as <br/><b>Amanda</b></span></a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">My Account</a>
                            <a href="#" class="dropdown-item">Wallet</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Help</a>
                            <a href="#" class="dropdown-item">Logout</a>
                            <div class="dropdown-divider"></div>
                            <span
                                class="dropdown-item fs-12 hint-text">Last edited by Amanda<br/>on Friday at 5:27PM</span>
                        </div>
                    </div>
                    <!-- END User Info-->
                    <div class="lotal-amount">$2431.64 CR</div>
                </div>
            </div>

        </div>
    </div>
@endsection




@section('content')
    <div class="page-container">
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content sm-gutter">
                <!-- START BREADCRUMBS-->
                <div class="bg-white">
                    <div class="container-fluid pl-5">
                        <ol class="breadcrumb breadcrumb-alt bg-white mb-0">
                            <li class="breadcrumb-item"><a href="{{ route("user.dashboard") }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Booking Details</li>
                        </ol>
                    </div>
                </div>
                <!-- END BREADCRUMBS -->
                <!-- START CONTAINER FLUID -->
                <div class="container-fluid p-5">

                    <div class="row">
                        <div class="col-lg-5 col-sm-12 table-booking-view">
                            <div class="title pl-4"><h3>Booking Details</h3></div>
                            <div class="card card-default full-height card-bordered p-4 card-radious">
                                <div class="row book-table mb-2">
                                    <div class="col-lg-3 col-sm-3 col-md-3">
                                        <div class="date-start text-center mt-3">
                                            <div class="calendar-day">
                                                @php
                                                    $date  = $booking->start_date;
                                                @endphp
                                                <div class="day-name">{{ date('d',strtotime($date))}}</div>
                                                <div class="m-name">{{ date('F',strtotime($date))}}</div>
                                                <div class="m-name">{{ date('Y',strtotime($date))}}</div>
                                            </div>
                                            <div class="status-btn pending">{{ $booking->status }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-md-9">
                                        <div class="book-details pl-3">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="4" class="td-id text-uppercase">Booking
                                                        #{{ $booking->id }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-20">
                                                          <span class="thumbnail-wrapper circular inline">
                                                            <img
                                                                src="{{ asset('user_assets/img/profiles/'.$booking->vendor->avatar)}}"
                                                                alt=""
                                                                data-src="{{ asset('user_assets/img/profiles/'.$booking->vendor->avatar)}}"
                                                                data-src-retina="{{ asset('user_assets/img/profiles/'.$booking->vendor->avatar)}}"
                                                                width="45" height="45">
                                                          </span>
                                                    </td>
                                                    <td colspan="3">{{ $booking->vendor->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-20">
                                                      <span class="material-icons" data-toggle="tooltip"
                                                            data-placement="top" title="Arrival Date">
                                                        flight_land
                                                        </span>
                                                    </td>
                                                    <td class="w-40">{{ date('F d,Y',strtotime($booking->start_date))}}</td>
                                                    <td class="w-20">
                                                      <span class="material-icons" data-toggle="tooltip"
                                                            data-placement="top" title="Arrival Time">
                                                        access_time
                                                        </span>
                                                    </td>
                                                    <td class="w-40">{{ date('g:i A',strtotime($booking->start_date))}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-20">
                                                      <span class="material-icons" data-toggle="tooltip"
                                                            data-placement="top" title="Departure Date">
                                                        flight_takeoff
                                                        </span>
                                                    </td>
                                                    <td class="w-40">{{ date('F d,Y',strtotime($booking->end_date))}}</td>
                                                    <td class="w-20">
                                                      <span class="material-icons" data-toggle="tooltip"
                                                            data-placement="top" title="Departure Time">
                                                        access_time
                                                        </span>
                                                    </td>
                                                    <td class="w-40">{{ date('g:i A',strtotime($booking->end_date))}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-20">
                                                      <span class="material-icons" data-toggle="tooltip"
                                                            data-placement="top" title="No of Guests">
                                                        person
                                                        </span>
                                                    </td>
                                                    <td colspan="3" class="w-40">{{ $booking->total_guests }}Guests
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row item-table">
                                    <div class="col-sm-12">
                                        <h3 class="mt-3 mb-3 text-center">Rates and Fees</h3>
                                        <table class="table table-borderless">
                                            <tbody>
                                            <thead>
                                            <tr>
                                                <th style="width:50%">Item</th>
                                                <th style="width:35%;text-align: center;">QTY</th>
                                                <th style="width:15%;text-align: right;">Rate</th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td>Space Booking Fee (Hourly)</td>
                                                <td class="text-center">{{ number_format((float)$booking->total_guests, 2, '.', '') }}</td>
                                                <td class="text-right">
                                                    ${{ number_format((float)$booking->total_before_fees, 2, '.', '') }}</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>Additional Item</td>
                                                <td class="text-center">1.0</td>
                                                <td class="text-right">$8.00</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-12">From Your Host Terms of Service</td>
                                                <td class="fs-14 font-weight-bold text-uppercase text-right">Subtotal
                                                </td>
                                                <td class="text-right">$20.00</td>
                                            </tr>
                                            <tr>
                                                <td class="fs-12">From Us: The Fine Print</td>
                                                <td class="fs-14 font-weight-bold text-uppercase text-right">Service
                                                    Fee
                                                </td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="fs-14 font-weight-bold text-uppercase text-right">Taxes
                                                    (13%)
                                                </td>
                                                <td class="text-right">$2.66</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="fs-16 font-weight-bold text-uppercase bg-complete-lighter text-right">
                                                    Grand Total
                                                </td>
                                                <td class="fs-18 bg-complete-lighter text-right"
                                                    style="font-weight: 900;">
                                                    ${{ number_format((float)$booking->total, 2, '.', '') }}
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <div class="view-btn text-center mt-4 mb-3 bottom-btn">
                                            <button class="btn btn-primary btn-lg mb-2">Modify/Cancel</button>
                                            <button class="btn btn-primary btn-lg mb-2">Contact Host</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--card-->
                        </div>

                        <div class="col-lg-7 col-sm-12 tab-view">
                            <div class="title pl-4"><h3>Summary</h3></div>
                            <div class="card card-default full-height card-bordered p-4 card-radious">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-fillup d-none d-md-flex d-lg-flex d-xl-flex"
                                    data-init-reponsive-tabs="dropdownfx">
                                    <li class="nav-item">
                                        <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span>About the Space</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="tab" data-target="#slide2"
                                           class=""><span>House Rules</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="tab" data-target="#slide3"
                                           class=""><span>FAQs</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" data-toggle="tab" data-target="#slide4"
                                           class=""><span>Amenities</span></a>
                                    </li>
                                </ul>
                            @php
                                if ($service = $booking->service) {
                                $translation = $service->translateOrOrigin(app()->getLocale());
                                }
                            @endphp
                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane slide-left active" id="slide1">
                                        <div class="row column-seperation">
                                            <div class="col-lg-12">
                                                <h3>
                                                    <span
                                                        class="semi-bold">{!! $booking->service->title !!}</span>
                                                </h3>
                                                <p>{!! $booking->service->content !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane slide-left" id="slide2">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>{!! $booking->service->title !!}</h3>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="image mb-3">
                                                    <img
                                                        src="{{$booking->service->image_url}}">
                                                </div>
                                                <div class="icon-row">
                                                    <div class="icon-div"><span
                                                            class="material-icons">location_on</span></div>
                                                    <div class="icon-details">

                                                        <a
                                                            href="https://goo.gl/maps/Ap6g8vrDGg3U4szL8"
                                                            target="_blank">
                                                            {{ $booking->service->address }}
                                                        </a></div>
                                                </div>
                                                @php
                                                    $userDetails = $booking->vendor;

                                                @endphp
                                                <div class="icon-row">
                                                    <div class="icon-div"><span class="material-icons">phone</span>
                                                    </div>
                                                    <div class="icon-details"><a
                                                            href="tel:{{ $userDetails->phone }}">{{ $userDetails->phone }}</a>
                                                    </div>
                                                </div>
                                                <div class="icon-row">
                                                    <div class="icon-div"><span
                                                            class="material-icons">location_on</span></div>
                                                    <div class="icon-details"><a
                                                            href="mailto:reservations@myoffice.ca">{{ $userDetails->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8  pr-5 pl-5">
                                                <p>{!! $booking->service->content !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane slide-left" id="slide3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3>FAQs</h3>
                                                <div class="card-group horizontal" id="accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    @if($translation->faqs)
                                                        @php $i = 1; @endphp
                                                        @foreach($translation->faqs as $item)
                                                            <div class="card card-default m-b-0"
                                                                 style="border: 1px solid rgba(18, 18, 18, 0.1)">
                                                                <div class="card-header " role="tab"
                                                                     id="heading{{ $booking->convertNumberToWord($i) }}">
                                                                    <div class="card-title">
                                                                        <a style="text-decoration: none"
                                                                           data-toggle="collapse"
                                                                           class="{{ $i != 1 ? 'collapsed' : '' }}"
                                                                           data-parent="#accordion"
                                                                           href="#collapse{{ $booking->convertNumberToWord($i) }}"
                                                                           aria-expanded="{{ $i == 1 }}"
                                                                           aria-controls="collapse{{ $booking->convertNumberToWord($i) }}">
                                                                            {{$item['title']}}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div style="visibility: visible"
                                                                     id="collapse{{ $booking->convertNumberToWord($i) }}"
                                                                     class="collapse {{ $i == 1 ? 'show' : '' }}"
                                                                     role="tabcard"
                                                                     aria-labelledby="heading{{ $booking->convertNumberToWord($i) }}">
                                                                    <div class="card-body">
                                                                        {{$item['content']}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php $i++ @endphp
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane slide-left" id="slide4">
                                        @php
                                            $row = Modules\Space\Models\Space::where('id', $booking->service->id)->with(['location','translations','hasWishList'])->first();

                                        @endphp
                                        @if(!empty($row->location->name))
                                            @php
                                                $location =  $row->location->translateOrOrigin(app()->getLocale());
                                            @endphp
                                        @endif
                                        <div class="g-rules">
                                            <div class="description">
                                                {{--                                                @if($row->bathroom != '')--}}
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="key">Room Type</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="value">Entire Home</div>
                                                    </div>
                                                </div>
                                                {{--                                                @endif--}}
                                                {{--                                                @if($row->bathroom != '')--}}
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="key">Property Type</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="value"></div>
                                                    </div>
                                                </div>
                                                {{--                                                @endif--}}
                                                {{--                                                @if($row->bathroom != '')--}}
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="key">Accommodates</div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="value">{{ $booking->total_guests }}</div>
                                                    </div>
                                                </div>
                                                {{--                                                @endif--}}
                                                @if($row->bathroom != '')
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="key">Bathrooms</div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="value">{{$row->bathroom}}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($row->available_from != '')
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="key">Check In Time</div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div
                                                                class="value">{{ date("h:i A", strtotime($row->available_from)) }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($row->available_to != '')
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="key">Check Out Time</div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div
                                                                class="value">{{ date("h:i A", strtotime($row->available_to)) }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($row->bed != '')
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="key">Beds</div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="value">{{$row->bed}}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $terms_ids = $row->terms->pluck('term_id');

                                            $attributes_terms = \Modules\Core\Models\Terms::query()->with(['translations','attribute'])->find($terms_ids)->pluck('id')->toArray();
                                            $attributes = \Modules\Core\Models\Terms::where('attr_id', 4)->get();

                                        @endphp
                                        <br>
                                        <h3>FACILITIES</h3>
                                        <ul class="aminitlistingul mgnT20">
                                            @if (!empty($terms_ids) and !empty($attributes))

                                                @foreach ($attributes as $attribute)

                                                    @if (empty($attribute['parent']['hide_in_single']))

                                                        @php $terms = $attribute['child'] @endphp
                                                        <li class="detaillistingli {{ (in_array($attribute->id, $attributes_terms)) ? "" : "not" }} fulwidthm mgnB10">
                                                            <i class="aminti_icon {{ $attribute->icon }}"></i>
                                                            <span
                                                                class="aminidis">{{ $attribute->name }}</span></li>

                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="view-btn text-center bottom-btn">
                                <a target="_blank" href="{{$row->getDetailUrl($include_param ?? true)}}">
                                    <button class="btn btn-primary btn-lg mb-2">View Full Listing Details</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div> <!--row end booking-->
            </div>
            <!-- END CONTAINER FLUID -->
            <div class="container link-icon  d-flex justify-content-center">
                <div class="row mt-3 mb-3 text-center">
                    <div class="col-xs-12 col-sm-12">
                        <div class="btn-icon">
                            <a style="text-decoration: none" href="#"><span class="material-icons">event</span>
                                <h4 class="mt-2">Add to Calendar</h4>
                            </a>
                        </div>
                        <div class="btn-icon">
                            <a style="text-decoration: none" href="#"><span class="material-icons">email</span>
                                <h4 class="mt-2">Email</h4>
                            </a>
                        </div>
                        <div class="btn-icon">
                            <a style="text-decoration: none" href="{{ route('user.booking.invoice', $booking->code) }}"><span
                                    class="material-icons">print</span>
                                <h4 class="mt-2">Print</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container info-div">
                <div class="row mt-5 mb-5">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <div class="image"
                                         style="background-image:url({{ asset('user_assets/img/grow-bussiness.jpg') }})"></div>
                                    <h3 class="mt-3 mb-3">Grow Your Business</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tempus leo
                                        nec interdum. Vivamus id lorem eget sapien consequat euismod id eget
                                        libero. </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <div class="image"
                                         style="background-image:url({{ asset('user_assets/img/learn.jpg') }})"></div>
                                    <h3 class="mt-3 mb-3">Learn</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tempus leo
                                        nec interdum. Vivamus id lorem eget sapien consequat euismod id eget
                                        libero. </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <div class="image"
                                         style="background-image:url({{ asset('user_assets/img/take-brake.jpg') }})"></div>
                                    <h3 class="mt-3 mb-3">Take a Break</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tempus leo
                                        nec interdum. Vivamus id lorem eget sapien consequat euismod id eget
                                        libero. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid footer">
            <div class="copyright sm-text-center">
                <p class="small-text text-black m-0">
                    Copyright © 2022 <b>My Office Inc.</b>All Rights Reserved.
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    </div>


@endsection
