@extends('layouts.website')
@section('title', 'Chand Jewellers - Shop')
@section('head')
    <style>
        .price-filter .price-slider-amount .label-input input{
            width: 137px !important;
        }
    </style>
@endsection
@section('content')
    <!-- Begin Hiraola's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Shop</h2>
                <ul>
                    <li><a href="{{ route('website.home') }}">Home</a></li>
                    <li class="active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Hiraola's Breadcrumb Area End Here -->

    <!-- Begin Hiraola's Content Wrapper Area -->
    <div class="hiraola-content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="hiraola-sidebar-catagories_area">
                        <div class="hiraola-sidebar_categories">
                            <div class="hiraola-categories_title">
                                <h5>Price</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Rs.1000 - Rs.500000" />
                                    </div>
                                    <!-- <button type="button">Filter</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="category-module hiraola-sidebar_categories">
                            <div class="category-module_heading">
                                <h5>Categories</h5>
                            </div>
                            <div class="module-body">
                                <ul class="module-list_item">
                                    @foreach ($categoriesWithSubcategories as $category)
                                        <li>
                                            <a href="javascript:void(0)" class="category"
                                                category_slug="{{ $category->slug }}">{{ $category->name }}
                                                ({{ $category->totalProducts }})</a>
                                            <ul class="module-sub-list_item">
                                                <li>
                                                    @foreach ($category->subCategories as $subCategory)
                                                        <a href="javascript:void(0)" class="subcategory"
                                                            sub_category_slug="{{ $subCategory->slug }}">{{ $subCategory->name }}
                                                            ({{ $subCategory->totalProducts }})
                                                        </a>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top"
                                title="Grid View"><i class="fa fa-th"></i></a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top"
                                title="List View"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                    <div class="row" id="show_loader">
                        <div class="col-12 text-center">
                            <div class="spinner-border text-dark mt-3" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid gridview-3 row d-none">
                        @include('website.products-list')
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hiraola-paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Content Wrapper Area End Here -->
    <input type="hidden" id="catslug">
    <input type="hidden" id="subcatslug">
    <input type="hidden" id="prices" value="1000-500000">
@endsection
@section('scripts')
    <script type="text/javascript">
        var shopUrl = "{{ url('/shop') }}";
        $(document).ready(function() {
            $('#show_loader').addClass('d-none');
            $('.shop-product-wrap').removeClass('d-none');

            // Pagination
            $(document).on('click', '.hiraola-pagination-box a', function(event) {
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                event.preventDefault();

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];

                getData(page);
            });

            // Search Category or Sub-Category Wise Products
            $(document).on('click', '.category, .subcategory', function() {
                var slug = $(this).attr('category_slug') || $(this).attr('sub_category_slug');
                $('#show_loader').removeClass('d-none');
                $('.shop-product-wrap').addClass('d-none');

                if (slug) {
                    var url = "{{ URL::to('/shop') }}" + "?";
                    if ($(this).hasClass('category')) {
                        url += "category_slug=" + slug;
                        $('#catslug').val(slug);
                    } else {
                        url += "sub_category_slug=" + slug;
                        $('#subcatslug').val(slug);
                    }

                    $.ajax({
                        url: url,
                        method: 'GET',
                        data:{
                            start_price: $('#prices').val().split('-')[0],
                            end_price: $('#prices').val().split('-')[1]
                        },
                        success: function(response) {
                            if (response.trim() !== "") { // Check if response is not empty
                                $(".shop-product-wrap").empty().html(response);
                            } else {
                                $(".shop-product-wrap").empty().html(
                                    `<div class="col-lg-12 col-md-12 col-sm-12"><center class="mt-5">No Products...</center></div>`
                                );
                            }

                            $('#show_loader').addClass('d-none');
                            $('.shop-product-wrap').removeClass('d-none');
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                }
            });

            // Pagination Function
            function getData(page) {
                $.ajax({
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html",
                    })
                    .done(function(data) {
                        $(".shop-product-wrap").empty().html(data);
                        location.hash = page;
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('No response from server');
                    });
            }

            // Hashchange Event
            $(window).on('hashchange', function() {
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getData(page);
                    }
                }
            });
        });
    </script>
@endsection
