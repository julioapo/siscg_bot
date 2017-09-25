<?php
/* Smarty version 3.1.29, created on 2016-07-27 00:29:19
  from "/var/www/html/siscg_bot/views/permisos/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5798389f1c99a8_19713947',
  'file_dependency' => 
  array (
    '10826fc70517ca24ad1b498fd54a004117d021b4' => 
    array (
      0 => '/var/www/html/siscg_bot/views/permisos/edit.tpl',
      1 => 1467953166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5798389f1c99a8_19713947 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['modulo'];?>
"><?php echo $_smarty_tpl->tpl_vars['titulo_pri']->value;?>
</a></li>
            <li><i class="icon_document_alt"></i><?php echo $_smarty_tpl->tpl_vars['titulo_mod']->value;?>
</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-validate form-horizontal" role="form" method="post" id="edi_permiso" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Nombre del Permiso:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" autofocus name="permiso" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['permiso'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['permiso'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>llave de Permiso:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="key" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['key'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['key'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Modificar"><i class="fa fa-save"></i>Modificar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div><?php }
}
