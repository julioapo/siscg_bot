<?php
/* Smarty version 3.1.29, created on 2016-07-19 22:20:58
  from "/var/www/html/siscg_bot/views/usuarios/edit.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578ee00a84a0c8_85968790',
  'file_dependency' => 
  array (
    'f6758de2f3023ca484be7cfd3d297095b42a0219' => 
    array (
      0 => '/var/www/html/siscg_bot/views/usuarios/edit.tpl',
      1 => 1468981254,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578ee00a84a0c8_85968790 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_usuario" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Usuario:</label>
                            <input type="text" class="form-control" name="nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['nombres'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['nombres'];
}?>" disabled>
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:</label>
                            <input type="text" class="form-control" name="cedula" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['cedula'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['cedula'];
}?>" disabled>
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['telefono'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['telefono'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>login:</label>
                            <input type="text" class="form-control" name="userlogin" disabled value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['userlogin'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['userlogin'];
}?>"></td>
                        </div>
                        <div class="col-md-4">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value['email'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['email'];
}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label>Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="80" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['datos']->value['direccion'])) {
echo $_smarty_tpl->tpl_vars['datos']->value['direccion'];
}?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Empresas:</label>
                            <select name="compdiv_usuario" id="compdiv_usuario">
                                <?php
$_from = $_smarty_tpl->tpl_vars['user_compdiv']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_compdiv_0_saved_item = isset($_smarty_tpl->tpl_vars['compdiv']) ? $_smarty_tpl->tpl_vars['compdiv'] : false;
$_smarty_tpl->tpl_vars['compdiv'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['compdiv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['compdiv']->value) {
$_smarty_tpl->tpl_vars['compdiv']->_loop = true;
$__foreach_compdiv_0_saved_local_item = $_smarty_tpl->tpl_vars['compdiv'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['compdiv']->value['id_comprador'];?>
" <?php if (($_smarty_tpl->tpl_vars['compdiv']->value['id_comprador'] == $_smarty_tpl->tpl_vars['datos']->value['id_comprador'])) {
echo "SELECTED";
}?>><?php echo $_smarty_tpl->tpl_vars['compdiv']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['compdiv'] = $__foreach_compdiv_0_saved_local_item;
}
if ($__foreach_compdiv_0_saved_item) {
$_smarty_tpl->tpl_vars['compdiv'] = $__foreach_compdiv_0_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Rol:</label>
                            <select name="rol_usuario" id="rol">
                                <?php
$_from = $_smarty_tpl->tpl_vars['user_rol']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_rol_1_saved_item = isset($_smarty_tpl->tpl_vars['rol']) ? $_smarty_tpl->tpl_vars['rol'] : false;
$_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['rol']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rol']->value) {
$_smarty_tpl->tpl_vars['rol']->_loop = true;
$__foreach_rol_1_saved_local_item = $_smarty_tpl->tpl_vars['rol'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['rol']->value['id_rol'];?>
" <?php if (($_smarty_tpl->tpl_vars['rol']->value['id_rol'] == $_smarty_tpl->tpl_vars['datos']->value['id_rol'])) {
echo "SELECTED";
}?>><?php echo $_smarty_tpl->tpl_vars['rol']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['rol'] = $__foreach_rol_1_saved_local_item;
}
if ($__foreach_rol_1_saved_item) {
$_smarty_tpl->tpl_vars['rol'] = $__foreach_rol_1_saved_item;
}
?>
                            </select>
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
