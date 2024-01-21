@extends('admin.layouts.app')
@section('title', 'Edit User')
@section('head')
    <style>
        .gen-password,
        #togglePassword:hover {
            cursor: pointer;
        }

        .text-red {
            color: red;
        }
    </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.user-management.update',$user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="first_name">First Name *</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            autofocus required placeholder="First Name" value="{{ $user->first_name }}">
                                        @error('first_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Last Name" required value="{{ $user->last_name }}">
                                        @error('last_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="example@example.com" value="{{ $user->email }}" readonly>
                                        @error('email')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="phone">Phone Number *</label>
                                        <input type="text" name="phone" id="phone" class="form-control" required
                                            placeholder="Phone Number" value="{{ $user->phone_no }}">
                                        @error('phone')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="new_password">New Password</label>
                                        <div class="input-group">
                                            <input type="text" name="new_password" id="new_password" class="form-control"
                                                placeholder="Enter New Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="togglePassword">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        {{-- <span class="text-primary gen-password">
                                            <u><strong>Generate Password</strong></u>
                                        </span> --}}
                                        @error('new_password')
                                            <p class="text-red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                        <label for="role">Role *</label>
                                        <select name="role" id="role" class="form-control select2" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}"
                                                    {{ $role->name == $user->roles[0]->name ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control select2" required>
                                            <option value="0">Active</option>
                                            <option value="1">InActive</option>
                                        </select>
                                        @error('status')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary pl-5 pr-5" name="action" value="update">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
@section('scripts')
    <script>
        // --------------------- GENERATE RANDOM PASSWORD ------------------------
        function generateRandomPassword() {
            var length = 10; // Length of the generated password
            var charset =
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+="; // Characters to include in the password
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            return password;
        }
        $(document).ready(function() {
            $(".gen-password").click(function() {
                var password = generateRandomPassword();
                $("#new_password").val(password);
            });
            $("#togglePassword").click(function() {
                var passwordField = $("#new_password");
                var passwordFieldType = passwordField.attr("type");

                // Toggle password visibility
                if (passwordFieldType === "password") {
                    passwordField.attr("type", "text");
                    $("#togglePassword i").removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    passwordField.attr("type", "password");
                    $("#togglePassword i").removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });
        // ---------------------GENERATE RANDOM PASSWORD END HERE------------------------
        // --------------------- Only Numbers are allowed in PhoneNo ------------------------
        $(document).ready(function() {
            $('#phone').on('keydown', function(e) {
                // Allow: backspace, delete, tab, escape, enter, and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A/Ctrl+C/Ctrl+V
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    (e.keyCode == 86 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }

                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });
        });
        // --------------------- Only Numbers are allowed in PhoneNo End Here ------------------------
    </script>
@endsection
