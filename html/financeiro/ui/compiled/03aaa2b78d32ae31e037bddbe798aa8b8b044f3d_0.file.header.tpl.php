<?php
/* Smarty version 3.1.30, created on 2018-04-03 21:22:19
  from "/var/www/html/financeiro/ui/theme/ibilling/sections/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac428cbd3e6a9_13276821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03aaa2b78d32ae31e037bddbe798aa8b8b044f3d' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/sections/header.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac428cbd3e6a9_13276821 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tplheader']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['content_inner']->value != '') {?>
    <?php echo $_smarty_tpl->tpl_vars['content_inner']->value;?>

<?php }
}
}
