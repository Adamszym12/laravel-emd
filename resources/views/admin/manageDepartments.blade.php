@extends('layouts.base')

@section('pageName', '')
@section('title', 'departments')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="manageDepartmentsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{$department->name}}</td>
                        <td>{{$department->description}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#manageDepartmentsTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "columns": [
                    { "width": "30%" },
                    { "width": "55%" },
                    { "width": "15%" },
                ],
                "columnDefs": [
                    {
                        "targets": 2,
                        "data": null,
                        "className": 'dt-body-center',
                        "orderable": false,
                        "defaultContent": "<div style='text-align: center'><button onclick='alert(\"asd\")' class='btn btn-primary'><i class='fas fa-edit'></i> Edit</button><button style='margin-left: 15px' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button></div>"
                    }
                ]
            });
        });
    </script>
@endpush
@push('stylesheets')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

