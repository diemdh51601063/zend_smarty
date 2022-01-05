<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Billing address</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="first-name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city_id" name="city_id">
                            <option value="">Chọn thành phố</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="province_id" name="province_id">
                            <option value="">Chọn quận/huyện</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="ward_id" name="ward_id">

                        </select>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="country" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="Telephone">
                    </div>
                    <div class="order-notes">
                        <textarea class="input" placeholder="Order Notes"></textarea>
                    </div>

                </div>
                <!-- /Billing Details -->
            </div>

            <!-- Order Details -->
            <div class="col-md-5 order-details">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    <div class="order-products">
                        <div class="order-col">
                            <div>1x Product Name Goes Here</div>
                            <div>$980.00</div>
                        </div>
                        <div class="order-col">
                            <div>2x Product Name Goes Here</div>
                            <div>$980.00</div>
                        </div>
                    </div>
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">$2940.00</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            Direct Bank Transfer
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            Cheque Payment
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <a href="#" class="primary-btn order-submit">Place order</a>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>
    $(document).ready(function() {
        var link_city = 'https://api.mysupership.vn/v1/partner/areas/province';
        $.getJSON(link_city, function(data) {
            $.each(data.results, function(key, val) {
                $('#city_id').append(new Option(val.name, val.code))
            });
        });
    });

    $('#city_id').change(function() {
        var city_code = $(this).children("option:selected").val();
        var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' + city_code;

        $.getJSON(link_district, function(data) {
            $.each(data.results, function(key, val) {
                $('#province_id').append(new Option(val.name, val.code))
            });
        });
    });

    $('#province_id').change(function() {
        var district_code = $(this).children("option:selected").val();
        var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' + district_code;

        $.getJSON(link_ward, function(data) {
            $.each(data.results, function(key, val) {
                $('#ward_id').append(new Option(val.name, val.code))
            });
        });
    })
</script>