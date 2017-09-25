<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 05/07/16
 * Time: 12:35 AM
 */

class permisosModel extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getPermisos()
    {
        $permisos = $this->_db->query("SELECT * FROM scg_permisos");
        return $permisos->fetchAll();
    }

    public function getPermiso($id)
    {
        $id = (int) $id;
        $permiso = $this->_db->query("SELECT * FROM scg_permisos WHERE id_permiso=$id");
        return $permiso->fetch();
    }

    public function insertarPermiso($permiso,$llave)
    {
        $this->_db->prepare(
            "INSERT INTO scg_permisos(permiso,key) VALUES (:permiso, :llave)")
            ->execute(
                array(':permiso' => $permiso,
                    ':llave' => $llave
                ));
    }

    public function editarPermiso($id_permiso,$permiso,$llave)
    {
        $id_permiso = (int) $id_permiso;

        $this->_db->prepare(
            "UPDATE scg_permisos SET permiso = :permiso, key = :llave WHERE id_permiso = :id_permiso")
            ->execute(
                array( ':id_permiso' => $id_permiso,
                    ':permiso' => $permiso,
                    ':llave' => $llave
                ));
    }

    public function eliminarPermiso($id_permiso)
    {
        $id_permiso = (int) $id_permiso;
        $this->_db->query("DELETE FROM scg_permisos WHERE id_permiso=$id_permiso");
    }
} 