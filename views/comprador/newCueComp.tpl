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
                <form class="form-validate form-horizontal" role="form" method="post" id="new_cuecomp" action="">
                    <input type="hidden" name="insertar" value="1">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Banco:</label>
                            <select name="id_banco" id="id_banco">
                                <option value=""> - seleccione - </option>
                                {foreach item=bank from=$bancos}
                                    <option value="{$bank.id_bank}">{$bank.name_bank}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label>Nro Cuenta Bancaria:<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nro_cuenta">
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