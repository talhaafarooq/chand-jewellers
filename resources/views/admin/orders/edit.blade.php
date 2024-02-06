@extends('admin.layouts.app')
@section('title', 'Edit Order')
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
                                <h3 class="card-title">Edit Order</h3>
                            </div>
                            <form action="{{ route('admin.orders.update', $edit->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control"
                                                value="{{ $edit->fname }}" required autofocus>
                                            @error('first_name')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control"
                                                value="{{ $edit->lname }}" required>
                                            @error('last_name')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="company">Company (optional)</label>
                                            <input type="text" name="company" id="company" class="form-control"
                                                value="{{ $edit->company }}">
                                            @error('company')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $edit->email }}" required>
                                            @error('email')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="address1">Address 1</label>
                                            <input type="text" name="address1" id="address1" class="form-control"
                                                value="{{ $edit->address1 }}" required>
                                            @error('address1')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="address2">Address 2</label>
                                            <input type="text" name="address2" id="address2" class="form-control"
                                                value="{{ $edit->address2 }}">
                                            @error('address2')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="city">City</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                value="{{ $edit->city }}" required>
                                            @error('city')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="state">State</label>
                                            <input type="text" name="state" id="state" class="form-control"
                                                value="{{ $edit->state }}" required>
                                            @error('state')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="zipcode">ZipCode</label>
                                            <input type="text" name="zipcode" id="zipcode" class="form-control"
                                                value="{{ $edit->zipcode }}">
                                            @error('zipcode')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control select2" required>
                                                <option value="Pakistan" selected>Pakistan</option>
                                            </select>
                                            @error('country')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="phone1">Phone 1</label>
                                            <input type="tel" name="phone1" id="phone1" class="form-control"
                                                value="{{ $edit->phone1 }}" required>
                                            @error('phone1')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <label for="phone2">Phone 2</label>
                                            <input type="tel" name="phone2" id="phone2" class="form-control"
                                                value="{{ $edit->phone2 }}">
                                            @error('phone2')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control select2" required>
                                                <option value="received" @if($edit->status->value === "received") selected @endif>Received</option>
                                                <option value="dispatched" @if($edit->status->value === "dispatched") selected @endif>Dispatched</option>
                                                <option value="cancelled" @if($edit->status->value === "cancelled") selected @endif>Cancelled</option>
                                                <option value="delivered" @if($edit->status->value === "delivered") selected @endif>Delivered</option>
                                            </select>
                                            @error('status')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2 @if($edit->status->value !== "dispatched")? d-none @endif" id="tracking_no_section">
                                            <label for="tracking_no">Tracking No</label>
                                            <input type="text" name="tracking_no" id="tracking_no" class="form-control"
                                                value="{{ $edit->tracking_no }}">
                                            @error('tracking_no')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2 @if($edit->status->value !== "dispatched")? d-none @endif" id="tracking_company_section">
                                            <label for="tracking_company">Tracking Company</label>
                                            <input type="text" name="tracking_company" id="tracking_company" class="form-control"
                                                value="{{ $edit->tracking_company }}">
                                            @error('tracking_company')
                                                <font color="red">{{ $message }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#status').change(function(){
                var status = $(this).val();
                if(status == 'dispatched')
                {
                    $('#tracking_no_section').removeClass('d-none');
                    $('#tracking_company_section').removeClass('d-none');
                }else{
                    $('#tracking_no_section').addClass('d-none');
                    $('#tracking_company_section').addClass('d-none');
                }
            });
        });
    </script>
@endsection
