<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 10/07/16
 * Time: 10:42 AM
 */

class closedivModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getLiquidadors()
    {
        $liquidadors = $this->_db->query("SELECT * FROM scg_colocador_div");
        return $liquidadors->fetchAll();
    }

    public function getBanksLiq($id)
    {
        $banksliq = $this->_db->query("SELECT id_banco,name_bank FROM scg_view_bank_cuent_col WHERE " .
        "id_colocador = $id GROUP BY id_banco,name_bank");

        $banksliq->setFetchMode(PDO::FETCH_ASSOC);
        return $banksliq->fetchAll();
    }

    public function getCountsLiq($id_liq,$id_bank)
    {
        $countsliq = $this->_db->query("SELECT * FROM scg_view_bank_cuent_col WHERE " .
            "id_colocador = $id_liq AND id_banco = $id_bank");

        $countsliq->setFetchMode(PDO::FETCH_ASSOC);
        return $countsliq->fetchAll();
    }

    public function getCierresDiv()
    {
        $cierres = $this->_db->query("SELECT * FROM scg_view_close_div");
        return $cierres->fetchAll();
    }

    public function getCierreDiv($id_cierrediv)
    {
        $cierre = $this->_db->query("SELECT * FROM scg_view_status_closediv WHERE id_cierrediv=$id_cierrediv");
        return $cierre->fetch();
    }

    public function getLastId()
    {
        $lastid = $this->_db->query("SELECT MAX(id_cierrediv) FROM scg_closediv");
        $lastid = $lastid->fetch();
        if(is_null($lastid['max'])){
            return 0;
        }
        else{
            return $lastid['max'];
        }
    }

    public function registrarCierreDiv($id_operacion,$id_liquidador,$id_pais,$id_bank,$nro_cuenta,$nro_operacion,$fecha_operacion,$monto_operacion,$concepto)
    {
        $this->_db->prepare(
            "INSERT INTO scg_closediv(id_operacion,id_liquidador,id_pais,id_bank,nro_cuenta,nro_operacion,fecha_operacion,monto_operacion,concepto) " .
            "VALUES (:id_operacion, :id_liquidador, :id_pais, :id_bank, :nro_cuenta, :nro_operacion, :fecha_operacion, :monto_operacion, :concepto)")
            ->execute(
                array(':id_operacion' => $id_operacion,
                    ':id_liquidador' => $id_liquidador,
                    ':id_pais' => $id_pais,
                    ':id_bank' => $id_bank,
                    ':nro_cuenta' => $nro_cuenta,
                    ':nro_operacion' => $nro_operacion,
                    ':fecha_operacion' => $fecha_operacion,
                    ':monto_operacion' => $monto_operacion,
                    ':concepto' => $concepto
                ));
    }

    public function getClosdivtot($id)
    {
        $jsondata = array();
        $sql = "SELECT * FROM scg_view_close_div_tot WHERE id_cierrediv = $id";
        if ($resultado = $this->_db->query($sql)) {
            $jsondata['success'] = true;
            $closetot = $this->_db->query("SELECT * FROM scg_view_close_div_tot WHERE id_cierrediv = $id");
            $closetot->setFetchMode(PDO::FETCH_ASSOC);
            $jsondata['data']['users'] = $closetot->fetchAll();
            return $jsondata;
        }
    }

    public function getStatusCloDiv($id_clodiv)
    {
        $statuscoldiv = $this->_db->query("SELECT * FROM scg_view_status_closediv WHERE id_cierrediv = $id_clodiv");
        return $statuscoldiv->fetchAll();
    }

    public function getMontoLiq($id_clodiv)
    {
        $montoliq = $this->_db->query("SELECT id_closediv,sum(monto_dls) as total_monto_dls FROM scg_view_liqui_divbsf_tot WHERE id_closediv = $id_clodiv GROUP BY id_closediv");
        $montoliq = $montoliq->fetch();
        return $montoliq['total_monto_dls'];
    }

    public function getMontoCol($id_clodiv)
    {
        $montocol = $this->_db->query("SELECT monto_operacion FROM scg_closediv WHERE id_cierrediv = $id_clodiv");
        $montocol = $montocol->fetch();
        return $montocol['monto_operacion'];
    }
} 