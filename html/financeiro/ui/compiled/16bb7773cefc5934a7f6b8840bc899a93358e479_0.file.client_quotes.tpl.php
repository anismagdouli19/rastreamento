<?php
/* Smarty version 3.1.30, created on 2018-06-25 20:44:41
  from "/var/www/html/financeiro/ui/theme/ibilling/client_quotes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b317e690997a5_15256097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16bb7773cefc5934a7f6b8840bc899a93358e479' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/client_quotes.tpl',
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
function content_5b317e690997a5_15256097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
 : <?php echo $_smarty_tpl->tpl_vars['total_quotes']->value;?>
</h5></h5>
    </div>
    <div class="ibox-content">

        <table class="table table-bordered table-hover sys_table">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                <th width="30%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Created'];?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expiry Date'];?>
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
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
quotes/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</a> </td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['userid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</a> </td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
quotes/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['subject'];?>
</a> </td>
                    <td class="amount"><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['datecreated']));?>
</td>
                    <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['validuntil']));?>
</td>
                    
                        
                            
                        
                            
                        
                            
                        
                            
                        
                            
                        
                            
                        

                    

                    <td class="text-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
quotes/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/qpdf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/dl/" class="btn btn-primary btn-xs" ><i class="fa fa-file-pdf-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Download'];?>
</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/qpdf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['ds']->value['vtoken'];?>
/" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Print'];?>
</a>
                    </td>
                </tr>

                <?php
}
} else {
?>


                <tr>
                    <td colspan="7">
                        You do not have any Quote.
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
