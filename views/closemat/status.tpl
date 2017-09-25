<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
{if isset($cierremat)}
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body alert alert-info fade in">
                <div class="col-sm-8"><strong>{$cierremat.nro_closemat}</strong></div>
                <div class="col-sm-8">Fecha: <strong>{$cierremat.fecha_close|date_format:"%d/%m/%Y"}</strong></div>
                <div class="col-sm-2">Cierre :</div>
                <div class="col-sm-2 text-right"><strong>{$cierre}</strong></div>
                <div class="col-sm-8">Nombre: <strong>{$cierremat.nombre}</strong></div>
                <div class="col-sm-2">Entregado :</div>
                <div class="col-sm-2 text-right"><strong>{$entregapuro}</strong></div>
                <div class="col-sm-8">Nro Liquidacion: <strong>{$cierremat.nro_liqdivbsf} $</strong></div>
                <div class="col-sm-2">Status:</div>
                <div class="col-sm-2 text-right"><strong>{$cierrexentrega|number_format:2:'.':','}</strong></div>
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
                    {foreach item=datos from=$entregas}
                        <tr>
                            <td>{$datos.nombre}</td>
                            <td>{$datos.fecha|date_format}</td>
                            <td class="text-right">{$datos.gramos|number_format:2:',':'.'}</td>
                            <td class="text-right">{$datos.ley|number_format:2:',':'.'}</td>
                            <td class="text-right">{$datos.puro|number_format:2:',':'.'}</td>
                            <td>{$datos.nro_closemat}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
{else}
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
{/if}
{if isset($cierremat)}
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body alert alert-info fade in">
                    <div class="col-sm-8"><strong>{$cierremat.nro_closemat}</strong></div>
                    <div class="col-sm-8">Fecha: <strong>{$cierremat.fecha_close|date_format:"%d/%m/%Y"}</strong></div>
                    <div class="col-sm-2">Monto Total :</div>
                    <div class="col-sm-2 text-right"><strong>{$cierremotto|number_format:2:'.':','}</strong></div>
                    <div class="col-sm-8">Nombre: <strong>{$cierremat.nombre}</strong></div>
                    <div class="col-sm-2">Abonos :</div>
                    <div class="col-sm-2 text-right"><strong>{$abono|number_format:2:'.':','}</strong></div>
                    <div class="col-sm-8">Nro Liquidacion: <strong>{$cierremat.nro_liqdivbsf} $</strong></div>
                    <div class="col-sm-2">Status:</div>
                    <div class="col-sm-2 text-right"><strong>{$montoxabono|number_format:2:'.':','}</strong></div>
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
                        {foreach item=datos from=$abonos}
                            <tr>
                                <td>{$datos.nombres_apellidos}</td>
                                <td>{$datos.fecha|date_format}</td>
                                <td class="text-right">{$datos.name_bank}</td>
                                <td class="text-right">{$datos.id_nro_cuenta}</td>
                                <td class="text-right">{$datos.monto|number_format:2:',':'.'}</td>
                                <td>{$datos.nro_closemat}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
{else}
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
{/if}
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
        $('#table_abo').DataTable();
    } );
</script>