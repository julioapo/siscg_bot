<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
{if isset($error)}
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Nota!</strong> {$error}
    </div>
{/if}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_usuario" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Usuario:</label>
                            <input type="text" class="form-control" name="nombre" value="{if isset($datos.nombres)}{$datos.nombres}{/if}" disabled>
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:</label>
                            <input type="text" class="form-control" name="cedula" value="{if isset($datos.cedula)}{$datos.cedula}{/if}" disabled>
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono" value="{if isset($datos.telefono)}{$datos.telefono}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>login:</label>
                            <input type="text" class="form-control" name="userlogin" disabled value="{if isset($datos.userlogin)}{$datos.userlogin}{/if}"></td>
                        </div>
                        <div class="col-md-4">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email" value="{if isset($datos.email)}{$datos.email}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label>Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="80" rows="3">{if isset($datos.direccion)}{$datos.direccion}{/if}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Empresas:</label>
                            <select name="compdiv_usuario" id="compdiv_usuario">
                                {foreach  item=compdiv from=$user_compdiv}
                                    <option value="{$compdiv.id_comprador}" {if ($compdiv.id_comprador == $datos.id_comprador)}{"SELECTED"}{/if}>{$compdiv.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Rol:</label>
                            <select name="rol_usuario" id="rol">
                                {foreach  item=rol from=$user_rol}
                                    <option value="{$rol.id_rol}" {if ($rol.id_rol == $datos.id_rol)}{"SELECTED"}{/if}>{$rol.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Modificar"><i class="fa fa-save"></i>Modificar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>