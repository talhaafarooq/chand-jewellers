@php
    $cartItems = Cart::getContent();
@endphp
<!-- Begin Hiraola's Newsletter Popup Area -->
{{-- <div class="popup_wrapper">
    <div class="test">
        <span class="popup_off"><i class="ion-android-close"></i></span>
        <div class="subscribe_area">
            <h2>Sign Up Newsletter</h2>
            <p>Subscribe to the our store mailing list to receive updates on new arrivals, special offers and other
                discount information.</p>
            <div class="subscribe-form-group">
                <form class="subscribe-form" action="#">
                    <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                    <button type="submit">subscribe</button>
                </form>
            </div>
            <div class="subscribe-bottom">
                <input type="checkbox" id="newsletter-permission">
                <label for="newsletter-permission">Don't show this popup again</label>
            </div>
        </div>
    </div>
</div> --}}
<!-- Hiraola's Newsletter Popup Area Here -->

<!-- Begin Hiraola's Header Main Area -->
<header class="header-main_area">
    <div class="header-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ht-left_area">
                        <div class="header-shipping_area">
                            <ul>
                                <li>
                                    <span>Telephone Enquiry:</span>
                                    <a href="tel:{{ SettingsHelper::info()->phone1 }}">{{ SettingsHelper::info()->phone1 }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="ht-right_area">
                        <div class="ht-menu">
                            <ul>
                                <li><a href="javascript:void(0)">Currency<i class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown ht-currency">
                                        <li><a href="javascript:void(0)">€ EUR</a></li>
                                        <li class="active"><a href="javascript:void(0)">£ Pound Sterling</a></li>
                                        <li><a href="javascript:void(0)">$ Us Dollar</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Language <i class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown">
                                        <li class="active"><a href="javascript:void(0)"><img src="{{ URL::asset('website') }}/assets/images/menu/icon/1.jpg" alt="JB's Language Icon">English</a></li>
                                        <li><a href="javascript:void(0)"><img src="{{ URL::asset('website') }}/assets/images/menu/icon/2.jpg" alt="JB's Language Icon">Français</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('website.my-account.index') }}">My Account<i class="fa fa-chevron-down"></i></a>
                                    <ul class="ht-dropdown ht-my_account">
                                        @if (Auth::check())
                                        <li><a href="{{ route('website.my-account.index') }}">My Account</a></li>
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        @else
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header-logo">
                        <a href="{{ route('website.home') }}">
                            <img src="{{ URL::asset('website') }}/assets/images/menu/logo/1.png" alt="Hiraola's Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hm-form_area">
                        <form action="#" class="hm-searchbox">
                            <select class="nice-select select-search-category">
                                <option value="0">All</option>
                                <option value="10">Laptops</option>
                                <option value="17">- - Prime Video</option>
                                <option value="20">- - - - All Videos</option>
                                <option value="21">- - - - Blouses</option>
                                <option value="22">- - - - Evening Dresses</option>
                                <option value="23">- - - - Summer Dresses</option>
                                <option value="24">- - - - T-shirts</option>
                                <option value="25">- - - - Rent or Buy</option>
                                <option value="26">- - - - Your Watchlist</option>
                                <option value="27">- - - - Watch Anywhere</option>
                                <option value="28">- - - - Getting Started</option>
                                <option value="18">- - - - Computers</option>
                                <option value="29">- - - - More to Explore</option>
                                <option value="30">- - - - TV &amp; Video</option>
                                <option value="31">- - - - Audio &amp; Theater</option>
                                <option value="32">- - - - Camera, Photo </option>
                                <option value="33">- - - - Cell Phones</option>
                                <option value="34">- - - - Headphones</option>
                                <option value="35">- - - - Video Games</option>
                                <option value="36">- - - - Wireless Speakers</option>
                                <option value="19">- - - - Electronics</option>
                                <option value="37">- - - - Amazon Home</option>
                                <option value="38">- - - - Kitchen &amp; Dining</option>
                                <option value="39">- - - - Furniture</option>
                                <option value="40">- - - - Bed &amp; Bath</option>
                                <option value="41">- - - - Appliances</option>
                                <option value="11">TV &amp; Audio</option>
                                <option value="42">- - Chamcham</option>
                                <option value="45">- - - - Office</option>
                                <option value="47">- - - - Gaming</option>
                                <option value="48">- - - - Chromebook</option>
                                <option value="49">- - - - Refurbished</option>
                                <option value="50">- - - - Touchscreen</option>
                                <option value="51">- - - - Ultrabooks</option>
                                <option value="52">- - - - Blouses</option>
                                <option value="43">- - Sanai</option>
                                <option value="53">- - - - Hard Drives</option>
                                <option value="54">- - - - Graphic Cards</option>
                                <option value="55">- - - - Processors (CPU)</option>
                                <option value="56">- - - - Memory</option>
                                <option value="57">- - - - Motherboards</option>
                                <option value="58">- - - - Fans &amp; Cooling</option>
                                <option value="59">- - - - CD/DVD Drives</option>
                                <option value="44">- - Meito</option>
                                <option value="60">- - - - Sound Cards</option>
                                <option value="61">- - - - Cases &amp; Towers</option>
                                <option value="62">- - - - Casual Dresses</option>
                                <option value="63">- - - - Evening Dresses</option>
                                <option value="64">- - - - T-shirts</option>
                                <option value="65">- - - - Tops</option>
                                <option value="12">Smartphone</option>
                                <option value="66">- - Camera Accessories</option>
                                <option value="68">- - - - Octa Core</option>
                                <option value="69">- - - - Quad Core</option>
                                <option value="70">- - - - Dual Core</option>
                                <option value="71">- - - - 7.0 Screen</option>
                                <option value="72">- - - - 9.0 Screen</option>
                                <option value="73">- - - - Bags &amp; Cases</option>
                                <option value="67">- - XailStation</option>
                                <option value="74">- - - - Batteries</option>
                                <option value="75">- - - - Microphones</option>
                                <option value="76">- - - - Stabilizers</option>
                                <option value="77">- - - - Video Tapes</option>
                                <option value="78">- - - - Memory Card Readers</option>
                                <option value="79">- - - - Tripods</option>
                                <option value="13">Cameras</option>
                                <option value="14">headphone</option>
                                <option value="15">Smartwatch</option>
                                <option value="16">Accessories</option>
                            </select>
                            <input type="text" placeholder="Enter your search key ...">
                            <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom_area header-sticky stick">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 d-lg-none d-block">
                    <div class="header-logo">
                        <a href="{{ route('website.home') }}">
                            <img src="{{ URL::asset('website') }}/assets/images/menu/logo/2.png" alt="Hiraola's Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 d-none d-lg-block position-static">
                    <div class="main-menu_area">
                        <nav>
                            <ul>
                                <li><a href="{{ route('website.home') }}">Home</a></li>
                                {{-- <li class="megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                    <ul class="hm-megamenu">
                                        <li><span class="megamenu-title">Shop Page Layout</span>
                                            <ul>
                                                <li><a href="shop-3-column.html">Grid Fullwidth</a></li>
                                                <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="shop-list-fullwidth.html">List Fullwidth</a></li>
                                                <li><a href="shop-list-left-sidebar.html">List Left Sidebar</a></li>
                                                <li><a href="shop-list-right-sidebar.html">List Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title">Single Product Style</span>
                                            <ul>
                                                <li><a href="single-product-gallery-left.html">Gallery Left</a></li>
                                                <li><a href="single-product-gallery-right.html">Gallery Right</a>
                                                </li>
                                                <li><a href="single-product-tab-style-left.html">Tab Style Left</a>
                                                </li>
                                                <li><a href="single-product-tab-style-right.html">Tab Style
                                                        Right</a>
                                                </li>
                                                <li><a href="single-product-sticky-left.html">Sticky Left</a></li>
                                                <li><a href="single-product-sticky-right.html">Sticky Right</a></li>
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title">Single Product Type</span>
                                            <ul>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                                <li><a href="single-product-group.html">Single Product Group</a>
                                                </li>
                                                <li><a href="single-product-variable.html">Single Product Variable</a>
                                                </li>
                                                <li><a href="single-product-affiliate.html">Single Product
                                                        Affiliate</a>
                                                </li>
                                                <li><a href="single-product-slider.html">Single Product Slider</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item_img"></li>
                                    </ul>
                                </li> --}}
                                <li><a href="blog-left-sidebar.html">Blog</a>
                                    <ul class="hm-dropdown">
                                        <li><a href="blog-left-sidebar.html">Grid View</a>
                                            <ul class="hm-dropdown hm-sub_dropdown">
                                                <li><a href="blog-2-column.html">Column Two</a></li>
                                                <li><a href="blog-3-column.html">Column Three</a></li>
                                                <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-list-left-sidebar.html">List View</a>
                                            <ul class="hm-dropdown hm-sub_dropdown">
                                                <li><a href="blog-list-fullwidth.html">List Fullwidth</a></li>
                                                <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details-left-sidebar.html">Blog Details</a>
                                            <ul class="hm-dropdown hm-sub_dropdown">
                                                <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-gallery-format.html">Blog Format</a>
                                            <ul class="hm-dropdown hm-sub_dropdown">
                                                <li><a href="blog-gallery-format.html">Gallery Format</a></li>
                                                <li><a href="blog-audio-format.html">Audio Format</a></li>
                                                <li><a href="blog-video-format.html">Video Format</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="index.html">Pages</a>
                                    <ul class="hm-dropdown">
                                        <li><a href="{{ route('website.my-account.index') }}">My Account</a></li>
                                        <li><a href="login-register.html">Login | Register</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                        <li><a href="coming-soon_page.html">Comming Soon</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('website.about') }}">About Us</a></li>
                                <li><a href="{{ route('website.contact') }}">Contact</a></li>
                                {{-- <li><a href="shop-left-sidebar.html">Jewellery</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-sm-8">
                    <div class="header-right_area">
                        <ul>
                            <li>
                                <a href="{{ route('website.wishlist') }}" class="wishlist-btn">
                                    <i class="ion-android-favorite-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white d-lg-none d-block">
                                    <i class="ion-navicon"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <i class="ion-bag"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    @php $i=0; @endphp
                    @foreach($cartItems as $value)
                        @if($i<3)
                        <li class="minicart-product">
                            <a class="product-item_remove" href="javascript:void(0)"><i class="ion-android-close"></i></a>
                            <div class="product-item_img">
                                <img src="{{ URL::asset('storage/'.$value->attributes['image']) }}" alt="Hiraola's Product Image">
                            </div>
                            <div class="product-item_content">
                                <a class="product-item_title" href="shop-left-sidebar.html">{{ $value->name }}</a>
                                <span class="product-item_quantity">{{ $value->quantity }} x {{ SettingsHelper::info()->currency.number_format($value->price) }}</span>
                            </div>
                        </li>
                        @endif
                        @php $i++; @endphp
                    @endforeach
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">{{ SettingsHelper::info()->currency.Cart::getSubTotal() }}</span>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('website.cart') }}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('website.checkout') }}" class="hiraola-btn hiraola-btn_dark hiraola-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="#"><span class="mm-text">Home</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="index.html">
                                        <span class="mm-text">Home One</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-2.html">
                                        <span class="mm-text">Home Two</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html">
                                        <span class="mm-text">Home Three</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="mm-text">Shop</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Grid View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-3-column.html">
                                                <span class="mm-text">Column Three</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-4-column.html">
                                                <span class="mm-text">Column Four</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Shop List</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop-list-fullwidth.html">
                                                <span class="mm-text">Full Width</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Single Product Style</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="single-product-gallery-left.html">
                                                <span class="mm-text">Gallery Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-gallery-right.html">
                                                <span class="mm-text">Gallery Right</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-tab-style-left.html">
                                                <span class="mm-text">Tab Style Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-tab-style-right.html">
                                                <span class="mm-text">Tab Style Right</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sticky-left.html">
                                                <span class="mm-text">Sticky Left</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sticky-right.html">
                                                <span class="mm-text">Sticky Right</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                        <span class="mm-text">Single Product Type</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="single-product.html">
                                                <span class="mm-text">Single Product</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sale.html">
                                                <span class="mm-text">Single Product Sale</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-group.html">
                                                <span class="mm-text">Single Product Group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-variable.html">
                                                <span class="mm-text">Single Product Variable</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-affiliate.html">
                                                <span class="mm-text">Single Product Affiliate</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-slider.html">
                                                <span class="mm-text">Single Product Slider</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="mm-text">Blog</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children has-children">
                                    <a href="#">
                                        <span class="mm-text">Grid View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-2-column.html">
                                                <span class="mm-text">Column Two</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-3-column.html">
                                                <span class="mm-text">Column Three</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="#">
                                        <span class="mm-text">List View</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-list-fullwidth.html">
                                                <span class="mm-text">List Fullwidth</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-list-left-sidebar.html">
                                                <span class="mm-text">List Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-list-right-sidebar.html">
                                                <span class="mm-text">List Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="#">
                                        <span class="mm-text">Blog Details</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-details-left-sidebar.html">
                                                <span class="mm-text">Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-details-right-sidebar.html">
                                                <span class="mm-text">Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children has-children">
                                    <a href="#">
                                        <span class="mm-text">Blog Format</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog-gallery-format.html">
                                                <span class="mm-text">Gallery Format</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-audio-format.html">
                                                <span class="mm-text">Audio Format</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-video-format.html">
                                                <span class="mm-text">Video Format</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">
                                <span class="mm-text">Pages</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('website.my-account.index') }}">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <span class="mm-text">Wishlist</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html">
                                        <span class="mm-text">Cart</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.html">
                                        <span class="mm-text">Checkout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="compare.html">
                                        <span class="mm-text">Compare</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <span class="mm-text">FAQ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="404.html">
                                        <span class="mm-text">Error 404</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="coming-soon_page.html">
                                        <span class="mm-text">Comming Soon</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active">
                            <a href="#">
                                <span class="mm-text">User
                                Setting
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('website.my-account.index') }}">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="login-register.html">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Currency</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">EUR €</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">USD $</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Language</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Romanian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Japanese</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Hiraola's Header Main Area End Here -->
