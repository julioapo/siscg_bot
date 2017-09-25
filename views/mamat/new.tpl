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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_mamat" action="{$_layoutParams.root}mamat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre Mayorista M.:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre" value="{if isset($datos.nombre)} {$datos.nombre} {/if}">
                        </div>
                        <div class="col-md-4">
                            <label>Rif / Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="rif" value="{if isset($datos.rif)} {$datos.rif} {/if}">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <label class="control-label">Dirección:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="60" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="btn-row">
                        <div class="col-md-4">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-md-4">
                            <label>Persona Contacto:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="contacto" value="{if isset($datos.contacto)} {$datos.contacto} {/if}">
                        </div>
                        <div class="col-md-4">
                            <label>Teléfono Contacto:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_contacto" value="{if isset($datos.telefono_contacto)} {$datos.telefono_contacto} {/if}">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Insertar"><i class="fa fa-save"></i>Insertar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>