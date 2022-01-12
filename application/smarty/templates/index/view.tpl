<style>
    .img_product_fix {
        height: 263px;
    }

    .name_product_fix {
        height: 60px;
    }
</style>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div id="aside" class="col-md-3">
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">

                        {foreach $list_category as $category}
                            <div class="input-checkbox">
                                <input type="checkbox" id="category" name="category">
                                <label for="category-1">
                                    <span></span>
                                    {$category.category_name}
                                    <small>(0)</small>
                                </label>
                            </div>
                        {/foreach}

                    </div>
                </div>

                {*<!-- Price -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /Price -->*}

                <!-- select brand -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        {foreach $list_brand as $brand}
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand" name="brand">
                                <label for="brand">
                                    <span></span>
                                    {$brand.brand_name}
                                    <small>(0)</small>
                                </label>
                            </div>
                        {/foreach}
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- list product -->
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="../../asset/images/products/{$list_product[0].list_image[0].image}" alt="">
                        </div>
                        <div class="product-body">
                            {foreach $list_category as $category}
                                {if $category.id == $list_product[0].id}
                                    <p class="product-category">{$category.category_name}</p>
                                {/if}
                            {/foreach}
                            <h3 class="product-name"><a href="{{$this->url(['controller' => 'index', 'action' => 'detail'])}}?id={$list_product[0].id}">{$list_product[0].name}</a></h3>
                            <h4 class="product-price">{$list_product[0].price}</h4>
                        </div>
                    </div>
                </div>
                <!-- /list product -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sắp xếp theo:
                            <select class="input-select" name="sort">
                                <option value="0">Giá thấp</option>
                                <option value="1">Giá cao</option>
                            </select>
                        </label>

                        <label>
                            Hiển thị:
                            <select class="input-select" name="quantily_product">
                                <option value="18">18</option>
                                <option value="36"></option>
                            </select>
                        </label>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    {foreach $list_product as $product}
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    {if !empty($product.list_image[0].image)}
                                        <img class="img_product_fix" src="../../asset/images/products/{$product.list_image[0].image}" alt="">
                                    {/if}
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name name_product_fix"><a
                                                href="{{$this->url(['controller' => 'index', 'action' => 'detail'])}}?id={$product.id}">{$product.name}</a>
                                    </h3>
                                    <h4 class="product-price">{$product.price}</h4>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                {*<div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>*}
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->