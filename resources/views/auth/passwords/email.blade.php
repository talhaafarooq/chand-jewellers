@extends('layouts.website')
@section('title', 'Chand Jewellers - Forgot Password')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .checkbox .forget-pass a {
            color: #ae1c9a;
            font-size: 12px;
            font-weight: 500;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li class="current"><a href="#">Forgot Password</a></li>
            </ol>
        </nav>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Login Register Area -->
    <div class="hiraola-login-register_area" style="padding-top: 30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div id="email-section">
                        <label for="email"><b>Enter E-mail Address</b></label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="example@example.com" required>
                        <div class="text-danger" id="email_error"></div>
                        <button type="button" class="hiraola-register_btn mt-2 submit-email">Submit</button>
                    </div>

                    <div id="verify-email" class="d-none">
                        <label for="code"><b>Enter Verification Code</b></label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Code">
                        <div class="text-danger" id="code_error"></div>
                        <button type="button" class="hiraola-register_btn mt-4 verify-code">Submit</button>
                        <span class="spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                    </div>

                    <div class="d-none" id="update-password">
                        <label for="code"><b>Enter Verification code</b></label>
                        <input type="text" name="password" id="password" class="form-control mt-1"
                            placeholder="Password">
                        <input type="text" name="confirm_password" id="confirm_password" class="form-control mt-2"
                            placeholder="Confirm Password">
                        <div class="text-danger" id="password_error"></div>
                        <button type="button" class="hiraola-register_btn mt-4 verify-password">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Login Register Area  End Here -->
    <input type="hidden" id="verification_email">
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Verify email address
            $('.submit-email').click(function() {
                const $button = $(this);
                const $spinner = $('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>')
                    .appendTo($button.parent());
                const $emailError = $('#email_error');
                const email = $('#email').val();

                $button.prop('disabled', true);
                $emailError.text('');

                if (!email) {
                    $button.prop('disabled', false);
                    $spinner.remove();
                    $emailError.text('Please enter a valid email address.');
                    return;
                }

                $emailError.text('Verifying email...');

                $.ajax({
                    url: "{{ URL::to('/verify-email') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email
                    },
                    success: function(response) {
                        if (response.status) {
                            alert(
                                'Email verification successful! Check your inbox for instructions.'
                            );
                            $('#email').val('');
                            $('#verification_email').val(email);
                            $('#email-section').addClass('d-none');
                            $('#verify-email').removeClass('d-none');
                        } else {
                            // Display specific error message from response, or generic message if not available
                            $emailError.text(response.message ||
                                'An error occurred. Please try again.');
                        }
                    },
                    error: function(response) {
                        // Check for specific validation error
                        if (response.status === 422) {
                            const errors = response.responseJSON.errors;
                            if (errors.email) {
                                $emailError.text(errors.email[0]);
                            } else {
                                $emailError.text('An error occurred. Please try again.');
                            }
                        } else {
                            $emailError.text('Server error. Please try again later.');
                            console.error(response); // Log detailed error for debugging
                        }
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                        $spinner.remove();
                    }
                });
            });



            // Verify Code
            $('.verify-code').click(function() {
                const $button = $(this);
                const $spinner = $button.siblings('.spinner');
                const $codeError = $('#code_error');
                const code = $('#code').val();

                if (!code) {
                    $codeError.text('Please enter a verification code.');
                    return;
                }

                $button.prop('disabled', true);
                $spinner.removeClass('d-none');
                $codeError.text('Verifying code...');

                $.ajax({
                    url: "{{ URL::to('/verify-code') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        code: code
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#code').val('');
                            $codeError.text('');
                            $('#verify-email').addClass('d-none');
                            $('#update-password').removeClass('d-none');
                        } else {
                            $codeError.text(response.message ||
                                'An error occurred. Please try again.');
                        }
                    },
                    error: function(response) {
                        // Check for specific validation error
                        if (response.status === 422) {
                            const errors = response.responseJSON.errors;
                            if (errors.code) {
                                $codeError.text(errors.code[0]);
                            } else {
                                $codeError.text('An error occurred. Please try again.');
                            }
                        } else {
                            $codeError.text('Server error. Please try again later.');
                            console.error(response); // Log detailed error for debugging
                        }
                    },
                    complete: function() {
                        $button.prop('disabled', false);
                        $spinner.addClass('d-none');
                    }
                });
            });


            // Update Password
            $('.verify-password').click(function() {
                const $button = $(this);
                const $spinner = $('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span>')
                    .appendTo($button.parent());
                const $passwordError = $('#password_error');
                const password = $('#password').val();
                const confirmPassword = $('#confirm_password').val();
                const email = $('#verification_email').val(); // Assuming this holds the user's email

                $button.prop('disabled', true); // Disable button immediately
                $passwordError.text('');

                // Client-side password matching
                if (password !== confirmPassword) {
                    $button.prop('disabled', false);
                    $spinner.remove();
                    $passwordError.text('Passwords do not match.');
                    return;
                }

                $passwordError.text('Updating password...');

                $.ajax({
                    url: "{{ URL::to('/update-password') }}", // Replace with your actual URL
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        password: password,
                        confirm_password: confirmPassword,
                        email: email
                    }, // Include email for server-side validation
                    complete: function() {
                        $button.prop('disabled', false); // Enable button when request completes
                        $spinner.remove();
                    },
                    success: function(response) {
                        if (response.status) {
                            alert(response.message);
                            window.location.href = "{{ URL::to('/login') }}";
                        } else {
                            // Show specific error message from response or a generic message
                            $passwordError.text(response.message ||
                                'An error occurred. Please try again.');
                        }
                    },
                    error: function(response) {
                        // Handle validation errors (if applicable)
                        if (response.status === 422) {
                            const errors = response.responseJSON.errors;
                            $passwordError.text(
                                errors.password || errors.confirm_password ||
                                'An error occurred. Please try again.'
                            );
                        } else {
                            $passwordError.text('Server error. Please try again later.');
                            console.error(response); // Log detailed error for debugging
                        }
                    }
                });
            });



        });
    </script>


@endsection
