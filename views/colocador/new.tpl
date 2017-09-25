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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_colocador" action="{$_layoutParams.root}colocador/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nombre:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre">
                        </div>
                        <div class="col-md-3">
                            <label>Telefono Fijo:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_fijo">
                        </div>
                        <div class="col-md-3">
                            <label>@mail:</label>
                            <input type="text" class="form-control" name="email">
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
                        <div class="col-md-4">
                            <label>Representante Legal:</label>
                            <input type="text" class="form-control" name="representante_legal">
                        </div>
                        <div class="col-md-3">
                            <label>Telefono Representante:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_repre">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label class="control-label">Observaciones:</label>
                        </div>
                        <div class="col-md-7">
                            <textarea name="observaciones" cols="60" rows="3"></textarea>
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