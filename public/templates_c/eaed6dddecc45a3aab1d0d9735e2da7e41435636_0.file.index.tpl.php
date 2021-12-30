<?php
/* Smarty version 4.0.0, created on 2021-12-30 11:06:10
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61cd3032407990_14629370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eaed6dddecc45a3aab1d0d9735e2da7e41435636' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\index.tpl',
      1 => 1640834919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61cd3032407990_14629370 (Smarty_Internal_Template $_smarty_tpl) {
?><p>
  <?php echo $_smarty_tpl->tpl_vars['hello']->value;?>

<h1>LOGIN ADMIN</h1>

<form>
    <label for="fname">Account:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Password:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <input type="submit" value="Submit">
</form>
</p>
<?php }
}
