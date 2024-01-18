@extends('layouts.website')
@section('title', 'Chand Jewellers - Checkout')
@section('head')
    <style>
        input{
            color: black;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Checkout</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Checkout Area -->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        @if (!Auth::check())
                            <h3>Regular customer? <span id="showlogin"><a href="{{ route('login') }}">Click here to
                                        login</a></span></h3>
                        @endif
                        {{-- <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="javascript:void(0)">
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row">
                                        <input value="Login" type="submit">
                                        <label>
                                            <input type="checkbox">
                                            Remember me
                                        </label>
                                    </p>
                                    <p class="lost-password"><a href="javascript:void(0)">Lost your password?</a></p>
                                </form>
                            </div>
                        </div> --}}
                        {{-- <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="javascript:void(0)">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <form action="{{ route('website.order.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide" name="country" required>
                                            <option data-display="Pakistan" value="Pakistan" selected>Pakistan</option>
                                            {{-- <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">French</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option> --}}
                                        </select>
                                        @error('country')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input name="first_name" id="first_name" type="text" placeholder="John"
                                            value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input name="last_name" id="last_name" type="text" placeholder="Doe"
                                            value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Cell No 1<span class="required">*</span></label>
                                        <input type="text" name="phone1" id="phone1"
                                            value="{{ old('phone1') }}" required>
                                        @error('phone1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Cell No 2 (optional)</label>
                                        <input type="text" name="phone2" id="phone2"
                                            value="{{ old('phone2') }}">
                                        @error('phone2')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name (optional)</label>
                                        <input placeholder="" name="company" id="company" type="text"
                                            value="{{ old('company') }}">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>City <span class="required">*</span></label>
                                        <input type="text" name="city" id="city" placeholder="Gujrat"
                                            value="{{ old('city') }}" required>
                                        @error('city')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State<span class="required">*</span></label>
                                        <input type="text" name="state" id="state" placeholder="Punjab"
                                            value="{{ old('state') }}" required>
                                        @error('state')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" name="zipcode" id="zipcode" placeholder="50700"
                                            value="{{ old('zipcode') }}" required>
                                        @error('zipcode')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="example@example.com" type="email" name="email"
                                            id="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Complete Address<span class="required">*</span></label>
                                        <input name="address1" id="address1" type="text" value="{{ old('address1') }}" required>
                                        @error('address1')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Address 2 (optional)</label>
                                        <input name="address2" id="address2" type="text" value="{{ old('address2') }}">
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox" name="create_account" value="1">
                                        <label>Create an account?</label>
                                    </div>
                                    <div id="cbox-info" class="checkout-form-list create-account">
                                        <p>Create an account by entering the information below. If you are a regular
                                            customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input placeholder="password" type="password" name="password" id="password">
                                        @error('password')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="different-address">
                                {{-- <div class="ship-different-title">
                                <h3>
                                    <label>Ship to a different address?</label>
                                    <input id="ship-box" type="checkbox">
                                </h3>
                            </div> --}}
                                {{-- <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="myniceselect country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="nice-select wide">
                                            <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div> --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea name="order_note" id="checkout-mess" cols="30" rows="10"
                                            placeholder="Notes about your order, e.g. special notes for delivery." value="{{ old('order_note') }}"></textarea>
                                        @error('order_note')
                                            <font color="red">{{ $message }}</font>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name" style="text-align: left;font-weight:bold;">Product</th>
                                            <th class="cart-product-total" style="text-align: left;font-weight:bold;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::getContent() as $cartItems)
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $cartItems->name }}<strong
                                                        class="product-quantity">
                                                        × {{ $cartItems->quantity }}</strong></td>
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ SettingsHelper::info()->currency . number_format($cartItems->price * $cartItems->quantity) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr class="cart_item">
                                        <td class="cart-product-name"> Vestibulum suscipit<strong
                                                class="product-quantity">
                                                × 1</strong></td>
                                        <td class="cart-product-total"><span class="amount">£165.00</span></td>
                                    </tr> --}}
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format(Cart::getSubTotal()) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Shipping Charges</th>
                                            <td><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format(SettingsHelper::info()->shipping) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span
                                                        class="amount">{{ SettingsHelper::info()->currency . number_format(Cart::getTotal() + SettingsHelper::info()->shipping) }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion">
                                        {{-- <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment
                                                    reference. Your order won’t be shipped until the funds have cleared in
                                                    our account.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                        <div class="card">
                                            <div class="card-header" id="#payment-2">
                                                <h5 class="panel-title">
                                                    <a href="javascript:void(0)" class="collapsed"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Cash on Delivery
                                                    </a>
                                                    <p class="text-black"><b>Note:</b> {{ SettingsHelper::info()->currency }} {{ number_format(SettingsHelper::info()->advance_charges) }} Required in advance for order
                                                        confirmation</p>
                                                </h5>
                                            </div>
                                            {{-- <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Note: Rs 500 Require in advance for order confirmation</p>
                                            </div>
                                        </div> --}}
                                        </div>
                                        {{-- <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order
                                                    ID as the payment
                                                    reference. Your order won’t be shipped until the funds have cleared in
                                                    our account.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                    <div class="order-button-payment">
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Hiraola's Checkout Area End Here -->
@endsection
