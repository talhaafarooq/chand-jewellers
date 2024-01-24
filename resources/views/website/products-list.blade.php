@foreach ($products as $product)
<div class="col-lg-4">
    <div class="slide-item">
        <div class="single_product">
            <div class="product-img">
                <a href="single-product.html">
                    <img class="primary-img" src="{{ URL::asset('website') }}/assets/images/product/medium-size/1-7.jpg" alt="Hiraola's Product Image">
                    <img class="secondary-img" src="{{ URL::asset('website') }}/assets/images/product/medium-size/1-6.jpg" alt="Hiraola's Product Image">
                </a>
                <span class="sticker">New</span>
                <div class="add-actions">
                    <ul>
                        <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="ion-bag"></i></a>
                        </li>
                        <li><a class="hiraola-add_compare" href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                            class="ion-ios-shuffle-strong"></i></a></li>
                        <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                            class="ion-eye"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="hiraola-product_content">
                <div class="product-desc_info">
                    <h6><a class="product-name" href="single-product.html">Suspensions Aplomb Large
                            ...</a></h6>
                    <div class="price-box">
                        <span class="new-price">£602.00</span>
                    </div>
                    <div class="additional-add_action">
                        <ul>
                            <li><a class="hiraola-add_compare" href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
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
    <div class="list-slide_item">
        <div class="single_product">
            <div class="product-img">
                <a href="single-product.html">
                    <img class="primary-img" src="{{ URL::asset('website') }}/assets/images/product/medium-size/1-5.jpg" alt="Hiraola's Product Image">
                    <img class="secondary-img" src="{{ URL::asset('website') }}/assets/images/product/medium-size/1-6.jpg" alt="Hiraola's Product Image">
                </a>
            </div>
            <div class="hiraola-product_content">
                <div class="product-desc_info">
                    <h6><a class="product-name" href="single-product.html">Flash Furniture
                            Alonza Se...</a></h6>
                    <div class="rating-box">
                        <ul>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li><i class="fa fa-star-of-david"></i></li>
                            <li class="silver-color"><i class="fa fa-star-of-david"></i></li>
                        </ul>
                    </div>
                    <div class="price-box">
                        <span class="new-price">£90.36</span>
                    </div>
                    <div class="product-short_desc">
                        <p>The effects of gold are subtle, but definitely apparent. ... It was
                            considered that gold possessed an energy that brought warm, soothing
                            vibrations to the body to aid healing, for when the body relaxes and the
                            blood vessels in the cells aren't as constricted, blood can move through
                            the tissue spaces more easily.</p>
                    </div>
                </div>
                <div class="add-actions">
                    <ul>
                        <li><a class="hiraola-add_cart" href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Cart">Add To Cart</a></li>
                        <li><a class="hiraola-add_compare" href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Compare This Product"><i
                            class="ion-ios-shuffle-strong"></i></a></li>
                        <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i
                            class="ion-eye"></i></a></li>
                        <li><a class="hiraola-add_compare" href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                            class="ion-android-favorite-outline"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

{!! $products->render('pagination::custom') !!}
