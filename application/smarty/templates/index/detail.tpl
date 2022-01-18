
{*<!-- BREADCRUMB -->*}
{*<div id="breadcrumb" class="section">*}
{*    <!-- container -->*}
{*    <div class="container">*}
{*        <!-- row -->*}
{*        <div class="row">*}
{*            <div class="col-md-12">*}
{*                <ul class="breadcrumb-tree">*}
{*                    <li><a href="#">Home</a></li>*}
{*                    <li><a href="#">All Categories</a></li>*}
{*                    <li><a href="#">Accessories</a></li>*}
{*                    <li><a href="#">Headphones</a></li>*}
{*                    <li class="active">Product name goes here</li>*}
{*                </ul>*}
{*            </div>*}
{*        </div>*}
{*        <!-- /row -->*}
{*    </div>*}
{*    <!-- /container -->*}
{*</div>*}
{*<!-- /BREADCRUMB -->*}

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    {foreach $image_product as $image }
                        <div class="product-preview" id="changeimg">
                            <img src="../../asset/images/products/{$image.image}" alt="">
                        </div>
                    {/foreach}
                    {*<div class="product-preview">
                        <img src="../../asset/user/img/product03.png" alt="">
                    </div>*}
                </div>
            </div>
            <!-- /Product main img -->
            {assign var="type_product" value="0"}
                {if ($list_type_product|@count) > 0 }
                    {$type_product = $list_type_product|@count}
                {/if}

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs" id="changeimgmain">
                    {foreach $image_product as $image }
                        <div class="product-preview">
                            <img src="../../asset/images/products/{$image.image}" alt="">
                        </div>
                    {/foreach}

                    {* <div class="product-preview">
                         <img src="../../asset/user/img/product03.png" alt="">
                     </div>
                     *}
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{$detail_product.name}</h2>
                    <div>
                        <h3 class="product-price">{$detail_product.price|number_format:0:".":"."} VNĐ</h3>
                    </div>

                    <div class="add-to-cart" id="add_number_product">
                        <div class="qty-label">
                            <div class="input-number">
                                <input type="number" value="0" id="number_product" min=0>
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button id="addCart" onclick="addProductToCart({$detail_product.id}, {$type_product})" class="add-to-cart-btn"
                                value="{$detail_product.id}"><i class="fa fa-shopping-cart"></i></button>
                    </div>

                    <ul class="product-links">
                        <li>Danh mục:</li>
                        {foreach $list_category as $category}
                            {if $category.id == $detail_product.category_id}
                                <li><a href="#">{$category.category_name}</a></li>
                            {/if}
                        {/foreach}
                    </ul>

                    {if ($list_type_product|@count) > 0 }
                        <ul class="product-links">
                            {foreach $list_type_product as $type}
                                <div class="form-check">
                                    <input class="form-check-input product_type_id" type="radio" name="product_type_id"
                                           id="{$type.id}" value="{$type.id}">
                                    <label class="form-check-label" for="{$type.id}">
                                        {$type.color}
                                    </label>
                                </div>
                            {/foreach}
                        </ul>
                    {/if}

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Mô tả</a></li>
                        <li><a data-toggle="tab" href="#tab2">Thông tin chi tiết</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p>{$detail_product.description}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <tr>
                                            <th>Tên Sản Phẩm</th>
                                            <td>{$detail_product.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Danh Mục</th>
                                            {foreach $list_category as $category}
                                                {if $category.id == $detail_product.category_id}
                                                    <td>{$category.category_name}</td>
                                                {/if}
                                            {/foreach}
                                        </tr>
                                        <tr>
                                            <th>Thương Hiệu</th>
                                            {foreach $list_brand as $brand}
                                                {if $brand.id == $detail_product.brand_id}
                                                    <td>{$brand.brand_name}</td>
                                                {/if}
                                            {/foreach}
                                        </tr>
                                        <tr>
                                            <th>Loại jack cắm</th>
                                            <td>{$detail_product.jack}</td>
                                        </tr>
                                        <tr>
                                            <th>Cổng sạc</th>
                                            <td>{$detail_product.charging_port}</td>
                                        </tr>
                                        <tr>
                                            <th>Kích thước</th>
                                            <td>{$detail_product.size}</td>
                                        </tr>
                                        <tr>
                                            <th>Khối lượng</th>
                                            <td>{$detail_product.weight}</td>
                                        </tr>
                                        <tr>
                                            <th>Chiều dài dây</th>
                                            <td>{$detail_product.length}</td>
                                        </tr>
                                        <tr>
                                            <th>Độ tương thích</th>
                                            <td>{$detail_product.compatible}</td>
                                        </tr>
                                        <tr>
                                            <th>Tương tác/ điều khiển</th>
                                            <td>{$detail_product.control}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /tab2  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

{*<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Các Sản Phẩm Liên Quan</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="../../asset/user/img/product01.png" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->*}

<script>
    var list_image_type_product = {$list_image_type_product|@json_encode};

    var a = '';

    var type_product = {$type_product};

    $(document).ready(function () {
        if ($('#number_product').val() == 0) {
            $('#addCart').attr("disabled", true);
        }
        if (type_product > 0) {
            if ($('input[name="product_type_id"]:checked').val() === undefined) {
                $('#addCart').attr("disabled", true);
            }
            $('.product_type_id').change(function () {
                if (($('input[name="product_type_id"]:checked').val() !== undefined) && ($('#number_product').val() > 0)) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });

            $('#number_product').change(function () {
                if (($('input[name="product_type_id"]:checked').val() !== undefined) && ($('#number_product').val() > 0)) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });

        }else {
            $('#number_product').change(function () {
                if ($('#number_product').val() > 0) {
                    $('#addCart').attr("disabled", false);
                } else {
                    $('#addCart').attr("disabled", true);
                }
            });
        }
    });

    function changeImage(type_id) {
        var list_image_replace = [];
        $.each(list_image_type_product, function (key, value) {
            if ((value.product_detail_id == type_id) && (value.image !== '')) {
                list_image_replace.push(value.image);
            }
        });
        console.log(list_image_replace)
        if (list_image_replace !== '') {
            $('#product-imgs').children('.product-preview').remove();
            $('#product-main-img').children('.product-preview').remove();
            $.each(list_image_replace, function (k, v) {
                //$('#product-preview').append('<div class="product-preview"><img src="../../asset/images/products/'+v+'" alt=""></div>');
                $('#product-imgs').append('<div class="product-preview"><img src="../../asset/images/products/' + v + '" alt=""></div>');

                $('#product-main-img').append('<div class="product-preview" id="changeimg">' +
                    '<img src="../../asset/images/products/' + v + '" alt="">' + '</div>');
            });
        }
    }

    {literal}
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    {/literal}


</script>