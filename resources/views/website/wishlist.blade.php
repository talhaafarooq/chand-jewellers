@extends('layouts.website')
@section('title', 'Chand Jewellers - Wishlist')
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="container">
        <nav>
            <ol class="cd-breadcrumb" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <li><a href="{{ route('website.home') }}">Home</a></li>
                <li class="current"><a href="#">Wishlist</a></li>
            </ol>
        </nav>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->
    <!--Begin Hiraola's Wishlist Area -->
    <div class="hiraola-wishlist_area" style="padding-top: 30px !important;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="hiraola-product_remove">remove</th>
                                        <th class="hiraola-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="hiraola-product-price">Unit Price</th>
                                        <th class="hiraola-product-stock-status">Stock Status</th>
                                        <th class="hiraola-cart_btn">add to cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($wishlistProducts as $product)
                                        <tr>
                                            <td class="hiraola-product_remove"><a
                                                    href="{{ route('website.remove-wishlist-item', $product->product_id) }}"><i
                                                        class="fa fa-trash" title="Remove"></i></a></td>
                                            <td class="hiraola-product-thumbnail"><a href="javascript:void(0)"><img
                                                        src="{{ URL::asset('storage/' . $product->product->front_img) }}"
                                                        width="100px" alt="{{ $product->name }} Thumbnail"></a>
                                            </td>
                                            <td class="hiraola-product-name"><a
                                                    href="javascript:void(0)">{{ $product->product->name }}</a></td>
                                            <td class="hiraola-product-price"><span
                                                    class="amount">{{ SettingsHelper::info()->currency . number_format($product->product->new_price, 2) }}</span>
                                            </td>
                                            <td class="hiraola-product-stock-status"><span class="in-stock">in stock</span>
                                            </td>
                                            <td class="hiraola-cart_btn"><a href="javascript:void(0)">add to cart</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-danger" align="center"><b>No Item in
                                                    wishlist...</b></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
