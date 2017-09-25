<?php
/* Smarty version 3.1.29, created on 2016-07-21 20:06:09
  from "/var/www/html/siscg_bot/views/clientes/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579163713ff961_26140732',
  'file_dependency' => 
  array (
    '2a9f03f2690b1d5f30490be59ebba67014a771af' => 
    array (
      0 => '/var/www/html/siscg_bot/views/clientes/new.tpl',
      1 => 1469145964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579163713ff961_26140732 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cliente" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
clientes/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Cliente:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre">
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="cedula">
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono Movil:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_movil">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Teléfono Fijo:</label>
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
                        <div class="col-md-3">
                            <label>Dias Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="dia_max_cre">
                        </div>
                        <div class="col-md-4">
                            <label>Monto Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="monto_max_cre">
                        </div>
                        <div class="col-md-4">
                            <label>Gramas Maxima Entrega:</label>
                            <input type="text" class="form-control text-right" name="grama_max_ent">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Zona de Trabajo:</label>
                            <select name="zona" id="zona">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['zonas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_zona_0_saved_item = isset($_smarty_tpl->tpl_vars['zona']) ? $_smarty_tpl->tpl_vars['zona'] : false;
$_smarty_tpl->tpl_vars['zona'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['zona']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['zona']->value) {
$_smarty_tpl->tpl_vars['zona']->_loop = true;
$__foreach_zona_0_saved_local_item = $_smarty_tpl->tpl_vars['zona'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['zona']->value['id_zona'];?>
"><?php echo $_smarty_tpl->tpl_vars['zona']->value['name_zona'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['zona'] = $__foreach_zona_0_saved_local_item;
}
if ($__foreach_zona_0_saved_item) {
$_smarty_tpl->tpl_vars['zona'] = $__foreach_zona_0_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Status:<span class="required">*</span></label>
                            <select name="status" id="status">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['status']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_statu_1_saved_item = isset($_smarty_tpl->tpl_vars['statu']) ? $_smarty_tpl->tpl_vars['statu'] : false;
$_smarty_tpl->tpl_vars['statu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['statu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['statu']->value) {
$_smarty_tpl->tpl_vars['statu']->_loop = true;
$__foreach_statu_1_saved_local_item = $_smarty_tpl->tpl_vars['statu'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['statu']->value['id_status'];?>
"><?php echo $_smarty_tpl->tpl_vars['statu']->value['name_status'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['statu'] = $__foreach_statu_1_saved_local_item;
}
if ($__foreach_statu_1_saved_item) {
$_smarty_tpl->tpl_vars['statu'] = $__foreach_statu_1_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>Mayorista Mat.:</label>
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['mamat']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_mm_2_saved_item = isset($_smarty_tpl->tpl_vars['mm']) ? $_smarty_tpl->tpl_vars['mm'] : false;
$_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mm']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
$__foreach_mm_2_saved_local_item = $_smarty_tpl->tpl_vars['mm'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['mm']->value['id_mamat'];?>
"><?php echo $_smarty_tpl->tpl_vars['mm']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['mm'] = $__foreach_mm_2_saved_local_item;
}
if ($__foreach_mm_2_saved_item) {
$_smarty_tpl->tpl_vars['mm'] = $__foreach_mm_2_saved_item;
}
?>
                            </select>
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
