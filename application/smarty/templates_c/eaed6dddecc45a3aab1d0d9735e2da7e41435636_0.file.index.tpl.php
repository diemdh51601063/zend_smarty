<?php
/* Smarty version 4.0.0, created on 2022-01-20 06:40:44
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e8a17ca56162_26871844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaed6dddecc45a3aab1d0d9735e2da7e41435636' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\index.tpl',
      1 => 1642628983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e8a17ca56162_26871844 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- SECTION navbar -->
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
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));?>
" class="cta-btn">Sản phẩm
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
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));?>
" class="cta-btn">Sản phẩm
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
                        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));?>
" class="cta-btn">Sản phẩm
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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_product']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                    <?php if (count($_smarty_tpl->tpl_vars['item']->value['list_image']) != 0) {?>
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../asset/images/products/<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['list_image'][0]['image'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
" alt=""
                                                    style="height: 263px; !important;">
                                                <div class="product-label">
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>

                                            <div class="product-body">
                                                <h3 class="product-name"><a
                                                        href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'detail'));
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                                                </h3>
                                                <h4 class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,".",".");?>
 VNĐ</h4>
                                            </div>

                                            <div class="add-to-cart">
                                                <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'detail'));
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                                    <button class="add-to-cart-btn"><i class="fa fa-list-ul"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_product']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                    <?php if (count($_smarty_tpl->tpl_vars['item']->value['list_image']) != 0) {?>
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="../../asset/images/products/<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['list_image'][0]['image'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
" alt=""
                                                    style="height: 263px; !important;">
                                            </div>

                                            <div class="product-body">
                                                <h3 class="product-name"><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'detail'));
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>
                                                <h4 class="product-price"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,".",".");?>
 VNĐ</h4>
                                            </div>

                                            <div class="add-to-cart">
                                            <a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'detail'));
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                            <button class="add-to-cart-btn"><i class="fa fa-list-ul"></i></button>
                                            </a>
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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

<?php }
}
