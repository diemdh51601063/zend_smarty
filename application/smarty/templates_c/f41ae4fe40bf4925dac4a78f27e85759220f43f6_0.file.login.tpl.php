<?php
/* Smarty version 4.0.0, created on 2021-12-30 06:25:27
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61ccee675c52d9_22024034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f41ae4fe40bf4925dac4a78f27e85759220f43f6' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\login.tpl',
      1 => 1640820323,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ccee675c52d9_22024034 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<body>

<h1>LOGIN ADMIN</h1>

<form>
  <label for="fname">Account:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Password:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html><?php }
}
