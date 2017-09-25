<?php
/* Smarty version 3.1.29, created on 2017-09-24 20:03:30
  from "/var/www/html/siscg_bot/views/comprador/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c847d2214881_25742574',
  'file_dependency' => 
  array (
    '81807b1bb057eb6a07f16ac8f597883fe8ed4fe4' => 
    array (
      0 => '/var/www/html/siscg_bot/views/comprador/edit.tpl',
      1 => 1468640806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c847d2214881_25742574 ($_smarty_tpl) {
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
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Nota!</strong> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

    </div>
<?php }?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_comprador" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre:<span class="required">*</span></label>
                            <input type="text" class="form-control" disabled name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['nombre'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];
}?>">
                        </div>
                        <div class="col-md-4">
                            <label>Telefono Fijo:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_fijo" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono_fijo'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['telefono_fijo'];
}?>">
                        </div>
                        <div class="col-md-4">
                            <label>@mail:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['email'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['email'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Dirección:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="50" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['direccion'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];
}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label>Representante Legal:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="repre_legal" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['representante_legal'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['representante_legal'];
}?>">
                        </div>
                        <div class="col-md-4">
                            <label>Telefono Rep. Legal:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_repre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono_repre'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['telefono_repre'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Observaciones:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="observaciones" cols="50" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['observaciones'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['observaciones'];
}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Insertar"><i class="fa fa-save"></i>Modificar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div><?php }
}
