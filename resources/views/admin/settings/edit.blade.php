@extends('admin.layouts.app')
@section('title', 'Edit Settings')
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
                                <h3 class="card-title">Settings</h3>
                            </div>
                            {!! Form::model($edit, [
                                'method' => 'PATCH',
                                'action' => ['App\Http\Controllers\Admin\SettingController@update', $edit->id],
                                'enctype' => 'multipart/form-data'
                            ]) !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
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
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', null, [
                                            'id' => 'email',
                                            'class' => 'form-control',
                                            'placeholder' => 'Email',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('email')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('phone1', 'Phone No 1') !!}
                                        {!! Form::tel('phone1', null, [
                                            'id' => 'phone1',
                                            'class' => 'form-control',
                                            'placeholder' => 'Phone No 1',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('phone1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('phone2', 'Phone No 2') !!}
                                        {!! Form::tel('phone2', null, [
                                            'id' => 'phone2',
                                            'class' => 'form-control',
                                            'placeholder' => 'Phone No 2',
                                        ]) !!}
                                        @error('phone1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('address1', 'Address 1') !!}
                                        {!! Form::text('address1', null, [
                                            'id' => 'address1',
                                            'class' => 'form-control',
                                            'placeholder' => 'Address 1',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('address1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('address2', 'Address 2') !!}
                                        {!! Form::text('address2', null, [
                                            'id' => 'address2',
                                            'class' => 'form-control',
                                            'placeholder' => 'Address 2',
                                        ]) !!}
                                        @error('address2')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('facebook', 'Facebook Link') !!}
                                        {!! Form::text('facebook', null, [
                                            'id' => 'facebook',
                                            'class' => 'form-control',
                                            'placeholder' => 'Facebook',
                                        ]) !!}
                                        @error('facebook')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('whatsapp', 'Whatsapp Link') !!}
                                        {!! Form::text('whatsapp', null, [
                                            'id' => 'whatsapp',
                                            'class' => 'form-control',
                                            'placeholder' => 'Whatsapp',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('whatsapp')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('instagram1', 'Instagram Link 1') !!}
                                        {!! Form::text('instagram1', null, [
                                            'id' => 'instagram1',
                                            'class' => 'form-control',
                                            'placeholder' => 'Instagram 1 Link',
                                        ]) !!}
                                        @error('instagram1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('instagram2', 'Instagram Link 2') !!}
                                        {!! Form::text('instagram2', null, [
                                            'id' => 'instagram2',
                                            'class' => 'form-control',
                                            'placeholder' => 'Instagram 2 Link',
                                        ]) !!}
                                        @error('instagram2')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('tiktok1', 'Tiktok Link 1') !!}
                                        {!! Form::text('tiktok1', null, [
                                            'id' => 'tiktok1',
                                            'class' => 'form-control',
                                            'placeholder' => 'Tiktok Link 1',
                                        ]) !!}
                                        @error('tiktok1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('tiktok2', 'Tiktok Link 2') !!}
                                        {!! Form::text('tiktok2', null, [
                                            'id' => 'tiktok2',
                                            'class' => 'form-control',
                                            'placeholder' => 'Tiktok Link 2',
                                        ]) !!}
                                        @error('tiktok2')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('snack1', 'Snack Link 1') !!}
                                        {!! Form::text('snack1', null, [
                                            'id' => 'snack1',
                                            'class' => 'form-control',
                                            'placeholder' => 'Snack Link 1',
                                        ]) !!}
                                        @error('snack1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('snack2', 'Snack Link 2') !!}
                                        {!! Form::text('snack2', null, [
                                            'id' => 'snack2',
                                            'class' => 'form-control',
                                            'placeholder' => 'Snack Link 2',
                                        ]) !!}
                                        @error('snack2')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('youtube', 'Youtube Link') !!}
                                        {!! Form::text('youtube', null, [
                                            'id' => 'youtube',
                                            'class' => 'form-control',
                                            'placeholder' => 'Youtube',
                                        ]) !!}
                                        @error('youtube')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('map', 'Google Map') !!}
                                        {!! Form::text('map', null, [
                                            'id' => 'map',
                                            'class' => 'form-control',
                                            'placeholder' => 'Paste Google Map Link',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('map')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('header_logo', 'Header Logo') !!}
                                        <input type="file" name="header_logo" id="header_logo" class="form-control" accept="image/*">
                                        @error('header_logo')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('footer_logo', 'Footer Logo') !!}
                                        <input type="file" name="footer_logo" id="footer_logo" class="form-control" accept="image/*">
                                        @error('footer_logo')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('currency', 'Currency') !!}
                                        {!! Form::text('currency', null, [
                                            'id' => 'currency',
                                            'class' => 'form-control',
                                            'placeholder' => 'Rs.',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('currency')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        {!! Form::label('shipping', 'Shipping Charges') !!}
                                        {!! Form::text('shipping', null, [
                                            'id' => 'shipping',
                                            'class' => 'form-control',
                                            'placeholder' => '100',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('shipping')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        {!! Form::label('advance_charges', 'Advance Charges') !!}
                                        {!! Form::text('advance_charges', null, [
                                            'id' => 'advance_charges',
                                            'class' => 'form-control',
                                            'placeholder' => '0',
                                            'required'=>'required'
                                        ]) !!}
                                        @error('advance_charges')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @can('update-setting')
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
