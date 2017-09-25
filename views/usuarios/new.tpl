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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_usuario" action="{$_layoutParams.root}usuarios/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Usuario:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre">
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="cedula">
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>login:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="userlogin">
                        </div>
                        <div class="col-md-4">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label>Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="80" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Liq Divisas:</label>
                            <select name="compdiv_usuario" id="compdiv_usuario">
                                <option value=""> - seleccione - </option>
                                {foreach item=compdiv from=$user_compdiv}
                                    <option value="{$compdiv.id_comprador}">{$compdiv.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Rol:</label>
                            <select name="rol_usuario" id="rol">
                                <option value=""> - seleccione - </option>
                                {foreach item=usr from=$user_rol}
                                    <option value="{$usr.id_rol}">{$usr.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Insertar"><i class="fa fa-save"></i>Insertar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                    <div class="alert alert-info fade in">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Nota!</strong> El Sistema genera clave '12345678' para preparar primer inicio de Session!!!
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>