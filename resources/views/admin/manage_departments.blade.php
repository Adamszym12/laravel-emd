@extends('layouts.base')

@section('pageName', '')
@section('title', 'Manage departments')
@section('content')
    <div class="card">
        {{old('id')}}
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="manageDepartmentsTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td>{{$department->name}}</td>
                            <td>{{$department->description}}</td>
                            <td>
                                <div class="row  justify-content-around">
                                    <button class="btn" value="{{$department->id}}" name="edit" type="button"><i
                                            class="fas fa-edit"></i></button>
                                    <button class="btn" value="{{$department->id}}" name="addUser" type="button"><i
                                            class="fas fa-user-plus"></i></button>
                                    <button class="btn" value="{{$department->id}}" name="delete" type="button"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modalDeleteDepartment">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Delete department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Caution! Data will be deleted permanently </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <form id="deleteDepartmentForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{route('departments.destroy', '')}}" name="id"
                               id="hiddenDepartmentDeleteActionInput">
                        <button type="submit" class="btn btn-outline-light">Delete</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modalEditDepartment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateDepartmentForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input value="{{route('departments.update', '')}}" type="hidden"
                           id="hiddenDepartmentUpdateActionInput">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="idInput"  name="id" value="{{old('id')}}">
                        </div>
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="nameInput">
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Description</label>
                            <textarea name="description" type="text" class="form-control"
                                      id="descriptionInput">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modalAddUserToDepartment">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add user to department</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="manageDepartmentUsers" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>email</th>
                            <th>description</th>
                            <th>phone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr id="{{$user->id}}">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->description}}</td>
                                <td>{{$user->phone}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <form method="POST">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input name="addUsersDataInput" id="hiddenAddUsersToDepartmentInput" type="hidden">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submitAddUsersToDepartment" type="button" class="btn btn-primary">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/pages/manageDepartments.js') }}"></script>

@endpush
@push('stylesheets')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

@endpush

