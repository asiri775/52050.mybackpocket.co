@extends('layouts.new_user')

@section('content')
    <style>
        .input-sm {
            padding-top: 0px;
        }
    </style>
    <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content sm-gutter">
            <!-- START BREADCRUMBS-->
            <div class="bg-white">
                <div class="container-fluid pl-5">
                    <ol class="breadcrumb breadcrumb-alt bg-white mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("user.profile.index") }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Favourites</li>
                    </ol>
                </div>
            </div>
            <!-- END BREADCRUMBS -->
            <!-- START CONTAINER FLUID -->
            <div class="container-fluid p-5">
                <div class="card card-default card-bordered p-4 card-radious">
                    <div class="row data-search">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>TITLE</label>
                                <input type="text" class="form-control" id="filter_title">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- START card -->
                <div class="card card-default card-bordered p-4 card-radious">
                    <div class="card-header ">
                        <div class="card-title">
                            <h4 class="text-uppercase"><strong>Favourites</strong></h4>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <table class="table demo-table-search table-responsive-block data-table" id="favouriteTable">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr></tr>


                            </tbody>
                        </table>
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
            var table = $('#favouriteTable');
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
                    "url": "{{ route('user.favourites.datatable') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "method": "POST",
                    'data': function (data) {
                        data.title = $('#filter_title').val();
                    }
                },
                "order": [
                    [0, "asc"]
                ],
                "columns": [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'sale_price',
                        name: 'sale_price',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                'columnDefs': [
                    {
                        "targets": 0,
                        "className": "text-center",
                        "width": "8%"
                    },
                    {
                        "targets": 1,
                        "className": "text-left",
                        "width": "38%"
                    },
                    {
                        "targets": 2,
                        "className": "text-right",
                        "width": "17%"
                    },
                    {
                        "targets": 3,
                        "className": "text-right",
                        "width": "17%"
                    },
                    {
                        "targets": 4,
                        "className": "text-center",
                        "width": "20%"
                    },
                ],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ records",
                }
            });

            $('#filter_title').keyup(function() {
                datatable.draw();
            });
        });
    </script>

@endsection
