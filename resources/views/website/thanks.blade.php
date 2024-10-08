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
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li><a href="{{ route('website.cart') }}">Cart</a></li>
                <li><a href="{{ route('website.checkout') }}">Checkout</a></li>
                <li class="current"><a href="#" class="text-capitalize">Thanks</a></li>
            </ol>
        </nav>
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
                            <h3>Your order <span class="float-right">#{{ $order->order_no }}</span></h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name" style="text-align: left;font-weight:bold;">Product
                                            </th>
                                            <th class="cart-product-total" style="text-align: left;font-weight:bold;">Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $order)
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $order->product->name }}<strong
                                                        class="product-quantity">
                                                        × {{ $order->qty }}</strong></td>
                                                <td class="cart-product-total"><span
                                                        class="amount">{{ SettingsHelper::info()->currency . number_format($order->price * $order->qty) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format($subTotal) }}</span>
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
                                                        class="amount">{{ SettingsHelper::info()->currency . number_format($subTotal + SettingsHelper::info()->shipping) }}</span></strong>
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
                                                    <a href="javascript:void(0)" class="collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                        Please Confirm your order.
                                                    </a>
                                                    {{-- <p class="text-black"><b>Note:</b> {{ SettingsHelper::info()->currency }} {{ number_format(SettingsHelper::info()->advance_charges) }} Required in advance for order
                                                        confirmation</p> --}}
                                                    <p class="text-black"><b>Note:</b> {{ SettingsHelper::info()->cod }}
                                                    </p>
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
                                        <input value="Go To Home" type="button"
                                            onclick="location.href='{{ route('website.home') }}'">
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
