<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:15:12
  from "/var/www/html/siscg_bot/views/mamat/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d8d30282766_04682274',
  'file_dependency' => 
  array (
    '9a27babeab4df37fd50af13b1b8cab371649ca9a' => 
    array (
      0 => '/var/www/html/siscg_bot/views/mamat/edit.tpl',
      1 => 1468894415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d8d30282766_04682274 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_mamat" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Mayorista M.:<span class="required">*</span></label>
                            <input type="text" class="form-control" disabled name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['nombre'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];
}?>">
                        </div>
                        <div class="col-md-4">
                            <label>Rif y/o Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" disabled name="rif" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['rif'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['rif'];
}?>">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['telefono'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label class="control-label">Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="60" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['direccion'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];
}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-row">
                            <div class="col-md-4">
                                <label>@mail:</label>
                                <input type="text" class="form-control" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['email'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['email'];
}?>">
                            </div>
                            <div class="col-md-4">
                                <label>Persona Contacto:<span class="required">*</span></label>
                                <input type="text" class="form-control" name="contacto" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['contacto'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['contacto'];
}?>">
                            </div>
                            <div class="col-md-4">
                                <label>Teléfono Contacto:<span class="required">*</span></label>
                                <input type="text" class="form-control" name="telefono_contacto" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono_contacto'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['telefono_contacto'];
}?>">
                            </div>
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
