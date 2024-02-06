@if (isset($products) && count($products))
    @foreach ($products as $product)
        <div class="col-lg-4">
            <!-- Begin Hiraola's Slide Item Area -->
            {{-- <div class="slide-item">
                <div class="single_product">
                    <div class="product-img">
                        <a href="{{ route('website.product.details', $product->slug) }}">
                            <img class="primary-img" src="{{ URL::asset('storage/' . $product->front_img) }}"
                                alt="Hiraola's Product Image">
                            <img class="secondary-img" src="{{ URL::asset('storage/' . $product->back_img) }}"
                                alt="Hiraola's Product Image">
                        </a>
                        <span class="sticker">New</span>
                        <div class="add-actions">
                            <ul>
                                <li><a class="hiraola-add_cart" href="{{ route('website.add-to-cart',['slug'=>$product->slug,'qty'=>1]) }}" data-bs-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                </li>
                                <li><a class="hiraola-add_compare"
                                    href="{{ route('website.add-to-wishlist', $product->slug) }}"
                                    data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                        class="ion-android-favorite-outline"></i></a>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name"
                                    href="{{ route('website.product.details', $product->slug) }}">{{ implode(' ', str_split($product->name, 23)) }}...</a>
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
                                    <li><a class="hiraola-add_compare"
                                            href="{{ route('website.add-to-wishlist', $product->slug) }}"
                                            data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
            <!-- Hiraola's Slide Item Area End Here -->
            <div class="list-slide_item">
                <div class="single_product">
                    <div class="product-img">
                        <a href="{{ route('website.product.details', $product->slug) }}">
                            <img class="primary-img" src="{{ URL::asset('storage/' . $product->front_img) }}"
                                alt="Hiraola's Product Image">
                            <img class="secondary-img" src="{{ URL::asset('storage/' . $product->back_img) }}"
                                alt="Hiraola's Product Image">
                        </a>
                    </div>
                    <div class="hiraola-product_content">
                        <div class="product-desc_info">
                            <h6><a class="product-name"
                                    href="{{ route('website.product.details', $product->slug) }}">{{ implode(' ', str_split($product->name, 23)) }}...</a>
                            </h6>
                            <div class="rating-box">
                                <ul>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                </ul>
                            </div>
                            <div class="price-box">
                                <span
                                    class="new-price">{{ SettingsHelper::info()->currency . $product->new_price }}</span>
                                @if (isset($product->old_price) && $product->old_price != 0)
                                    <span class="old-price">&nbsp;<del><small
                                                class="text-secondary">{{ SettingsHelper::info()->currency . $product->old_price }}</small></del></span>
                                @endif
                            </div>
                            <div class="product-short_desc">
                                {!! $product->highlights !!}
                            </div>
                        </div>
                        <div class="add-actions">
                            <ul>
                                <li>
                                    <a class="qty-cart_btn" data-bs-toggle="tooltip" data-placement="top"
                                        title="Add To Cart" href="{{ route('website.add-to-cart',['slug'=>$product->slug,'qty'=>1]) }}">Add To Cart</a>
                                </li>
                                <li>
                                    <a class="qty-cart_btn" data-bs-toggle="tooltip" data-placement="top"
                                        title="Buy Now" href="{{ URL::to('buynow/' . $product->slug) }}">Buy Now</a>
                                </li>
                                <li><a class="qty-wishlist_btn"
                                        href="{{ route('website.add-to-wishlist', $product->slug) }}"
                                        data-bs-toggle="tooltip" title="Add To Wishlist"><i
                                            class="ion-android-favorite-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {!! $products->render('pagination::custom') !!}
@else
    <div class="col-4 offset-4">
        <center class="mt-5">
            <h3>No Products...</h3>
        </center>
    </div>
@endif
