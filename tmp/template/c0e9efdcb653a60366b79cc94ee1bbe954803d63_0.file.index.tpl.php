<?php
/* Smarty version 3.1.29, created on 2016-07-19 00:51:03
  from "/var/www/html/siscg_bot/views/error/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578db1b79f4278_67387199',
  'file_dependency' => 
  array (
    'c0e9efdcb653a60366b79cc94ee1bbe954803d63' => 
    array (
      0 => '/var/www/html/siscg_bot/views/error/index.tpl',
      1 => 1467572740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578db1b79f4278_67387199 ($_smarty_tpl) {
?>
<div id="error_form">

<p>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }?>
</p>
<br>
    <?php if (Session::getSession('autenticado')) {?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir a inicio</a> | <a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>
    <?php } else { ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesion</a>
    <?php }?>
</div><?php }
}
