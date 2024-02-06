@extends('layouts.website')
@section('title', 'Chand Jewellers - Forgot Password')
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
                <h2>Forgot Password</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Forgot Password</li>
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
                    <img src="{{ URL::asset('website/assets/images/default2.png') }}" class="d-block m-auto" width="300px" alt="">
                    <h4 class="text-center">This page is under construction...</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Login Register Area  End Here -->
@endsection
