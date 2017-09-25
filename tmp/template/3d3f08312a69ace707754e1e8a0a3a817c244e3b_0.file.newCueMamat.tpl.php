<?php
/* Smarty version 3.1.29, created on 2016-07-18 22:30:29
  from "/var/www/html/siscg_bot/views/mamat/newCueMamat.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578d90c56a80b4_86316171',
  'file_dependency' => 
  array (
    '3d3f08312a69ace707754e1e8a0a3a817c244e3b' => 
    array (
      0 => '/var/www/html/siscg_bot/views/mamat/newCueMamat.tpl',
      1 => 1468161010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578d90c56a80b4_86316171 ($_smarty_tpl) {
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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cueemp" action="">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Banco:</label>
                            <select name="id_banco" id="id_banco">
                                <option value=""> - seleccione - </option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['bancos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_bank_0_saved_item = isset($_smarty_tpl->tpl_vars['bank']) ? $_smarty_tpl->tpl_vars['bank'] : false;
$_smarty_tpl->tpl_vars['bank'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['bank']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['bank']->value) {
$_smarty_tpl->tpl_vars['bank']->_loop = true;
$__foreach_bank_0_saved_local_item = $_smarty_tpl->tpl_vars['bank'];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['bank']->value['id_bank'];?>
"><?php echo $_smarty_tpl->tpl_vars['bank']->value['name_bank'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['bank'] = $__foreach_bank_0_saved_local_item;
}
if ($__foreach_bank_0_saved_item) {
$_smarty_tpl->tpl_vars['bank'] = $__foreach_bank_0_saved_item;
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nro Cuenta Bancaria:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nro_cuenta">
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
