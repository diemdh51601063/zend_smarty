<!-- SECTION navbar -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="../../asset/user/img/inear.jpg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>In ear</h3>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'view'])}" class="cta-btn">Sản phẩm
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="../../asset/user/img/onear.jpg" alt="" style="height: 240px;">
                    </div>
                    <div class="shop-body">
                        <h3>On ear</h3>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'view'])}" class="cta-btn">Sản phẩm
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="../../asset/user/img/shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Over ear</h3>
                        <a href="{$this->url(['controller' => 'index', 'action' => 'view'])}" class="cta-btn">Sản phẩm
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản Phẩm Mới</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                {foreach $listItem as $item}
                                    {if $item.list_image|@count != 0 }
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../asset/images/products/{{$item.list_image[0].image}}" alt=""
                                                    style="height: 263px; !important;">
                                                <div class="product-label">
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>

                                            <div class="product-body">
                                                <h3 class="product-name" style="height: 50px;"><a
                                                        href="{{$this->url(['controller' => 'index', 'action' => 'detail'])}}?id={$item.id}">{$item.name}</a>
                                                </h3>
                                                <h4 class="product-price">{$item.price|number_format:0:".":"."} VNĐ</h4>
                                            </div>

                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i></button>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    {/if}
                                {/foreach}

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Bán Chạy</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                {foreach $listItem as $item}
                                    {if $item.list_image|@count != 0 }
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../asset/images/products/{{$item.list_image[0].image}}" alt=""
                                                    style="height: 263px; !important;">
                                            </div>

                                            <div class="product-body">
                                                <h3 class="product-name" style="height: 50px;"><a href="{{$this->url(['controller' => 'index', 'action' => 'detail'])}}?id={$item.id}">{$item.name}</a></h3>
                                                <h4 class="product-price">{$item.price|number_format:0:".":"."} VNĐ</h4>
                                            </div>

                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i></button>
                                            </div>
                                        </div>
                                    {/if}
                                {/foreach}

                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
{*<div class="section">*}
{*    <!-- container -->*}
{*    <div class="container">*}
{*        <!-- row -->*}
{*        <div class="row">*}
{*            <div class="col-md-6 col-xs-6">*}
{*                <div class="section-title">*}
{*                    <h4 class="title">Top selling</h4>*}
{*                    <div class="section-nav">*}
{*                        <div id="slick-nav-3" class="products-slick-nav"></div>*}
{*                    </div>*}
{*                </div>*}

{*                <div class="products-widget-slick" data-nav="#slick-nav-3">*}
{*                    <div>*}
{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product07.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product08.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product09.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- product widget -->*}
{*                    </div>*}

{*                    <div>*}
{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product01.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product02.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product03.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- product widget -->*}
{*                    </div>*}
{*                </div>*}
{*            </div>*}

{*            <div class="clearfix visible-sm visible-xs"></div>*}

{*            <div class="col-md-6 col-xs-6">*}
{*                <div class="section-title">*}
{*                    <h4 class="title">Top selling</h4>*}
{*                    <div class="section-nav">*}
{*                        <div id="slick-nav-5" class="products-slick-nav"></div>*}
{*                    </div>*}
{*                </div>*}

{*                <div class="products-widget-slick" data-nav="#slick-nav-5">*}
{*                    <div>*}
{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product01.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product02.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product03.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- product widget -->*}
{*                    </div>*}

{*                    <div>*}
{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product04.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product05.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- /product widget -->*}

{*                        <!-- product widget -->*}
{*                        <div class="product-widget">*}
{*                            <div class="product-img">*}
{*                                <img src="../../asset/user/img/product06.png" alt="">*}
{*                            </div>*}
{*                            <div class="product-body">*}
{*                                <p class="product-category">Category</p>*}
{*                                <h3 class="product-name"><a href="#">product name goes here</a></h3>*}
{*                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>*}
{*                            </div>*}
{*                        </div>*}
{*                        <!-- product widget -->*}
{*                    </div>*}
{*                </div>*}
{*            </div>*}

{*        </div>*}
{*        <!-- /row -->*}
{*    </div>*}
{*    <!-- /container -->*}
{*</div>*}
{*<!-- /SECTION -->*}