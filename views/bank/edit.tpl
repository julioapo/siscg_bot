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
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_bank" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Nombre Banco:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" autofocus name="nombre" value="{if isset($datos.name_bank)}{$datos.name_bank}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Telefono:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="telefono" value="{if isset($datos.telefono)}{$datos.telefono}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Persona Contacto:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="contacto" value="{if isset($datos.contacto)}{$datos.contacto}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Teléfono Contacto:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="telefono_contacto" value="{if isset($datos.telefono_contacto)}{$datos.telefono_contacto}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <button class="btn btn-primary" type="submit" value="Modificar"><i class="fa fa-save"></i> Modificar</button>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>