<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-10">
                        <a href="{$_layoutParams.root}{$ruta_agregar}">
                            <button class="btn btn-primary btn-sm" type="button">
                                <i class="fa fa-plus-circle"></i> {$titulo_agregar}
                            </button>
                        </a>
                    </div>
                </div>
                {if isset($roles) && count($roles)}
                    <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach item=datos from=$roles}
                            <tr>
                                <td>{$datos.id_rol}</td>
                                <td>{$datos.nombre}</td>
                                <td><a href="{$_layoutParams.root}rol/permisos_rol/{$datos.id_rol}" data-toggle="tooltip" title="Permisos"><i class="fa fa-lock  col-md-1"></i></a>
                                    <a href="{$_layoutParams.root}rol/editar/{$datos.id_rol}" data-toggle="tooltip" title="Editar" ><i class="fa fa-edit col-md-1"></i></a>
                                    <a href="#" onclick="javascript:return pregunta('{$_layoutParams.root}rol/eliminar/{$datos.id_rol}');" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o col-md-1"></i></a>
                                </td>
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
<script type="text/javascript">
    $(document).ready( function (){
        $('#table_id').DataTable();
    });
</script>