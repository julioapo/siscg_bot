<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 13/07/16
 * Time: 07:51 PM
 */

function autoloadCore($class){
    if(file_exists(APP_PATH . ucfirst(strtolower($class)) .'.php')){
        include_once APP_PATH . ucfirst(strtolower($class)) .'.php';
    }
}

function autoloadLibs($class){
    if(file_exists(APP_PATH . strtolower($class) .'.php')){
        include_once APP_PATH . strtolower($class) .'.php';
    }
}

spl_autoload_register('autoloadCore');
spl_autoload_register('autoloadLibs');