<?php
/* Smarty version 3.1.29, created on 2016-07-21 20:19:35
  from "/var/www/html/siscg_bot/views/abomat/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57916697ca2482_91373772',
  'file_dependency' => 
  array (
    '358a6e1c3347820a43f46d004505838c66111899' => 
    array (
      0 => '/var/www/html/siscg_bot/views/abomat/new.tpl',
      1 => 1469146618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57916697ca2482_91373772 ($_smarty_tpl) {
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
abomat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-1"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-2"><input name="fecha" type="date" step="1" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
"></div>
                        <div class="col-md-4">
                            <label>M. Material:<span class="required">*</span></label>
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['nommamat']->value;
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
                            <label>C. Material:<span class="required">*</span></label>
                            <select name="id_closemat" id="id_closemat"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Cliente:<span class="required">*</span></label>
                            <select name="id_cliente" id="id_cliente"></select>
                        </div>
                        <div class="col-md-4">
                            <label>Bancos Cli:<span class="required">*</span></label>
                            <select name="id_bank" id="id_bank"></select>
                        </div>
                        <div class="col-md-4">
                            <label>Cuentas Cli:<span class="required">*</span></label>
                            <select name="cuentcli" id="cuentcli"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Tipo Transa:<span class="required">*</span></label>
                            <select name="id_transbank" id="id_transbank">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['tiptransbank']->value;
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
                            <label>Nro Transaccion:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="nro_transaccion" name="nro_transaccion">
                        </div>
                        <div class="col-md-3">
                            <label>Monto:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="monto" name="monto" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label>Beneficiario:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="beneficiario" name="beneficiario">
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
