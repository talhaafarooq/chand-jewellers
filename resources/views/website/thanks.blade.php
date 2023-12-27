@extends('layouts.website')
@section('title', 'Chand Jewellers - Thanks')
@section('head')
    <style>
        .float-right {
            float: right;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Thanks</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Thanks</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Checkout Area -->
    <div class="checkout-area">
        <div class="container">
            <form action="{{ route('website.order.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <div class="your-order">
                            <h3>Your order <span class="float-right">#CJG{{ $order->id }}</span></h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Product</th>
                                            <th class="cart-product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::getContent() as $cartItems)
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $cartItems->name }}<strong
                                                        class="product-quantity">
                                                        × {{ $cartItems->quantity }}</strong></td>
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ $settings->currency . number_format($cartItems->price * $cartItems->quantity) }}</span>
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
                                                    class="amount">{{ $settings->currency . number_format(Cart::getSubTotal(), 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Shipping Charges</th>
                                            <td><span
                                                    class="amount">{{ $settings->currency . number_format($settings->shipping, 2) }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span
                                                        class="amount">{{ $settings->currency . number_format(Cart::getTotal() + $settings->shipping, 2) }}</span></strong>
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
                                                    <p class="text-black"><b>Note:</b> Rs 500 Require in advance for order
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
