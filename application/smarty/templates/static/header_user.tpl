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
                <li><a href="#"><i class="fa fa-user-plus"></i> Đăng Ký</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i> Đăng Nhập</a></li>
                {if isset($user_login) }
                    <li><a href="#"><i class="fa fa-sign-out"></i>Đăng Xuất</a></li>
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
                                <div class="qty">0</div>
                            </a>

                            <div class="cart-dropdown">
                                <div class="cart-list">


                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="../../asset/user/img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                </div>

                                <div class="cart-summary">
                                    <small>có ... sản phẩm</small>
                                    <h5>Tổng cộng: </h5>
                                </div>

                                <div class="cart-btns">
                                    <a href="#">Giỏ hàng</a>
                                    <a href="{$this->url(['controller' => 'index', 'action' => 'checkout'])}">Đặt hàng
                                        <i class="fa fa-arrow-circle-right"></i></a>
                                </div>

                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{$this->url(['controller' => 'index', 'action' => 'index'])}">Trang chủ</a></li>
               {foreach $list_category as $category}
                    <li><a href="#">{$category.category_name}</a></li>
                {/foreach}
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->