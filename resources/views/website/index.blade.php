@extends('layouts.website')
@section('title', 'Chand Jewellers - Home')
@section('head')
    <style>
        .header-bottom_area .main-menu_area {
            justify-content: center !important
        }
    </style>
@endsection
@section('content')
    <div class="hiraola-slider_area-2 hiraola-slider_area-3 color-white">
        <div class="main-slider">
            <!-- Begin Single Slide Area -->
            <div class="single-slide animation-style-01 bg-6">
                <div class="container">
                    <div class="slider-content slider-content-2">
                        <h5><span>Black Friday</span> This Week</h5>
                        <h2>Work Desk</h2>
                        <h3>Surface Studio 2022</h3>
                        <h4>Starting at <span>£1599.00</span></h4>
                        <div class="hiraola-btn-ps_center slide-btn">
                            <a class="hiraola-btn" href="#">Shopping Now</a>
                        </div>
                    </div>
                    <div class="slider-progress"></div>
                </div>
            </div>
            <!-- Single Slide Area End Here -->
            <!-- Begin Single Slide Area -->
            <div class="single-slide animation-style-02 bg-7">
                <div class="container">
                    <div class="slider-content">
                        <h5><span>-10% Off</span> This Week</h5>
                        <h2>Phantom4</h2>
                        <h3>Pro+ Obsidian</h3>
                        <h4>Starting at <span>£809.00</span></h4>
                        <div class="hiraola-btn-ps_center slide-btn">
                            <a class="hiraola-btn" href="#">Shopping Now</a>
                        </div>
                    </div>
                    <div class="slider-progress"></div>
                </div>
            </div>
            <!-- Single Slide Area End Here -->
        </div>
    </div>

    {{-- <div class="hiraola-banner_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{ URL::asset('website/assets/images/banner/3_1.jpg') }}"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{ URL::asset('website/assets/images/banner/3_2.jpg') }}"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover_effect">
                        <a href="shop-left-sidebar.html">
                            <img class="img-full" src="{{ URL::asset('website/assets/images/banner/3_3.jpg') }}"
                                alt="Hiraola's Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Begin Hiraola's Product Area -->
    <div class="hiraola-product_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>New Products</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="hiraola-product_slider" id="new-products">
                        @foreach ($newArrivalProducts as $product)
                            <!-- Begin Hiraola's Slide Item Area -->
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Area End Here -->

    <!-- Begin Hiraola's Product Tab Area Three -->
    <div class="hiraola-product_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>Trending Products</h4>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="hiraola-product_slider" id="trending-products">
                        @foreach ($randomProducts as $product)
                            <!-- Begin Hiraola's Slide Item Area -->
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Tab Area Three End Here -->
    <!-- Begin Hiraola's Product Tab Area Three -->
    <div class="hiraola-product_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hiraola-section_title">
                        <h4>Categories</h4>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                    <div class="hiraola-blog-sidebar-wrapper">
                        <div class="hiraola-blog-sidebar">
                            <div class="row">
                                @foreach ($subcategoriesWithTotalProducts as $subCategory)
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <a href="{{ URL::to('/products?subcategory='.$subCategory->slug) }}">
                                        <div class="hiraola-recent-post">
                                            <div class="hiraola-recent-post-thumb">
                                                <a href="{{ URL::to('/products?subcategory='.$subCategory->slug) }}">
                                                    <img class="img-full" src="{{ URL::asset($subCategory->image) }}" style="height: 72px!important;" alt="SubCategory">
                                                </a>
                                            </div>
                                            <div class="hiraola-recent-post-des">
                                                <span style="margin-top:10px"><a href="{{ URL::to('/products?subcategory='.$subCategory->slug) }}" style="font-size: 17px;text-align: left;">{{ $subCategory->name }}</a></span>
                                                <span class="hiraola-post-date" style="text-align: left;">{{ $subCategory->totalProducts }} Products</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Product Tab Area Three End Here -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            setInterval(() => {
                $('#trending-products .slick-next').click();
            }, 2000);
            setInterval(() => {
                $('#new-products .slick-next').click();
            }, 3000);
            setInterval(() => {
                $('#category-products .slick-next').click();
            }, 4000);
        });
    </script>
@endsection
