<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 03/07/16
 * Time: 03:49 PM
 */

class UsuariosModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
            "SELECT id_usuario FROM scg_usuarios WHERE userlogin='$usuario'"
        );

        if($id->fetch()){
            return false;
        }

        return true;
    }

    public function verificarEmail($email)
    {
        $id = $this->_db->query(
            "SELECT id_usuario FROM scg_usuarios WHERE email='$email'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function getUsuarios()
    {
        $usuarios = $this->_db->query("SELECT * FROM scg_view_userrolemplogpass");
        return $usuarios->fetchall();
    }

    public function getUsuario($id)
    {
        $id = (int) $id;
        $usuario = $this->_db->query("SELECT * FROM scg_usuarios WHERE id_usuario=$id");
        return $usuario->fetch();
    }

    public function registrarUsuarios($nombre,$cedula,$telefono,$direccion,$email,$userlogin,$rol_usuario,$compdiv_usuario)
    {
        $this->_db->prepare(
            "INSERT INTO scg_usuarios(nombres, cedula, telefono, direccion, email, userlogin, id_rol, id_comprador) " .
            "VALUES (:nombre, :cedula, :telefono, :direccion, :email, :userlogin, :rol_usuario, :compdiv_usuario)")
            ->execute(
                array(
                    ':nombre' => $nombre,
                    ':cedula' => $cedula,
                    ':telefono' => $telefono,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':userlogin' => $userlogin,
                    ':rol_usuario' => $rol_usuario,
                    ':compdiv_usuario' => $compdiv_usuario
                ));
    }

    public function editarUsuario($id_usuario,$telefono,$direccion,$email,$user_rol,$compdiv_usuario)
    {
        $id_usuario = (int) $id_usuario;

        $this->_db->prepare(
            "UPDATE scg_usuarios SET telefono = :telefono, direccion = :direccion, email = :email, " .
            "id_rol = :id_rol, id_comprador = :compdiv_usuario " .
            " WHERE id_usuario = :id_usuario")
            ->execute(
                array( ':id_usuario' => $id_usuario,
                    ':telefono' => $telefono,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':id_rol' => $user_rol,
                    ':compdiv_usuario' => $compdiv_usuario
                ));
    }

    public function eliminarUsuario($id_usuario)
    {
        $id_usuario = (int) $id_usuario;
        $this->_db->query("DELETE FROM scg_usuarios WHERE id_usuario=$id_usuario");
    }

    public function getUserCompDiv()
    {
        $compdiv_user = $this->_db->query("SELECT id_comprador, nombre FROM scg_comprador_div");
        return $compdiv_user->fetchall();
    }

    public function getUserRol()
    {
        $rol_user = $this->_db->query("SELECT id_rol, nombre FROM scg_rol");
        $rol_user->setFetchMode(PDO::FETCH_ASSOC);
        return $rol_user->fetchall();
    }
} 