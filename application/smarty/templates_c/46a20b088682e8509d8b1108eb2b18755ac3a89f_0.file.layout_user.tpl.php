<?php
/* Smarty version 4.0.0, created on 2021-12-29 23:11:41
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\layout_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61cc88bda3f3e5_74532383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46a20b088682e8509d8b1108eb2b18755ac3a89f' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\layout_user.tpl',
      1 => 1640793348,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_user.tpl' => 1,
    'file:footer_user.tpl' => 1,
  ),
),false)) {
function content_61cc88bda3f3e5_74532383 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<body>

<h1>LAYOUT USER</h1>
<p>My first paragraph.</p>
<div id="header">
  <?php $_smarty_tpl->_subTemplateRender("file:header_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php echo $_smarty_tpl->tpl_vars['this']->value->layout()->content;?>


<div id="footer">
  <?php $_smarty_tpl->_subTemplateRender("file:footer_user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>


</body>
</html><?php }
}
