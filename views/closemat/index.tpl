<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
{include file=$ruta}
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                        <a href="{$_layoutParams.root}{$ruta_agregar}">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> {$titulo_agregar}
                            </button>
                        </a>
                    </div>
                </div>
                {if isset($cierresmat) && count($cierresmat)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Id C. Mat.</th>
                            <th>Fecha</th>
                            <th>Mayorista Material</th>
                            <th>Gramas Total</th>
                            <th>Costo Grama</th>
                            <th>Total BsF</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$cierresmat}
                            <tr>
                                <td>{$datos.nro_closemat}</td>
                                <td>{$datos.fecha_close|date_format}</td>
                                <td>{$datos.nombre}</td>
                                <td class="text-right">{$datos.gramas_cierre}</td>
                                <td class="text-right">{$datos.precio_gramas|number_format:2:',':'.'}</td>
                                <td class="text-right">{$datos.monto_total_close|number_format:2:',':'.'}</td>
                                <td><a href="{$_layoutParams.root}closemat/status/{$datos.id_closemat}" data-toggle="tooltip" title="Status"><i class="fa fa-info-circle  col-md-1"></i></a></td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p><strong>No hay {$titulo_mod}!!!</strong></p>
                {/if}
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable();
    } );
</script>