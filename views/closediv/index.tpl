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
                {if isset($cierres) && count($cierres)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Banco</th>
                            <th>Nro Operaci&oacute;n</th>
                            <th>Fecha Operaci&oacute;n</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$cierres}
                            <tr>
                                <td>{$datos.empresa}</td>
                                <td>{$datos.name_bank}</td>
                                <td>{$datos.nro_operacion}</td>
                                <td>{$datos.fecha_operacion|date_format}</td>
                                <td><a href="#" data-user="{$datos.id_cierrediv}" data-toggle="tooltip" title="Detalles"><i class="fa fa-info-circle  col-md-1"></i></a>
                                    <a href="{$_layoutParams.root}closediv/status/{$datos.id_cierrediv}" data-toggle="tooltip" title="Status"><i class="fa fa-file-text col-md-1"></i></a></td>
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