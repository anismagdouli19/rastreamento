<?php
/* Smarty version 3.1.30, created on 2018-03-11 13:11:45
  from "/var/www/html/ui/theme/ibilling/view-email.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa5554172ea09_34356434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a4aa1bd054b0f998578b6bb78c0738faf3a4d9c' => 
    array (
      0 => '/var/www/html/ui/theme/ibilling/view-email.tpl',
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
function content_5aa5554172ea09_34356434 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row animated fadeInDown">
    <div class="col-lg-12"  id="application_ajaxrender">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5> <?php echo $_smarty_tpl->tpl_vars['d']->value['subject'];?>
 </h5>

                <div class="ibox-tools">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
util/sent-emails" class="btn btn-info btn-xs"><i class="fa fa-mail-reply-all"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To Emails'];?>
</a>
                </div>

            </div>
            <div class="ibox-content">

                <?php echo $_smarty_tpl->tpl_vars['d']->value['message'];?>


            </div>


        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
