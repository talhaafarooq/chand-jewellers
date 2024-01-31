@extends('admin.layouts.app')
@section('title', 'About Us')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">About Us</h3>
                            </div>
                            {!! Form::model($edit, [
                                'method' => 'PATCH',
                                'action' => ['App\Http\Controllers\Admin\AboutUsController@update', $edit->id],
                                'enctype' => 'multipart/form-data'
                            ]) !!}
                            <div class="card-body">
                                <div class="row">
                                    @include('errors')
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        {!! Form::label('image', 'Image') !!}
                                        <input type="file" name="image" id="image" class="form-control">
                                        @error('image')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        {!! Form::label('about', 'About') !!}
                                        {!! Form::textarea('about', null, [
                                            'id' => 'about',
                                            'class' => 'form-control summernote-editor',
                                            'placeholder' => 'Write About Us...',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('about')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @can('update-about')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">Submit</button>
                            </div>
                            @endcan
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <!-- SummerNote JS -->
    <script src="{{ URL::asset('dashboard/summernote/summernote-bs4.min.js') }}"></script>
    <script type="text/javascript">
        // --------------------- SummerNote Editor Start Here ------------------------
        $(document).ready(function() {
          $('.summernote-editor').summernote({
            height: '200',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview']],
            ],
            disableResizeEditor: true,
            callbacks: {
                onInit: function() {
                    // Remove the image button from the toolbar
                    $('#summernote-editor').next('.note-editor').find('.note-icon-picture').remove();
                }
            }
          });
        });
        // --------------------- SummerNote End Here ------------------------
    </script>
@endsection
