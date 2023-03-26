@extends('layouts.niceadmin')
@section('styles')
    <!-- Datatable CSS -->
    <link href="{{ asset('assets/common/plugins/datatables/datatables-1.13.1/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/plugins/datatables/datatables-1.13.1/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <style>
        .dataTables_wrapper .dataTables_length select {
            width: 100% !important;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="pagetitle">
        <h1>Job List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Job Management</li>
                <li class="breadcrumb-item active">Job List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="jobsTable">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Country</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Title</th>
                        <th>Vacancy</th>
                        <th>Salary</th>
                        <th>Published On</th>
                        <th>Date Line</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Datatable JS -->
    <script src="{{ asset('assets/common/plugins/datatables/datatables-1.13.1/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/common/plugins/datatables/datatables-1.13.1/js/dataTables.bootstrap5.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#jobsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": true,
                ajax: {
                    url: "{{ route('admin.v2.job.index') }}",
                },
                "columns": [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'country_name', name: 'country_name', orderable: false, searchable: true},
                    {data: 'company_name', name: 'company_name', orderable: false, searchable: true},
                    {data: 'location', name: 'location', orderable: false, searchable: true},
                    {data: 'title', name: 'title', orderable: false, searchable: true},
                    {data: 'vacancy_number', name: 'vacancy_number', orderable: false, searchable: false},
                    {data: 'salary', name: 'salary', orderable: false, searchable: false},
                    {data: 'published_on', name: 'published_on', orderable: false, searchable: false},
                    {data: 'date_line', name: 'date_line', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
