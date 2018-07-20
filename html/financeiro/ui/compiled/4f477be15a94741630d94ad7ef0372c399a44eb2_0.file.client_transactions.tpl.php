<?php
/* Smarty version 3.1.30, created on 2018-03-23 00:58:08
  from "/var/www/html/ui/theme/ibilling/client_transactions.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ab47b504c9bd1_83717937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f477be15a94741630d94ad7ef0372c399a44eb2' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/client_transactions.tpl',
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
function content_5ab47b504c9bd1_83717937 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
 : <?php echo count($_smarty_tpl->tpl_vars['d']->value);?>
 </h5>

            </div>
            <div class="ibox-content">

                <table class="table table-bordered sys_table">
                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dr'];?>
</th>
                    <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cr'];?>
</th>
                    
                    
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                        <tr class="<?php if ($_smarty_tpl->tpl_vars['ds']->value['cr'] == '0.00') {?>warning <?php } else { ?>info<?php }?>">
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                            
                            

                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Income') {?>
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Expense') {?>
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Received'];?>

                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['type'] == 'Transfer') {?>
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Transfer'];?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['type'];?>

                                <?php }?>
                            </td>

                            <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                            <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['dr'];?>
</td>
                            <td class="text-right amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['cr'];?>
</td>
                            
                            
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>




                </table>

            </div>
        </div>

    </div>

    <!-- Widget-1 end-->

    <!-- Widget-2 end-->
</div> <!-- Row end-->


<!-- Row end-->


<!-- Row end-->

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
