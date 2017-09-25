<?php
/* Smarty version 3.1.29, created on 2016-07-21 01:08:06
  from "/var/www/html/siscg_bot/views/entmat/new.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579058b6198d28_46451819',
  'file_dependency' => 
  array (
    'da7c9bae8afe42eda88f32e9a8522d497afabc72' => 
    array (
      0 => '/var/www/html/siscg_bot/views/entmat/new.tpl',
      1 => 1469077671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579058b6198d28_46451819 ($_smarty_tpl) {
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
entmat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Fecha:<span class="required">*</span></label>
                            <input name="fecha" type="date" step="1" class="form-control" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
">
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <label>C. Material:<span class="required">*</span></label>
                            <select name="id_closemat" id="id_closemat"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Gramas:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="gramos" name="gramos" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-2">
                            <label>Ley:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="ley" name="ley" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <label>Puro:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="puro" name="puro" readonly>
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
