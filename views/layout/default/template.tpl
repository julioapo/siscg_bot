<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Julio Aponte">
    <title>{$_layoutParams.configs.app_name}</title>
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}elegant-icons-style.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}style.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}style-responsive.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}sweetalert.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}DataTables/dataTables.bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}responsive.bootstrap.min.css" type="text/css">
    <script src="{$_layoutParams.ruta_js}jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
    <script src="{$_layoutParams.ruta_js}jquery.validate.min.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}form-validation-script.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}jquery.nicescroll.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}scripts.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}master.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}sweetalert.min.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}DataTables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}DataTables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="{$_layoutParams.ruta_js}responsive.bootstrap.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script type="text/javascript">
        {include file='scripts.tpl'}
    </script>
</head>
<body>
<!-- container section start -->
<section id="container" class="">
<!--header start-->
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="{$_layoutParams.root}" class="logo">S.C.G. <span class="lite">Admin Ver 0.1</span></a>
        <!--logo end-->

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <!-- inbox notificatoin start-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        <span class="username">{$smarty.session.nombre}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="{$_layoutParams.root}cpass?user={$smarty.session.userlogin}"><i class="icon_profile"></i> Cambiar Password</a>
                        </li>
                        <li>
                            <a href="#" onclick="javascript:logout();"><i class="icon_key_alt"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
<!--header end-->

<!--sidebar menu start-->
    {include file='menu.tpl'}
<!--sidebar menu end-->

<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!-- Form validations -->
        {include file=$_contenido}
        <!-- page end-->
    </section>
</section>
<!--main content end-->
</section>
<!-- container section end -->

<!-- seccion file include js modules -->
{if isset($_layoutParams.file) && count($_layoutParams.file)}
    {foreach item=fi from=$_layoutParams.file}
        <script src="{$fi}" type="text/javascript"></script>
    {/foreach}
{/if}
<!-- seccion file include js modules -->

<!-- seccion script include js modules -->
{if isset($_layoutParams.js) && count($_layoutParams.js)}
    {foreach item=js from=$_layoutParams.js}
        <script src="{$js}" type="text/javascript"></script>
    {/foreach}
{/if}
<!-- seccion script include js modules -->
</body>
</html>