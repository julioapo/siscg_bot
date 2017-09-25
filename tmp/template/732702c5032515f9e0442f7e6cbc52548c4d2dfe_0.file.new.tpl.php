<?php
/* Smarty version 3.1.29, created on 2016-07-18 23:48:59
  from "/var/www/html/siscg_bot/views/closebsf/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da32b7a1a92_18786213',
  'file_dependency' => 
  array (
    '732702c5032515f9e0442f7e6cbc52548c4d2dfe' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closebsf/new.tpl',
      1 => 1468726996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da32b7a1a92_18786213 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierrebsf" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
closebsf/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Liq. Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Banco:<span class="required">*</span></label></div>
                        <div class="col-md-5"><label>Cuenta Bancaria:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="liquidador" id="liquidador">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['compradores']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_com_0_saved_item = isset($_smarty_tpl->tpl_vars['com']) ? $_smarty_tpl->tpl_vars['com'] : false;
$_smarty_tpl->tpl_vars['com'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['com']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->_loop = true;
$__foreach_com_0_saved_local_item = $_smarty_tpl->tpl_vars['com'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['com']->value['id_comprador'];?>
"><?php echo $_smarty_tpl->tpl_vars['com']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['com'] = $__foreach_com_0_saved_local_item;
}
if ($__foreach_com_0_saved_item) {
$_smarty_tpl->tpl_vars['com'] = $__foreach_com_0_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bankscomp" id="bankscomp"></select>
                        </div>
                        <div class="col-md-5">
                            <select name="cuentcomp" id="cuentcomp"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"><label>Cierre Div:<span class="required">*</span></label></div>
                        <div class="col-md-2"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tipo de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Nro de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3">
                            <select name="cierrediv" id="cierrediv">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['cierresdiv']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cd_1_saved_item = isset($_smarty_tpl->tpl_vars['cd']) ? $_smarty_tpl->tpl_vars['cd'] : false;
$_smarty_tpl->tpl_vars['cd'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cd']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cd']->value) {
$_smarty_tpl->tpl_vars['cd']->_loop = true;
$__foreach_cd_1_saved_local_item = $_smarty_tpl->tpl_vars['cd'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cd']->value['id_cierrediv'];?>
"><?php echo $_smarty_tpl->tpl_vars['cd']->value['id_operacion'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['cd'] = $__foreach_cd_1_saved_local_item;
}
if ($__foreach_cd_1_saved_item) {
$_smarty_tpl->tpl_vars['cd'] = $__foreach_cd_1_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div >
                                <input name="fecha_closebsf" type="date" step="1" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="tip_tranbank" id="tip_tranbank">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['tiptraban']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ttb_2_saved_item = isset($_smarty_tpl->tpl_vars['ttb']) ? $_smarty_tpl->tpl_vars['ttb'] : false;
$_smarty_tpl->tpl_vars['ttb'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ttb']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ttb']->value) {
$_smarty_tpl->tpl_vars['ttb']->_loop = true;
$__foreach_ttb_2_saved_local_item = $_smarty_tpl->tpl_vars['ttb'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ttb']->value['id_tipotrans'];?>
"><?php echo $_smarty_tpl->tpl_vars['ttb']->value['name_transf'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['ttb'] = $__foreach_ttb_2_saved_local_item;
}
if ($__foreach_ttb_2_saved_item) {
$_smarty_tpl->tpl_vars['ttb'] = $__foreach_ttb_2_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nro_transaccion">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"><label>Monto en Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tasa de Cambio:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Monto de Trans. BsF:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Status:<span class="required">*</span></label></div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="monto_dls" name="monto_dls" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="tasa_cambio" name="tasa_cambio" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="monto_bsf" name="monto_bsf" readonly onfocus="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <select name="status" id="status">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['statraban']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_st_3_saved_item = isset($_smarty_tpl->tpl_vars['st']) ? $_smarty_tpl->tpl_vars['st'] : false;
$_smarty_tpl->tpl_vars['st'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['st']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['st']->value) {
$_smarty_tpl->tpl_vars['st']->_loop = true;
$__foreach_st_3_saved_local_item = $_smarty_tpl->tpl_vars['st'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['st']->value['id_status'];?>
"><?php echo $_smarty_tpl->tpl_vars['st']->value['name_status'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['st'] = $__foreach_st_3_saved_local_item;
}
if ($__foreach_st_3_saved_item) {
$_smarty_tpl->tpl_vars['st'] = $__foreach_st_3_saved_item;
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Concepto:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="concepto" cols="80" rows="3"></textarea>
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
