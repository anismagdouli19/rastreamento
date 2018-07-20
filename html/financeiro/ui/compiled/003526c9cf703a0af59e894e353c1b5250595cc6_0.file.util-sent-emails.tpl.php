<?php
/* Smarty version 3.1.30, created on 2018-07-07 22:42:56
  from "/var/www/html/financeiro/ui/theme/ibilling/util-sent-emails.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b416c201befc7_07761249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '003526c9cf703a0af59e894e353c1b5250595cc6' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/util-sent-emails.tpl',
      1 => 1530802256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_5b416c201befc7_07761249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Records'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['found'];?>

                    . <?php echo $_smarty_tpl->tpl_vars['_L']->value['Page'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['page'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['of'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['lastpage'];?>
. </h5>
                



            </div>
            <div class="ibox-content" id="application_ajaxrender">


                <table class="table table-bordered sys_table" id="sys_logs">
                    <thead>
                    <tr>
                        <th width="5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ID'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sent To'];?>
</th>
                        <th width="60%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['subject'];?>
</td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/view-email/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-envelope-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a></td>

                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </tbody>
                </table>

                <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>


            </div>


        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
