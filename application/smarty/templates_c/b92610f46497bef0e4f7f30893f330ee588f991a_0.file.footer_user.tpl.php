<?php
/* Smarty version 4.0.0, created on 2022-01-19 22:22:19
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\footer_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e82cabd3e330_68537678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b92610f46497bef0e4f7f30893f330ee588f991a' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\footer_user.tpl',
      1 => 1642367008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e82cabd3e330_68537678 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Cần hỗ trợ hoặc liên hệ</p>
                        <form>
                            <input class="input" type="email" placeholder="Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i></button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Thông Tin Giới Thiệu</h3>
                            <p>
                            Tai nghe Bluetooth
                            <br>
                            Tai nghe chụp đầu
                            </p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Pho Quang</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6 text-right">
                        <div class="footer">
                            <h3 class="footer-title">Danh Mục Nổi Bật</h3>
                            <ul class="footer-links">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_category']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] < 5) {?>
                                        <li><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
?category_id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>
</a></li>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6 text-right">
                        <div class="footer">
                            <h3 class="footer-title">Thương Hiệu</h3>
                            <ul class="footer-links">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_brand']->value, 'brand');
$_smarty_tpl->tpl_vars['brand']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['brand']->value['id'] < 5) {?>
                                        <li><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
?brand_id=<?php echo $_smarty_tpl->tpl_vars['brand']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['brand']->value['brand_name'];?>
</a></li>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->
    </footer>
<!-- /FOOTER --><?php }
}
