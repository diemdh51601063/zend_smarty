

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
                $('.cart-summary').replaceWith('<div class="cart-summary" id="cart-summary">' +
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

function addProductToCart(id_product){
    var number_product = $('#number_product').val();
    var product_type_id = '';
    if($('input[name="product_type_id"]:checked').val() != undefined){
        var product_type_id = $('input[name="product_type_id"]:checked').val();
    }
    
    if(number_product > 0){
        $.ajax({
            type: 'post',
            url: "/customer/addcart?product_id="+id_product+"&number_product="+number_product+"&type_product_id="+product_type_id,
            dataType: 'json',

            success: function (data) {
                $('#number_product').val(0);
                $('.cart-list').children('div').remove();
                var total = 0;
                var length_cart = Object.keys(data.result).length;
                console.log(length_cart)
                var num_product = 0;

                $('#card_quantily').replaceWith('<div class="qty" id="card_quantily">'+ length_cart +'</div>')

                $.each(data.result, function (k, v) {
                    num_product = parseInt(num_product) + parseInt(v.number_product);
                    total = total + (v.number_product * v.price);
                    $(".cart-list").append('<div class="product-widget cartList" id="'+v.id+'">'+
                    '<div class="product-img">'+
                        '<img src="../../asset/images/products/'+v.image+'" alt=""> </div>'+
                    '<div class="product-body">'+
                        '<h3 class="product-name">'+v.name+'</h3>'+
                        '<small><b>'+v.type_product_color+'</b></small>'+
                       '<h4 class="product-price"><small style="font-weight: 600">'+v.number_product+' x </small>'+ numberWithCommas(v.price) +' VNĐ</h4>'+
                    '</div>'+
                    '<button onclick="deleteProductCart('+v.id+')" class="delete"><i class="fa fa-close" style="font-size: 18px"></i></button> </div>')
                console.log(v);
                });
                $('#cart-summary').replaceWith('<div class="cart-summary" id="cart-summary">'+
                    '<small><b>Có ' + num_product + ' sản phẩm trong giỏ hàng</b></small>'+
                '<h5>Tổng cộng: '+ numberWithCommas(total) + ' VNĐ</h5></div>');
            },
            error: function (status) {
                console.log(status);
            }
        });
    }else{

        $('#modalWarning').show();
        $('#closeWarning').click(function(){
            $('#modalWarning').toggle();
        });

    }
}

