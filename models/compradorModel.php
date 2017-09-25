<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 10/07/16
 * Time: 03:40 AM
 */

class compradorModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getCompradores()
    {
        $comprador = $this->_db->query("SELECT * FROM scg_comprador_div");
        return $comprador->fetchAll();
    }

    public function getComprador($id)
    {
        $id = (int) $id;
        $comprador = $this->_db->query("SELECT * FROM scg_comprador_div WHERE id_comprador=$id");
        return $comprador->fetch();
    }

    public function getNomComprador($id)
    {
        $id = (int) $id;
        $comprador = $this->_db->query("SELECT nombre FROM scg_comprador_div WHERE id_comprador=$id");
        return $comprador->fetch();
    }

    public function insertarComprador($nombre,$telefono_fijo,$direccion,$email,$repre_legal,$telefono_repre,$observaciones)
    {
        $this->_db->prepare("INSERT INTO scg_comprador_div(nombre,telefono_fijo,direccion,email,representante_legal,telefono_repre,observaciones) " .
            "VALUES (:nombre, :telefono_fijo, :direccion, :email, :repre_legal, :telefono_repre, :observaciones)")
            ->execute(
                array(':nombre' => $nombre,
                    ':telefono_fijo' => $telefono_fijo,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':repre_legal' => $repre_legal,
                    ':telefono_repre' => $telefono_repre,
                    ':observaciones' => $observaciones
                ));
    }

    public function editarComprador($id_comprador,$telefono_fijo,$direccion,$email,$repre_legal,$telefono_repre,$observaciones)
    {
        $id_comprador = (int) $id_comprador;

        $this->_db->prepare(
            "UPDATE scg_comprador_div SET telefono_fijo = :telefono_fijo, direccion = :direccion, " .
            "email = :email, representante_legal = :repre_legal, telefono_repre = :telefono_repre, observaciones = :observaciones " .
            "WHERE id_comprador = :id_comprador")
            ->execute(
                array( ':id_comprador' => $id_comprador,
                    ':telefono_fijo' => $telefono_fijo,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':repre_legal' => $repre_legal,
                    ':telefono_repre' => $telefono_repre,
                    ':observaciones' => $observaciones
                ));
    }

    public function eliminarComprador($id_comprador)
    {
        $id_comprador = (int) $id_comprador;
        $this->_db->query("DELETE FROM scg_comprador_div WHERE id_comprador=$id_comprador");
    }

    public function getCuentasComprador($id_comprador)
    {
        $id_comprador = (int) $id_comprador;
        $comprador_cuen = $this->_db->query("SELECT * FROM scg_view_comp_cuent WHERE id_comprador=$id_comprador");
        return $comprador_cuen->fetchAll();
    }

    public function getCuentaComprador($id_comprador,$id_bank)
    {
        $id_comprador = (int) $id_comprador;
        $id_bank = (int) $id_bank;
        $comprador_cue = $this->_db->query("SELECT * FROM scg_inf_ban_comp WHERE id_comprador=$id_comprador " .
            "AND id_banco=$id_bank");
        return $comprador_cue->fetch();
    }

    public function saveCuentaComprador($id_comprador,$id_bank,$cuenta)
    {
        $this->_db->prepare(
            "INSERT INTO scg_inf_ban_comp(id_comprador,id_banco,nro_cuenta) " .
            "VALUES (:id_comprador, :id_banco, :nro_cuenta)")
            ->execute(
                array(':id_comprador' => $id_comprador,
                    ':id_banco' => $id_bank,
                    ':nro_cuenta' => $cuenta
                ));
    }

    public function dropCuentaComprador($id_comprador,$id_bank,$cuenta)
    {
        $id_comprador = (int) $id_comprador;
        $id_bank = (int) $id_bank;
        $cuenta = trim($cuenta);
        $this->_db->query("DELETE FROM scg_inf_ban_comp WHERE id_comprador=$id_comprador AND " .
            "id_banco=$id_bank AND nro_cuenta='$cuenta'");
    }

    public function verificarCuentaComprador($id_bank,$cuenta)
    {
        $id = $this->_db->query(
            "SELECT id_banco FROM scg_inf_ban_comp WHERE id_banco='$id_bank' " .
            "AND nro_cuenta='$cuenta'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

    public function verificarEmailComprador($email)
    {
        $id = $this->_db->query(
            "SELECT id_comprador FROM scg_comprador_div WHERE email='$email'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }
}