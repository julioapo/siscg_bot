<?php
/* Smarty version 3.1.29, created on 2017-09-24 19:42:33
  from "/var/www/html/siscg_bot/views/bank/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c842e9918f69_04992061',
  'file_dependency' => 
  array (
    'f3c71b58971b912fa287787e85a247b4cb8ac223' => 
    array (
      0 => '/var/www/html/siscg_bot/views/bank/index.tpl',
      1 => 1468010356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c842e9918f69_04992061 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12">
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
                    <div class="col-sm-2 col-sm-offset-9">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];
echo $_smarty_tpl->tpl_vars['ruta_agregar']->value;?>
">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> <?php echo $_smarty_tpl->tpl_vars['titulo_agregar']->value;?>

                            </button>
                        </a>
                    </div>
                </div>
                <?php if (isset($_smarty_tpl->tpl_vars['bancos']->value) && count($_smarty_tpl->tpl_vars['bancos']->value)) {?>
                    <table id="table_id" class="table small table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Banco</th>
                            <th>Telefono</th>
                            <th>Contacto</th>
                            <th>Telefono Contacto</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['bancos']->value;
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
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['name_bank'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['telefono'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['contacto'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['telefono_contacto'];?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
bank/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_bank'];?>
" data-toggle="tooltip" title="Editar"><i class="fa fa-edit col-md-1"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Eliminar" onclick="javascript:return pregunta('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
bank/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id_bank'];?>
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
                    <p><strong>No hay Bancos!!!</strong></p>
                <?php }?>
            </div>
        </section>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
<?php echo '</script'; ?>
><?php }
}
