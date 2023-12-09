@extends('layouts.new_user')
@section('content')
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content sm-gutter">
            <!-- START BREADCRUMBS
              <div class="bg-white">
                <div class="container">
                  <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
              </div-->
            <!-- END BREADCRUMBS -->
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid p-5">
                <div class="row top-btn mb-5">
                    <div class="bg-overlay"></div>
                    <div class="text-banner">
                        <div class="column_container col-md-6">
                            <div class="st-become-local pull-left">
                                <div class="wpb_wrapper st-become-local">
                                    <h2><span class="f48">Hi {{Auth::user()->getDisplayName()}} !</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="column_container col-md-6">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vc_btn3-container  pull-right">
                                        <button class="st-become-local-btn  btn btn-lg btn-larger">Book Your Next
                                            Space
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="title pl-4"><h3>UPCOMING BOOKINGS</h3></div>
                        @foreach($bookings as $booking)
                            <div class="card card-default card-bordered p-4 card-radious">
                                <div class="row">
                                    <div class="w-3 relative">
                                        @php
                                            $service = $booking->service;
                                            $translation =  $service->translateOrOrigin(app()->getLocale());
                                        @endphp
                                        <div class="image_feature"
                                             style="background-image: url({{$service->image_url}})">
                                            <div class="host-img text-center">
                                            <span class="thumbnail-wrapper circular inline">
                                              <img src="{{ asset('user_assets/img/profiles/avatar_small2x.jpg')}}"
                                                   alt=""
                                                   data-src="{{ asset('user_assets/img/profiles/avatar.jpg')}}"
                                                   data-src-retina="{{ asset('user_assets/img/profiles/avatar_small2x.jpg')}}"
                                                   width="45" height="45"
                                                   data-toggle="tooltip" data-placement="top" title="Serena Williams">
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-5 pl-3 pr-2">


                                        <div class="info-title"><h3>{{ clean($translation->title) }}</h3></div>
                                        <div class="info-location">
                                         <span class="event-icon">
                                         <span class="material-icons">fmd_good</span>
                                         </span>
                                            <span class="loca-add">{{ $translation->address }}</span>
                                        </div>
                                        @php
                                            $date = $booking->start_date;
                                            $end_date = $booking->end_date;
                                        @endphp

                                        <div class="event-time">
                                      <span class="event-icon">
                                        <span class="material-icons">access_time</span>
                                      </span>
                                            <span
                                                class="loca-add">{{ date('D, F d, Y, H:i a',strtotime($date))}} </span>
                                        </div>
                                        <div class="event-time">
                                          <span class="event-icon">
                                            <span class="material-icons">update</span>
                                          </span>
                                            <span
                                                class="loca-add">{{ date('D, F d, Y, H:i a',strtotime($end_date))}}</span>
                                        </div>
                                        <div class="event-geust">
                                        <span class="event-icon">
                                          <span class="material-icons">person</span>
                                        </span>
                                            <span class="loca-add">{{ $booking->total_guests }}</span>
                                        </div>

                                        <div class="event-time icon-tooltip">
                                            <a target="_blank"
                                               href="{{ route('user.single.booking.detail', $booking->id) }}">
                                                <div class="event-icon">
                                              <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                    title=""
                                                    data-original-title="View Booking">
                                                visibility
                                              </span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="event-icon">
                                                <span class="icon-tooltip material-icons" data-toggle="tooltip"
                                                      data-placement="top" title=""
                                                      data-original-title="Add to Calendar">
                                                  share
                                                  </span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="event-icon">
                                                <span class="material-icons" data-toggle="tooltip" data-placement="top"
                                                      title=""
                                                      data-original-title="Manage Booking">
                                                  calendar_month
                                                  </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="w-2">
                                        <div class="date-start text-center mb-2">
                                            <div class="calendar-day">
                                                <div class="day-name">{{ date('d',strtotime($date))}}</div>
                                                <div class="m-name">{{ date('F',strtotime($date))}}</div>
                                                @if($booking->status=="draft")
                                                 <div class="status-btn pending">Pending</div> 
                                                @elseif($booking->status=="complete")
                                                <div class="status-btn complete">complete</div>
                                                @elseif($booking->status=="processing")
                                                <div class="status-btn processing">processing</div>
                                                 @elseif($booking->status=="confirmed")
                                                <div class="status-btn confirmed">confirmed</div>
                                                @else
                                                <div class="status-btn pending">Pending</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="b-id">ID#{{ $booking->id }}</div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!--card-->
                        <div class="view-btn text-center">
                            <a href="{{ route('user.bookings.details').'?type=all' }} ">
                                <button class="btn btn-primary py-2" style="font-weight: 500">View All Bookings</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 cal-plugin">
                        <div class="title pl-4"><h3>Plan Ahead</h3></div>
                        <div class="card card-default full-height card-bordered p-4 card-radious" style="min-height: 800px">
                            <!-- START CALENDAR -->
                            <div id="booking_calander" class="full-height cal-home"></div>
                            <!-- END CALENDAR -->
                            <!-- START EVENT MANAGER -->
                            <!-- START Calendar Events Form -->
                            <div class="quickview-wrapper calendar-event" id="calendar-event">

                            </div>
                            <!-- END Calendar Events Form -->
                            <!-- START EVENT MANAGER -->
                        </div>

                    </div>
                </div> <!--row end booking-->
            </div>
            <!-- END CONTAINER FLUID -->
            <div class="container info-div">
                <div class="row mt-5 mb-5">
                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <img src="{{ asset('user_assets/img/grow-bussiness.jpg')}}">
                                    <h3 class="mt-3 mb-3">Grow Your Business</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tempus leo
                                        nec interdum. Vivamus id lorem eget sapien consequat euismod id eget
                                        libero. </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <img src="{{ asset('user_assets/img/learn.jpg')}}">
                                    <h3 class="mt-3 mb-3">Learn</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tempus leo
                                        nec interdum. Vivamus id lorem eget sapien consequat euismod id eget
                                        libero. </p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 mb-5">
                                <div class="second-div">
                                    <img src="{{ asset('user_assets/img/take-brake.jpg')}}">
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

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://fullcalendar.io/js/fullcalendar-3.5.1/fullcalendar.min.js'></script>
    <script src='https://fullcalendar.io/js/home.js?3.5.1-1.7.1-1'></script>

    <script>

        $(document).ready(function () {
            var selectedEvent;
            $('#booking_calander').pagescalendar({
                disableDragging : true,
                events: [
                        @foreach($planBookings as $booking)
                    {
                        title: '{{$booking->service->title}}',
                        class: 'bg-success-lighter',
                        start: '{{$booking->start_date}}',
                        end: '{{$booking->end_date}}',
                        other: {
                            id: '{{ $booking->id }}'
                        }
                    },
                    @endforeach
                ],
                view: "month",

                onEventClick: function (event) {

                    $.ajax({
                        "url": "{{ route('user.bookings.get.detail') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        "method": "POST",
                        data: {
                            id: event.other.id,
                        },
                        success:function(data) {
                            $('#calendar-event').addClass('open');
                            $("#calendar-event").html(data.html);
                        }

                    });
                },
            });

            function setEventDetailsToForm(event) {
                $('#eventIndex').val();
                $('#txtEventName').val();
                $('#txtEventCode').val();
                $('#txtEventLocation').val();
                //Show Event date

                $("#b_id").innerHTML.replace(moment(event.other.id));
                $('#event-date').html(moment(event.start).format('MMM, D dddd'));
                $('#lblfromTime').html(moment(event.start).format('h:mm A'));
                $('#lbltoTime').html(moment(event.end).format('H:mm A'));

                //Load Event Data To Text Field

                $('#eventIndex').val(event.index);
                $('#txtEventName').val(event.title);
                $('#txtEventCode').val(event.other.code);
                $('#txtEventLocation').val(event.other.location);
            }
        });

    </script>
@endsection
