@extends('layouts.new_user')
@section('content')
    <style>
        .new-align {
            padding-top: 5px;
        }

        .new-padding {
            padding-top: 5px;
        }

        .input-sm {
            padding-top: 0px;
        }

        .select2-selection {
            border: 1px solid rgb(206, 212, 218) !important;
            height: 38px !important;
        }
    </style>
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content sm-gutter">
            <!-- START BREADCRUMBS-->
            <div class="bg-white">
                <div class="container-fluid pl-5">
                    <ol class="breadcrumb breadcrumb-alt bg-white mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("user.dashboard") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Booking History</li>
                    </ol>
                </div>
            </div>
            <!-- END BREADCRUMBS -->
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid p-5">
                <div class="card card-default card-bordered p-4 card-radious">
                    <div class="row data-search">
{{--                        <div class="col-sm-3 col-md-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>CITY</label>--}}
{{--                                <select id="filter_city" class="full-width" data-init-plugin="select2"--}}
{{--                                        style="border: 1px solid rgb(206, 212, 218); z-index: 1">--}}
{{--                                    <option value="" selected>Select an option</option>--}}
{{--                                    @foreach($cities as $city)--}}
{{--                                        <option value="{{ $city->id }}">{{ $city->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-sm-2 col-md-2">
                            <div class="form-group">
                                <label>FROM</label>
                                <div class="input-group date col-md-12 p-l-0">
                                    <input type="text" class="form-control from" id="datepicker-component">
                                    <div class="input-group-append ">
                                        <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="form-group">
                                <label>TO</label>
                                <div class="input-group date col-md-12 p-l-0">
                                    <input type="text" class="form-control to" id="datepicker-component">
                                    <div class="input-group-append ">
                                        <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>QUICK DATE</label>
                                <select class="full-width form-control" id="date_options">
                                    <option value="">Pick an option</option>
                                    <option value_from="{{ date('m/d/Y', strtotime('yesterday')) }}"
                                            value_to="{{ date('m/d/Y', strtotime('yesterday')) }}"
                                            value="yesterday" {{ ($type == 'scheduled') ? "disabled='disabled'" : '' }}>
                                        Yesterday
                                    </option>
                                    <option value_from="{{ date('m/d/Y') }}" value_to="{{ date('m/d/Y') }}"
                                            value="today" {{ ($type == 'history') ? "disabled='disabled'" : '' }}>
                                        Today
                                    </option>
                                    <option value_from="{{ date('m/d/Y', strtotime('monday this week')) }}"
                                            value_to="{{ date('m/d/Y', strtotime('friday this week')) }}"
                                            value="this_weekdays">
                                        This Weekdays
                                    </option>
                                    <option value_from="{{ date('m/d/Y', strtotime('monday this week')) }}"
                                            value_to="{{ date('m/d/Y', strtotime('sunday this week')) }}"
                                            value="this_whole_week">
                                        This Whole Week
                                    </option>
                                    <option value_from="{{ date('m/d/Y', strtotime('first day of this month')) }}"
                                            value_to="{{ date('m/d/Y', strtotime('last day of this month')) }}"
                                            value="this_month">
                                        This Month
                                    </option>
                                    <option
                                        value_from="{{ date('m/d/Y', strtotime('first day of January ' . date('Y'))) }}"
                                        value_to="{{ date('m/d/Y', strtotime('last day of December ' . date('Y'))) }}"
                                        value="this_year">
                                        This Year
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2">
                            <div class="form-group">
                                <label for="ActivateAdvanceSerach" class="control-label">&nbsp;</label>
                                <button type="button" class="btn btn-primary new-padding form-control"
                                        id="ActivateAdvanceSerach" style="padding: 0px;">
                                    Advance Search
                                </button>
                                <button type="button" class="btn btn-primary new-padding form-control"
                                        id="HideActivateAdvanceSerach" style="display: none; padding: 0px;">Hide Advance
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="searchFilters m-b-10" id="AdvanceFilters" style="display: none;">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="full-width form-control" id="booking_category">
                                        <option value="" selected>Select Category</option>
                                        @foreach($space_categories[0]->terms as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>ID#</label>
                                    <select id="filter_id" class="full-width" data-init-plugin="select2"
                                            style="border: 1px solid rgb(206, 212, 218)">
                                        <option value="" selected>Select ID</option>
                                        @foreach($ids as $id)
                                            <option value="{{ $id->id }}">{{ $id->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sku" class="control-label">BOOKING STATUS</label>
                                    <select class="full-width form-control" id="booking_status">
                                        <option value="">Select Status</option>
                                        <option value="draft">DRAFT</option>
                                        <option value="complete">COMPLETE</option>
                                        <option value="processing">PROCESSING</option>
                                        <option value="confirmed">CONFIRMED</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sku" class="control-label">TRANSACTION STATUS</label>
                                    <select id="transaction_status" class="full-width form-control">
                                        <option value="" selected>Select Status</option>
                                        <option value="paid">PAID</option>
                                        <option value="draft">UNPAID</option>
                                        <option value="fail">FAIL</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $type }}" id="status">
                        </div>
                    </div>
                </div>
                <!-- START card -->
                <div class="card card-default card-bordered p-4 card-radious">
                    <div class="card-header ">
                        <div class="card-title">
                            <h4 class="text-uppercase">
                                <strong>
                                    Booking Details
                                </strong>
                            </h4>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <table class="table demo-table-search table-responsive-block data-table" id="tableHistory">
                            <thead>
                            <tr>
                                <th style="width:5%;"></th>
                                <th style="width:5%;">ID#</th>
                                <th style="width:15%;">Listing Name</th>
                                <th style="width:15%;text-align: center;">City</th>
                                <th style="width:15%;text-align: center;">Categories</th>
                                <th style="width:10%;">Start Date</th>
                                <th style="width:10%;">End Date</th>
                                <th style="width:10%;">Amount</th>
                                <th style="width:10%;">Book Status</th>
                                <th style="width:10%;">Transaction Status</th>
                                <th style="width:10%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            </tr>


                            </tbody>
                        </table>
                        <div class="row tab-view">
                            <div class="col-sm-12 mt-5 mb-3">
                                <div class="view-btn text-center">
                                    <button class="btn btn-primary btn-lg mb-2" id="selectAll">Select All</button>
                                    <button class="btn btn-primary btn-lg mb-2 disabled" id="deselectAll">De-Select
                                        All
                                    </button>
                                    <form method="post" style="display:inline;" id="pdf_report"
                                          action="{{ route("user.booking.bulk.invoice")}}">
                                        @csrf
                                        <input name="pdf_ids" value="" type="hidden" id="pdf_ids">
                                        <button class="btn btn-primary btn-lg mb-2" type="submit">PDF
                                            Report
                                        </button>
                                    </form>
                                    <form method="post" style="display:inline;" id="xls_report"
                                          action="{{ route("user.booking.export")}}">
                                        @csrf
                                        <input name="xls_ids" value="" type="hidden" id="xls_ids">
                                        <button class="btn btn-primary btn-lg mb-2" type="submit">XLS
                                            Report
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
            <!-- END CONTAINER FLUID -->
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
    {{--   loading the datatable--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function (e) {
            var table = $('#tableHistory');
            $.fn.dataTable.ext.errMode = 'none';

            var datatable = table.DataTable({
                "serverSide": true,
                "sDom": '<"H"lr>t<"F"ip>',
                "destroy": true,
                "pageLength": 10,
                "sPaginationType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "ajax": {
                    "url": "{{ route('user.bookings.datatable') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "method": "POST",
                    'data': function (data) {
                        data.from = $('.from').val();
                        data.to = $('.to').val();
                        data.date_option = $('#date_options').val();
                        data.city = $('#filter_city').val();
                        data.category = $('#booking_category').val();
                        data.status = $('#status').val();
                        data.id = $('#filter_id').val();
                        data.booking_status = $('#booking_status').val();
                        data.transaction_status = $('#transaction_status').val();
                    }
                },
                "order": [
                    [0, "asc"]
                ],
                "columns": [
                    {
                        data: 'checkboxes',
                        name: 'checkboxes',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title',

                    },
                    {
                        data: 'city',
                        name: 'city',

                    },
                    {
                        data: 'categories',
                        name: 'categories',

                    },
                    {
                        data: 'start_date',
                        name: 'start_date'

                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'booking_status',
                        name: 'booking_status'
                    },
                    {
                        data: 'transaction_status',
                        name: 'transaction_status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                // 'columnDefs': [
                //     {
                //         "targets": "_all",
                //         "className": "v-align-middle text-center",
                //     },
                // ],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ records",
                }
            });

            $('.from').change(function () {
                datatable.draw();
                $('#date_options').val('');
            });
            $('.to').change(function () {
                datatable.draw();
                $('#date_options').val('');
            });

            $('#transaction_status').change(function () {
                datatable.draw();
            });

            $('#booking_status').change(function () {
                datatable.draw();
            });

            $('#date_options').change(function () {
                var from_date = $('#date_options option:selected').attr('value_from');
                var to_date = $('#date_options option:selected').attr('value_to');
                $('.from').val(from_date);
                $('.to').val(to_date);
                datatable.draw();
            });

            $('#filter_city').change(function () {
                datatable.draw();
            });

            $('#booking_category').change(function () {
                datatable.draw();
            });

            $('#filter_id').change(function () {
                datatable.draw();
            });

        });

        $(document).ready(function () {
            var array = [];
            $("#selectAll").on("click", function (e) {
                var table = $("#tableHistory");
                var boxes = $('input:checkbox', table);
                $.each($('input:checkbox', table), function () {

                    $(this).parent().addClass('checked');
                    $(this).prop('checked', 'checked');

                });

                $('#selectAll').addClass('disabled');
                $('#deselectAll').removeClass('disabled');
            });

            $("#deselectAll").on("click", function (e) {
                var table = $("#tableHistory");
                var boxes = $('input:checkbox', table);
                $.each($('input:checkbox', table), function () {

                    $(this).parent().removeClass('checked');
                    $(this).prop('checked', false);

                });
                $('#deselectAll').addClass('disabled');
                $('#selectAll').removeClass('disabled');
            });

        });

        $('#pdf_report').submit(function () {
            let select_pdf_values = [];
            $.each($("input[name='checkbox[]']:checked"), function () {
                select_pdf_values.push($(this).val());
            });

            if (select_pdf_values.length > 0) {
                $('#pdf_ids').val(select_pdf_values);
            } else {
                alert('Please select at least one booking.');
                return false;
            }
        });

        $('#xls_report').submit(function () {
            let select_xls_values = [];
            $.each($("input[name='checkbox[]']:checked"), function () {
                select_xls_values.push($(this).val());
            });

            if (select_xls_values.length > 0) {
                $('#xls_ids').val(select_xls_values);
            } else {
                alert('Please select at least one booking.');
                return false;
            }
        });

    </script>
@endsection
