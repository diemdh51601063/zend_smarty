<?php
/* Smarty version 4.0.0, created on 2022-01-10 18:49:47
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\layout_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61dc1d5ba846c5_20387453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd59ff3f14675b19a687fa77626454a475cdf3f98' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\layout_admin.tpl',
      1 => 1641511008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_admin.tpl' => 1,
    'file:menu_admin.tpl' => 1,
    'file:footer_admin.tpl' => 1,
  ),
),false)) {
function content_61dc1d5ba846c5_20387453 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin page</title>

    <link rel="stylesheet" type="text/css" href="../../asset/admin/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../asset/admin/dataTable/jquery.dataTables.min.css"/>
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../../asset/admin/css/layout.css"/>
    <link rel="stylesheet" href="../../asset/user/css/font-awesome.min.css">
</head>

<body>
<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/jquery/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/script.js"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['this']->value->admin != '') {?>
    <?php if ($_smarty_tpl->tpl_vars['this']->value->arrParam['action'] != 'login') {?>
        <div id="header">
            <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div id="includetpl">
            <div class="wrapper">
                <?php $_smarty_tpl->_subTemplateRender("file:menu_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <div class="content_load">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info mt-3">
                            <span>
                                <->
                            </span>
                        </button>

                        <div>
                            <?php echo ($_smarty_tpl->tpl_vars['this']->value->layout()->content);?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <?php $_smarty_tpl->_subTemplateRender("file:footer_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
<?php }
} else { ?>
    <?php echo ($_smarty_tpl->tpl_vars['this']->value->layout()->content);?>

<?php }?>

<?php echo '<script'; ?>
 type="text/javascript" src="../../asset/admin/bootstrap/js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../asset/admin/dataTable/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../asset/admin/js/menu.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
