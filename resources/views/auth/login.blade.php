@extends('layouts.website')
@section('title','Login')
@section('head')
    <style>
        .checkbox .forget-pass a {
            color: #ae1c9a;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
@endsection
@section('content')
    {{-- <section class="login footer-padding">
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="login-section">
                <div class="review-form">
                    <h5 class="comment-title">Log In</h5>
                    <div class="review-inner-form ">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="address">
                                    Remember Me</span>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="forget-pass">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <button type="submit" class="shop-btn">Log In</a>
                    </div>
                    <div class="text-center">
                        <span class="shop-account">Dont't have an account ?<a href="create-account.html">Sign Up
                            Free</a></span>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section> --}}
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <font color="red">{{ $message }}</font>
                                @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                                    @error('password')
                                    <font color="red">{{ $message }}</font>
                                @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="hiraola-register_btn">Login</button>
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
