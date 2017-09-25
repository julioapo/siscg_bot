<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 21/07/16
 * Time: 01:14 AM
 */

class abomatModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAboMats()
    {
        $abomat = $this->_db->query("SELECT * FROM scg_view_abono_mat_tot");
        return $abomat->fetchAll();
    }

    public function getAboMat($id_abomat)
    {
        $abomat = $this->_db->query("SELECT * FROM scg_view_abono_mat_tot WHERE id_abono=$id_abomat");
        return $abomat->fetch();
    }

    public function getNomMaMat()
    {
        $nommamat = $this->_db->query("SELECT id_mamat,nombre FROM scg_view_close_mat_nom_mamat");
        return $nommamat->fetchAll();
    }

    public function geCierreMat($id_mamat)
    {
        $cierremat = $this->_db->query("SELECT id_closemat,nro_closemat FROM scg_view_close_mat_tot WHERE id_mamat=$id_mamat");
        return $cierremat->fetchAll();
    }

    public function getCliMat($id_mamat)
    {
        $climat = $this->_db->query("SELECT id_mamat,nombres_apellidos FROM scg_clientes WHERE id_mamat=$id_mamat");
        return $climat->fetchAll();
    }

    public function getNomCli()
    {
        $nomcli = $this->_db->query("SELECT id_cliente,nombres_apellidos FROM scg_clientes");
        return $nomcli->fetchAll();
    }

    public function getBanksCli($id_cliente)
    {
        $bankscli = $this->_db->query("SELECT id_banco,name_bank FROM scg_view_cliente_cuent WHERE " .
            "id_cliente = $id_cliente GROUP BY id_banco, name_bank");

        $bankscli->setFetchMode(PDO::FETCH_ASSOC);
        return $bankscli->fetchAll();
    }

    public function getCountsCli($id_cli,$id_bank)
    {
        $countscli = $this->_db->query("SELECT * FROM scg_view_cliente_cuent WHERE " .
            "id_cliente = $id_cli AND id_banco = $id_bank");

        $countscli->setFetchMode(PDO::FETCH_ASSOC);
        return $countscli->fetchAll();
    }

    public function registrarAboMat($fecha,$tipotransbank,$id_bank,$nro_cuenta,$monto,$id_closemat,$nro_trans_bank,$id_cliente,$beneficiario)
    {
        $this->_db->prepare(
            "INSERT INTO scg_abono_cierremat(fecha,tipo_trans_bank,id_bank,nro_cuenta,monto,id_closemat,nro_trans_bank,id_cliente,beneficiario) " .
            "VALUES ( :fecha, :tipotransbank, :id_bank, :nro_cuenta, :monto, :id_closemat, :nro_trans_bank, :id_cliente, :beneficiario)")
            ->execute(
                array(':fecha' => $fecha,
                    ':tipotransbank' => $tipotransbank,
                    ':id_bank' => $id_bank,
                    ':nro_cuenta' => $nro_cuenta,
                    ':monto' => $monto,
                    ':id_closemat' => $id_closemat,
                    ':nro_trans_bank' => $nro_trans_bank,
                    ':id_cliente' => $id_cliente,
                    ':beneficiario' => $beneficiario
                ));
    }

    public function getCierreMat($id)
    {
        $cierremat = $this->_db->query("SELECT id_closemat,nro_closemat FROM scg_view_close_mat_tot WHERE " .
            "id_mamat = $id");

        $cierremat->setFetchMode(PDO::FETCH_ASSOC);
        return $cierremat->fetchAll();
    }

} 