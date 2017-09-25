<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="fa fa-folder-open"></i><a href="{$_layoutParams.modulo}">{$titulo_pri}</a></li>
            <li><i class="icon_document_alt"></i>{$titulo_mod}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_colocador" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre:<span class="required">*</span></label>
                            <input type="text" class="form-control" disabled name="nombre" value="{if isset($datos.nombre)}{$datos.nombre}{/if}">
                        </div>
                        <div class="col-md-3">
                            <label>Telefono Fijo:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_fijo" value="{if isset($datos.telefono_fijo)}{$datos.telefono_fijo}{/if}">
                        </div>
                        <div class="col-md-3">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email" value="{if isset($datos.email)}{$datos.email}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label class="control-label">Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="60" rows="3">{if isset($datos.direccion)}{$datos.direccion}{/if}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-row">
                            <div class="col-md-4">
                                <label>Representante Legal:</label>
                                <input type="text" class="form-control" name="representante_legal" value="{if isset($datos.representante_legal)}{$datos.representante_legal}{/if}">
                            </div>
                            <div class="col-md-3">
                                <label>Telefono Representante:<span class="required">*</span></label>
                                <input type="text" class="form-control" name="telefono_repre" value="{if isset($datos.telefono_repre)}{$datos.telefono_repre}{/if}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">Observaciones:</label>
                        </div>
                        <div class="col-md-7">
                            <textarea name="observaciones" cols="60" rows="3">{if isset($datos.observaciones)}{$datos.observaciones}{/if}</textarea>
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