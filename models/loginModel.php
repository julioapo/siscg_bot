<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 01/07/16
 * Time: 12:53 AM
 */
class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tipoInicio($userlogin)
    {
        $tipinicio = $this->_db->query("SELECT * FROM scg_usuarios WHERE userlogin = '$userlogin' AND password ='12345678'");
        if($tipinicio->fetch()){
            return false;
        }

        return true;
    }

    public function getLogin($userlogin,$passuser)
    {
        $login = $this->_db->query(
            "SELECT * FROM scg_usuarios " .
            "WHERE userlogin ='$userlogin' " .
            "AND password = '" . Hash::getHash('md5', $passuser, HASH_KEY) . "'");
        return $login->fetch();
    }


    public function getDatosUsuario($id_usuario)
    {

        $id_usuario = (int) $id_usuario;

        $datos = $this->_db->query("SELECT * FROM scg_view_userrolemplogpass WHERE id_usuario = $id_usuario");
        return $datos->fetch();
    }
}