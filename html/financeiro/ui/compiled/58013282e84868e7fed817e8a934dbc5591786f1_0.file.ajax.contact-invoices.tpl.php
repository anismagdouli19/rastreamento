<?php
/* Smarty version 3.1.30, created on 2018-03-06 23:40:56
  from "/var/www/html/ui/theme/ibilling/ajax.contact-invoices.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9f5138032167_31695216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58013282e84868e7fed817e8a934dbc5591786f1' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/ajax.contact-invoices.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9f5138032167_31695216 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-bordered table-hover sys_table">
    <thead>
    <tr>
        <th>#</th>
        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
    </tr>
    </thead>
    <tbody>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['i']->value, 'is');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['is']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['is']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['is']->value['account'];?>
</td>
            <td class="amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['_c']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['_c']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['is']->value['total'];?>
</td>
            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['is']->value['date']));?>
</td>
            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['is']->value['duedate']));?>
</td>
            <td><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['is']->value['status']);?>
</td>
            <td>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['is']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['is']->value['id'];?>
/" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    </tbody>
</table><?php }
}
