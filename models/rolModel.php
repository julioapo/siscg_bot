<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 04/07/16
 * Time: 09:53 PM
 */

class rolModel extends Model{

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

    public function insertarRol($nombre)
    {
        $this->_db->prepare(
            "INSERT INTO scg_rol(nombre) VALUES (:nombre)")
            ->execute(
                array(':nombre' => $nombre
                ));
    }

    public function editarRol($id_rol,$nombre)
    {
        $id_rol = (int) $id_rol;

        $this->_db->prepare(
            "UPDATE scg_rol SET nombre = :nombre WHERE id_rol = :id_rol")
            ->execute(
                array( ':id_rol' => $id_rol,
                    ':nombre' => $nombre
                ));
    }

    public function eliminarRol($id_rol)
    {
        $id_rol = (int) $id_rol;
        $this->_db->query("DELETE FROM scg_rol WHERE id_rol=$id_rol");
    }
} 