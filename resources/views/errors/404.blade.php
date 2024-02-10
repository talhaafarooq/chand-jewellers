@extends('layouts.website')
@section('title','Chand Jewellers - Error 404')
@section('content')
<!-- Begin Hiraola's Breadcrumb Area -->
<div class="container">
    <nav>
        <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <li><a href="{{ route('website.home') }}">Home</a></li>
            <li class="current"><a href="#">Error - 404</a></li>
        </ol>
    </nav>
</div>
<!-- Hiraola's Breadcrumb Area End Here -->
<!-- Begin Hiraola's Error 404 Page Area -->
<div class="error404-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="search-error-wrapper">
                    <h1>404</h1>
                    <h2>PAGE NOT BE FOUND</h2>
                    <p class="short_desc">Sorry but the page you are looking for does not exist, have been
                        removed, name
                        changed or is temporarily unavailable.</p>
                    {{-- <form action="javascript:void(0)" class="error-form">
                        <div class="inner-error_form">
                            <input type="text" placeholder="Search..." class="error-input-text">
                            <button type="submit" class="error-search_btn"><i class="fa fa-search"></i></button>
                        </div>
                    </form> --}}
                    <div class="hiraola-btn-ps_center mt-2"></div>
                    <a href="{{ route('website.home') }}" class="hiraola-error_btn">Back To Home Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Error 404 Page End Here -->
@endsection
