@extends('admin.layouts.app')
@section('title', 'Add New Product')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <style>
        #details::placeholder {
            padding-left: 10px;
        }
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
@endsection
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
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            {!! Form::open([
                                'url' => 'admin/products',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {!! Form::label('code', 'Code') !!}
                                        {!! Form::text('code', old('code'), [
                                            'id' => 'code',
                                            'class' => 'form-control',
                                            'placeholder' => 'Product Code',
                                            'autofocus' => 'autofocus',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('code')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {!! Form::label('name', 'Name') !!}
                                        {!! Form::text('name', old('name'), [
                                            'id' => 'name',
                                            'class' => 'form-control',
                                            'placeholder' => 'Product Name',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('front_img', 'Front Image') !!}
                                        <input type="file" name="front_img" id="front_img" class="form-control" required>
                                        @error('front_img')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('back_img', 'Back Image') !!}
                                        <input type="file" name="back_img" id="back_img" class="form-control" required>
                                        @error('back_img')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('category', 'Category') !!}
                                        {!! Form::select('category', $categoriesList, old('category'), ['id' => 'category', 'class' => 'form-control' ,'required'=>'required']) !!}
                                        @error('category')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('sub_category', 'Sub Category') !!}
                                        {!! Form::select('sub_category', ['' => 'Select Sub Category'], null, [
                                            'id' => 'sub_category',
                                            'class' => 'form-control',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('sub_category')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('new_price', 'New Price') !!}
                                        {!! Form::text('new_price', old('new_price'), [
                                            'id' => 'new_price',
                                            'class' => 'form-control',
                                            'placeholder' => 'New Price',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('new_price')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('old_price', 'Old Price (optional)') !!}
                                        {!! Form::text('old_price', old('old_price'), [
                                            'id' => 'old_price',
                                            'class' => 'form-control',
                                            'placeholder' => 'Old Price',
                                        ]) !!}
                                        @error('old_price')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('sku', 'Sku') !!}
                                        {!! Form::text('sku', old('sku'), [
                                            'id' => 'sku',
                                            'class' => 'form-control',
                                            'placeholder' => 'SKU',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('sku')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('net_weight', 'Net Weight') !!}
                                        {!! Form::text('net_weight', old('net_weight'), [
                                            'id' => 'net_weight',
                                            'class' => 'form-control',
                                            'placeholder' => 'Net Weight',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('net_weight')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('polish_weight', 'Polish Weight') !!}
                                        {!! Form::text('polish_weight', old('polish_weight'), [
                                            'id' => 'polish_weight',
                                            'class' => 'form-control',
                                            'placeholder' => 'Polish Weight',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('polish_weight')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('karats', 'Karats') !!}
                                        {!! Form::text('karats', old('karats'), ['id' => 'karats', 'class' => 'form-control', 'placeholder' => 'Karats', 'required'=>'required']) !!}
                                        @error('karats')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('alert_qty', 'Alert Qty') !!}
                                        {!! Form::text('alert_qty', old('alert_qty'), [
                                            'id' => 'alert_qty',
                                            'class' => 'form-control',
                                            'placeholder' => 'Alert Qty',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('alert_qty')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div> --}}
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('images', 'Images') !!}
                                        <input type="file" name="images[]" id="images" class="form-control" required multiple>
                                        @error('images')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('status', 'Status') !!}
                                        {!! Form::select('status', ['1' => 'Active', '0' => 'InActive'], old('status'), [
                                            'id' => 'status',
                                            'class' => 'form-control select2',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('status')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        {!! Form::label('tags', 'Tags') !!}
                                        {!! Form::text('tags', old('tags'), [
                                            'id' => 'tags',
                                            'class' => 'form-control',
                                            'required'=>'required',
                                            'data-role'=>"tagsinput"
                                        ]) !!}
                                        @error('status')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        {!! Form::label('description', 'Description') !!}
                                        {!! Form::textarea('description', old('description'), [
                                            'id' => 'description',
                                            'class' => 'form-control',
                                            'placeholder' => 'Write short description here...',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('description')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        {!! Form::label('details', 'Details') !!}
                                        {!! Form::textarea('details', old('details'), [
                                            'id' => 'details',
                                            'class' => 'form-control tinymce-editor',
                                            'placeholder' => 'Write Product details here...',
                                        ]) !!}
                                        @error('details')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="action" value="create">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <script src="{{ URL::asset('dashboard') }}/dist/js/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        // --------------------- TinyMCE Editor Start Here ------------------------
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount', 'image'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
        // --------------------- TinyMCE Editor End Here ------------------------

        // --------------------- Only Numbers are allowed ------------------------
        $(document).ready(function() {
            $('#old_price, #new_price, #net_weight, #polish_weight, #karats, #alert_qty').on('keydown', function(
                e) {
                // Allow: backspace, delete, tab, escape, enter, and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A/Ctrl+C/Ctrl+V
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    (e.keyCode == 86 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }

                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });
        });
        // --------------------- Only Numbers are allowed End Here ------------------------

        // --------------------- Get Categories Sub Categories Start here ------------------------
        $(document).ready(function() {
            $('#category').change(function() {
                var category_id = $(this).val();
                if (!category_id) {

                } else {
                    $.ajax({
                        url: `{{ route('admin.get-subcategories-list') }}`,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            category_id: category_id
                        },
                        dataType: 'json',
                        beforeSend: function(response) {

                        },
                        success: function(response) {
                            var option = null;
                            if (response.length > 0) {
                                $.each(response, function(index, data) {
                                    if(index==0){
                                        option =
                                        `<option value="${data.id}" selected>${data.name}</option>`;
                                    }else{
                                        option +=
                                        `<option value="${data.id}">${data.name}</option>`;
                                    }
                                });
                                $('#sub_category').html(option);
                            } else {
                                option =
                                    `<option value="" selected>Select Sub Category</option>`;
                                $('#sub_category').html(option);
                            }
                        }
                    });
                }
            });
        });
        // --------------------- Get Categories Sub Categories End here ------------------------
    </script>
@endsection
