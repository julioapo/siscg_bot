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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierrebsf" action="{$_layoutParams.root}closebsf/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Liq. Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Banco:<span class="required">*</span></label></div>
                        <div class="col-md-5"><label>Cuenta Bancaria:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="liquidador" id="liquidador">
                                <option value=""> - seleccione - </option>
                                {foreach item=com from=$compradores}
                                    <option value="{$com.id_comprador}">{$com.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="bankscomp" id="bankscomp"></select>
                        </div>
                        <div class="col-md-5">
                            <select name="cuentcomp" id="cuentcomp"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"><label>Cierre Div:<span class="required">*</span></label></div>
                        <div class="col-md-2"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tipo de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Nro de Transacci&oacute;n:<span class="required">*</span></label></div>
                        <div class="col-md-3">
                            <select name="cierrediv" id="cierrediv">
                                <option value=""> - seleccione - </option>
                                {foreach item=cd from=$cierresdiv}
                                    <option value="{$cd.id_cierrediv}">{$cd.id_operacion}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div >
                                <input name="fecha_closebsf" type="date" step="1" class="form-control" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select name="tip_tranbank" id="tip_tranbank">
                                <option value=""> - seleccione - </option>
                                {foreach item=ttb from=$tiptraban}
                                    <option value="{$ttb.id_tipotrans}">{$ttb.name_transf}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="nro_transaccion">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"><label>Monto en Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Tasa de Cambio:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Monto de Trans. BsF:<span class="required">*</span></label></div>
                        <div class="col-md-3"><label>Status:<span class="required">*</span></label></div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="monto_dls" name="monto_dls" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="tasa_cambio" name="tasa_cambio" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control text-right" id="monto_bsf" name="monto_bsf" readonly onfocus="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <select name="status" id="status">
                                <option value=""> - seleccione - </option>
                                {foreach item=st from=$statraban}
                                    <option value="{$st.id_status}">{$st.name_status}</option>
                                {/foreach}
                            </select>
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