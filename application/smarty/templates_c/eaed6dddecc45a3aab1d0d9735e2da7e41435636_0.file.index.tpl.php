<?php
/* Smarty version 4.0.0, created on 2021-12-31 17:04:02
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61ced5921e2941_68903456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaed6dddecc45a3aab1d0d9735e2da7e41435636' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\index.tpl',
      1 => 1640945041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ced5921e2941_68903456 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'view'));?>
">view</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'index'));?>
">admin</a>
    </p>
    <h1>LOGIN ADMIN</h1>
    

    <div>
        <table id="table_example" style="width: 100%">
            <thead>
                <tr style="text-align: center">
                    <th>ID</th>
                    <th style="width: 30%">First Name</th>
                    <th style="width: 30%">Last Name</th>
                    <th>Last Update</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listItem']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <tr style="text-align: center">
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['actor_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['first_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['last_name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['last_update'];?>
</td>
                    <td><button style="padding-right: 10px">Edit</button>   <button>Delete</button></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>


<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/table_product.js"><?php echo '</script'; ?>
>
<?php }
}
