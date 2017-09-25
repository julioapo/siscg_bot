<?php
/**
 * @Author: Julio Aponte
 * @Date:   2016-06-28 23:17:47
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-29 01:47:05
 */

abstract class Controller
{
	private $_registry;
    protected $_views;
    protected $_acl;

    public function __construct()
    {
        $this->_registry = Registry::getInstancia();
        $this->_acl = new Acl();
        //$this->_acl = $this->_registry->_acl;
        $this->_views = new View($this->_registry->_request, $this->_acl);

    }

    abstract public function index();

    protected function loadModel($models){

        $models = $models . 'Model';
        $rutaModels = ROOT . 'models' . DS . $models . '.php';

        if(is_readable($rutaModels))
        {
            require_once $rutaModels;
            $models = new $models;
            return $models;
        }
        else {
            throw new Exception("Error de Modelo");
        }
    }

    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave],ENT_QUOTES);
            return $_POST[$clave];
        }
        return '';
    }

    /**
     * [getInt description]
     * Funcion que filtra las variables enteros enviadas por la url con el metodo POST
     * evitando la inyeccion de SQL
     * @param  [type] $clave [description]
     * @return int [type]        [description]
     */
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        return 0;
    }

    /**
     * [filtrarInt description]
     * Funcion que filtra las variables enteros enviadas por la url con el metodo GET
     * @param  [type] $int [description]
     * @return int [type]      [description]
     */
    protected function filtrarInt($int)
    {
        $int = (int) $int;
        if (is_int($int)) {
            return $int;
        }
        else {
            return 0;
        }
    }

    /**
     * [redireccionar envia luego de una accion llamadas a paginas]
     * @param  boolean $ruta [description]
     * @return void [type]        [description]
     */
    protected function redireccionar($ruta = false)
    {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function getPostParam($clave)
    {
        if (isset($_POST[$clave])) {
            return $_POST[$clave];
        }
    }

    protected function getAlphaNum($clave)
    {
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
            $_POST[$clave] = (string) preg_replace( '/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return $_POST[$clave];
        }
    }

    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = pg_escape_string($_POST[$clave]);
                return trim($_POST[$clave]);
            }
            else{
                $_POST[$clave] = pg_escape_string($_POST[$clave]);
                return trim($_POST[$clave]);
            }
        }
    }

    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;
    }

    public function validarFecha($fecha)
    {
        $partes = explode("-",$_POST[$fecha]);

        if(checkdate(intval($partes[1]),intval($partes[2]),intval($partes[0]))){
            return true;
        }
        else{
            return false;
        }
    }

    public function getMessage($id)
    {
        $mensaje[1] = "Registro agregado con exito";
        $mensaje[2] = "Registro modificado con exito";
        $mensaje[3] = "Registro eliminado con exito";
        $mensaje[20] = "Permisos guardados con exito";

        if(!array_key_exists($id, $mensaje)){
            throw new Exception("Proceso realizado??? verifique....");
        }
        else {
            return $mensaje[$id];
        }
    }

    public function getMonto($monto)
    {
        if (isset($_POST[$monto]) && !empty($_POST[$monto])) {
            $_POST[$monto] = (string) str_replace(".","",$_POST[$monto]);
            $_POST[$monto] = (string) str_replace(",",".",$_POST[$monto]);
            return $_POST[$monto];
        }
    }

    protected function getIntGET($clave)
    {
        if(isset($_GET[$clave]) && !empty($_GET[$clave])){
            $_GET[$clave] = filter_input(INPUT_GET, $clave, FILTER_VALIDATE_INT);
            return $_GET[$clave];
        }
        return 0;
    }

    protected function getLibrary($library)
    {
        $rutaLibrary = ROOT . 'libs' . DS . $library . '.php';

        if(is_readable($rutaLibrary)){
            require_once $rutaLibrary;
        }
        else{
            throw new Exception('Error de Libreria');
        }

    }
}