<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-files-o"></i> Cambio de Password</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="{$_layoutParams.root}">Home</a></li>
            <li><i class="icon_document_alt"></i>Cambio de Password</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cambio de Password
            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                        <input type="hidden" name="username" value="{$username}">
                        <input type="hidden" name="enviar" value="1">
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Nuevo Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password" name="password" type="password" />
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-2">Confirme Password <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="cpassword" name="cpassword" type="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                                <button class="btn btn-default" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>