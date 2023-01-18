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
@section('content')
<div class="col-md-12">
    <a class="btn btn-sm btn-info float-end" href="{{ url('admin/v2/user/create') }}">
        <i class='fa-solid fa-eye'></i> Add New
    </a>
    <form action="">
        <input type="text" name="email" class="form-control mb-2 searchEmail" placeholder="Search for Email Only..."/>
    </form>
   
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="user-list-table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
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
    $(document).ready(function() {
        var table = $('#user-list-table').DataTable({
            "processing": true,
            "serverSide": true,
            
            ajax: {
                url: "{{ route('admin.v2.user.index') }}",
                data: function(d) {
                    d.email = $('.searchEmail').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            "columns": [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'user_type_name',
                    name: 'user_type_name',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $(".searchEmail").keyup(function() {
            table.draw();
        });
    });

    function openViewModal(row) {
        $('#adminViewModal').modal('show');
    }
</script>
@endsection