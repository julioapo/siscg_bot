<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
            <li><i class="fa fa-user"></i>{$info.nombres}</li>
            <li><i class="fa fa-users"></i>{$info.nombre}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 small">
        <section class="panel">
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" id="perm_usuario" action="">
                    <input type="hidden" name="guardar" value="1">
                    {if isset($permisos) && count($permisos)}
                        <table id="table_id" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Permiso</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach from=$permisos item=pr}
                                {if $role.$pr.valor == 1}
                                    {assign var="v" value="habilitado"}
                                {else}
                                    {assign var="v" value="denegado"}
                                {/if}
                                <tr>
                                    <td>{$usuarios.$pr.permiso}</td>
                                    <td>
                                        <select name="perm_{$usuarios.$pr.id}">
                                            <option value="x" {if $usuarios.$pr.heredado} selected="selected"{/if}>Heredado({$v})</option>
                                            <option value="1" {if ($usuarios.$pr.valor == 1 && $usuarios.$pr.heredado == "")} selected="selected"{/if}>Habilitado</option>
                                            <option value="" {if ($usuarios.$pr.valor == "" && $usuarios.$pr.heredado == "")} selected="selected"{/if}>Desabilitado</option>
                                        </select>
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
                { "width": "60%", "targets": 1 }
            ]
        });
    } );
</script>