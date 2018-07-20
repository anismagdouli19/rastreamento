<?php
/* Smarty version 3.1.30, created on 2018-03-06 23:32:05
  from "/var/www/html/ui/theme/ibilling/reorder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f4f254b0b27_63136040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '404c0db6fd9d274003c3df1d87e8f2199694a000' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/reorder.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_5a9f4f254b0b27_63136040 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reorder'];?>
 <?php echo $_smarty_tpl->tpl_vars['ritem']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Positions'];?>
</h5>

            </div>
            <div class="ibox-content">


                <span id="resp"><?php echo $_smarty_tpl->tpl_vars['_L']->value['drag_n_drop_help'];?>
</span>
                <ol class="rounded-list" id="sorder">


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                        <li id='recordsArray_<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
'><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['ds']->value[$_smarty_tpl->tpl_vars['display_name']->value];?>
</a></li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                </ol>

            </div>
        </div>



    </div>



</div>




<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
