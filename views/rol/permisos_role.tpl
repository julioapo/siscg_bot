<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
            <li><i class="fa fa-users"></i>{$roles.nombre}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" id="perm_rol" action="">
                    <input type="hidden" name="guardar" value="1">
                    {if isset($permisos) && count($permisos)}
                        <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Permiso</th>
                                    <th>Habilitado</th>
                                    <th>Denegado</th>
                                    <th>Ignorar</th>
                                </tr>
                            </thead>
                            <tbody>
                            {foreach item=pr from=$permisos}
                                <tr>
                                    <td>{$pr.nombre}</td>
                                    <td>
                                        <input type="radio" name="perm_{$pr.id}" value="1" {if ($pr.valor == 1)}checked="checked"{/if}/></td>
                                    <td><input type="radio" name="perm_{$pr.id}" value="" {if ($pr.valor == "")}checked="checked"{/if}/></td>
                                    <td><input type="radio" name="perm_{$pr.id}" value="x" {if ($pr.valor === 'x')}checked="checked"{/if}/>
                                    </td>
                                </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    {/if}
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit" value="Guardar">Guardar</button>
                        <button class="btn btn-default" type="reset">Limpiar</button>
                    </div>
                    <!-- FIN Tabla para el formulario  -->
                </form>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#table_id').DataTable({
            "columnDefs": [
                { "width": "60%", "targets": 0 }
            ]
        });
    } );
</script>