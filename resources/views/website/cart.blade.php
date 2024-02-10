@extends('layouts.website')
@section('title', 'Chand Jewellers - Cart')
@section('head')
    <style>
        .cart-total-section {
            margin-top: -60px !important;
        }
    </style>
@endsection
@section('content')

    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li class="current"><a href="#">Cart</a></li>
            </ol>
        </nav>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!-- Begin Hiraola's Cart Area -->
    <div class="hiraola-cart-area" style="padding-top: 30px!important;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('website.update-cart') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="hiraola-product-remove">remove</th>
                                        <th class="hiraola-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="hiraola-product-price">Unit Price</th>
                                        <th class="hiraola-product-quantity">Quantity</th>
                                        <th class="hiraola-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::getContent() as $product)
                                        <tr>
                                            <td class="hiraola-product-remove"><a
                                                    href="{{ route('website.remove-cart', $product->attributes['slug']) }}"><i
                                                        class="fa fa-trash" title="Remove"></i></a>
                                                <input type="hidden" name="slugs[]"
                                                    value="{{ $product->attributes['slug'] }}">
                                            </td>
                                            <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img
                                                        src="{{ URL::asset($product->attributes['image']) }}"
                                                        width="100px" alt="{{ $product->name }} Thumbnail"></a></td>
                                            <td class="hiraola-product-name"><a
                                                    href="javascript:void(0)">{{ $product->name }}</a></td>
                                            <td class="hiraola-product-price"><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format($product->price) }}</span>
                                            </td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" name="qty[]" id="qty"
                                                        min="1" value="{{ $product->quantity }}" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format($product->price * $product->quantity) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    {{-- <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div> --}}
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row cart-total-section">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal
                                            <span>{{ SettingsHelper::info()->currency . number_format(Cart::getSubTotal()) }}</span>
                                        </li>
                                        <li>Shipping Charges
                                            <span>{{ number_format(SettingsHelper::info()->shipping) }}</span></li>
                                        <li>Total
                                            <span>{{ SettingsHelper::info()->currency . number_format(Cart::getTotal() + SettingsHelper::info()->shipping) }}</span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('website.checkout') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Cart Area End Here -->
@endsection
