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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierremat" action="{$_layoutParams.root}closemat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4"><label>Mayorista Material:<span class="required">*</span></label></div>
                        <div class="col-md-4"><label>Liq. Divisas:<span class="required">*</span></label></div>
                        <div class="col-md-4"><label>Fecha:<span class="required">*</span></label></div>
                        <div class="col-md-4">
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                {foreach item=mm from=$masmat}
                                    <option value="{$mm.id_mamat}">{$mm.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="id_liqdivbsf" id="id_liqdivbsf">
                                <option value=""> - seleccione - </option>
                                {foreach item=ldb from=$liqdivbsf}
                                    <option value="{$ldb.id_liqdivbsf}">{$ldb.nro_liqdivbsf}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input name="fecha_close" type="date" step="1" class="form-control" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Cierre de Gramas:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="gramas_close" name="gramas_close" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-2">
                            <label>Costo Grama:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="precio_gramas" name="precio_gramas" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <label>Total Costo BsF:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="monto_total_close" name="monto_total_close" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <label>Observaciones:<span class="required">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="observacion" cols="80" rows="3"></textarea>
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