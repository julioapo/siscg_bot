<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:06:49
  from "/var/www/html/siscg_bot/views/mamat/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d8b39e4e678_90007774',
  'file_dependency' => 
  array (
    '7ac740b05ddf3af7ccc8c43c38a957114b4b0b29' => 
    array (
      0 => '/var/www/html/siscg_bot/views/mamat/new.tpl',
      1 => 1468894002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d8b39e4e678_90007774 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_mamat" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
mamat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Mayorista M.:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['nombre'])) {?> <?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
 <?php }?>">
                        </div>
                        <div class="col-md-4">
                            <label>Rif / Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="rif" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['rif'])) {?> <?php echo $_smarty_tpl->tpl_vars['datos']->value['rif'];?>
 <?php }?>">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label class="control-label">Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="60" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="btn-row">
                        <div class="col-md-4">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-4">
                            <label>Persona Contacto:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="contacto" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['contacto'])) {?> <?php echo $_smarty_tpl->tpl_vars['datos']->value['contacto'];?>
 <?php }?>">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono Contacto:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_contacto" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono_contacto'])) {?> <?php echo $_smarty_tpl->tpl_vars['datos']->value['telefono_contacto'];?>
 <?php }?>">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Insertar"><i class="fa fa-save"></i>Insertar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div><?php }
}
