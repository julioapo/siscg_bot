<?php
/* Smarty version 3.1.29, created on 2016-07-19 00:00:08
  from "/var/www/html/siscg_bot/views/rol/permisos_role.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da5c849e693_06355303',
  'file_dependency' => 
  array (
    'a2b72df31e78100f8a3fc7b3f6d7613fa4b92336' => 
    array (
      0 => '/var/www/html/siscg_bot/views/rol/permisos_role.tpl',
      1 => 1467949678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da5c849e693_06355303 ($_smarty_tpl) {
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
            <li><i class="fa fa-users"></i><?php echo $_smarty_tpl->tpl_vars['roles']->value['nombre'];?>
</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" id="perm_rol" action="">
                    <input type="hidden" name="guardar" value="1">
                    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value) && count($_smarty_tpl->tpl_vars['permisos']->value)) {?>
                        <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Permiso</th>
                                    <th>Habilitado</th>
                                    <th>Denegado</th>
                                    <th>Ignorar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
$_from = $_smarty_tpl->tpl_vars['permisos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_pr_0_saved_item = isset($_smarty_tpl->tpl_vars['pr']) ? $_smarty_tpl->tpl_vars['pr'] : false;
$_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['pr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
$_smarty_tpl->tpl_vars['pr']->_loop = true;
$__foreach_pr_0_saved_local_item = $_smarty_tpl->tpl_vars['pr'];
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['nombre'];?>
</td>
                                    <td>
                                        <input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="1" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] == 1)) {?>checked="checked"<?php }?>/></td>
                                    <td><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] == '')) {?>checked="checked"<?php }?>/></td>
                                    <td><input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="x" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] === 'x')) {?>checked="checked"<?php }?>/>
                                    </td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars['pr'] = $__foreach_pr_0_saved_local_item;
}
if ($__foreach_pr_0_saved_item) {
$_smarty_tpl->tpl_vars['pr'] = $__foreach_pr_0_saved_item;
}
?>
                            </tbody>
                        </table>
                    <?php }?>
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit" value="Guardar">Guardar</button>
                        <button class="btn btn-default" type="reset">Limpiar</button>
                    </div>
                    <!-- FIN Tabla para el formulario  -->
                </form>
            </div>
        </section>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "columnDefs": [
                { "width": "60%", "targets": 0 }
            ]
        });
    } );
<?php echo '</script'; ?>
><?php }
}
