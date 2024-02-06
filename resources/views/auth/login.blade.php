@extends('layouts.website')
@section('title', 'Chand Jewellers - Login')
@section('head')
    <style>
        .checkbox .forget-pass a {
            color: #ae1c9a;
            font-size: 12px;
            font-weight: 500;
        }
        .breadcrumb-area {
            background: black;
            min-height: 225px;
            position: relative;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Login</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Login Account</li>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Login Here</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <font color="red">{{ $message }}</font>
                                    @enderror
                                    @if (Session::has('account_block'))
                                        <font color="red">{{ Session::get('account_block') }}</font>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box">
                                        <input type="checkbox" id="remember" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="forgotton-password_info">
                                        <a href="{{ URL::to('/forgot-password') }}" class="text-primary"> &emsp;Forgot password?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="hiraola-register_btn">Login</button>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="shop-account">Dont't have an account? <a href="{{ route('register') }}"
                                            class="text-primary">Sign Up
                                            Free</a></span>
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
