<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-9"><p class="text-info">{$info.nombres_apellidos}</p></div>
                    <div class="col-md-3">
                        <a href="{$_layoutParams.root}{$ruta_agregar}/{$id_cliente}">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> {$titulo_agregar}
                            </button>
                        </a>
                    </div>
                </div>
                {if isset($infbank) && count($infbank)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Banco</th>
                            <th>Nro Cuenta</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$infbank}
                            <tr>
                                <td>{$datos.name_bank}</td>
                                <td>{$datos.nro_cuenta}</td>
                                <td><a href="#" data-toggle="tooltip" title="Eliminar" onclick="javascript:return pregunta('{$_layoutParams.root}clientes/dropCueCli/{$datos.id_cliente}/{$datos.nro_cuenta}/{$datos.id_banco}');"><i class="fa fa-trash-o col-md-1"></i></a></td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                {else}
                    <p><strong>No hay Cuentas Bancarias!!!</strong></p>
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