<div id="error">
    {if isset($error)}
        {$error}
    {/if}
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Acceso S.C.G. ::.</h3>
            </div>
            <div class="panel-body">
                <form action="" method="post" name="form1">
                    <input type="hidden" name="enviar" value="1">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" id="username" name="username" title="Nombre Usuario" placeholder="Usuario" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password" name="pass" placeholder="Contraseña"  title="Contraseña" type="password">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" id="submit" value="Ingresar...">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>