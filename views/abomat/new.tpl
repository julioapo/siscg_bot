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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierremat" action="{$_layoutParams.root}abomat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-1"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-2"><input name="fecha" type="date" step="1" class="form-control" value="{$smarty.now|date_format:"%Y-%m-%d"}"></div>
                        <div class="col-md-4">
                            <label>M. Material:<span class="required">*</span></label>
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                {foreach item=mm from=$nommamat}
                                    <option value="{$mm.id_mamat}">{$mm.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>C. Material:<span class="required">*</span></label>
                            <select name="id_closemat" id="id_closemat"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Cliente:<span class="required">*</span></label>
                            <select name="id_cliente" id="id_cliente"></select>
                        </div>
                        <div class="col-md-4">
                            <label>Bancos Cli:<span class="required">*</span></label>
                            <select name="id_bank" id="id_bank"></select>
                        </div>
                        <div class="col-md-4">
                            <label>Cuentas Cli:<span class="required">*</span></label>
                            <select name="cuentcli" id="cuentcli"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Tipo Transa:<span class="required">*</span></label>
                            <select name="id_transbank" id="id_transbank">
                                <option value=""> - seleccione - </option>
                                {foreach item=ttb from=$tiptransbank}
                                    <option value="{$ttb.id_tipotrans}">{$ttb.name_transf}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Nro Transaccion:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="nro_transaccion" name="nro_transaccion">
                        </div>
                        <div class="col-md-3">
                            <label>Monto:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="monto" name="monto" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <label>Beneficiario:<span class="required">*</span></label>
                            <input type="text" class="form-control" id="beneficiario" name="beneficiario">
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