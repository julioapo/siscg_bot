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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cierremat" action="{$_layoutParams.root}entmat/nuevo">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Fecha:<span class="required">*</span></label>
                            <input name="fecha" type="date" step="1" class="form-control" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                        </div>
                        <div class="col-md-3">
                            <label>M. Material:<span class="required">*</span></label>
                            <select name="id_mamat" id="id_mamat">
                                <option value=""> - seleccione - </option>
                                {foreach item=mm from=$nommamat}
                                    <option value="{$mm.id_mamat}">{$mm.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>C. Material:<span class="required">*</span></label>
                            <select name="id_closemat" id="id_closemat"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label>Gramas:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="gramos" name="gramos" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-2">
                            <label>Ley:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="ley" name="ley" onkeypress="return(formato_moneda(this,'.',',',event))">
                        </div>
                        <div class="col-md-3">
                            <label>Puro:<span class="required">*</span></label>
                            <input type="text" class="form-control text-right" id="puro" name="puro" readonly>
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