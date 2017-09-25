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
                {if isset($usuarios) && count($usuarios)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>E-mail</th>
                            <th>Rol</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$usuarios}
                            <tr>
                                <td>{$datos.nombres}</td>
                                <td>{$datos.telefono}</td>
                                <td>{$datos.email}</td>
                                <td>{$datos.rol_name}</td>
                                <td><a href="{$_layoutParams.root}usuarios/permisos_user/{$datos.id_usuario}" data-toggle="tooltip" title="Permisos"><i class="fa fa-lock  col-md-1"></i></a>
                                <a href="{$_layoutParams.root}usuarios/editar/{$datos.id_usuario}" data-toggle="tooltip" title="Editar"><i class="fa fa-edit col-md-1"></i></a>
                                <a href="#" data-toggle="tooltip" title="Eliminar" onclick="javascript:return pregunta('{$_layoutParams.root}usuarios/eliminar/{$datos.id_usuario}');"><i class="fa fa-trash-o col-md-1"></i></a></td>
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