<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 04/07/16
 * Time: 04:13 PM
 */

class Acl
{
    protected $_registry;
    private $_db;
    private $_id_usuario;
    private $_id_rol;
    private $_permisos;

    public function __construct($id = false)
    {
        if($id){
            $this->_id_usuario = (int) $id;
        }
        else{
            if(Session::getSession('id_usuario')){
                $this->_id_usuario = Session::getSession('id_usuario');
            }
            else{
                $this->_id_usuario = 0;
            }
        }

        $this->_registry = Registry::getInstancia();
        $this->_db = $this->_registry->_db;
        $this->_id_rol = $this->getRole();
        $this->_permisos = $this->getPermisoRole();
        $this->CompilarAcl();
    }

    public function CompilarAcl()
    {
        $this->_permisos = array_merge(
            $this->_permisos,
            $this->getPermisosUser()
        );
    }

    public function getRole()
    {
        $role = $this->_db->query(
            "SELECT id_rol FROM scg_usuarios " .
            "WHERE id_usuario = '" . $this->_id_usuario ."'"
            );
        if(count($role)){
            $role = $role->fetch();
            return $role['id_rol'];
        }
        else{
            return 0;
        }
    }

    public function getPermisosRoleId()
    {
        $ids = $this->_db->query(
            "SELECT id_permiso FROM scg_permisos_role " .
            "WHERE id_rol = '{$this->_id_rol}'"
        );
        $ids = $ids->fetchAll(PDO::FETCH_ASSOC);

        $id = array();

        for($i = 0; $i < count($ids); $i++) {
            $id[] = $ids[$i]['id_permiso'];
        }

        return $id;
    }

    public function getPermisoRole()
    {
        if($this->_id_rol == ''){
            $this->_id_rol = 0;
        }
        $permisos = $this->_db->query(
            "SELECT * FROM scg_permisos_role " .
            "WHERE id_rol = '" . $this->_id_rol ."'"
        );
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        $data = array();

        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['id_permiso']);
            if($key == ''){continue;}

            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }

            // se crea array asociativo de las llaves de los permisos
            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['id_permiso']),
                'valor' => $v,
                'heredado' => true,
                'id' => $permisos[$i]['id_permiso']
            );
        }
        return $data;
    }

    public function getPermisoKey($IDpermiso)
    {
        $IDpermiso = (int) $IDpermiso;

        $key = $this->_db->query(
            "SELECT key FROM scg_permisos " .
            "WHERE id_permiso = {$IDpermiso}"
        );

        $key = $key->fetch();
        return $key['key'];
    }

    public function getPermisoNombre($IDpermiso)
    {
        $IDpermiso = (int) $IDpermiso;

        $permiso = $this->_db->query(
            "SELECT permiso FROM scg_permisos " .
            "WHERE id_permiso = {$IDpermiso}"
        );

        $permiso = $permiso->fetch();
        return $permiso['permiso'];
    }

    public function getPermisosUser()
    {
        $ids = $this->getPermisosRoleId();

        if(count($ids)) {
            $permisos = $this->_db->query(
                "SELECT * FROM scg_permisos_usuario " .
                "WHERE id_usuario = {$this->_id_usuario} " .
                "AND id_permiso in (" . implode(',', $ids) . ")"
            );
            $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $permisos = array();
        }

        $data = array();

        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['id_permiso']);
            if($key == ''){continue;}

            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }

            // se crea array asociativo de las llaves de los permisos
            $data[$key] = array(
                'key' => $key,
                'permiso' => $this->getPermisoNombre($permisos[$i]['id_permiso']),
                'valor' => $v,
                'heredado' => false,
                'id' => $permisos[$i]['id_permiso']
            );
        }

        return $data;
    }

    public function getPermisos()
    {
        if(isset($this->_permisos) && count($this->_permisos))
            return $this->_permisos;
    }

    public function permisosVieAcl($key)
    {
        if(array_key_exists($key,$this->_permisos)){
            if($this->_permisos[$key]['valor'] == true || $this->_permisos[$key]['valor'] == 1){
                return true;
            }
        }
        return false;
    }

    public function permisosConAcl($key)
    {
        if($this->permisosVieAcl($key)){
            Session::tiempoSession();
            return;
        }
        header('location:' . BASE_URL . 'error/accessError/1000');
        exit;
    }

} 