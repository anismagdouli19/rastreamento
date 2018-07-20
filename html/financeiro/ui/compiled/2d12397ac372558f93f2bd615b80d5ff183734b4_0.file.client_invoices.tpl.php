<?php
/* Smarty version 3.1.30, created on 2018-06-25 20:44:30
  from "/var/www/html/financeiro/ui/theme/ibilling/client_invoices.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b317e5ea5deb3_46510914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d12397ac372558f93f2bd615b80d5ff183734b4' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/client_invoices.tpl',
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
function content_5b317e5ea5deb3_46510914 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="ibox float-e-margins">
    <div class="ibox-title">


            <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
 : <?php echo $_smarty_tpl->tpl_vars['total_invoice']->value;?>
</h5>


    </div>
    <div class="ibox-content">



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
                <th>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>

                </th>
                
                <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
            </tr>
            </thead>
            <tbody>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                <tr>
                    <td><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['ds']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
 <?php }?></a> </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
 </td>
                    <td class="amount" data-a-sign="<?php if ($_smarty_tpl->tpl_vars['ds']->value['currency_symbol'] == '') {?> <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['currency_symbol'];
}?> "><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']));?>
</td>
                    <td>

                        <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Unpaid') {?>
                            <span class="label label-danger"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Paid') {?>
                            <span class="label label-success"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Partially Paid') {?>
                            <span class="label label-info"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Cancelled') {?>
                            <span class="label"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                        <?php } else { ?>
                            <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>

                        <?php }?>



                    </td>
                    
                        
                            
                        
                            
                        
                    
                    <td class="text-right">
                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/ipdf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/dl/" class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Download'];?>
</a>
                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
iview/print/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Print'];?>
</a>

                    </td>
                </tr>

                <?php
}
} else {
?>


                <tr>
                    <td colspan="8">
                        You do not have any Invoice.
                    </td>
                </tr>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


            </tbody>



        </table>

    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
