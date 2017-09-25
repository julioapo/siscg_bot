<?php
/* Smarty version 3.1.29, created on 2016-07-18 23:48:23
  from "/var/www/html/siscg_bot/views/login/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da3077d5033_59125732',
  'file_dependency' => 
  array (
    '9a4581d0df03dc6f80e22780857a84aba1996edd' => 
    array (
      0 => '/var/www/html/siscg_bot/views/login/index.tpl',
      1 => 1468812758,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da3077d5033_59125732 ($_smarty_tpl) {
?>
<div id="error">
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    <?php }?>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Acceso S.C.G. ::.</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" name="form1">
                    <input type="hidden" name="enviar" value="1">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" id="username" name="username" title="Nombre Usuario" placeholder="Usuario" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="pass" placeholder="Contraseña"  title="Contraseña" type="password">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" id="submit" value="Ingresar...">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div><?php }
}
