@extends('layouts.website')
@section('title', 'Chand Jewellers - Register')
@section('content')
<!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Register</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Register New Account</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Login Register Area -->
    <div class="hiraola-login-register_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 col-xs-12">
                    <form action="{{ route('website.register') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb--20">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name" autofocus required>
                                    @error('first_name')
                                        <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                                    @error('last_name')
                                    <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Phone No</label>
                                    <input type="text" name="phone_no" id="phone_no" value="{{ old('phone_no') }}" placeholder="Phone No" required>
                                    @error('phone_no')
                                    <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Address</label>
                                    <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Address" required>
                                    @error('address')
                                    <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Email Address*</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required>
                                    @error('email')
                                    <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password" required min="8" max="16">
                                    @error('password')
                                    <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="terms_conditions">
                                        <input type="checkbox" name="terms_conditions" id="terms_conditions"> I accept all terms & conditions
                                    </label>
                                </div>
                                <div class="col-12" style="margin-top: -20px;">
                                    <button type="submit" class="hiraola-register_btn">Register</button>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="shop-account">Already have an account? <a href="{{ route('login') }}" class="text-primary">Login Now</a></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Login Register Area  End Here -->
@endsection
