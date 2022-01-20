

function deleteProductCart(cart_item_id) {
    $.ajax({
        type: 'post',
        url: "/cart/delete?cart_item_id=" + cart_item_id,
        dataType: 'json',
        success: function (data) {
            document.getElementById(cart_item_id).remove();
            console.log(data.result);
            if (data.result !== '') {
                renderCart(data.result);
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

function addProductToCart(id_product, type_product){
    var number_product = $('#number_product').val();
    var product_type_id = '';
    var call_ajax = false;
    if($('input[name="product_type_id"]:checked').val() != undefined){
        product_type_id = $('input[name="product_type_id"]:checked').val();
    }
    if(type_product > 0){
        if((number_product > 0) && (product_type_id !== '')){
            call_ajax = true;
        }else{
            $('#add_number_product').next('span').remove();
            $('#add_number_product').after('<span class="text-danger font-weight-bold">Chọn phân loại và nhập số lượng sản phẩm</span>');
        }

    }else{
        if(number_product > 0){
            call_ajax = true;
        }else{
            $('#add_number_product').next('span').remove();
            $('#add_number_product').after('<span class="text-danger font-weight-bold">Nhập số lượng sản phẩm</span>');
        }
    }

    if(call_ajax === true){
        $.ajax({
            type: 'post',
            url: "/cart/add?product_id="+id_product+"&number_product="+number_product+"&type_product_id="+product_type_id,
            dataType: 'json',
            success: function (data) {
                renderCart(data.result);
            },
            error: function (status) {
                console.log(status);
            }
        });
    }

}

function renderCart(cart_data){
    $('#number_product').val(0);
    $('.cart-list').children('div').remove();
    var total = 0;
    var length_cart = Object.keys(cart_data).length;
    var num_product = 0;

    if(length_cart === 0){
       $('#add_cart_btn').css('display','none');
    }else{
        if($('#data-user-id').val() === undefined){
            $('#add_cart_btn').append('<a href="/index/login"> Đặt hàng<i className="fa fa-arrow-circle-right"></i></a>');
        }else{
            $('#add_cart_btn').append('<a href="/index/checkout">Đặt hàng<i className="fa fa-arrow-circle-right"></i></a>');
        }
    }

    $('#card_quantily').replaceWith('<div class="qty" id="card_quantily">'+ length_cart +'</div>')

    $.each(cart_data, function (k, v) {
        num_product = parseInt(num_product) + parseInt(v.number_product);
        total = total + (v.number_product * v.price);
        $(".cart-list").append('<div class="product-widget cartList" id="'+k+'">'+
            '<div class="product-img">'+
            '<img src="../../asset/images/products/'+v.image+'" alt=""> </div>'+
            '<div class="product-body">'+
            '<h3 class="product-name">'+v.name+'</h3>'+
            '<small><b>'+v.type_product_color+'</b></small>'+
            '<h4 class="product-price"><small style="font-weight: 600">'+v.number_product+' x </small>'+ numberWithCommas(v.price) +' VNĐ</h4>'+
            '</div>'+
            '<button onclick="deleteProductCart('+k+')" class="delete"><i class="fa fa-close" style="font-size: 18px"></i></button> </div>');
    });
    $('#cart-summary').replaceWith('<div class="cart-summary" id="cart-summary">'+
        '<small><b>Có ' + num_product + ' sản phẩm trong giỏ hàng</b></small>'+
        '<h5>Tổng cộng: '+ numberWithCommas(total) + ' VNĐ</h5></div>');

}



