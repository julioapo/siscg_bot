<?php
/* Smarty version 3.1.29, created on 2016-07-20 01:22:19
  from "/var/www/html/siscg_bot/views/closemat/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578f0a8b9c6fe0_85991880',
  'file_dependency' => 
  array (
    '73ca75293f639428dff7fe6d0d6fd0cd4989d4d0' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closemat/new.tpl',
      1 => 1468984035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578f0a8b9c6fe0_85991880 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/html/siscg_bot/libs/smarty/libs/plugins/modifier.date_format.php';
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierremat" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
closemat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Mayorista Material:<span class="required">*</span></label></div>
                        <div class="col-md-4"><label>Liq. Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-4"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['masmat']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_mm_0_saved_item = isset($_smarty_tpl->tpl_vars['mm']) ? $_smarty_tpl->tpl_vars['mm'] : false;
$_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['mm']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
$__foreach_mm_0_saved_local_item = $_smarty_tpl->tpl_vars['mm'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['mm']->value['id_mamat'];?>
"><?php echo $_smarty_tpl->tpl_vars['mm']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['mm'] = $__foreach_mm_0_saved_local_item;
}
if ($__foreach_mm_0_saved_item) {
$_smarty_tpl->tpl_vars['mm'] = $__foreach_mm_0_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="id_liqdivbsf" id="id_liqdivbsf">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['liqdivbsf']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ldb_1_saved_item = isset($_smarty_tpl->tpl_vars['ldb']) ? $_smarty_tpl->tpl_vars['ldb'] : false;
$_smarty_tpl->tpl_vars['ldb'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ldb']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ldb']->value) {
$_smarty_tpl->tpl_vars['ldb']->_loop = true;
$__foreach_ldb_1_saved_local_item = $_smarty_tpl->tpl_vars['ldb'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ldb']->value['id_liqdivbsf'];?>
"><?php echo $_smarty_tpl->tpl_vars['ldb']->value['nro_liqdivbsf'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['ldb'] = $__foreach_ldb_1_saved_local_item;
}
if ($__foreach_ldb_1_saved_item) {
$_smarty_tpl->tpl_vars['ldb'] = $__foreach_ldb_1_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input name="fecha_close" type="date" step="1" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Cierre de Gramas:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="gramas_close" name="gramas_close" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-2">
                            <label>Costo Grama:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="precio_gramas" name="precio_gramas" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <label>Total Costo BsF:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="monto_total_close" name="monto_total_close" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Observaciones:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="observacion" cols="80" rows="3"></textarea>
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
