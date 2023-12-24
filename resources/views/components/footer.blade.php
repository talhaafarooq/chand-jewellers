@php
use App\Models\Settings;
$settings = Settings::first();
@endphp
 <!-- Begin Hiraola's Footer Area -->
 <div class="hiraola-footer_area">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widgets_info">

                        <div class="footer-widgets_logo">
                            <a href="#">
                                <img src="{{ URL::asset('website') }}/assets/images/footer/logo/1.png" alt="Hiraola's Footer Logo">
                            </a>
                        </div>

                        <div class="widget-short_desc">
                            <p>{{ $settings->about_us }}</p>
                        </div>
                        <div class="hiraola-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="{{ $settings->facebook }}" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="{{ $settings->twitter }}" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="mailto: {{ $settings->email }}" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="{{ $settings->instagram }}" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-widgets_area">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-widgets_title">
                                    <h6>Product</h6>
                                </div>
                                <div class="footer-widgets">
                                    <ul>
                                        <li><a href="#">Prices drop</a></li>
                                        <li><a href="#">New products</a></li>
                                        <li><a href="#">Best sales</a></li>
                                        <li><a href="#">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="footer-widgets_info">
                                    <div class="footer-widgets_title">
                                        <h6>About Us</h6>
                                    </div>
                                    <div class="widgets-essential_stuff">
                                        <ul>
                                            <li class="hiraola-address"><i
                                            class="ion-ios-location"></i><span>Address 1 :</span> {{ $settings->address1 }}</li>
                                            <li class="hiraola-address"><i
                                            class="ion-ios-location"></i><span>Address 2 :</span> {{ $settings->address2 }}</li>
                                            <li class="hiraola-phone"><i class="ion-ios-telephone"></i><span>Call
                                            Us:</span> <a href="tel:{{ $settings->phone1 }}">{{ $settings->phone1 }}</a>
                                            </li>
                                            <li class="hiraola-email"><i
                                            class="ion-android-mail"></i><span>Email:</span> <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="instagram-container footer-widgets_area">
                                    <div class="footer-widgets_title">
                                        <h6>Sign Up For Newslatter</h6>
                                    </div>
                                    <div class="widget-short_desc">
                                        <p>Subscribe to our newsletters now and stay up-to-date with new collections</p>
                                    </div>
                                    <div class="newsletter-form_wrap">
                                        <form class="subscribe-form" action="{{ route('website.subscribe') }}" method="POST">
                                            @csrf
                                            <input class="newsletter-input" id="mc-email" type="email" autocomplete="off" name="email" value="Enter Your Email" onblur="if(this.value==''){this.value='Enter Your Email'}" onfocus="if(this.value=='Enter Your Email'){this.value=''}">
                                            <button type="submit" class="newsletter-btn" id="mc-submit">
                                                <i class="ion-android-mail"></i>
                                            </button>
                                        </form>
                                        <!-- Mailchimp Alerts -->
                                        <div class="mailchimp-alerts mt-3">
                                            <div class="mailchimp-submitting"></div>
                                            <div class="mailchimp-success"></div>
                                            <div class="mailchimp-error"></div>
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
    <div class="footer-bottom_area">
        <div class="container">
            <div class="footer-bottom_nav">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">Online Shopping</a></li>
                                <li><a href="#">Promotions</a></li>
                                <li><a href="#">My Orders</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Most Populars</a></li>
                                <li><a href="#">New Arrivals</a></li>
                                <li><a href="#">Special Products</a></li>
                                <li><a href="#">Manufacturers</a></li>
                                <li><a href="#">Our Stores</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Payments</a></li>
                                <li><a href="#">Warantee</a></li>
                                <li><a href="#">Refunds</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="#">Discount</a></li>
                                <li><a href="#">Refunds</a></li>
                                <li><a href="#">Policy Shipping</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="payment">
                            <a href="#">
                                <img src="{{ URL::asset('website') }}/assets/images/footer/payment/1.png" alt="Hiraola's Payment Method">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="copyright">
                            <span>Copyright &copy; {{ date('Y') }} <a href="{{ route('website.home') }}">{{ $settings->name }}.</a> All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Footer Area End Here -->
<!-- Begin Hiraola's Modal Area -->
<div class="modal fade modal-wrapper" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area sp-area row">
                    <div class="col-lg-5 col-md-5">
                        <div class="sp-img_area">
                            <div class="sp-img_slider-2 slick-img-slider hiraola-slick-slider arrow-type-two" data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                        }'>
                                <div class="single-slide red">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/large-size/1.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide orange">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/large-size/2.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide brown">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/large-size/3.jpg" alt="Hiraola's Product Image">
                                </div>
                                <div class="single-slide umber">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/large-size/4.jpg" alt="Hiraola's Product Image">
                                </div>
                            </div>
                            <div class="sp-img_slider-nav slick-slider-nav hiraola-slick-slider arrow-type-two" data-slick-options='{
                           "slidesToShow": 4,
                            "asNavFor": ".sp-img_slider-2",
                           "focusOnSelect": true
                          }' data-slick-responsive='[
                                {"breakpoint":1201, "settings": {"slidesToShow": 2}},
                                {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                {"breakpoint":577, "settings": {"slidesToShow": 3}},
                                {"breakpoint":481, "settings": {"slidesToShow": 2}},
                                {"breakpoint":321, "settings": {"slidesToShow": 2}}
                            ]'>
                                <div class="single-slide red">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/small-size/1.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide orange">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/small-size/2.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide brown">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/small-size/3.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                                <div class="single-slide umber">
                                    <img src="{{ URL::asset('website') }}/assets/images/single-product/small-size/4.jpg" alt="Hiraola's Product Thumnail">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="sp-content">
                            <div class="sp-heading">
                                <h5><a href="#">Light Inverted Pendant Quis Justo Condimentum</a></h5>
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
                            <div class="price-box">
                                <span class="new-price">£82.84</span>
                                <span class="old-price">£93.68</span>
                            </div>
                            <div class="essential_stuff">
                                <ul>
                                    <li>EX Tax:<span>£453.35</span></li>
                                    <li>Price in reward points:<span>400</span></li>
                                </ul>
                            </div>
                            <div class="list-item">
                                <ul>
                                    <li>10 or more £81.03</li>
                                    <li>20 or more £71.09</li>
                                    <li>30 or more £61.15</li>
                                </ul>
                            </div>
                            <div class="list-item last-child">
                                <ul>
                                    <li>Brand<a href="javascript:void(0)">Buxton</a></li>
                                    <li>Product Code: Product 15</li>
                                    <li>Reward Points: 100</li>
                                    <li>Availability: In Stock</li>
                                </ul>
                            </div>
                            <div class="color-list_area">
                                <div class="color-list_heading">
                                    <h4>Available Options</h4>
                                </div>
                                <span class="sub-title">Color</span>
                                <div class="color-list">
                                    <a href="javascript:void(0)" class="single-color active" data-swatch-color="red">
                                        <span class="bg-red_color"></span>
                                        <span class="color-text">Red (+£3.61)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="orange">
                                        <span class="burnt-orange_color"></span>
                                        <span class="color-text">Orange (+£2.71)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="brown">
                                        <span class="brown_color"></span>
                                        <span class="color-text">Brown (+£0.90)</span>
                                    </a>
                                    <a href="javascript:void(0)" class="single-color" data-swatch-color="umber">
                                        <span class="raw-umber_color"></span>
                                        <span class="color-text">Umber (+£1.81)</span>
                                    </a>
                                </div>
                            </div>
                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="hiraola-group_btn">
                                <ul>
                                    <li><a href="cart.html" class="add-to_cart">Cart To Cart</a></li>
                                    <li><a href="cart.html"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li><a href="cart.html"><i class="ion-ios-shuffle-strong"></i></a></li>
                                </ul>
                            </div>
                            <div class="hiraola-tag-line">
                                <h6>Tags:</h6>
                                <a href="javascript:void(0)">Ring</a>,
                                <a href="javascript:void(0)">Necklaces</a>,
                                <a href="javascript:void(0)">Braid</a>
                            </div>
                            <div class="hiraola-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hiraola's Modal Area End Here -->
