@extends('layouts.website')
@section('title', 'Chand Jewellers - Products')
@section('content')
    <div class="hiraola-product_area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 style="text-align: left;">{{ $subcategory->name }}</h3>
                    <div class="hiraola-product_slider" id="new-products">
                        @forelse ($products as $product)
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="{{ route('website.product.details', $product->slug) }}">
                                        <img class="primary-img"
                                            src="{{ URL::asset('storage/' . $product->front_img) }}"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img"
                                            src="{{ URL::asset('storage/' . $product->back_img) }}"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    {{-- <span class="sticker">New</span> --}}
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart"
                                                    href="{{ route('website.add-to-cart', ['slug' => $product->slug, 'qty' => 1]) }}"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i
                                                        class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare"
                                                    href="{{ route('website.product.details', $product->slug) }}"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="View Product"><i class="ion-eye"></i></a>
                                            </li>
                                            {{-- <li><a class="hiraola-add_compare" href="compare.html" data-bs-toggle="tooltip"
                                            data-placement="top" title="Compare This Product"><i
                                                class="ion-ios-shuffle-strong"></i></a></li> --}}
                                            {{-- <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                class="ion-eye"></i></a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content mt-3">
                                    <div class="product-desc_info">
                                        <h6>
                                            {{-- <a class="product-name" href="{{ route('website.product.details', $product->slug) }}">{{ implode(' ', str_split($product->name, 23)) }}...</a> --}}
                                            <a class="product-name"
                                                href="{{ route('website.product.details', $product->slug) }}">{{ $product->name }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span
                                                class="new-price">{{ SettingsHelper::info()->currency . $product->new_price }}</span>
                                            @if (isset($product->old_price) && $product->old_price != 0)
                                                <span
                                                    class="old-price">{{ SettingsHelper::info()->currency . $product->old_price }}</span>
                                            @endif
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                {{-- <li><a class="hiraola-add_cart"
                                            href="{{ route('website.add-to-cart', ['slug' => $product->slug, 'qty' => 1]) }}"
                                            data-bs-toggle="tooltip" data-placement="top" title="Add To Cart">Add To
                                            Cart</a></li> --}}
                                                <li><a class="hiraola-add_compare"
                                                        href="{{ route('website.add-to-wishlist', $product->slug) }}"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="Add To Wishlist"><i
                                                            class="ion-android-favorite-outline"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                <li><i class="fa fa-star-of-david"></i></li>
                                                {{-- <li class="silver-color"><i class="fa fa-star-of-david"></i></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <h3 style="text-align: center;">No Products...</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
