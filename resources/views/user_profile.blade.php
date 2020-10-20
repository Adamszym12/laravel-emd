@extends('layouts.base')

@section('pageName', '')
@section('title', 'profile')
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit profile</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('users.profile.update', Auth()->user()->id)}}"  METHOD="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input name="name" type="text" value="{{$user->name}}" class="form-control" id="nameInput" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="surnameInput">Surname</label>
                            <input name="surname" type="text" value="{{$user->surname}}" class="form-control" id="surnameInput" placeholder="Enter surname">
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email address</label>
                            <input name="email" type="email" value="{{$user->email}}" class="form-control" id="emailInput" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phoneInput">Phone number</label>
                            <input name="phone" type="text" value="{{$user->phone}}" class="form-control" id="phoneInput" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Description</label>
                            <textarea name="description" class="form-control" id="descriptionInput" placeholder="Enter description">{{$user->description}}</textarea>
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
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#profileImage').on('change',function(){
            //get the file name
            let fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endpush

