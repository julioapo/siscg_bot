<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
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
                {if isset($entmat) && count($entmat)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nombre.</th>
                            <th>Fecha</th>
                            <th>Gramas</th>
                            <th>Ley</th>
                            <th>Puro</th>
                            <th>C. Material</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$entmat}
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