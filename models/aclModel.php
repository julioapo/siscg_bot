<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 05/07/16
 * Time: 01:38 AM
 */

class aclModel extends Model{

    private $fila;

    public function __construct()
    {
        parent::__construct();
    }

    public function getRols()
    {
        $rols = $this->_db->query("SELECT * FROM scg_rol");
        return $rols->fetchAll();
    }

    public function getRol($id)
    {
        $id = (int) $id;
        $rol = $this->_db->query("SELECT * FROM scg_rol WHERE id_rol=$id");
        return $rol->fetch();
    }

    public function getUser($id)
    {
        $id = (int) $id;
        $user = $this->_db->query("SELECT u.nombres,r.nombre FROM scg_usuarios as u, scg_rol as r " .
            "WHERE u.id_usuario=$id AND u.id_rol=r.id_rol");
        return $user->fetch();
    }

    public function getPermisosAll()
    {
        $permisos = $this->_db->query("SELECT * FROM scg_permisos");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);

        for($i = 0; $i < count($permisos); $i++){
            if($permisos[$i]['key']==''){continue;}

            $data[$permisos[$i]['key']] = array(
                'key' => $permisos[$i]['key'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['permiso'],
                'id' => $permisos[$i]['id_permiso']
            );
        }
        return $data;
    }

    public function getPermisosRols($rolID)
    {
        $data = array();

        $permisos = $this->_db->query("SELECT * FROM scg_permisos_role WHERE id_rol=$rolID");
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);

        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['id_permiso']);
            if($key == ''){continue;}

            if($permisos[$i]['valor'] == 1){
                $v = 1;
            }
            else{
                $v = 0;
            }

            $data[$key] = array(
                'key' => $key,
                'valor' => $v,
                'nombre' => $this->getPermisoNombre($permisos[$i]['id_permiso']),
                'id' => $permisos[$i]['id_permiso']
            );
        }

        $data = array_merge($this->getPermisosAll(),$data);
        return $data;
    }

    public function eliminarPermisoRol($rolID,$permisoID)
    {
        $this->_db->query("DELETE FROM scg_permisos_role " .
            "WHERE id_rol=$rolID and id_permiso=$permisoID");

    }

    public function editarPermisoRol($rolID,$permisoID,$valor)
    {
        $fila = $this->_db->query("SELECT * FROM scg_permisos_role " .
            "WHERE id_rol=$rolID AND id_permiso=$permisoID");

        if(count($fila)){
            $this->eliminarPermisoRol($rolID,$permisoID);
        }

        $this->_db->prepare(
            "INSERT INTO scg_permisos_role(id_rol,id_permiso,valor) " .
            "VALUES (:rol, :permiso, :valor)")
            ->execute(
                array(':rol' => $rolID,
                    ':permiso' => $permisoID,
                    ':valor' => $valor
                ));
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

    public function getPermisosUsuario($usuarioID)
    {
        $acl = new Acl($usuarioID);
        return $acl->getPermisos();
    }

    public function getPermisosRol($usuarioID)
    {
        $acl = new Acl($usuarioID);
        return $acl->getPermisoRole();
    }

    public function eliminarPermisoUser($usuarioID,$permisoID)
    {
        $this->_db->query("DELETE FROM scg_permisos_usuario " .
            "WHERE id_usuario=$usuarioID and id_permiso=$permisoID");

    }

    public function editarPermisoUser($usuarioID,$permisoID,$valor)
    {
        $fila = $this->_db->query("SELECT * FROM scg_permisos_usuario " .
            "WHERE id_usuario=$usuarioID AND id_permiso=$permisoID");

        if(count($fila)){
            $this->eliminarPermisoUser($usuarioID,$permisoID);
        }

        $this->_db->prepare(
            "INSERT INTO scg_permisos_usuario(id_usuario,id_permiso,valor) " .
            "VALUES (:usuario, :permiso, :valor)")
            ->execute(
                array(':usuario' => $usuarioID,
                    ':permiso' => $permisoID,
                    ':valor' => $valor
                ));
    }

} 