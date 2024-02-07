@extends('layouts.website')
@section('title', 'Chand Jewellers - Track Order')
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
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li class="current"><a href="#">Track Order</a></li>
            </ol>
        </nav>
    </div>

        <!-- Begin Hiraola's Track Order Area -->
        <div class="about-us-area mb-5" style="padding-top: 30px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="overview-content">
                            <h2>Track <span>Order</span></h2>
                            <form action="{{ route('website.track-order') }}" method="get">
                                @csrf
                                <input type="text" name="orderno" id="orderno" class="form-control" placeholder="Enter Order No" value="{{ $orderNo }}">
                                <button type="submit" class="hiraola-compare_btn mt-2">Track Order</button>
                            </form>
                        </div>
                    </div>
                </div>
                @isset($order)
                <div class="row mt-4">
                    <div class="col-lg-6 offset-lg-3 col-12">
                        <div class="your-order">
                            <h3>Your order <span style="float: right;">#{{ $order->order_no }}</span></h3>
                            <h5>Status <span style="float: right;" class="text-capitalize text-primary">{{ $order->status }}</span></h5>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name" style="text-align: left;font-weight:bold;">Product</th>
                                            <th class="cart-product-total" style="text-align: left;font-weight:bold;">Total</th>
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
                                    @if ($status=='dispatched')
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)">
                                                    Tracking No: <span style="float: right;color:black;">{{ $trackingNo }}</span>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="panel-title">
                                                <a href="javascript:void(0)">
                                                    Tracking Company: <span style="float: right;color:black;">{{ $trackingCompany }}</span>
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    @endif
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
                                                    <p class="text-black"><b>Note:</b> {{ SettingsHelper::info()->cod }}</p>
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
                                        <input value="Go To Home" type="button" onclick="location.href='{{ route('website.home') }}'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endisset
            </div>
        </div>
        <!-- Hiraola's Track Order Area End Here -->
@endsection
