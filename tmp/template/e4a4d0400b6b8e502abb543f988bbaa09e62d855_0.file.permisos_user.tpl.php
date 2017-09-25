<?php
/* Smarty version 3.1.29, created on 2016-07-27 00:29:30
  from "/var/www/html/siscg_bot/views/usuarios/permisos_user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579838aa1a0e11_90422779',
  'file_dependency' => 
  array (
    'e4a4d0400b6b8e502abb543f988bbaa09e62d855' => 
    array (
      0 => '/var/www/html/siscg_bot/views/usuarios/permisos_user.tpl',
      1 => 1467947716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579838aa1a0e11_90422779 ($_smarty_tpl) {
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
            <li><i class="fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['info']->value['nombres'];?>
</li>
            <li><i class="fa fa-users"></i><?php echo $_smarty_tpl->tpl_vars['info']->value['nombre'];?>
</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" id="perm_usuario" action="">
                    <input type="hidden" name="guardar" value="1">
                    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value) && count($_smarty_tpl->tpl_vars['permisos']->value)) {?>
                        <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Permiso</th>
                                <th>Estado</th>
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
                                <?php if ($_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == 1) {?>
                                    <?php $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable("habilitado", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "v", 0);?>
                                <?php } else { ?>
                                    <?php $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable("denegado", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "v", 0);?>
                                <?php }?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['permiso'];?>
</td>
                                    <td>
                                        <select name="perm_<?php echo $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['id'];?>
">
                                            <option value="x" <?php if ($_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado']) {?> selected="selected"<?php }?>>Heredado(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
)</option>
                                            <option value="1" <?php if (($_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == 1 && $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado'] == '')) {?> selected="selected"<?php }?>>Habilitado</option>
                                            <option value="" <?php if (($_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == '' && $_smarty_tpl->tpl_vars['usuarios']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado'] == '')) {?> selected="selected"<?php }?>>Desabilitado</option>
                                        </select>
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
                { "width": "60%", "targets": 1 }
            ]
        });
    } );
<?php echo '</script'; ?>
><?php }
}
