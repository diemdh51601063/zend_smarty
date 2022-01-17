

function deleteProductCart(cart_item_id) {
    $.ajax({
        type: 'post',
        url: "/customer/delcart?cart_item_id=" + cart_item_id,
        dataType: 'json',
        success: function (data) {
            document.getElementById(cart_item_id).remove();
            if (data.result !== '') {
                var length = 0;
                var total = 0;
                $.each(data.result, function (k, v) {
                    length = length + 1;
                    total = total + (v.number_product * v.price);
                });
                $('.cart-summary').replaceWith('<div class="cart-summary">' +
                    '<small><b>Có ' + length + ' sản phẩm trong giỏ hàng</b></small>' +
                    '<h5>Tổng cộng: ' + numberWithCommas(total) + ' VNĐ</h5></div>');

                $('#card_quantily').replaceWith('<div class="qty" id="card_quantily">' + length + '</div>')
            } else {
                $('#card_quantily').replaceWith('<div class="qty" id="card_quantily">0</div>')
                $('.cart-summary').remove();
            }

        },
        error: function (status) {
            console.log(status);
        }
    });
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

