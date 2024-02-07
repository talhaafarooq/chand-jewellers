@extends('layouts.website')
@section('title', 'Chand Jewellers - Contact Us')
@section('head')
    <style>
        .breadcrumb-area {
            background: black;
            min-height: 225px;
            position: relative;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li class="current"><a href="#">Contact Us</a></li>
            </ol>
        </nav>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Contact Main Page Area -->
    <div class="contact-main-page" style="padding-top: 30px !important;">
        <div class="container">
            @if (Session::has('successs'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success">{{ Session::get('successs') }}</div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>
                        <p class="contact-page-message">Claritas est etiam processus dynamicus, qui sequitur
                            mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
                            claram anteposuerit litterarum formas human.</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            <p>{{ SettingsHelper::info()->address1 }}</p>
                            <p>{{ SettingsHelper::info()->address2 }}</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            <p>Phone #1: {{ SettingsHelper::info()->phone1 }}</p>
                            <p>Phone #2: {{ SettingsHelper::info()->phone2 }}</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>{{ SettingsHelper::info()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>
                        <div class="contact-form">
                            <form id="contact-form1" action="{{ route('website.send-contact-message') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Your Name <span class="required">*</span></label>
                                            <input type="text" name="name" required>
                                            @error('name')
                                                <font color="red">{{ $error }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input type="email" name="email" required>
                                            @error('email')
                                                <font color="red">{{ $error }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Subject <span class="required">*</span></label>
                                            <input type="text" name="subject" required>
                                            @error('subject')
                                                <font color="red">{{ $error }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Cell No <span class="required">*</span></label>
                                            <input type="text" name="cell_no">
                                            @error('cell_no')
                                                <font color="red">{{ $error }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group form-group-2">
                                            <label>Your Message <span class="required">*</span></label>
                                            <textarea name="message" required></textarea>
                                            @error('message')
                                                <font color="red">{{ $error }}</font>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" value="submit" id="submit" class="hiraola-contact-form_btn"
                                        name="submit">send</button>
                                </div>
                            </form>
                            <p class="form-message mt-3 mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            {{-- <div id="google-map"></div> --}}
            <div class="row">
                <div class="col-12">
                    {!! SettingsHelper::info()->map !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Main Page Area End Here -->
@endsection
