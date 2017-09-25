<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 20/07/16
 * Time: 10:22 PM
 */

class entmatModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getEntMats()
    {
        $entmat = $this->_db->query("SELECT * FROM scg_view_entmat_tot");
        return $entmat->fetchAll();
    }

    public function getEntMat($id_entmat)
    {
        $entmat = $this->_db->query("SELECT * FROM scg_entregas_mat WHERE id_entrega=$id_entmat");
        return $entmat->fetch();
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

    public function registrarEntMat($fecha,$gramos,$ley,$puro,$id_closemat)
    {
        $this->_db->prepare(
            "INSERT INTO scg_entregas_mat(fecha,gramos,ley,puro,id_closemat) " .
            "VALUES ( :fecha, :gramos, :ley, :puro, :id_closemat)")
            ->execute(
                array(':fecha' => $fecha,
                    ':gramos' => $gramos,
                    ':ley' => $ley,
                    ':puro' => $puro,
                    ':id_closemat' => $id_closemat
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