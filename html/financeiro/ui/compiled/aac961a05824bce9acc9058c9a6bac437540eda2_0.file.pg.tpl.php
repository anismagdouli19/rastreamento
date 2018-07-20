<?php
/* Smarty version 3.1.30, created on 2018-04-15 00:45:15
  from "/var/www/html/financeiro/ui/theme/ibilling/pg.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad2cacb7a75d5_28427307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aac961a05824bce9acc9058c9a6bac437540eda2' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/pg.tpl',
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
function content_5ad2cacb7a75d5_28427307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payment Gateways'];?>
</h5>

            </div>
            <div class="ibox-content">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
reorder/pg/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Reorder Payment Gateways'];?>
</a>
                <br>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>

                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logo'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Gateway Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Setting Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Value'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
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

                            <td>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg-conf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['logo'] != '') {?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['ds']->value['logo'];?>
">
                                        <?php } else { ?>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/pg/<?php echo $_smarty_tpl->tpl_vars['ds']->value['processor'];?>
.png">
                                    <?php }?>

                                </a>
                            </td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg-conf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
</a> </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['settings'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['value'];?>
</td>

                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Inactive') {?>
                                    <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inactive'];?>
</span>
                                <?php } else { ?>
                                    <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
</span>
                                <?php }?>

                            </td>

                            <td class="text-right">

                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/pg-conf/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>

                            </td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                    </tbody>
                </table>

            </div>
        </div>



    </div>



</div>




<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
