<?php
/* Smarty version 3.1.29, created on 2016-07-18 23:50:20
  from "/var/www/html/siscg_bot/views/closediv/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da37c4411b1_75501252',
  'file_dependency' => 
  array (
    '0efe059b7ddc5b1b584c613726b67eef0e5e1ea7' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closediv/index.tpl',
      1 => 1468736285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da37c4411b1_75501252 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/siscg_bot/libs/smarty/libs/plugins/modifier.date_format.php';
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
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, $_smarty_tpl->tpl_vars['ruta']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta_agregar']->value;?>
">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['titulo_agregar']->value;?>

                            </button>
                        </a>
                    </div>
                </div>
                <?php if (isset($_smarty_tpl->tpl_vars['cierres']->value) && count($_smarty_tpl->tpl_vars['cierres']->value)) {?>
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Banco</th>
                            <th>Nro Operaci&oacute;n</th>
                            <th>Fecha Operaci&oacute;n</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['cierres']->value;
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
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['empresa'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['name_bank'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nro_operacion'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datos']->value['fecha_operacion']);?>
</td>
                                <td><a href="#" data-user="<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_cierrediv'];?>
" data-toggle="tooltip" title="Detalles"><i class="fa fa-info-circle  col-md-1"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
closediv/status/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_cierrediv'];?>
" data-toggle="tooltip" title="Status"><i class="fa fa-file-text col-md-1"></i></a></td>
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
 type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
<?php echo '</script'; ?>
><?php }
}
