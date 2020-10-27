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
                                          placeholder="Enter ...">{{old('section1.headers.header1') ?? $content->section1->headers->header1}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="section1_phone_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="section1[images][phone_image1]" type="file"
                                               class="custom-file-input" id="section1_phone_image">
                                        <label class="custom-file-label" for="section1_phone_image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Button content</label>
                                <input name="section1[buttons][button1]"
                                       value="{{old('section1.buttons.button1') ?? $content->section1->buttons->button1}}"
                                       type="text" class="form-control"
                                       placeholder="Enter ...">
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
                                      placeholder="Enter ...">{{old('section2.headers.header1') ?? $content->section2->headers->header1}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Paragraph content</label>
                            <input
                                value="{{old('section2.paragraphs.paragraph1') ?? $content->section2->paragraphs->paragraph1}}"
                                name="section2[paragraphs][paragraph1]" type="text" class="form-control"
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
                            <input
                                value="{{old('section3.headers.header1') ?? $content->section3->headers->header1}}"
                                name="section3[headers][header1]" type="text" class="form-control"
                                placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Paragraph content</label>
                            <input
                                value="{{old('section3.paragraphs.paragraph1') ?? $content->section3->paragraphs->paragraph1}}"
                                name="section3[paragraphs][paragraph1]" type="text" class="form-control"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="section3_phone_image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="section3[images][phone_image1]" type="file"
                                               class="custom-file-input" id="section3_phone_image1">
                                        <label class="custom-file-label" for="section3_phone_image1">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <input value="{{old('section3.icons.icon1') ?? $content->section3->icons->icon1}}"
                                       id="icon1" name="section3[icons][icon1]" class="icon-picker form-control"
                                       type="text" data-iconpicker-input="#icon1">
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <div class="form-group">
                                <label>Icon</label>
                                <input value="{{old('section3.icons.icon2') ?? $content->section3->icons->icon2}}"
                                       id="icon2" name="section3[icons][icon2]" class="icon-picker form-control"
                                       type="text" data-iconpicker-input="#icon2">
                            </div>
                        </div>
                        <div class="col-sm-8 offset-sm-4">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <input
                                        value="{{old('section3.headers.header2') ?? $content->section3->headers->header2}}"
                                        name="section3[headers][header2]" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <input
                                        value="{{old('section3.headers.header3') ?? $content->section3->headers->header3}}"
                                        name="section3[headers][header3]" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <textarea
                                        name="section3[paragraphs][paragraph2]" type="text" class="form-control"
                                        placeholder="Enter ...">{{old('section3.paragraphs.paragraph2') ?? $content->section3->paragraphs->paragraph2}}</textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <textarea
                                        name="section3[paragraphs][paragraph3]" type="text" class="form-control"
                                        placeholder="Enter ...">{{old('section3.paragraphs.paragraph3') ?? $content->section3->paragraphs->paragraph3}}</textarea>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="form-group col-sm-6">
                                    <label>Icon</label>
                                    <input value="{{old('section3.icons.icon3') ?? $content->section3->icons->icon3}}"
                                           id="icon3" name="section3[icons][icon3]" class="icon-picker form-control"
                                           type="text" data-iconpicker-input="#icon3">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Icon</label>
                                    <input value="{{old('section3.icons.icon4') ?? $content->section3->icons->icon4}}"
                                           id="icon4" name="section3[icons][icon4]" class="icon-picker form-control"
                                           type="text" data-iconpicker-input="#icon4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <input
                                        value="{{old('section3.headers.header4') ?? $content->section3->headers->header4}}"
                                        name="section3[headers][header4]" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <input
                                        value="{{old('section3.headers.header5') ?? $content->section3->headers->header5}}"
                                        name="section3[headers][header5]" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <textarea
                                        name="section3[paragraphs][paragraph4]" type="text" class="form-control"
                                        placeholder="Enter ...">{{old('section3.paragraphs.paragraph4') ?? $content->section3->paragraphs->paragraph4}}</textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <textarea
                                        name="section3[paragraphs][paragraph5]" type="text" class="form-control"
                                        placeholder="Enter ...">{{old('section3.paragraphs.paragraph5') ?? $content->section3->paragraphs->paragraph5}}</textarea>
                                </div>
                            </div>
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
                            <textarea name="section4[headers][header1]" class="form-control" rows="3"
                                      placeholder="Enter ...">{{old('section4.headers.header1') ?? $content->section4->headers->header1}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Button content</label>
                            <input
                                value="{{old('section4.buttons.button1') ?? $content->section4->buttons->button1}}"
                                name="section4[buttons][button1]" type="text" class="form-control"
                                placeholder="Enter ...">
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
                <div class="row">
                    <div class="col-sm-4">
                        <input
                            value="{{old('section5.headers.header1') ?? $content->section5->headers->header1}}"
                            name="section5[headers][header1]" type="text" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input value="{{old('section5.icons.icon1') ?? $content->section5->icons->icon1}}"
                               id="icon5" name="section5[icons][icon1]" class="icon-picker form-control"
                               type="text" data-iconpicker-input="#icon5">
                    </div>
                    <div class="col-sm-4">
                        <input
                            value="{{old('section5.headers.header2') ?? $content->section5->headers->header2}}"
                            name="section5[headers][header2]" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Primary</button>
    </form>
@endsection
@push('scripts')
    <!-- Font Awesome Picker -->
    <script src="{{asset('plugins/fontawesome-iconpicker/iconpicker-1.5.0.js')}}"></script>
    <script>
        // IconPicker options
        IconPicker.Init({
            // Required: You have to set the path of IconPicker JSON file to "jsonUrl" option. e.g. '/content/plugins/IconPicker/dist/iconpicker-1.5.0.json'
            jsonUrl: '/plugins/fontawesome-iconpicker/iconpicker-1.5.0.json',
            // Optional: Change the buttons or search placeholder text according to the language.
            searchPlaceholder: 'Search Icon',
            showAllButton: 'Show All',
            cancelButton: 'Cancel',
            noResultsFound: 'No results found.', // v1.5.0 and the next versions
            borderRadius: '20px', // v1.5.0 and the next versions
        });
        // Select your Button element (ID or Class)
        IconPicker.Run('#icon1');
        IconPicker.Run('#icon2');
        IconPicker.Run('#icon3');
        IconPicker.Run('#icon4');
        IconPicker.Run('#icon5');
    </script>
@endpush
@push('stylesheets')
    <!-- Font Awesome Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-iconpicker/iconpicker-1.5.0.css') }}">
@endpush
