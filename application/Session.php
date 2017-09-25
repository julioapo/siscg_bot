<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 01/07/16
 * Time: 01:07 AM
*/

class Session
{

    public static function initSession()
    {
        session_start();
    }

    public static function destroySession($clave = false)
    {
        if ($clave) {
            if (is_array($clave)) {
                for ($i=0; $i < count($clave); $i++) {
                    if (isset($_SESSION[$clave[$i]])) {
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else {
                if (isset($_SESSION[$clave])) {
                    unset($_SESSION[$clave]);
                }
            }
        }
        else {
            session_destroy();
        }
    }

    public static function setSession($clave, $valor)
    {
        if (!empty($clave))
            $_SESSION[$clave] = $valor;
    }

    public static function getSession($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }

    public static function accesoSession($level)
    {
        if (!Session::getSession('autenticado')) {
            header('location:' . BASE_URL . 'error/accessError/1000');
            exit;
        }

        Session::tiempoSession();

        if (Session::getlevelSession($level) > Session::getlevelSession(Session::getSession('level'))) {
            header('location:' . BASE_URL . 'error/accessError/1000');
            exit;
        }
    }

    public static function accesoSessionVista($level)
    {
        if (!Session::getSession('autenticado')) {
            return false;
        }

        if (Session::getlevelSession($level) > Session::getlevelSession(Session::getSession('level'))) {
            return false;
        }

        return true;
    }

    public static function getlevelSession($level)
    {
        $role['Administrador'] = 3;
        $role['Gerente'] = 2;
        $role['Usuario'] = 1;

        if(!array_key_exists($level, $role)){
            throw new Exception("Error de Acceso");
        }
        else {
            return $role[$level];
        }
    }

    public static function accesoEstrictoSession(array $level, $noAdmin = false)
    {
        if (!Session::getSession('autenticado')) {
            header('location:' . BASE_URL . 'error/accessError/1000');
            exit;
        }

        Session::tiempoSession();

        if($noAdmin == false){
            if(Session::getSession('level') == 'Administrador'){
                return;
            }
        }

        if(count($level)){
            if(in_array(Session::getSession('level'), $level)){
                return;
            }
        }

        header('location:' . BASE_URL . 'error/accessError/1000');
    }

    public static function accesoEstrictoSessionVista(array $level, $noAdmin = false)
    {
        if (!Session::getSession('autenticado')) {
            return false;
        }

        if($noAdmin == false){
            if(Session::getSession('level') == 'Administrador'){
                return true;
            }
        }

        if(count($level)){
            if(in_array(Session::getSession('level'), $level)){
                return true;
            }
        }

        return false;
    }

    public static function tiempoSession()
    {
        if(!Session::getSession('tiempo') || !defined('SESSION_TIME')){
            throw new Exception("Error Processing Request");
        }

        if(SESSION_TIME == 0){
            return;
        }

        if(time() - Session::getSession('tiempo') > (SESSION_TIME * 60)){
            Session::destroySession();
            header('location:' . BASE_URL . 'error/accessError/1010');
            exit;
        }
        else {
            Session::setSession('tiempo',time());
        }
    }
}