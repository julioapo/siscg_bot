<?php
/**
 * Index.php
 * @Author: Julio Aponte
 * @Date:   2016-06-28 22:57:59
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-30 23:11:13
 */
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);

try{
    require_once APP_PATH . 'Autoload.php';
    require_once APP_PATH . 'Config.php';

    $registry = Registry::getInstancia();
    $registry->_request = new Request();
    $registry->_db = new Database();
    //$registry->_acl = new Acl();

    Session::initSession();

	Bootstrap::run($registry->_request);
}catch (Exception $e) {
    echo $e->getMessage();
}