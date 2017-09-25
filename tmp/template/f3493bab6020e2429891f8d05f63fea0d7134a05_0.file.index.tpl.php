<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:03:43
  from "/var/www/html/siscg_bot/views/mamat/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d8a7fcdfc99_47489763',
  'file_dependency' => 
  array (
    'f3493bab6020e2429891f8d05f63fea0d7134a05' => 
    array (
      0 => '/var/www/html/siscg_bot/views/mamat/index.tpl',
      1 => 1468893784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d8a7fcdfc99_47489763 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Home</a></li>
            <li><i class="icon_document_alt"></i><?php echo $_smarty_tpl->tpl_vars['titulo_mod']->value;?>
</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2 col-md-offset-9">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta_agregar']->value;?>
">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['titulo_agregar']->value;?>

                            </button>
                        </a>
                    </div>
                </div>
                <?php if (isset($_smarty_tpl->tpl_vars['mamat']->value) && count($_smarty_tpl->tpl_vars['mamat']->value)) {?>
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Mayorista M.</th>
                            <th>Rif</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['mamat']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datos_0_saved_item = isset($_smarty_tpl->tpl_vars['datos']) ? $_smarty_tpl->tpl_vars['datos'] : false;
$_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['datos']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->value) {
$_smarty_tpl->tpl_vars['datos']->_loop = true;
$__foreach_datos_0_saved_local_item = $_smarty_tpl->tpl_vars['datos'];
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['rif'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['contacto'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['telefono'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
mamat/inf_bancaria/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_mamat'];?>
" data-toggle="tooltip" title="Información Bancaria"><i class="fa fa-bank col-md-1"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
mamat/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_mamat'];?>
" data-toggle="tooltip" title="Editar"><i class="fa fa-edit col-md-1"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Eliminar" onclick="javascript:return pregunta('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
mamat/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_mamat'];?>
');"><i class="fa fa-trash-o col-md-1"></i></a>
                                </td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_0_saved_local_item;
}
if ($__foreach_datos_0_saved_item) {
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_0_saved_item;
}
?>
                        </tbody>
                    </table>
                    <?php } else { ?>
                    <p><strong>No hay Mayoristas!!!</strong></p>
                    <?php }?>
            </div>
        </section>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "columnDefs": [
                { "width": "15%", "targets": 4 }
            ]
        });
    } );
<?php echo '</script'; ?>
><?php }
}
