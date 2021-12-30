<?php
/* Smarty version 4.0.0, created on 2021-12-31 05:12:07
  from 'C:\laragon\www\zend_smarty\application\smarty\templates\index\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_61ce2eb775cfd8_30519615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f86725ab2891809c7af3c62ac936b501a55ec9f5' => 
    array (
      0 => 'C:\\laragon\\www\\zend_smarty\\application\\smarty\\templates\\index\\view.tpl',
      1 => 1640902317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61ce2eb775cfd8_30519615 (Smarty_Internal_Template $_smarty_tpl) {
?><p>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    <a href="<?php echo $_smarty_tpl->tpl_vars['this']->value->url(array('controller'=>'index','action'=>'index'));?>
">home</a>
</p>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php }
}
