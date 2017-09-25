<?php
/* Smarty version 3.1.29, created on 2016-07-21 22:52:12
  from "/var/www/html/siscg_bot/views/closemat/status.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57918a5c9e6186_78101170',
  'file_dependency' => 
  array (
    'd6868ef82f1c486c312c478cb93c5a74d8f1a252' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closemat/status.tpl',
      1 => 1469155929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57918a5c9e6186_78101170 ($_smarty_tpl) {
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
<?php if (isset($_smarty_tpl->tpl_vars['cierremat']->value)) {?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body alert alert-info fade in">
                <div class="col-sm-8"><strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nro_closemat'];?>
</strong></div>
                <div class="col-sm-8">Fecha: <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cierremat']->value['fecha_close'],"%d/%m/%Y");?>
</strong></div>
                <div class="col-sm-2">Cierre :</div>
                <div class="col-sm-2 text-right"><strong><?php echo $_smarty_tpl->tpl_vars['cierre']->value;?>
</strong></div>
                <div class="col-sm-8">Nombre: <strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nombre'];?>
</strong></div>
                <div class="col-sm-2">Entregado :</div>
                <div class="col-sm-2 text-right"><strong><?php echo $_smarty_tpl->tpl_vars['entregapuro']->value;?>
</strong></div>
                <div class="col-sm-8">Nro Liquidacion: <strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nro_liqdivbsf'];?>
 $</strong></div>
                <div class="col-sm-2">Status:</div>
                <div class="col-sm-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['cierrexentrega']->value,2,'.',',');?>
</strong></div>
            </div>
            <div class="panel-content">
                <table id="table_id" class="table small table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <tr>
                        <th>Nombre.</th>
                        <th>Fecha</th>
                        <th>Gramas</th>
                        <th>Ley</th>
                        <th>Puro</th>
                        <th>C. Material</th>
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['entregas']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datos_0_saved_item = isset($_smarty_tpl->tpl_vars['datos']) ? $_smarty_tpl->tpl_vars['datos'] : false;
$_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['datos']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->value) {
$_smarty_tpl->tpl_vars['datos']->_loop = true;
$__foreach_datos_0_saved_local_item = $_smarty_tpl->tpl_vars['datos'];
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datos']->value['fecha']);?>
</td>
                            <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['gramos'],2,',','.');?>
</td>
                            <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['ley'],2,',','.');?>
</td>
                            <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['puro'],2,',','.');?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nro_closemat'];?>
</td>
                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_0_saved_local_item;
}
if ($__foreach_datos_0_saved_item) {
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_0_saved_item;
}
?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<?php } else { ?>
<div class="row">
    <div class="col-lg-12">
        <!--notification start-->
        <section class="panel">
            <div class="panel-body alert alert-warning fade in">
                <div class="col-lg-6">
                    <strong>Advertencia!</strong> No existen datos ...
                </div>
            </div>
        </section>
    </div>
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['cierremat']->value)) {?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body alert alert-info fade in">
                    <div class="col-sm-8"><strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nro_closemat'];?>
</strong></div>
                    <div class="col-sm-8">Fecha: <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cierremat']->value['fecha_close'],"%d/%m/%Y");?>
</strong></div>
                    <div class="col-sm-2">Monto Total :</div>
                    <div class="col-sm-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['cierremotto']->value,2,'.',',');?>
</strong></div>
                    <div class="col-sm-8">Nombre: <strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nombre'];?>
</strong></div>
                    <div class="col-sm-2">Abonos :</div>
                    <div class="col-sm-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['abono']->value,2,'.',',');?>
</strong></div>
                    <div class="col-sm-8">Nro Liquidacion: <strong><?php echo $_smarty_tpl->tpl_vars['cierremat']->value['nro_liqdivbsf'];?>
 $</strong></div>
                    <div class="col-sm-2">Status:</div>
                    <div class="col-sm-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['montoxabono']->value,2,'.',',');?>
</strong></div>
                </div>
                <div class="panel-content">
                    <table id="table_abo" class="table small table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        <tr>
                            <th>Cliente.</th>
                            <th>Fecha</th>
                            <th>Banco</th>
                            <th>Cuenta</th>
                            <th>Monto</th>
                            <th>C. Material</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->tpl_vars['abonos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datos_1_saved_item = isset($_smarty_tpl->tpl_vars['datos']) ? $_smarty_tpl->tpl_vars['datos'] : false;
$_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['datos']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->value) {
$_smarty_tpl->tpl_vars['datos']->_loop = true;
$__foreach_datos_1_saved_local_item = $_smarty_tpl->tpl_vars['datos'];
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombres_apellidos'];?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datos']->value['fecha']);?>
</td>
                                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['datos']->value['name_bank'];?>
</td>
                                <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['datos']->value['id_nro_cuenta'];?>
</td>
                                <td class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['monto'],2,',','.');?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nro_closemat'];?>
</td>
                            </tr>
                        <?php
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_1_saved_local_item;
}
if ($__foreach_datos_1_saved_item) {
$_smarty_tpl->tpl_vars['datos'] = $__foreach_datos_1_saved_item;
}
?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-lg-12">
            <!--notification start-->
            <section class="panel">
                <div class="panel-body alert alert-warning fade in">
                    <div class="col-lg-6">
                        <strong>Advertencia!</strong> No existen datos ...
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php }
echo '<script'; ?>
 type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
        $('#table_abo').DataTable();
    } );
<?php echo '</script'; ?>
><?php }
}
