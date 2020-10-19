@extends('layouts.base')

@section('pageName', '')
@section('title', 'Manage users')
@section('content')
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="manageUsersTable" class="table table-bordered table-striped">
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
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->description}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <div class="row  justify-content-around">
                                <button class="btn" value="{{$user->id}}" name="edit" type="button"><i class="fas fa-edit"></i></button>
                                <button class="btn" value="{{$user->id}}" name="addUser" type="button"><i class="fas fa-user-plus"></i></button>
                                <button class="btn" value="{{$user->id}}" name="delete" type="button"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>email</th>
                    <th>description</th>
                    <th>phone</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modalDeleteUser">
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
                    <form action="{{route('users.destroy', '')}}" id="deleteUserForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="hiddenModalDeleteUserInput">
                        <button type="submit" class="btn btn-outline-light">Delete</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modalEditUser">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit user</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input name="name" type="text" class="form-control" id="nameInput">
                        </div>
                        <div class="form-group">
                            <label for="surnameInput">Surname</label>
                            <input name="surname" type="text" class="form-control" id="surnameInput"
                                   placeholder="Enter surname">
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email address</label>
                            <input name="email" type="email" class="form-control" id="emailInput"
                                   placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phoneInput">Phone number</label>
                            <input name="phone" type="text" class="form-control" id="phoneInput"
                                   placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Description</label>
                            <textarea name="description" class="form-control" id="descriptionInput"
                                      placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="profileImage">Profile image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profileImage" name="profileImage">
                                    <label class="custom-file-label" for="profileImage">Choose image</label>
                                </div>
                            </div>
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
                    <table id="manageUserDepartments" class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($departments as $department)
                            <tr id="{{$department->id}}">
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->description}}</td>
                                <td></td>
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
                <form action="/admin/manage/user/add/departments" id="addDepartmentsToUserForm" method="POST">
                    @csrf
                    <input name="addDepartmentsDataInput" id="hiddenAddDepartmentsToUserInput" type="hidden">
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submitAddDepartmentsToUser" type="button" class="btn btn-primary">Save
                            changes
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
    <script src="{{ asset('js/pages/manageUsers.js') }}"></script>

@endpush
@push('stylesheets')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
@endpush

