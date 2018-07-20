<?php
/* Smarty version 3.1.30, created on 2018-03-06 21:02:25
  from "/var/www/html/ui/theme/ibilling/sections/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f4831a2ef19_87618732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b205afd6dc265d426dea7e24db7c8097e0e60ec' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/sections/header.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9f4831a2ef19_87618732 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tplheader']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php if ($_smarty_tpl->tpl_vars['content_inner']->value != '') {?>
    <?php echo $_smarty_tpl->tpl_vars['content_inner']->value;?>

<?php }
}
}
