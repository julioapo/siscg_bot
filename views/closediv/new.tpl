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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierrediv" action="{$_layoutParams.root}closediv/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Colocador Div:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Banco:<span class="required">*</span></label></div>
                        <div class="col-md-5"><label>Cuenta Bancaria:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="liquidador" id="liquidador">
                                <option value=""> - seleccione - </option>
                                {foreach item=liq from=$liquidadores}
                                    <option value="{$liq.id_colocador}">{$liq.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="banksliq" id="banksliq"></select>
                        </div>
                        <div class="col-md-5">
                            <select name="cuentliq" id="cuentliq"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tipo de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Nro de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Monto de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-2">
                            <div >
                                <input name="fecha_closediv" type="date" step="1" class="form-control" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="tip_tranbank" id="banksliq">
                                <option value=""> - seleccione - </option>
                                {foreach item=ttb from=$tiptraban}
                                    <option value="{$ttb.id_tipotrans}">{$ttb.name_transf}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nro_transaccion">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" name="monto_transaccion" onkeypress="return(formato_moneda(this,',','.',event))">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Concepto:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="concepto" cols="80" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Pais Origen:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="country" id="country">
                                <option value=""> - seleccione - </option>
                                {foreach item=c from=$country}
                                    <option value="{$c.id_pais}">{$c.name_country}</option>
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