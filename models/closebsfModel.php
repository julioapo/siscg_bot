<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 13/07/16
 * Time: 08:39 PM
 */

class closebsfModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getCierresBsf()
    {
        $cierresbsf = $this->_db->query("SELECT * FROM scg_view_liqui_divbsf_tot");
        return $cierresbsf->fetchAll();
    }

    public function getCierreBsf($id_liquidacion)
    {
        $cierrebsf = $this->_db->query("SELECT * FROM scg_view_liqui_divbsf_tot WHERE id_liqdivbsf=$id_liquidacion");
        return $cierrebsf->fetch();
    }

    public function getCierreDiv()
    {
        $cierrediv = $this->_db->query("SELECT id_cierrediv,id_operacion FROM scg_view_close_div WHERE status='1'");
        return $cierrediv->fetchAll();
    }

    public function getCompradores()
    {
        $clientes = $this->_db->query("SELECT id_comprador,nombre FROM scg_comprador_div");
        return $clientes->fetchAll();
    }

    public function getBanksComp($id_comprador)
    {
        $bankscomp = $this->_db->query("SELECT id_banco,name_bank FROM scg_view_comp_cuent WHERE " .
            "id_comprador = $id_comprador GROUP BY id_banco, name_bank");

        $bankscomp->setFetchMode(PDO::FETCH_ASSOC);
        return $bankscomp->fetchAll();
    }

    public function  getCountComp($id_comprador,$id_banco)
    {
        $countcomp = $this->_db->query("SELECT nro_cuenta FROM scg_view_comp_cuent WHERE " .
            "id_comprador = $id_comprador AND id_banco = $id_banco");

        $countcomp->setFetchMode(PDO::FETCH_ASSOC);
        return $countcomp->fetchAll();
    }

    public function getLastId()
    {
        $lastid = $this->_db->query("SELECT MAX(id_liqdivbsf) FROM scg_liqdivbsf");
        $lastid = $lastid->fetch();
        if(is_null($lastid['max'])){
            return 0;
        }
        else{
            return $lastid['max'];
        }
    }

    public function registrarCloseBsf($nro_liqdivbsf,$id_closediv,$id_comprador,$id_bank,$nro_cuenta,$id_tipotrans,$id_status,$nro_operacion,$fecha_opera,$monto_dls,$tasa_chan,$monto_bsf,$concepto)
    {
        $this->_db->prepare(
            "INSERT INTO scg_liqdivbsf(nro_liqdivbsf,id_closediv,id_comprador,id_bank,nro_cuenta,id_tipotrans,id_status,nro_operacion,fecha_opera,monto_dls,tasa_chan,monto_bsf,concepto) " .
            "VALUES ( :nro_liqdivbsf, :id_closediv, :id_comprador,  :id_bank, :nro_cuenta, :id_tipotrans, :id_status, :nro_operacion, :fecha_opera, :monto_dls, :tasa_chan, :monto_bsf, :concepto)")
            ->execute(
                array(':nro_liqdivbsf' => $nro_liqdivbsf,
                    ':id_closediv' => $id_closediv,
                    ':id_comprador' => $id_comprador,
                    ':id_bank' => $id_bank,
                    ':nro_cuenta' => $nro_cuenta,
                    ':id_tipotrans' => $id_tipotrans,
                    ':id_status' => $id_status,
                    ':nro_operacion' => $nro_operacion,
                    ':fecha_opera' => $fecha_opera,
                    ':monto_dls' => $monto_dls,
                    ':tasa_chan' => $tasa_chan,
                    ':monto_bsf' => $monto_bsf,
                    ':concepto' => $concepto
                ));
    }

    public function getClosBsftot($id)
    {
        $jsondata = array();
        $sql = "SELECT * FROM scg_view_liqui_divbsf_tot WHERE id_liqdivbsf = $id";
        if ($resultado = $this->_db->query($sql)) {
            $jsondata['success'] = true;
            $liqtot = $this->_db->query("SELECT * FROM scg_view_liqui_divbsf_tot WHERE id_liqdivbsf = $id");
            $liqtot->setFetchMode(PDO::FETCH_ASSOC);
            $jsondata['data']['users'] = $liqtot->fetchAll();
            return $jsondata;
        }
    }

    public function getStatusCloBsF($id_liqdivbsf)
    {
        $statusliqdivbsf = $this->_db->query("SELECT * FROM scg_view_status_liqdiv_tot WHERE id_liqdivbsf = $id_liqdivbsf");
        return $statusliqdivbsf->fetchAll();
    }

    public function getMontoLiq($id_liqdivbsf)
    {
        $montoliqbsf = $this->_db->query("SELECT monto_bsf FROM scg_liqdivbsf WHERE id_liqdivbsf = $id_liqdivbsf");
        $montoliqbsf = $montoliqbsf->fetch();
        return $montoliqbsf['monto_bsf'];
    }

    public function getMontoCloMat($id_liqdivbsf)
    {
        $montoclomat = $this->_db->query("SELECT id_liqdivbsf,sum(monto_total_close) as total_monto FROM scg_view_status_liqdiv_tot WHERE id_liqdivbsf = $id_liqdivbsf GROUP BY id_liqdivbsf");
        $montoclomat = $montoclomat->fetch();
        return $montoclomat['total_monto'];
    }

    public function getMontoCloDiv($id_cierrediv)
    {
        $monto_cierre = $this->_db->query("SELECT monto_operacion FROM scg_closediv WHERE id_cierrediv = $id_cierrediv");
        $monto_cierre = $monto_cierre->fetch();
        return $monto_cierre['monto_operacion'];
    }

    public function getTotalLiq($id_cierrediv)
    {
        $totalliq = $this->_db->query("SELECT sum(monto_dls) FROM scg_view_liqui_divbsf_tot WHERE id_closediv=$id_cierrediv");
        $totalliq = $totalliq->fetch();
        if(is_null($totalliq['sum'])){
            return 0;
        }
        else{
            return $totalliq['sum'];
        }
    }
}