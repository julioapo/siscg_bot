<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 02/07/16
 * Time: 01:50 PM
 */

class mamatModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * [getEmpresas Obtner todos los registros de empresas]
     * @return [type] [description]
     */
    public function getMamats()
    {
        $empresas = $this->_db->query("SELECT * FROM scg_mamat");
        return $empresas->fetchAll();
    }

    public function getMamat($id)
    {
        $id = (int) $id;
        $empresa = $this->_db->query("SELECT * FROM scg_mamat WHERE id_mamat=$id");
        return $empresa->fetch();
    }

    public function getNomMamat($id)
    {
        $id = (int) $id;
        $empresa = $this->_db->query("SELECT nombre FROM scg_mamat WHERE id_mamat=$id");
        return $empresa->fetch();
    }

    public function insertarMamat($nombre,$rif,$telefono,$direccion,$email,$contacto,$telefono_contacto)
    {
        $this->_db->prepare(
            "INSERT INTO scg_mamat(nombre,rif,telefono,direccion,email,contacto,telefono_contacto) " .
            "VALUES (:nombre, :rif, :telefono, :direccion, :email, :contacto, :telefono_contacto)")
            ->execute(
                array(':nombre' => $nombre,
                    ':rif' => $rif,
                    ':telefono' => $telefono,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':contacto' => $contacto,
                    ':telefono_contacto' => $telefono_contacto
                ));
    }

    public function editarMamat($id_mamat,$telefono,$direccion,$email,$contacto,$telefono_contacto)
    {
        $id_mamat = (int) $id_mamat;

        $this->_db->prepare(
            "UPDATE scg_mamat SET telefono = :telefono, direccion = :direccion, email = :email, " .
            "contacto = :contacto, telefono_contacto = :telefono_contacto " .
            " WHERE id_mamat = :id_mamat")
            ->execute(
                array( ':id_mamat' => $id_mamat,
                    ':telefono' => $telefono,
                    ':direccion' => $direccion,
                    ':email' => $email,
                    ':contacto' => $contacto,
                    ':telefono_contacto' => $telefono_contacto
                ));
    }

    public function eliminarMamat($id_mamat)
    {
        $id_mamat = (int) $id_mamat;
        $this->_db->query("DELETE FROM scg_mamat WHERE id_mamat=$id_mamat");
    }

    public function getCuentas($id_mamat)
    {
        $id_mamat = (int) $id_mamat;
        $mamat_cuen = $this->_db->query("SELECT * FROM scg_view_bank_cuent_mmat WHERE id_mamat=$id_mamat");
        return $mamat_cuen->fetchAll();
    }

    public function getCuenta($id_mamat,$id_bank)
    {
        $id_mamat = (int) $id_mamat;
        $id_bank = (int) $id_bank;
        $mamat_cue = $this->_db->query("SELECT * FROM scg_inf_ban_mamat WHERE id_mamat=$id_mamat " .
        "AND id_banco=$id_bank");
        return $mamat_cue->fetch();
    }

    public function saveCuenta($id_mamat,$id_bank,$cuenta)
    {
        $this->_db->prepare(
            "INSERT INTO scg_inf_ban_mamat(id_mamat,id_banco,nro_cuenta) " .
            "VALUES (:id_mamat, :id_banco, :nro_cuenta)")
            ->execute(
                array(':id_mamat' => $id_mamat,
                    ':id_banco' => $id_bank,
                    ':nro_cuenta' => $cuenta
                ));
    }

    public function dropCuenta($id_mamat,$id_bank,$cuenta)
    {
        $id_mamat = (int) $id_mamat;
        $id_bank = (int) $id_bank;
        $cuenta = trim($cuenta);
        $this->_db->query("DELETE FROM scg_inf_ban_mamat WHERE id_mamat=$id_mamat AND " .
        "id_banco=$id_bank AND nro_cuenta='$cuenta'");
    }

    public function verificarCuenta($id_bank,$cuenta)
    {
        $id = $this->_db->query(
            "SELECT id_banco FROM scg_inf_ban_mamat WHERE id_banco='$id_bank' " .
            "AND nro_cuenta='$cuenta'"
        );

        if($id->fetch()){
            return true;
        }

        return false;
    }

} 