<div id="error_form">

<p>
{if isset($error)}
    {$error}
{/if}
</p>
<br>
    {if Session::getSession('autenticado')}
    <a href="{$_layoutParams.root}">Ir a inicio</a> | <a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>
    {else}
    <a href="{$_layoutParams.root}login">Iniciar Sesion</a>
    {/if}
</div>