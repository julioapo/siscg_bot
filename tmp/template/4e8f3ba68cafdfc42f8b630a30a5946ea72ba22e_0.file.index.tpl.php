<?php
/* Smarty version 3.1.29, created on 2016-07-25 02:26:35
  from "/var/www/html/siscg_bot/views/cpass/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5795b11b8b5383_24708572',
  'file_dependency' => 
  array (
    '4e8f3ba68cafdfc42f8b630a30a5946ea72ba22e' => 
    array (
      0 => '/var/www/html/siscg_bot/views/cpass/index.tpl',
      1 => 1467849106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5795b11b8b5383_24708572 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-files-o"></i> Cambio de Password</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Home</a></li>
            <li><i class="icon_document_alt"></i>Cambio de Password</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cambio de Password
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                        <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                        <input type="hidden" name="enviar" value="1">
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Nuevo Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Confirme Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="cpassword" name="cpassword" type="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                                <button class="btn btn-default" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div><?php }
}
