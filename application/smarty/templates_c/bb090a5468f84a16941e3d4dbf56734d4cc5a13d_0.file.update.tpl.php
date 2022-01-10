<?php
/* Smarty version 4.0.0, created on 2022-01-10 23:26:03
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\category\update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc5e1b167c38_72093962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb090a5468f84a16941e3d4dbf56734d4cc5a13d' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\category\\update.tpl',
      1 => 1641831894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61dc5e1b167c38_72093962 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['this']->value->title;?>
</h3>
<div class="mx-5" style="background-color: white; padding: 10px; border-radius: 10px;">
    <form class="mx-5 my-5"
        onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'category','action'=>'update'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
?id=<?php echo $_smarty_tpl->tpl_vars['detail_category']->value['id'];?>
')"
        method="post" id="formAdd">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tên Danh Mục</label>
            <div class="col-sm-10">
                <?php if ((isset($_smarty_tpl->tpl_vars['error_value']->value['category_name']))) {?>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $_smarty_tpl->tpl_vars['error_value']->value['category_name'];?>
">
                <?php } else { ?>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $_smarty_tpl->tpl_vars['detail_category']->value['category_name'];?>
">
                <?php }?>
                
                <?php if ((isset($_smarty_tpl->tpl_vars['error_input']->value['category_name']))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['error_input']->value['category_name'], 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                        <span class="err_input">* <?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</span><br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </form>
</div><?php }
}
