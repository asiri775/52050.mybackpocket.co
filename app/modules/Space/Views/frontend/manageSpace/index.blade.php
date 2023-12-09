@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <h2 class="title-bar">
        {{!empty($recovery) ?__('Recovery Spaces') : __("Manage Spaces")}}
        @if(Auth::user()->hasPermissionTo('space_create')&& empty($recovery))
            <a href="{{ route("space.vendor.create") }}" class="btn-change-password">{{__("Add Space")}}</a>
        @endif
    </h2>
    @include('admin.message')
    @if($rows->total() > 0)
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
            <div class="list-item">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-md-12">
                            @include('Space::frontend.manageSpace.loop-list')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    @else
        {{__("No Space")}}
    @endif
@endsection


<style>

    .fc-button {
        text-transform: capitalize !important;
    }

    .fc-event-time {
        display: none;
    }

    .fc-event {
        cursor: pointer;
        border: none !important;
    }


    .fc-event.blocked {
        background: #ed5959;
    }

    .fc-event.confirmed {
        background: #388fff;
    }


    .fc-event.processing {
        background: #ffdc3e;
    }

    .processing .fc-event-title {
        color: #333 !important;
    }

    .fc-daygrid-event-dot {
        display: none;
    }

    .fc-event-title {
        word-break: break-all;
        white-space: normal;
        color: #fff;
        padding: 0 5px !important;
        font-weight: normal !important;
    }


</style>

<div id="availabilityCalendar" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Calendar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='availabilityTimeCalendar'></div>
            </div>
        </div>
    </div>
</div>

@section('footer')


    <script>
        let availabilityTimeCalendar = null;
        function showCalendarModal(spaceId) {
            $("#availabilityCalendar").modal("show");
            availabilityTimeCalendar = new FullCalendar.Calendar(document.getElementById('availabilityTimeCalendar'), {
                eventSources: [
                    {
                        url: '{{route('space.vendor.availability.calendarEvents')}}?id='+spaceId,
                    }
                ],
                headerToolbar: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                dayMaxEvents: true,
                navLinks: true
            });
            availabilityTimeCalendar.render();
        }

        $(document).on("click", ".viewSpaceCalendar", function () {
            // console.log('fs');
            showCalendarModal($(this).attr("data-id"));
        });
    </script>

@endsection
