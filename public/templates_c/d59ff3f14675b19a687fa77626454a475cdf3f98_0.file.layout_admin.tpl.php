<?php
/* Smarty version 4.0.0, created on 2022-01-04 06:00:02
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\layout_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61d37ff226fa52_86037164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd59ff3f14675b19a687fa77626454a475cdf3f98' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\layout_admin.tpl',
      1 => 1641250799,
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
function content_61d37ff226fa52_86037164 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin page</title>

    <link rel="stylesheet" type="text/css" href="../../asset/admin/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../asset/admin/dataTable/jquery.dataTables.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../asset/admin/css/layout.css" />
</head>

<body>
    <!-- Custom scripts for all pages-->

    <?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/jquery/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>

            <div id="header">
            <?php $_smarty_tpl->_subTemplateRender("file:header_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>

        <div id="includetpl">
            <div class="wrapper">

                <?php $_smarty_tpl->_subTemplateRender("file:menu_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                <div id="content"  style="width: 100%;">
                    <div class="container-fluid" style="margin-bottom: 40px;">
                        <div class="d-flex justify-content-start mt-3">
                            <div>
                                <button type="button" id="sidebarCollapse" class="btn btn-info my-1">
                                    <i class="fas fa-align-left"></i>
                                    <span>
                                        <- </span>
                                </button>
                            </div>

                            <div  style="width: 100%;">
                                <?php echo ($_smarty_tpl->tpl_vars['this']->value->layout()->content);?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer">
            <?php $_smarty_tpl->_subTemplateRender("file:footer_admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    

    <?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/bootstrap/js/bootstrap.bundle.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/dataTable/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="UTF-8" src="../../asset/admin/js/index.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
