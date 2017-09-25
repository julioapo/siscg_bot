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
                <form class="form-validate form-horizontal" role="form" method="post" id="edi_permiso" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Nombre del Permiso:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" autofocus name="permiso" value="{if isset($datos.permiso)}{$datos.permiso}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>llave de Permiso:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="key" value="{if isset($datos.key)}{$datos.key}{/if}">
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