@extends('admin.layouts.app')
@section('title', 'Change Products Prices')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"></section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Change Products Prices</h3>
                            </div>
                            <form action="{{ route('admin.products.update-prices') }}" method="post" id="product-price-form">
                                @csrf
                                <input type="hidden" name="type" id="type" value="0" required>
                                <div class="card-body">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control"
                                        placeholder="Price" required>
                                        <font color="red" class="price_error"></font>
                                    @error('price')
                                        <font color="red">{{ $message }}</font>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success" id="increase-btn">Increase</button>
                                    <button type="button" class="btn btn-danger" id="decrease-btn">Decrease</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
         // --------------------- Only Numbers are allowed ------------------------
         $(document).ready(function() {
            $('#price').on('keydown', function(
                e) {
                // Allow: backspace, delete, tab, escape, enter, and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A/Ctrl+C/Ctrl+V
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode == 67 && e.ctrlKey === true) ||
                    (e.keyCode == 86 && e.ctrlKey === true) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }

                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
                        105)) {
                    e.preventDefault();
                }
            });

            // ------------------ Increase Price Btn Start ---------------------
            $('#increase-btn').click(function(){
                $('.price_error').text(null);
                var price = $('#price').val();
                if(!price)
                {
                    $('.price_error').text("The price field is required.");
                    return false;
                }else{
                    $('#type').val(0);
                    $('#product-price-form').submit();
                }
            });
            // ------------------ Increase Price Btn End --------------------- 
            // ------------------ Decrease Price Btn Start ---------------------
            $('#decrease-btn').click(function(){
                $('.price_error').text(null);
                var price = $('#price').val();
                if(!price)
                {
                    $('.price_error').text("The price field is required.");
                    return false;
                }else{
                    $('#type').val(1);
                    $('#product-price-form').submit();
                }
            });
            // ------------------ Decrease Price Btn End --------------------- 
        });
        // --------------------- Only Numbers are allowed End Here ------------------------
    </script>
@endsection
