<?php
/* Smarty version 4.0.0, created on 2022-01-05 10:15:47
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\header_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d50d630dc261_44141035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a88290c5edc2487a26b7474d11be34f178e173b5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\header_user.tpl',
      1 => 1641349891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61d50d630dc261_44141035 (Smarty_Internal_Template $_smarty_tpl) {
?>		<!-- HEADER -->
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
		                <li><a href="#"><i class="fa fa-user-plus"></i> Sign Up</a></li>
		                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
						<li><a href="#"><i class="fa fa-sign-out"></i> Sign Out</a></li>
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
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listCategory']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</option>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		                            </select>
		                            <input class="input" placeholder="Search here">
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
		                                <span>Your Cart</span>
		                                <div class="qty">3</div>
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

		                                    <div class="product-widget">
		                                        <div class="product-img">
		                                            <img src="../../asset/user/img/product02.png" alt="">
		                                        </div>
		                                        <div class="product-body">
		                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
		                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
		                                        </div>
		                                        <button class="delete"><i class="fa fa-close"></i></button>
		                                    </div>
		                                </div>
		                                <div class="cart-summary">
		                                    <small>3 Item(s) selected</small>
		                                    <h5>SUBTOTAL: $2940.00</h5>
		                                </div>
		                                <div class="cart-btns">
		                                    <a href="#">View Cart</a>
		                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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
		                <li class="active"><a href="#">Home</a></li>
		                <li><a href="#">Hot Deals</a></li>
		                <li><a href="#">Categories</a></li>
		                <li><a href="#">Laptops</a></li>
		                <li><a href="#">Smartphones</a></li>
		                <li><a href="#">Cameras</a></li>
		                <li><a href="#">Accessories</a></li>
		            </ul>
		            <!-- /NAV -->
		        </div>
		        <!-- /responsive-nav -->
		    </div>
		    <!-- /container -->
		</nav>
<!-- /NAVIGATION --><?php }
}
