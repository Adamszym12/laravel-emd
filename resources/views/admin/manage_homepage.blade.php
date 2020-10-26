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
                    <div class="form-group">
                        <label for="section1_background_image">background image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="section1[images][background_image]" type="file" class="custom-file-input"
                                       id="section1_background_image">
                                <label class="custom-file-label" for="section1_background_image">Choose file</label>
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
                <div class="form-group">
                    <label for="section2_background_image">background image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="section2[images][background_image]" type="file" class="custom-file-input"
                                   id="section2_background_image">
                            <label class="custom-file-label" for="section2_background_image">Choose file</label>
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
                            <label for="section2_icon_image1">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="section3[images][icon_image1]" type="file"
                                           class="custom-file-input" id="section2_icon_image1">
                                    <label class="custom-file-label" for="section2_icon_image1">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="section2_icon_image2">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="section3[images][icon_image2]" type="file"
                                           class="custom-file-input" id="section2_icon_image2">
                                    <label class="custom-file-label" for="section2_icon_image2">Choose
                                        file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 offset-sm-4">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Header content</label>
                                <textarea name="section3[headers][header2]" class="form-control" rows="3"
                                          placeholder="Enter ...">{{old('section3.headers.header2') ?? $content->section3->headers->header2}}</textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Header content</label>
                                <textarea name="section3[headers][header3]" class="form-control" rows="3"
                                          placeholder="Enter ...">{{old('section3.headers.header3') ?? $content->section3->headers->header3}}</textarea>
                            </div>
                        </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <input
                                        value="{{old('section3.paragraphs.paragraph2') ?? $content->section3->paragraphs->paragraph2}}"
                                        name="section3[paragraphs][paragraph2]" type="text" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <input
                                        value="{{old('section3.paragraphs.paragraph3') ?? $content->section3->paragraphs->paragraph3}}"
                                        name="section3[paragraphs][paragraph3]" type="text" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="section3_icon_image3">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="section3[images][icon_image3]" type="file"
                                                   class="custom-file-input" id="section3_icon_image3">
                                            <label class="custom-file-label" for="section3_icon_image3">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="section3_icon_image4">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="section3[images][icon_image4]" type="file"
                                                   class="custom-file-input" id="section2_icon_image4">
                                            <label class="custom-file-label" for="section2_icon_image4">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <textarea name="section3[headers][header4]" class="form-control" rows="3"
                                              placeholder="Enter ...">{{old('section3.headers.header4') ?? $content->section3->headers->header4}}</textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Header content</label>
                                    <textarea name="section3[headers][header5]" class="form-control" rows="3"
                                              placeholder="Enter ...">{{old('section3.headers.header5') ?? $content->section3->headers->header5}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <input
                                        value="{{old('section3.paragraphs.paragraph4') ?? $content->section3->paragraphs->paragraph4}}"
                                        name="section3[paragraphs][paragraph4]" type="text" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Paragraph content</label>
                                    <input
                                        value="{{old('section3.paragraphs.paragraph5') ?? $content->section3->paragraphs->paragraph5}}"
                                        name="section3[paragraphs][paragraph5]" type="text" class="form-control"
                                        placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="section3_background_image">background image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="section3[images][background_image]" type="file"
                                   class="custom-file-input"
                                   id="section3_background_image">
                            <label class="custom-file-label" for="section3_background_image">Choose file</label>
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
                <div class="form-group">
                    <label for="section4_background_image">background image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="section4[images][background_image]" type="file"
                                   class="custom-file-input"
                                   id="section4_background_image">
                            <label class="custom-file-label" for="section4_background_image">Choose file</label>
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
                <div class="form-group">
                    <label for="section5_background_image">background image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="section5[images][background_image]" type="file"
                                   class="custom-file-input"
                                   id="section5_background_image">
                            <label class="custom-file-label" for="section5_background_image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Primary</button>
    </form>
@endsection
@push('scripts')
@endpush
@push('stylesheets')
@endpush
