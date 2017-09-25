<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
{if isset($liqdivbsf)}
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body alert alert-info fade in">
                <div class="col-md-4"><strong>{$liqdivbsf.nro_liqdivbsf}</strong></div>
                <div class="col-md-2">Fecha: <strong>{$liqdivbsf.fecha_opera|date_format:"%d/%m/%Y"}</strong></div>
                <div class="col-md-2">Status: <strong>{$liqdivbsf.name_status}</strong></div>
                <div class="col-md-2">Monto Liquidado:</div>
                <div class="col-md-2 text-right"><strong>{$montoliq|number_format:2:',':'.'} $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto Cierres Mat.:</div>
                <div class="col-md-2 text-right"><strong>{$montoclomat|number_format:2:',':'.'} $</strong></div>
                <div class="col-md-4"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2">Monto Activo.:</div>
                <div class="col-md-2 text-right"><strong>{$montoxclomat|number_format:2:',':'.'} $</strong></div>
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
                    {foreach item=datos from=$cierremat}
                        <tr>
                            <td>{$datos.nombre}</td>
                            <td>{$datos.fecha_opera|date_format}</td>
                            <td>{$datos.gramas_cierre|number_format:2:',':'.'}</td>
                            <td>{$datos.precio_gramas|number_format:2:',':'.'}</td>
                            <td>{$datos.monto_total_close|number_format:2:',':'.'}</td>
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
                    <strong>Advertencia!</strong> No existen tiene datos de cierre de material.
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