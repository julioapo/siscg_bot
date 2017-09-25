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
                    <div class="col-md-2 col-md-offset-9">
                        <a href="{$_layoutParams.root}{$ruta_agregar}">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> {$titulo_agregar}
                            </button>
                        </a>
                    </div>
                </div>
                {if isset($clientes) && count($clientes)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Cedula</th>
                            <th>Telefono Movil</th>
                            <th>Status</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$clientes}
                            <tr>
                                <td>{$datos.nombres_apellidos}</td>
                                <td>{$datos.cedula_identidad}</td>
                                <td>{$datos.telefono_movil}</td>
                                <td>{if ($datos.status == 1)}
                                     <span class="btn-success btn-sm">Activo</span>
                                {else}
                                    <span class="btn-warning btn-sm">Inactivo</span>
                                {/if}</td>
                                <td>
                                    <a href="{$_layoutParams.root}clientes/inf_bancaria/{$datos.id_cliente}" data-toggle="tooltip" title="Información Bancaria"><i class="fa fa-bank col-md-1"></i></a>
                                    <a href="{$_layoutParams.root}clientes/editar/{$datos.id_cliente}" data-toggle="tooltip" title="Editar"><i class="fa fa-edit col-md-1"></i></a>
                                    <a href="#" data-toggle="tooltip" title="Eliminar" onclick="javascript:return pregunta('{$_layoutParams.root}clientes/eliminar/{$datos.id_cliente}');"><i class="fa fa-trash-o col-md-1"></i></a>
                                </td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                    {else}
                    <p><strong>No hay Clientes!!!</strong></p>
                    {/if}
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "columnDefs": [
                { "width": "15%", "targets": 4 }
            ]
        });
    } );
</script>