<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Julio Aponte">
    <title>{$_layoutParams.configs.app_name}</title>
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}bootstrap-social.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}estilo.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_css}DataTables/jquery.dataTables.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_js}alertify.js-0.3.11/themes/alertify.core.css" type="text/css">
    <link rel="stylesheet" href="{$_layoutParams.ruta_js}alertify.js-0.3.11/themes/alertify.default.css" type="text/css">
</head>
<body>
<div class="container">
    {include file=$_contenido}
</div>
<script src="{$_layoutParams.ruta_js}jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="{$_layoutParams.ruta_js}bootstrap.js"></script>
<script src="{$_layoutParams.ruta_js}master.js" type="text/javascript"></script>
<script src="{$_layoutParams.ruta_js}alertify.js-0.3.11/lib/alertify.min.js" type="text/javascript"></script>
<script src="{$_layoutParams.ruta_js}DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
</body>
</html>