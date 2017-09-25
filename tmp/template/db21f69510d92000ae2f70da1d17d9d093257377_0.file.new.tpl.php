<?php
/* Smarty version 3.1.29, created on 2016-07-18 23:50:24
  from "/var/www/html/siscg_bot/views/closediv/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578da3808c5a60_54014369',
  'file_dependency' => 
  array (
    'db21f69510d92000ae2f70da1d17d9d093257377' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closediv/new.tpl',
      1 => 1468644642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578da3808c5a60_54014369 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierrediv" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
closediv/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Colocador Div:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Banco:<span class="required">*</span></label></div>
                        <div class="col-md-5"><label>Cuenta Bancaria:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="liquidador" id="liquidador">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['liquidadores']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_liq_0_saved_item = isset($_smarty_tpl->tpl_vars['liq']) ? $_smarty_tpl->tpl_vars['liq'] : false;
$_smarty_tpl->tpl_vars['liq'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['liq']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['liq']->value) {
$_smarty_tpl->tpl_vars['liq']->_loop = true;
$__foreach_liq_0_saved_local_item = $_smarty_tpl->tpl_vars['liq'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['liq']->value['id_colocador'];?>
"><?php echo $_smarty_tpl->tpl_vars['liq']->value['nombre'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['liq'] = $__foreach_liq_0_saved_local_item;
}
if ($__foreach_liq_0_saved_item) {
$_smarty_tpl->tpl_vars['liq'] = $__foreach_liq_0_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="banksliq" id="banksliq"></select>
                        </div>
                        <div class="col-md-5">
                            <select name="cuentliq" id="cuentliq"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tipo de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Nro de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Monto de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-2">
                            <div >
                                <input name="fecha_closediv" type="date" step="1" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="tip_tranbank" id="banksliq">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['tiptraban']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_ttb_1_saved_item = isset($_smarty_tpl->tpl_vars['ttb']) ? $_smarty_tpl->tpl_vars['ttb'] : false;
$_smarty_tpl->tpl_vars['ttb'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ttb']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ttb']->value) {
$_smarty_tpl->tpl_vars['ttb']->_loop = true;
$__foreach_ttb_1_saved_local_item = $_smarty_tpl->tpl_vars['ttb'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ttb']->value['id_tipotrans'];?>
"><?php echo $_smarty_tpl->tpl_vars['ttb']->value['name_transf'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['ttb'] = $__foreach_ttb_1_saved_local_item;
}
if ($__foreach_ttb_1_saved_item) {
$_smarty_tpl->tpl_vars['ttb'] = $__foreach_ttb_1_saved_item;
}
?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nro_transaccion">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" name="monto_transaccion" onkeypress="return(formato_moneda(this,',','.',event))">
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
                        <div class="col-md-8">
                            <label>Pais Origen:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="country" id="country">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['country']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_c_2_saved_item = isset($_smarty_tpl->tpl_vars['c']) ? $_smarty_tpl->tpl_vars['c'] : false;
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['c']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
$__foreach_c_2_saved_local_item = $_smarty_tpl->tpl_vars['c'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id_pais'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name_country'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_2_saved_local_item;
}
if ($__foreach_c_2_saved_item) {
$_smarty_tpl->tpl_vars['c'] = $__foreach_c_2_saved_item;
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
