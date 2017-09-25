<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:03:13
  from "/var/www/html/siscg_bot/views/layout/default/template.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d8a61f3eea1_03870646',
  'file_dependency' => 
  array (
    '31ed608702ab667255d636f9b1a4f4cef9411787' => 
    array (
      0 => '/var/www/html/siscg_bot/views/layout/default/template.tpl',
      1 => 1468705802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:scripts.tpl' => 1,
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_578d8a61f3eea1_03870646 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Julio Aponte">
    <title><?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_name'];?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
elegant-icons-style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
style-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
sweetalert.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
DataTables/dataTables.bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
responsive.bootstrap.min.css" type="text/css">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery-1.12.4.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery.validate.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
form-validation-script.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery.scrollTo.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery.nicescroll.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
scripts.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
master.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
sweetalert.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
DataTables/jquery.dataTables.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
DataTables/dataTables.bootstrap.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
dataTables.responsive.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
responsive.bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo '</script'; ?>
>
</head>
<body>
<!-- container section start -->
<section id="container" class="">
<!--header start-->
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
" class="logo">S.C.G. <span class="lite">Admin Ver 0.1</span></a>
        <!--logo end-->

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <!-- inbox notificatoin start-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        <span class="username"><?php echo $_SESSION['nombre'];?>
</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
cpass?user=<?php echo $_SESSION['userlogin'];?>
"><i class="icon_profile"></i> Cambiar Password</a>
                        </li>
                        <li>
                            <a href="#" onclick="javascript:logout();"><i class="icon_key_alt"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
<!--header end-->

<!--sidebar menu start-->
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--sidebar menu end-->

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!-- Form validations -->
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
</section>
<!-- container section end -->

<!-- seccion file include js modules -->
<?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['file']) && count($_smarty_tpl->tpl_vars['_layoutParams']->value['file'])) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['file'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_fi_0_saved_item = isset($_smarty_tpl->tpl_vars['fi']) ? $_smarty_tpl->tpl_vars['fi'] : false;
$_smarty_tpl->tpl_vars['fi'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['fi']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['fi']->value) {
$_smarty_tpl->tpl_vars['fi']->_loop = true;
$__foreach_fi_0_saved_local_item = $_smarty_tpl->tpl_vars['fi'];
?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['fi']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>
    <?php
$_smarty_tpl->tpl_vars['fi'] = $__foreach_fi_0_saved_local_item;
}
if ($__foreach_fi_0_saved_item) {
$_smarty_tpl->tpl_vars['fi'] = $__foreach_fi_0_saved_item;
}
}?>
<!-- seccion file include js modules -->

<!-- seccion script include js modules -->
<?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js']) && count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_js_1_saved_item = isset($_smarty_tpl->tpl_vars['js']) ? $_smarty_tpl->tpl_vars['js'] : false;
$_smarty_tpl->tpl_vars['js'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['js']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
$__foreach_js_1_saved_local_item = $_smarty_tpl->tpl_vars['js'];
?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>
    <?php
$_smarty_tpl->tpl_vars['js'] = $__foreach_js_1_saved_local_item;
}
if ($__foreach_js_1_saved_item) {
$_smarty_tpl->tpl_vars['js'] = $__foreach_js_1_saved_item;
}
}?>
<!-- seccion script include js modules -->
</body>
</html><?php }
}
