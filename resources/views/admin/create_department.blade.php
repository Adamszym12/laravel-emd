@extends('layouts.base')

@section('pageName', '')
@section('title', 'departments')
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add department</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('departments.store')}}" METHOD="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <input name="name" type="text" value="{{old('name')}}" class="form-control" id="nameInput" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="descriptionInput">Description</label>
                            <textarea name="description" class="form-control"  id="descriptionInput" placeholder="Enter description">{{old('description')}}</textarea>
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
