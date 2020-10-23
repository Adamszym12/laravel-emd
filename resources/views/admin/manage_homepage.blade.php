@extends('layouts.base')
@section('pageName', 'Departments')
@section('title', 'departments')
@section('content')
    <!-- general form elements disabled -->
    <form role="form" method="POST" action="{{route('pages.update', $page->id )}}" enctype="multipart/form-data">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">First section</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- First section -->
                <div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Header content</label>
                                <textarea name="section1[headers][header1]" class="form-control" rows="3"
                                          placeholder="Enter ...">{{old('section1.headers.header1')}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="section1_phone_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="section1[images][phone_image]" type="file"
                                               class="custom-file-input" id="section1_phone_image">
                                        <label class="custom-file-label" for="section1_phone_image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Button content</label>
                                <input name="section1[buttons][button1]" value="{{old('section1.buttons.button1')}}" type="text" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="section1_background_image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="section1[images][backgroundImage]" type="file" class="custom-file-input"
                                       id="section1_phone_image">
                                <label class="custom-file-label" for="section1_background_image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>
                </div> <!--.First section-->
                <!-- Second section -->
            </div>
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Second section</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Header content</label>
                            <textarea name="section2[headers][header1]" class="form-control" rows="3"
                                      placeholder="Enter ...">{{old('section2.headers.header1')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Paragraph content</label>
                            <input value="{{old('section2.paragraph.paragraph1')}}" name="section2[paragraphs][paragraph1]" type="text" class="form-control"
                                   placeholder="Enter ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Third section</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Header content</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Button content</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Fourth section</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-left">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Header content</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Button content</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Fifth section</h3>
            </div>
            <div class="card-body">
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Primary</button>
    </form>
@endsection
@push('scripts')
@endpush
@push('stylesheets')
@endpush
