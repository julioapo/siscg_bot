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
                <form class="form-validate form-horizontal" role="form" method="post" id="edit_cliente" action="">
                    <input type="hidden" name="modificar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Cliente:<span class="required">*</span></label>
                            <input type="text" class="form-control" autofocus name="nombre" value="{if isset($datos.nombres_apellidos)}{$datos.nombres_apellidos}{/if}">
                        </div>
                        <div class="col-md-2">
                            <label>Cedula:</label>
                            <input type="text" disabled class="form-control" name="cedula" value="{if isset($datos.cedula_identidad)}{$datos.cedula_identidad}{/if}">
                        </div>
                        <div class="col-md-5">
                            <label>Teléfono Movil:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="telefono_movil" value="{if isset($datos.telefono_movil)}{$datos.telefono_movil}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Teléfono Fijo:</label>
                            <input type="text" class="form-control" name="telefono_fijo" value="{if isset($datos.telefono_fijo)}{$datos.telefono_fijo}{/if}">
                        </div>
                        <div class="col-md-4">
                            <label>@mail:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="email" value="{if isset($datos.email)}{$datos.email}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Dirección:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="direccion" cols="50" rows="3">{if isset($datos.direccion)}{$datos.direccion}{/if}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Dias Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="dia_max_cre" value="{if isset($datos.dias_max_credito)}{$datos.dias_max_credito}{/if}"></td>
                        </div>
                        <div class="col-md-4">
                            <label>Monto Maximo Credito:</label>
                            <input type="text" class="form-control text-right" name="monto_max_cre" value="{if isset($datos.monto_max_credito)}{$datos.monto_max_credito}{/if}">
                        </div>
                        <div class="col-md-4">
                            <label>Gramas Maxima Entrega:</label>
                            <input type="text" class="form-control text-right" name="grama_max_ent" value="{if isset($datos.gramas_max_entrega)}{$datos.gramas_max_entrega}{/if}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Zona de Trabajo:</label>
                            <select name="zona" id="zona">
                                {foreach  item=zona from=$zonas}
                                    <option value="{$zona.id_zona}" {if ($zona.id_zona == $datos.zona_trabajo)}{"SELECTED"}{/if}>{$zona.name_zona}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Status:<span class="required">*</span></label>
                            <select name="status" id="status">
                                {foreach  item=statu from=$status}
                                    <option value="{$statu.id_status}" {if ($statu.id_status == $datos.status)}{"SELECTED"}{/if}>{$statu.name_status}</option>
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