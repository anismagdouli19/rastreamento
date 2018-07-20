<?php
/* Smarty version 3.1.30, created on 2018-07-06 12:08:51
  from "/var/www/html/financeiro/ui/theme/ibilling/appearance_customize.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b3f8603345126_29104606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1267dbb6ba5dd8054079a9809261cff27e5f267c' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/appearance_customize.tpl',
      1 => 1530802257,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sections/header.tpl' => 1,
    'file:sections/footer.tpl' => 1,
  ),
),false)) {
function content_5b3f8603345126_29104606 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<div class="row">
    <div class="col-md-6">


        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logo'];?>
</h5>


            </div>
            <div class="ibox-content">

                <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/system/logo.png" alt="Logo">
                <br><br>

                <form role="form" name="logo" enctype="multipart/form-data" method="post"
                      action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/logo-post/">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload New Logo</label>
                        <input type="file" id="file" name="file">

                        <p class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['This will replace existing logo'];?>
 -
                            application/storage/system/logo.png</p>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>


            </div>
        </div>





        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Client Portal Custom Scripts'];?>
</h5>


            </div>
            <div class="ibox-content">


                <form role="form" name="logo" method="post"
                      action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/custom_scripts/">
                    <div class="form-group">
                        <label for="header_scripts"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Header Scripts'];?>
</label>

                        <textarea class="form-control" id="header_scripts" name="header_scripts"
                                  rows="4"><?php echo $_smarty_tpl->tpl_vars['_c']->value['header_scripts'];?>
</textarea>

                    </div>
                    <div class="form-group">
                        <label for="footer_scripts"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Footer Scripts'];?>
</label>

                        <textarea class="form-control" id="footer_scripts" name="footer_scripts"
                                  rows="4"><?php echo $_smarty_tpl->tpl_vars['_c']->value['footer_scripts'];?>
</textarea>

                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>


            </div>
        </div>


    </div>



</div>

<?php $_smarty_tpl->_subTemplateRender("file:sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
