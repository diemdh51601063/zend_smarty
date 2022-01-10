<?php
/* Smarty version 4.0.0, created on 2022-01-10 18:49:58
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\static\menu_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc1d66a016f1_34574458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb886aed66ef6f2cf1a13b3e3a66743f2864b5cc' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\static\\menu_admin.tpl',
      1 => 1641814919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc1d66a016f1_34574458 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Sidebar -->

<style>
    .menu_active {
        background-color: #d90000;
        color: #fff;
    }
</style>
<nav id="sidebar">
    <ul class="list-unstyled components ">
                <p><a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'index'));?>
">MENU</a></p>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Đơn Hàng</a>
            <ul class="collapse list-unstyled " id="homeSubmenu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'order'));?>
?type=1">Chưa
                        xác nhận</a>
                </li>
                <li>
                    <a onclick="" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'order'));?>
?type=2">Đã xác
                        nhận</a>
                </li>
                <li>
                    <a onclick="" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'order'));?>
?type=3">Đã
                        hủy</a>
                </li>
                <li>
                    <a onclick="" href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'order'));?>
?type=4">Hoàn
                        tất</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sản
                phẩm</a>
            <ul class="collapse list-unstyled" id="productSubmenu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'product','action'=>'add'));?>
">Thêm sản phẩm</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'product'));?>
">Danh sách sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#categorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Danh mục</a>
            <ul class="collapse list-unstyled" id="categorySubmenu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'category','action'=>'add'));?>
">Thêm danh mục</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'category'));?>
">Danh sách danh mục</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#brandSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thương hiệu</a>
            <ul class="collapse list-unstyled" id="brandSubmenu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'brand','action'=>'add'));?>
">Thêm thương hiệu</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'brand'));?>
">Danh sách thương hiệu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'customer'));?>
">Danh sách khách hàng</a>
        </li>
    </ul>

</nav>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        var full_href = window.location.pathname;
        var url = window.location.search;
        var active_url = full_href + url;

        $('#sidebar ul li').each(function () {
            //console.log($(this).children('a').attr('href') == active_url);
            if ($(this).children('a').attr('href') == active_url) {
                $(this).children('a').addClass('menu_active');
                var this_parent = $(this).parent('ul').parent().find('a');
                this_parent[0].click();
            }
        });
    });
<?php echo '</script'; ?>
><?php }
}
