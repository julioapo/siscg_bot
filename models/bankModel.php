<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 05/07/16
 * Time: 09:15 PM
 */

class bankModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getBanks()
    {
        $banks = $this->_db->query("SELECT * FROM scg_bancos");
        return $banks->fetchall();
    }

    public function getBank($id_bank)
    {
        $id_bank = (int) $id_bank;
        $bank = $this->_db->query("SELECT * FROM scg_bancos WHERE id_bank=$id_bank");
        return $bank->fetch();
    }

    public function newBank($nombre,$telefono,$contacto,$telefono_contacto)
    {
        $this->_db->prepare(
            "INSERT INTO scg_bancos(name_bank,telefono,contacto,telefono_contacto) " .
            "VALUES (:nombre, :telefono, :contacto, :telefono_contacto)")
            ->execute(
                array(':nombre' => $nombre,
                    ':telefono' => $telefono,
                    ':contacto' => $contacto,
                    ':telefono_contacto' => $telefono_contacto
                ));
    }

    public function editBank($id_bank,$nombre,$telefono,$contacto,$telefono_contacto)
    {
        $id_bank = (int) $id_bank;

        $this->_db->prepare(
            "UPDATE scg_bancos SET name_bank = :nombre, telefono = :telefono, contacto = :contacto, " .
            "telefono_contacto = :telefono_contacto WHERE id_bank = :id_bank")
            ->execute(
                array( ':id_bank' => $id_bank,
                    ':nombre' => $nombre,
                    ':telefono' => $telefono,
                    ':contacto' => $contacto,
                    ':telefono_contacto' => $telefono_contacto
                ));
    }

    public function dropBank($id_bank)
    {
        $id_bank = (int) $id_bank;
        $this->_db->query("DELETE FROM scg_bancos WHERE id_bank=$id_bank");
    }
} 