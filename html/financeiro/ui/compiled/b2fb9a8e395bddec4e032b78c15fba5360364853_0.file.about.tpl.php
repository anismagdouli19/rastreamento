<?php
/* Smarty version 3.1.30, created on 2018-03-06 23:39:30
  from "/var/www/html/ui/theme/ibilling/about.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f50e28ac136_36947226',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2fb9a8e395bddec4e032b78c15fba5360364853' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/about.tpl',
      1 => 1478915074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_5a9f50e28ac136_36947226 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-md-12">
        <div id="updateProgressbar" class="progress" style="display: none;">
            <div class="progress progress-striped active">
                <div class="progress-bar" id="ib_progressing" role="progressbar" data-transitiongoal="10"></div>
            </div>
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
