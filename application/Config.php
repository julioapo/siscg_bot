<?php
/**
 * Config.php
 * @Author: Julio Aponte
 * @Date:   2016-06-28 23:16:55
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-30 23:10:03
 */

/*
 * Defniniciones Generales del Sistema
 */
define('BASE_URL','/siscg_bot/');
define('DEFAULT_CONTROLLER','index');
define('DEFAULT_LAYOUT','default');
define('APP_NAME','.:: Sistema Control Gerencial ::.');
define('APP_FOOT','Recomendado el uso <a href="http://www.mozilla.com/firefox/">Firefox 46.0.1 </a>y una resoluci&oacute;n de 1024x768 <span style=\"color:#999\">
             Copyright &copy; 2016 S.C.G /
             Todos los derechos reservados</span>');
/*
 * Definicione de Base de Datos
 * Servidor , Usuario, Contraseña, Base de Datos, Driver PDO, Puerto Base de Datos
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'desarrollo');
define('DB_PASS', 'desarrollo');
define('DB_NAME', 'scg_db');
define('DB_DRIVER', 'pgsql:');
define('DB_PORT', '5432');

/*
 * Defincion de duración de la session
 */
define('SESSION_TIME', 60);
define('HASH_KEY','576c6db090f59');