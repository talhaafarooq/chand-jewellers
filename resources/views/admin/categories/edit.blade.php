@extends('admin.layouts.app')
@section('title', 'Edit Category')
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
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            {!! Form::model($edit, [
                                'method' => 'PATCH',
                                'action' => ['App\Http\Controllers\Admin\CategoryController@update', $edit->id],
                                'enctype' => 'multipart/form-data'
                            ]) !!}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            {!! Form::label('name', 'Name') !!}
                                            {!! Form::text('name', null, [
                                                'id' => 'name',
                                                'class' => 'form-control',
                                                'placeholder' => 'Name',
                                                'autofocus' => 'autofocus',
                                                'required'=>'required'
                                            ]) !!}
                                            @error('name')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                            {!! Form::label('image', 'Image') !!}
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                            <img src="{{ asset('dashboard/storage/categories/1702709802.PNG') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary pl-5 pr-5">Submit</button>
                                </div>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
