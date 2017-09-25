<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
{if isset($cierrediv)}
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body alert alert-info fade in">
                <div class="col-md-4"><strong>{$cierrediv.id_operacion}</strong></div>
                <div class="col-md-2">Fecha: <strong>{$cierrediv.fecha_operacion|date_format:"%d/%m/%Y"}</strong></div>
                <div class="col-md-2">Status: <strong>{$cierrediv.name_status}</strong></div>
                <div class="col-md-2">Monto Colocado:</div>
                <div class="col-md-2 text-right"><strong>{$montocol|number_format:2:',':'.'} $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto Liq:</div>
                <div class="col-md-2 text-right"><strong>{$montoliq|number_format:2:',':'.'} $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto x liquid.:</div>
                <div class="col-md-2 text-right"><strong>{$montoxliq|number_format:2:',':'.'} $</strong></div>
            </div>
            <div class="panel-content">
                <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Monto Divisas</th>
                        <th>Tasa de Cambio</th>
                        <th>Monto BsF</th>
                        <th>Nro Liqui.</th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach item=datos from=$cierre}
                        <tr>
                            <td>{$datos.nombre}</td>
                            <td>{$datos.fecha_operacion|date_format}</td>
                            <td>{$datos.monto_dls|number_format:2:',':'.'}</td>
                            <td>{$datos.tasa_chan|number_format:2:',':'.'}</td>
                            <td>{$datos.monto_bsf|number_format:2:',':'.'}</td>
                            <td>{$datos.nro_liqdivbsf}</td>
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
                    <strong>Advertencia!</strong> No existen datos de liquidación.
                </div>
            </div>
        </section>
    </div>
</div>
{/if}
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
</script>