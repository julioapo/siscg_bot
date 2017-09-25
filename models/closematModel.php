<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 18/07/16
 * Time: 10:28 PM
 */

class closematModel extends Model {

    function __construct()
    {
        parent::__construct();
    }

    public function getClosesMat()
    {
        $closemat = $this->_db->query("SELECT * FROM scg_view_close_mat_tot");
        return $closemat->fetchAll();
    }

    public function getClosesMatSta($id)
    {
        $closemat = $this->_db->query("SELECT * FROM scg_view_close_mat_tot WHERE id_closemat=$id");
        return $closemat->fetch();
    }

    public function getCloseMat($id)
    {
        $id = (int) $id;
        $closemat = $this->_db->query("SELECT * FROM scg_close_material WHERE id_closemat=$id");
        return $closemat->fetch();
    }

    public function getMamat()
    {
        $mamat = $this->_db->query("SELECT id_mamat,nombre FROM scg_mamat");
        return $mamat->fetchAll();
    }

    public function getLiqDivBsf()
    {
        $mamat = $this->_db->query("SELECT id_liqdivbsf,nro_liqdivbsf FROM scg_liqdivbsf");
        return $mamat->fetchAll();
    }

    public function insertarCloseMat($nro_closemat,$id_mamat,$id_liqdivbsf,$fecha_close,$gramas_close,$precio_gramas,$monto_total_close,$observacion)
    {
        $this->_db->prepare(
            "INSERT INTO scg_close_material(nro_closemat,id_mamat,id_liqdivbsf,fecha_close,gramas_cierre,precio_gramas,monto_total_close,observacion) " .
            "VALUES (:nro_closemat, :id_mamat, :id_liqdivbsf, :fecha_close, :gramas_cierre, :precio_gramas, :monto_total_close, :observacion)")
            ->execute(
                array(':nro_closemat' => $nro_closemat,
                    ':id_mamat' => $id_mamat,
                    ':id_liqdivbsf' => $id_liqdivbsf,
                    ':fecha_close' => $fecha_close,
                    ':gramas_cierre' => $gramas_close,
                    ':precio_gramas' => $precio_gramas,
                    ':monto_total_close' => $monto_total_close,
                    ':observacion' => $observacion
                ));
    }

    public function getLastId()
    {
        $lastid = $this->_db->query("SELECT MAX(id_closemat) FROM scg_close_material");
        $lastid = $lastid->fetch();
        if(is_null($lastid['max'])){
            return 0;
        }
        else{
            return $lastid['max'];
        }
    }

    public function getClosMattot($id)
    {
        $jsondata = array();
        $sql = "SELECT * FROM scg_view_close_mat_tot WHERE id_closemat = $id";
        if ($resultado = $this->_db->query($sql)) {
            $jsondata['success'] = true;
            $liqtot = $this->_db->query("SELECT * FROM scg_view_close_mat_tot WHERE id_closemat = $id");
            $liqtot->setFetchMode(PDO::FETCH_ASSOC);
            $jsondata['data']['users'] = $liqtot->fetchAll();
            return $jsondata;
        }
    }

    public function getTotalPuroEntrega($id_closemat)
    {
        $total_entregas = $this->_db->query("SELECT sum(puro) FROM scg_entregas_mat WHERE id_closemat=$id_closemat");
        $total_entregas = $total_entregas->fetch();
        if(is_null($total_entregas['sum'])){
            return 0;
        }
        else{
            return $total_entregas['sum'];
        }

    }

    public function getTotalCierre($id_closemat)
    {
        $total_cierre = $this->_db->query("SELECT gramas_cierre FROM scg_close_material WHERE id_closemat=$id_closemat");
        $total_cierre = $total_cierre->fetch();
        return $total_cierre['gramas_cierre'];
    }

    public function getTotalAbono($id_closemat)
    {
        $total_entregas = $this->_db->query("SELECT sum(monto) FROM scg_abono_cierremat WHERE id_closemat=$id_closemat");
        $total_entregas = $total_entregas->fetch();
        if(is_null($total_entregas['sum'])){
            return 0;
        }
        else{
            return $total_entregas['sum'];
        }
    }

    public function getTotalMontoCierre($id_closemat)
    {
        $total_cierre = $this->_db->query("SELECT monto_total_close FROM scg_close_material WHERE id_closemat=$id_closemat");
        $total_cierre = $total_cierre->fetch();
        return $total_cierre['monto_total_close'];
    }

    public function getEntMats($id_closemat)
    {
        $entmat = $this->_db->query("SELECT * FROM scg_view_entmat_tot WHERE id_closemat=$id_closemat");
        return $entmat->fetchAll();
    }

    public function getAboMats($id_closemat)
    {
        $abomat = $this->_db->query("SELECT * FROM scg_view_abono_mat_tot WHERE id_closemat=$id_closemat");
        return $abomat->fetchAll();
    }

    public function getMontoLiq($id_liqdiv)
    {
        $monto_liq = $this->_db->query("SELECT monto_bsf FROM scg_liqdivbsf WHERE id_liqdivbsf = $id_liqdiv");
        $monto_liq = $monto_liq->fetch();
        return $monto_liq['monto_bsf'];
    }

    public function getTotalCieMat($id_liqdiv)
    {
        $totalciemat = $this->_db->query("SELECT sum(monto_total_close) FROM scg_view_close_mat_tot WHERE id_liqdivbsf=$id_liqdiv");
        $totalciemat = $totalciemat->fetch();
        if(is_null($totalciemat['sum'])){
            return 0;
        }
        else{
            return $totalciemat['sum'];
        }
    }

}