<?php
/* Smarty version 3.1.29, created on 2016-07-21 00:11:43
  from "/var/www/html/siscg_bot/views/comprador/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57904b7f4597a2_63137226',
  'file_dependency' => 
  array (
    'e2ba054b6ef997808acfa708ac6fde9265ac6caa' => 
    array (
      0 => '/var/www/html/siscg_bot/views/comprador/new.tpl',
      1 => 1468636869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57904b7f4597a2_63137226 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_comprador" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
comprador/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre">
                        </div>
                        <div class="col-md-4">
                            <label>Telefono Fijo:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_fijo">
                        </div>
                        <div class="col-md-4">
                            <label>@mail:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Dirección:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label>Representante Legal:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="repre_legal">
                        </div>
                        <div class="col-md-4">
                            <label>Telefono Rep. Legal:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_repre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Observaciones:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="observaciones" cols="50" rows="3"></textarea>
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
