<?php
/* Smarty version 3.1.30, created on 2018-04-06 07:38:22
  from "/var/www/html/financeiro/ui/theme/ibilling/client-quote.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac74e1ea1d401_26488310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f647863ebe5054d8a2532e672168c6a87d13a3f' => 
    array (
      0 => '/var/www/html/financeiro/ui/theme/ibilling/client-quote.tpl',
      1 => 1474985470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac74e1ea1d401_26488310 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quote'];?>
 - <?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/skins/all.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/css/animate.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/custom.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/css/ribbon.css" rel="stylesheet">

    <?php if ($_smarty_tpl->tpl_vars['_c']->value['rtl'] == '1') {?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/css/style-rtl.min.css" rel="stylesheet">
    <?php }?>

    <?php if (isset($_smarty_tpl->tpl_vars['xheader']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['xheader']->value;?>

    <?php }?>
    <style type="text/css">
        body {

            background-color: #FAFAFA;
            overflow-x: visible;
        }
        .paper {
            margin: 50px auto;
            width: 980px;
            border: 2px solid #DDD;
            background-color: #FFF;
            position: relative;
           font-size: 14px;
        }
    </style>
</head>

<body class="fixed-nav">

<div class="paper">

    <section class="panel">
        <div class="panel-body">

            <div class="invoice">
                <header class="clearfix">
                    <div class="row">
                        <div class="col-md-12 mt-md">
                            <h2 class="h2 mt-none mb-sm text-dark text-bold"><?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
</h2>
                            <h4 class="h4 m-none text-dark text-bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quote'];?>
 #<?php echo $_smarty_tpl->tpl_vars['d']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['d']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
 <?php }?></h4>

                        </div>

                    </div>
                </header>
                <div class="bill-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bill-to">
                                <p class="h5 mb-xs text-dark text-semibold"><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recipient'];?>
:</strong></p>
                                <address>
                                    <?php if ($_smarty_tpl->tpl_vars['a']->value['company'] != '') {?>
                                        <?php echo $_smarty_tpl->tpl_vars['a']->value['company'];?>

                                        <br>
                                        <?php echo $_smarty_tpl->tpl_vars['_L']->value['ATTN'];?>
: <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                                        <br>
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>

                                        <br>
                                    <?php }?>

                                    <?php echo $_smarty_tpl->tpl_vars['a']->value['address'];?>
 <br>
                                    <?php echo $_smarty_tpl->tpl_vars['a']->value['city'];?>
 <br>
                                    <?php echo $_smarty_tpl->tpl_vars['a']->value['state'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['zip'];?>
 <br>
                                    <?php echo $_smarty_tpl->tpl_vars['a']->value['country'];?>

                                    <br>
                                    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['phone'];?>

                                    <br>
                                    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['a']->value['email'];?>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'cfs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cfs']->value) {
?>
                                        <br>
                                        <strong><?php echo $_smarty_tpl->tpl_vars['cfs']->value['fieldname'];?>
: </strong> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['cfs']->value['id'],$_smarty_tpl->tpl_vars['a']->value['id']);?>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                                    <?php echo $_smarty_tpl->tpl_vars['x_html']->value;?>

                                </address>





                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bill-data text-right">
                                <address class="ib mr-xlg">
                                    <?php echo $_smarty_tpl->tpl_vars['_c']->value['caddress'];?>

                                </address>
                                <div class="ib">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
application/storage/system/logo.png" alt="Logo">
                                </div>
                                <p class="mb-none mt-lg">
                                    <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Created'];?>
:</span>
                                    <span class="value"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['d']->value['datecreated']));?>
</span>
                                </p>
                                <p class="mb-none">
                                    <span class="text-dark"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expiry Date'];?>
:</span>
                                    <span class="value"><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['d']->value['validuntil']));?>
</span>
                                </p>
                                <h2> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
: <?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['total'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
 </h2>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['proposal'];?>

                        <hr>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table invoice-items">
                        <thead>
                        <tr class="h4 text-dark">
                            <th id="cell-id" class="text-semibold">#</th>
                            <th id="cell-item" class="text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item'];?>
</th>

                            <th id="cell-price" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                            <th id="cell-qty" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quantity'];?>
</th>
                            <th id="cell-total" class="text-center text-semibold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['itemcode'];?>
</td>
                                <td class="text-semibold text-dark"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</td>

                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['amount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>
</td>
                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['item']->value['total'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
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

                <div class="invoice-summary">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table h5 text-dark">
                                <tbody>
                                <tr class="b-top-none">
                                    <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subtotal'];?>
</td>
                                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['subtotal'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                </tr>
                                <?php if (($_smarty_tpl->tpl_vars['d']->value['discount']) != '0.00') {?>
                                    <tr>
                                        <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Discount'];?>
</td>
                                        <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['discount'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                    </tr>
                                <?php }?>
                                <tr>
                                    <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['d']->value['taxname'];?>
</td>
                                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['tax1'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                </tr>

                                <tr class="h4">
                                    <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Grand Total'];?>
</td>
                                    <td class="text-left"><?php echo $_smarty_tpl->tpl_vars['_c']->value['currency_code'];?>
 <?php echo number_format($_smarty_tpl->tpl_vars['d']->value['total'],2,$_smarty_tpl->tpl_vars['_c']->value['dec_point'],$_smarty_tpl->tpl_vars['_c']->value['thousands_sep']);?>
</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['customernotes'];?>

                    </div>
                </div>
            </div>


            <div class="text-right">

                <br>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/qpdf/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
/token_<?php echo $_smarty_tpl->tpl_vars['d']->value['vtoken'];?>
" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Download PDF'];?>
</a>

            </div>
        </div>
    </section>

</div>

<!-- Mainly scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-ui-1.10.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var _L = [];
    var config_animate = 'No';
    <?php if (($_smarty_tpl->tpl_vars['_c']->value['animate']) == '1') {?>
    var config_animate = 'Yes';
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['jsvar']->value;?>

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.metisMenu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
<!-- Custom and plugin javascript -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/moment.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/app.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/pace.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/progress.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/bootbox.min.js"><?php echo '</script'; ?>
>

<!-- iCheck -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/icheck.min.js"><?php echo '</script'; ?>
>
<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }
echo '<script'; ?>
>
    jQuery(document).ready(function() {

        <?php if (isset($_smarty_tpl->tpl_vars['xjq']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>

    });

<?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
