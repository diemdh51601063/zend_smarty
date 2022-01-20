<?php
/* Smarty version 4.0.0, created on 2022-01-19 22:22:13
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\admin\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61e82ca5c7fb41_82896562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f41ae4fe40bf4925dac4a78f27e85759220f43f6' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\admin\\login.tpl',
      1 => 1641986898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e82ca5c7fb41_82896562 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .container-fluid {
        height: 100%;
        position: relative;
        background-color: rgb(142, 243, 209);
    }


    .vertical-center {
        min-width: 30%;
        border-radius: 15px;
        background-color: white;
        padding: 20px;
        margin: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .vertical-center h3 {
        text-align: center;
        margin: 20px;
    }

    .vertical-center button {
        background-color: mediumaquamarine;
        margin: 20px;
        color: whitesmoke;
    }

    .login_error{
        color: red;
        text-align: center;
        font-weight: 600;
    }
</style>



<div class="container-fluid">
    <div class="vertical-center">
        <h3>Đăng Nhập</h3>

        <form  onsubmit="onSubmitForm('<?php ob_start();
echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'admin','action'=>'login'));
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
')" method="post" id="formAdd">
            <div class="form-group">
                <label class="font-weight-bold">Admin name</label>
                <input type="text" class="form-control" id="login_name" name="login_name" placeholder="Admin name">
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="row justify-content-center">
                <?php if ((isset($_smarty_tpl->tpl_vars['message_error']->value))) {?>
                    <span class="login_error"><?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
</span>
                <?php }?>
                <button type="submit" class="btn btn-block">Log In</button>
            </div>
        </form>
    </div>
</div>

<?php echo '<script'; ?>
>
    function onSubmitForm(url) {
        document.getElementById("formAdd").action = url;
        document.getElementById("formAdd").submit();
        return true;
    };
<?php echo '</script'; ?>
><?php }
}
