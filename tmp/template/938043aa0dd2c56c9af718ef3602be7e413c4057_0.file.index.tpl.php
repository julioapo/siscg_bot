<?php
/* Smarty version 3.1.29, created on 2016-07-19 00:00:03
  from "/var/www/html/siscg_bot/views/rol/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da5c3d57ff9_71221554',
  'file_dependency' => 
  array (
    '938043aa0dd2c56c9af718ef3602be7e413c4057' => 
    array (
      0 => '/var/www/html/siscg_bot/views/rol/index.tpl',
      1 => 1468009364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da5c3d57ff9_71221554 ($_smarty_tpl) {
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
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-10">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta_agregar']->value;?>
">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['titulo_agregar']->value;?>

                            </button>
                        </a>
                    </div>
                </div>
                <?php if (isset($_smarty_tpl->tpl_vars['roles']->value) && count($_smarty_tpl->tpl_vars['roles']->value)) {?>
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['roles']->value;
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
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id_rol'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
rol/permisos_rol/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_rol'];?>
" data-toggle="tooltip" title="Permisos"><i class="fa fa-lock  col-md-1"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
rol/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_rol'];?>
" data-toggle="tooltip" title="Editar" ><i class="fa fa-edit col-md-1"></i></a>
                                    <a href="#" onclick="javascript:return pregunta('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
rol/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_rol'];?>
');" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o col-md-1"></i></a>
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
                    <p><strong>No hay <?php echo $_smarty_tpl->tpl_vars['titulo_mod']->value;?>
!!!</strong></p>
                <?php }?>
            </div>
        </section>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready( function (){
        $('#table_id').DataTable();
    });
<?php echo '</script'; ?>
><?php }
}
