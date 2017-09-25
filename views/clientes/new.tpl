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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cliente" action="{$_layoutParams.root}clientes/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Cliente:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre">
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="cedula">
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono Movil:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_movil">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Teléfono Fijo:</label>
                            <input type="text" class="form-control" name="telefono_fijo">
                        </div>
                        <div class="col-md-4">
                            <label>@mail:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Dirección:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="50" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Dias Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="dia_max_cre">
                        </div>
                        <div class="col-md-4">
                            <label>Monto Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="monto_max_cre">
                        </div>
                        <div class="col-md-4">
                            <label>Gramas Maxima Entrega:</label>
                            <input type="text" class="form-control text-right" name="grama_max_ent">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Zona de Trabajo:</label>
                            <select name="zona" id="zona">
                                <option value=""> - seleccione - </option>
                                {foreach  item=zona from=$zonas}
                                    <option value="{$zona.id_zona}">{$zona.name_zona}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Status:<span class="required">*</span></label>
                            <select name="status" id="status">
                                <option value=""> - seleccione - </option>
                                {foreach  item=statu from=$status}
                                    <option value="{$statu.id_status}">{$statu.name_status}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>Mayorista Mat.:</label>
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                {foreach  item=mm from=$mamat}
                                    <option value="{$mm.id_mamat}">{$mm.nombre}</option>
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
                </form>
            </div>
        </section>
    </div>
</div>