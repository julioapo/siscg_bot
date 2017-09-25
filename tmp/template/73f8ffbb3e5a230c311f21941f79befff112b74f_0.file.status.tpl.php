<?php
/* Smarty version 3.1.29, created on 2016-07-20 01:37:07
  from "/var/www/html/siscg_bot/views/closebsf/status.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578f0e03ba24c2_91057445',
  'file_dependency' => 
  array (
    '73f8ffbb3e5a230c311f21941f79befff112b74f' => 
    array (
      0 => '/var/www/html/siscg_bot/views/closebsf/status.tpl',
      1 => 1468993024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578f0e03ba24c2_91057445 ($_smarty_tpl) {
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
<?php if (isset($_smarty_tpl->tpl_vars['liqdivbsf']->value)) {?>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body alert alert-info fade in">
                <div class="col-md-4"><strong><?php echo $_smarty_tpl->tpl_vars['liqdivbsf']->value['nro_liqdivbsf'];?>
</strong></div>
                <div class="col-md-2">Fecha: <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['liqdivbsf']->value['fecha_opera'],"%d/%m/%Y");?>
</strong></div>
                <div class="col-md-2">Status: <strong><?php echo $_smarty_tpl->tpl_vars['liqdivbsf']->value['name_status'];?>
</strong></div>
                <div class="col-md-2">Monto Liquidado:</div>
                <div class="col-md-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['montoliq']->value,2,',','.');?>
 $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto Cierres Mat.:</div>
                <div class="col-md-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['montoclomat']->value,2,',','.');?>
 $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto Activo.:</div>
                <div class="col-md-2 text-right"><strong><?php echo number_format($_smarty_tpl->tpl_vars['montoxclomat']->value,2,',','.');?>
 $</strong></div>
            </div>
            <div class="panel-content">
                <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Gramas Cerradas</th>
                        <th>Costo Grama</th>
                        <th>Monto Total BsF</th>
                        <th>Nro Cierre Mat.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->tpl_vars['cierremat']->value;
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
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datos']->value['fecha_opera']);?>
</td>
                            <td><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['gramas_cierre'],2,',','.');?>
</td>
                            <td><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['precio_gramas'],2,',','.');?>
</td>
                            <td><?php echo number_format($_smarty_tpl->tpl_vars['datos']->value['monto_total_close'],2,',','.');?>
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
                    <strong>Advertencia!</strong> No existen tiene datos de cierre de material.
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
    } );
<?php echo '</script'; ?>
><?php }
}
