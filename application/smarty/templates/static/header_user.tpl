<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                {if empty($customer) }
                    <li><a href="{$this->url(['controller' => 'index', 'action' => 'register'])}"><i
                                class="fa fa-user-plus"></i> Đăng Ký</a></li>
                    <li><a href="{$this->url(['controller' => 'index', 'action' => 'login'])}"><i class="fa fa-user-o"></i>
                            Đăng Nhập</a></li>
                {else}
                    <li><a href="{$this->url(['controller' => 'index', 'action' => 'logout'])}"><i
                                class="fa fa-sign-out"></i>Đăng Xuất</a></li>
                {/if}
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="../../asset/user/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                {foreach $list_category as $category}
                                    <option value="{$category.id}">{$category.category_name}</option>
                                {/foreach}
                            </select>
                            <input class="input" placeholder="Tìm kiếm">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng</span>
                                {if empty($cart)}
                                    <div class="qty">0</div>
                                {else}
                                    <div class="qty" id="card_quantily">{$cart|@count}</div>
                                {/if}
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    {if empty($cart)}
                                        <div class="product-widget">
                                            <p>Không có sản phẩm !!!!</p>
                                        </div>
                                    {else}
                                        {assign var="total" value="0"}
                                        {foreach from=$cart key=key item=item}
                                            <div class="product-widget cartList" id="{$key}">
                                                <div class="product-img">
                                                    <img src="../../asset/images/products/{$item.image}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">{$item.name}</a></h3>
                                                    <small><b>{$item.type_product_color}</b></small>
                                                    <h4 class="product-price"><small
                                                            style="font-weight: 600">{$item.number_product}
                                                            x </small>{$item.price|number_format:0:".":"."}
                                                        VNĐ</h4>
                                                </div>
                                                <button onclick="deleteProductCart({$key})" class="delete"><i
                                                        class="fa fa-close" style="font-size: 18px"></i></button>
                                                {$total=$total+($item.price * $item.number_product)}
                                            </div>
                                        {/foreach}
                                    {/if}
                                </div>
                                {if !empty($cart)}
                                    <div class="cart-summary">
                                        <small><b>Có {$cart|@count} sản phẩm trong giỏ hàng</b></small>
                                        <h5>Tổng cộng: {$total|number_format:0:".":"."} VNĐ</h5>
                                    </div>
                                {/if}
                                <div class="cart-btns">
                                    {if empty($customer) }
                                        <a href="{$this->url(['controller' => 'index', 'action' => 'login'])}">Đặt hàng
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    {else}
                                        <a href="{$this->url(['controller' => 'index', 'action' => 'checkout'])}">Đặt hàng
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{$this->url(['controller' => 'index', 'action' => 'index'])}">Trang chủ</a>
                </li>
                {foreach $list_brand as $brand}
                    {if $brand.id < 10}
                        <li><a id="{$brand.id}" onclick="addActive({$brand.id})"
                                href="{{$this->url(['controller' => 'index', 'action' => 'view'])}}?brand_id={$brand.id}">{$brand.brand_name}</a>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        </div>
    </div>
</nav>
