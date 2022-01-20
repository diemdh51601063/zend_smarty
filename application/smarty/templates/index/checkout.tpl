<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- Billing Details -->
        {if !empty($customer_info)}
        <form method="post" id="formCheckout" onsubmit="checkout(event)">
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">THÔNG TIN GIAO HÀNG</h3>
                        </div>

                        <div class="form-group">
                            <label>Tên khách hàng:</label>
                            <input class="input" type="text" id="order_name" name="order_name" placeholder="Họ"
                                   maxlength="50" minlength="2"
                                   value="{$customer_info.first_name} {$customer_info.last_name}">
                        </div>

                        <div class="form-group">
                            <label>Email:</label>
                            <input class="input" name="order_email" id="order_email" placeholder="Email"
                                   value="{$customer_info.email}">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Mã vùng điện thoại:</label>
                                <input class="input" type="tel" name="country_code" id="country_code"
                                       placeholder="Mã vùng" value="84" readonly>
                            </div>
                            <div class="col-sm-8">
                                <label>Số điện thoại:</label>
                                <input class="input" type="phone" name="order_phone" id="order_phone"
                                       placeholder="Số điện thoại"
                                       maxlength="11" minlength="10" value="{$customer_info.phone}">
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Quốc gia:</label>
                            <input class="input" type="text" name="country" id="country" placeholder="Country"
                                   value="Việt Nam" readonly>
                        </div>
                        <div class="form-group">
                            <label>Thành phố:</label>
                            <select class="input" id="city_code" name="city_code">
                                <option value="">Chọn thành phố</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Quận/Huyện:</label>
                            <select class="input" id="district_code" name="district_code">
                                <option value="">Chọn quận/huyện</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phường/xã:</label>
                            <select class="input" id="ward_code" name="ward_code">
                                <option value="">Chọn phường/xã</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ:</label>
                            <input class="input" type="text" id="address" name="address" placeholder="Địa chỉ"
                                   value="{$customer_info.address}">
                        </div>
                        <div class="form-group">
                            <label>Ghi chú:</label>
                            <textarea class="input" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Order Details -->
                {assign var="total" value="0"}
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">ĐƠN HÀNG CỦA BẠN</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>SẢN PHẨM</strong></div>
                            <div><strong>TỔNG CỘNG</strong></div>
                        </div>
                        <div class="order-products">
                            {foreach $list_product_in_cart as $product_in_cart}
                                <div class="order-col">
                                    <div>{$product_in_cart.number_product} x {$product_in_cart.name} </div>
                                    <div>{$product_in_cart.price|number_format:0:".":"."} VNĐ</div>
                                </div>
                                {$total=$total+($product_in_cart.price * $product_in_cart.number_product)}
                            {/foreach}
                        </div>
                        <div class="order-col">
                            <div>Phí giao hàng</div>
                            <div><strong>MIỄN PHÍ</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TỔNG CỘNG</strong></div>
                            <div><strong class="order-total">{$total|number_format:0:".":"."} VNĐ</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" checked>
                            <label for="payment-1">
                                <span></span>
                                Thanh toán khi nhận hàng
                            </label>
                            <div class="caption">
                                <p>Sau khi nhận hàng và kiểm tra hàng đầy đủ, khách hàng sẽ thanh toán cho nhân viên
                                    giao hàng hoặc đối tác giao hàng.</p>
                            </div>
                        </div>
                        {*                            <div class="input-radio">*}
                        {*                                <input type="radio" name="payment" id="payment-2">*}
                        {*                                <label for="payment-2">*}
                        {*                                    <span></span>*}
                        {*                                    Thanh toán thông qua ứng dụng Internet Banking*}
                        {*                                </label>*}
                        {*                                <div class="caption">*}
                        {*                                    <p>Hiện tại hệ thống chưa hỗ trợ việc thanh toán thông qua các ứng dụng Internet*}
                        {*                                        Banking. Mong khách hàng thông cảm vì sự bất tiện này.</p>*}
                        {*                                </div>*}
                        {*                            </div>*}
                    </div>
                    <div class="input-checkbox" id="input_term">
                        <input type="checkbox" id="term" name="term">
                        <label for="term">
                            <span></span>
                            Tôi đã đọc và đồng ý các điều kiện, quy định của cửa hàng.
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button id="checkout_btn" type="submit" class="primary-btn btn-block order-submit">Đặt hàng
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {/if}
    <!-- /Order Details -->
</div>
<!-- /container -->


<script>
    var city_code_input = {$customer_info.city_code};
    var district_code_input = {$customer_info.district_code};
    var ward_code_input = {$customer_info.ward_code};
    var total_price = {$total};
    $(document).ready(function () {
        var link_city = 'https://api.mysupership.vn/v1/partner/areas/province';
        $.getJSON(link_city, function (data) {
            $.each(data.results, function (k, v) {
                $('#city_code').append(new Option(v.name, v.code));
                $('#city_code').val(city_code_input);
            });
        });

        var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' + city_code_input;
        $('#district_code').not(':first').remove();
        $.getJSON(link_district, function (data) {
            $.each(data.results, function (k, v) {
                $('#district_code').append(new Option(v.name, v.code));
                $('#district_code').val(district_code_input);
            });
        });

        var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' + district_code_input;
        $('#ward_code').not(':first').remove();
        $.getJSON(link_ward, function (data) {
            $.each(data.results, function (k, v) {
                $('#ward_code').append(new Option(v.name, v.code));
                $('#ward_code').val(ward_code_input);
            });
        });


        $('#city_code').change(function () {
            var city_code = $(this).children("option:selected").val();
            if (city_code !== '') {
                var link_district = 'https://api.mysupership.vn/v1/partner/areas/district?province=' + city_code;
                $('#district_code').find('option').not(':first').remove();
                $.getJSON(link_district, function (data) {
                    $.each(data.results, function (key, val) {
                        $('#district_code').append(new Option(val.name, val.code));
                    });
                });
            } else {
                $('#district_code').find('option').not(':first').remove();
                $('#ward_code').find('option').not(':first').remove();
            }
        });

        $('#district_code').change(function () {
            var district_code = $(this).children("option:selected").val();
            if (district_code !== '') {
                var link_ward = 'https://api.mysupership.vn/v1/partner/areas/commune?district=' + district_code;
                $('#ward_code').find('option').not(':first').remove();
                $.getJSON(link_ward, function (data) {
                    $.each(data.results, function (key, val) {
                        $('#ward_code').append(new Option(val.name, val.code))
                    });
                });
            } else {
                $('#ward_code').find('option').not(':first').remove();
            }
        });

        $('.input').each(function () {
            $(this).change(function () {
                console.log($(this).next('span'));
                $(this).next('br').remove();
                $(this).next('span').remove();
                $(this).removeClass('input_error');
            })
        })
    })

    function checkout(e) {
        e.preventDefault();
        if ($('#term:checkbox:checked').length < 1) {
            $('#input_term').after('<span class="text-danger font-weight-bold"> Bạn chưa check team !!!! </span>');
        } else {
            $("<input />").attr("type", "hidden")
                .attr("name", "city_name")
                .attr("value", $("#city_code option:selected").text())
                .appendTo("#formCheckout");

            $("<input />").attr("type", "hidden")
                .attr("name", "district_name")
                .attr("value", $("#district_code option:selected").text())
                .appendTo("#formCheckout");

            $("<input />").attr("type", "hidden")
                .attr("name", "ward_name")
                .attr("value", $("#ward_code option:selected").text())
                .appendTo("#formCheckout");
            $("<input />").attr("type", "hidden")
                .attr("name", "delivery_cost")
                .attr("value", 0)
                .appendTo("#formCheckout");

            $("<input />").attr("type", "hidden")
                .attr("name", "total")
                .attr("value", total_price)
                .appendTo("#formCheckout");

            var fdata = $('#formCheckout').serializeArray();
            $.ajax({
                type: 'post',
                url: "/customer/checkout",
                dataType: 'json',
                data: fdata,

                success: function (data) {
                    if (data.message === undefined) {
                        $('.input').nextAll('span').remove();
                        $('.input').nextAll('br').remove();
                        $('.input').removeClass('input_error');
                        $.each(data.result, function (key, input_error) {
                            $('.input').each(function () {
                                if ($(this).prop('id') == key) {
                                    var id_div_input = '#' + key;
                                    $(id_div_input).addClass('input_error');
                                    $.each(input_error, function (k, v) {
                                        $(id_div_input).after('<br><span class="text-danger font-weight-bold">' + v + '</span>');
                                    })
                                }
                            });
                        });
                    } else {
                        renderCart('');
                        window.location.href = '/index';
                    }
                },
                error: function (status) {
                    console.log(status);
                }
            });
        }
    }
</script>