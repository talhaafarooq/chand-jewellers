@extends('layouts.website')
@section('title', 'Chand Jewellers - ' . $product->name)
@section('head')
    <style>
        .tag {
            background-color: #333333;
            color: white;
            border-radius: 5px;
            padding: 2px;
            padding-left: 7px !important;
            padding-right: 7px !important;
            margin-left: 5px;
        }

        .hiraola-blog-details .hiraola-blog-comment-wrapper {
            padding-bottom: 0px !important;
        }

        .comment-section::-webkit-scrollbar {
            width: 5px;
        }

        .comment-section::-webkit-scrollbar-thumb {
            background-color: #888;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="text-capitalize">{{ $product->name }}</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Single Product</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Single Product Area -->
    <div class="sp-area">
        <div class="container">
            <div class="sp-nav">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="sp-img_area">
                            <div class="zoompro-border">
                                <img class="zoompro" src="{{ URL::asset('storage/' . $product->productImages[0]->image) }}"
                                    data-zoom-image="{{ URL::asset('storage/' . $product->productImages[0]->image) }}"
                                    alt="{{ $product->name }} Image" />
                            </div>
                            <div id="gallery" class="sp-img_slider">
                                @foreach ($product->productImages as $productImage)
                                    @if ($loop->first)
                                        <a class="active" data-image="{{ URL::asset('storage/' . $productImage->image) }}"
                                            data-zoom-image="{{ URL::asset('storage/' . $productImage->image) }}"
                                            style="width: 76px;height:76px!important;">
                                            <img src="{{ URL::asset('storage/' . $productImage->image) }}"
                                                alt="{{ $product->name }} Image">
                                        </a>
                                    @else
                                        <a data-image="{{ URL::asset('storage/' . $productImage->image) }}"
                                            data-zoom-image="{{ URL::asset('storage/' . $productImage->image) }}"
                                            style="width: 76px;height:76px!important;">
                                            <img src="{{ URL::asset('storage/' . $productImage->image) }}"
                                                alt="{{ $product->name }} Image">
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="javascript:void(0);">{{ $product->name }}</a></h5>
                                {{-- <h5><a href="javascript:void(0);" class="new_price">{{ SettingsHelper::info()->currency.number_format($product->new_price,2) }}</a></h5> --}}
                                <div class="price-box">
                                    <span
                                        class="new-price">{{ SettingsHelper::info()->currency . number_format($product->new_price, 2) }}</span>
                                    @if (isset($product->old_price) && $product->old_price != 0)
                                        <span
                                            class="old-price">{{ SettingsHelper::info()->currency . number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                            <span class="reference">{!! $product->description !!}</span>
                            <div class="rating-box">
                                <ul>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li><i class="fa fa-star-of-david"></i></li>
                                    <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                </ul>
                            </div>
                            <div class="sp-essential_stuff">
                                <ul>
                                    {{-- <li>EX Tax: <a href="javascript:void(0)"><span>£453.35</span></a></li> --}}
                                    <li>Category <a href="javascript:void(0);">{{ $product->category->name }} /
                                            <small>{{ $product->subCategory->name }}</small></a></li>
                                    <li>Product Code: <a href="javascript:void(0);">{{ $product->code }}</a></li>
                                    <li>Reward Points: <a href="javascript:void(0);">600</a></li>
                                    <li>Availability: <a href="javascript:void(0);">In Stock</a></li>
                                </ul>
                            </div>
                            {{-- <div class="product-size_box">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select">
                                        <option value="1">S</option>
                                        <option value="2">M</option>
                                        <option value="3">L</option>
                                        <option value="4">XL</option>
                                    </select>
                                </div> --}}
                            <form action="{{ route('website.add-to-cart') }}" method="post" id="cartForm">
                                @csrf
                                <input type="hidden" name="slug" id="slug" value="{{ $product->slug }}" required>
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="qty" id="qty" value="1"
                                            type="text" min="1" oninput="this.value = Math.abs(this.value)"
                                            required>
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                            </form>
                            <div class="qty-btn_area">
                                <ul>
                                    <li>
                                        <a class="qty-cart_btn" href="javascript:void(0)"
                                            onclick="document.getElementById('cartForm').submit();">Add To Cart</a>
                                    </li>
                                    <li>
                                        <a class="qty-cart_btn" href="{{ URL::to('buynow/' . $product->slug) }}">Buy Now</a>
                                    </li>
                                    <li><a class="qty-wishlist_btn"
                                            href="{{ route('website.add-to-wishlist', $product->id) }}"
                                            data-bs-toggle="tooltip" title="Add To Wishlist"><i
                                                class="ion-android-favorite-outline"></i></a></li>
                                    {{-- <li><a class="qty-compare_btn" href="compare.html" data-bs-toggle="tooltip"
                                            title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li> --}}
                                </ul>
                            </div>
                            <div class="hiraola-tag-line">
                                <h6>Tags:</h6>
                                @if ($product->count())
                                    @foreach ($product->tags as $tag)
                                        <a href="javascript:void(0);" class="tag">{{ $tag->name }}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Single Product Area End Here -->

    <!-- Begin Hiraola's Single Product Tab Area -->
    <div class="hiraola-product-tab_area-2 sp-product-tab_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav ">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-bs-toggle="tab" href="#description"><span>Description</span></a>
                                </li>
                                {{-- <li><a data-bs-toggle="tab" href="#specification"><span>Specification</span></a></li> --}}
                                <li><a data-bs-toggle="tab" href="#reviews"><span>Reviews
                                            ({{ $product->feedbacks->count() }})</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content hiraola-tab_content">
                            <div id="description" class="tab-pane active show" role="tabpanel">
                                <div class="product-description">
                                    @isset($product->details)
                                        {!! $product->details !!}
                                    @else
                                        <h5>No Product Details...</h5>
                                    @endisset

                                </div>
                            </div>
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    <div class="hiraola-blog-details">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 order-lg-1 order-1">
                                                    <div class="blog-item">
                                                        <div class="hiraola-blog-comment-wrapper">
                                                            <h3>leave a reply</h3>
                                                            <p>Your email address will not be published. Required fields are
                                                                marked *</p>
                                                            <form action="{{ route('website.submit-feedback') }}"
                                                                method="POST" id="feedback-form">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}" required />
                                                                <div class="comment-post-box">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                                            <label>Name</label>
                                                                            <input type="text" name="name"
                                                                                class="coment-field" placeholder="Name"
                                                                                required>
                                                                            @error('name')
                                                                                <font color="red">{{ $message }}
                                                                                </font>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                                            <label>Email</label>
                                                                            <input type="email" name="email"
                                                                                class="coment-field" placeholder="Email"
                                                                                required>
                                                                            @error('email')
                                                                                <font color="red">{{ $message }}
                                                                                </font>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                                            <label>Website</label>
                                                                            <input type="text" name="website"
                                                                                class="coment-field"
                                                                                placeholder="Website (optional)">
                                                                            @error('website')
                                                                                <font color="red">{{ $message }}
                                                                                </font>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                                                            <label>Comment</label>
                                                                            <textarea name="message" placeholder="Write a comment" required></textarea>
                                                                            @error('message')
                                                                                <font color="red">{{ $message }}
                                                                                </font>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                                            <span>
                                                                                <select class="star-rating" name="rating"
                                                                                    required>
                                                                                    <option value="1" selected>1
                                                                                    </option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="comment-btn_wrap f-left">
                                                                                <div class="hiraola-post-btn_area">
                                                                                    {{-- <a class="hiraola-post_btn" href="javascript:void(0)" onclick="document.getElementById('feedback-form').submit()">Post comment</a> --}}
                                                                                    <input class="hiraola-post_btn"
                                                                                        type="submit" name="submit"
                                                                                        value="Post comment">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="hiraola-comment-section">
                                                            <h3>{{ number_format($product->feedbacks->count()) }} comment
                                                            </h3>
                                                            @if ($product->feedbacks->count() > 0)
                                                                <ul class="comment-section"
                                                                    @if ($product->feedbacks->count() > 0) style="padding:10px;height:400px;overflow-y:scroll;" @endif>
                                                                    @foreach ($product->feedbacks as $feedback)
                                                                        <li>
                                                                            <div class="author-avatar">
                                                                                <img src="{{ URL::asset('website/assets/images/blog/user.png') }}"
                                                                                    alt="User">
                                                                            </div>
                                                                            <div class="comment-body">
                                                                                {{-- <span class="reply-btn"><a href="javascript:void(0)">reply</a></span> --}}
                                                                                <h5 class="comment-author">
                                                                                    {{ $feedback->name }}</h5>
                                                                                <div class="comment-post-date">
                                                                                    {{ $feedback->created_at->format('d F, Y \a\t h:ia') }}
                                                                                </div>
                                                                                <p>{{ $feedback->message }}</p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <h5 class="text-center">No Comment...</h5>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Single Product Tab Area End Here -->

    <!-- Begin Hiraola's Product Area Two -->
    {{-- <div class="hiraola-product_area hiraola-product_area-2 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="hiraola-section_title">
                        <h4>Special Offer</h4>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">

                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-1.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-2.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Pendant, Made of White
                                                Pl...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£120.80</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-3.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-4.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Swirl 1 Medium Pendant
                                                La...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£120.80</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-5.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-6.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker-2">Sale</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Work Lamp Silver Proin
                                                he...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£135.20</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-7.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-8.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Work Lamp Silver Proin
                                                he...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£135.20</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-9.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-1.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker-2">Sale</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Vitra Sunburst Clock
                                                pret...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£1199.60</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                                <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->
                        <!-- Begin Hiraola's Slide Item Area -->
                        <div class="slide-item">
                            <div class="single_product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/medium-size/1-2.jpg"
                                            alt="Hiraola's Product Image">
                                        <img class="secondary-img" src="assets/images/product/medium-size/1-9.jpg"
                                            alt="Hiraola's Product Image">
                                    </a>
                                    <span class="sticker">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                    data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                                            </li>
                                            <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                                                        class="ion-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="hiraola-product_content">
                                    <div class="product-desc_info">
                                        <h6><a class="product-name" href="single-product.html">Light Inverted Pendant
                                                Qu...</a></h6>
                                        <div class="price-box">
                                            <span class="new-price">£110.00</span>
                                            <span class="old-price">£110.00</span>
                                        </div>
                                        <div class="additional-add_action">
                                            <ul>
                                                <li><a class="hiraola-add_compare" href="wishlist.html"
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hiraola's Slide Item Area End Here -->

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Hiraola's Product Area Two End Here -->

    <!-- Begin Hiraola's Product Area Two -->
    <div class="hiraola-product_area hiraola-product_area-2 section-space_add">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="hiraola-section_title">
                        <h4>Related Products</h4>
                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider-3">
                        @foreach ($relatedProducts as $relatedProduct)
                            <div class="slide-item">
                                <div class="single_product">
                                    <div class="product-img">
                                        <a href="{{ route('website.product.details', $relatedProduct->slug) }}">
                                            <img class="primary-img"
                                                src="{{ URL::asset('storage/' . $relatedProduct->front_img) }}"
                                                alt="Hiraola's Product Image">
                                            <img class="secondary-img"
                                                src="{{ URL::asset('storage/' . $relatedProduct->back_img) }}"
                                                alt="Hiraola's Product Image">
                                        </a>
                                        <span class="sticker-2">Sale</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip"
                                                        data-placement="top" title="Add To Cart"><i
                                                            class="ion-bag"></i></a>
                                                </li>
                                                {{-- <li><a class="hiraola-add_compare" href="compare.html"
                                                    data-bs-toggle="tooltip" data-placement="top"
                                                    title="Compare This Product"><i
                                                        class="ion-ios-shuffle-strong"></i></a></li> --}}
                                                <li class="quick-view-btn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                        data-bs-toggle="tooltip" data-placement="top"
                                                        title="Quick View"><i class="ion-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hiraola-product_content">
                                        <div class="product-desc_info">
                                            <h6><a class="product-name"
                                                    href="{{ route('website.product.details', $relatedProduct->slug) }}">{{ implode(' ', str_split($product->name, 23)) }}...</a>
                                            </h6>
                                            <div class="price-box">
                                                <span
                                                    class="new-price">{{ SettingsHelper::info()->currency . $relatedProduct->new_price }}</span>
                                                @if (isset($relatedProduct->old_price) && $relatedProduct->old_price != 0)
                                                    <span
                                                        class="old-price">{{ SettingsHelper::info()->currency . $relatedProduct->old_price }}</span>
                                                @endif
                                            </div>
                                            <div class="additional-add_action">
                                                <ul>
                                                    <li><a class="hiraola-add_compare"
                                                            href="{{ route('website.add-to-wishlist', $relatedProduct->id) }}"
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
                                                    <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Area Two End Here -->
    </div>
@endsection
