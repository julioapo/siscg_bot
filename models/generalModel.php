<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 10/07/16
 * Time: 05:37 PM
 */

class generalModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getPaises()
    {
        $country = $this->_db->query("SELECT * FROM scg_paises");
        return $country->fetchAll();
    }

    public function getTipTransBank()
    {
        $tiptransbank = $this->_db->query("SELECT * FROM scg_tip_trans_bank");
        return $tiptransbank->fetchAll();
    }

    public function getNameTrans($id_trans)
    {
        $nameTrans = $this->_db->query("SELECT name_transf FROM scg_tip_trans_bank WHERE id_tipotrans=$_POST[$id_trans]");
        $nameTrans = $nameTrans->fetch();
        return $nameTrans['name_transf'];
    }

    public function getNameCountry($id_country)
    {
        $nameCountry = $this->_db->query("SELECT name_country FROM scg_paises WHERE id_pais=$_POST[$id_country]");
        $nameCountry = $nameCountry->fetch();
        return $nameCountry['name_country'];
    }

    public function getStatusTransBank()
    {
        $statransbank = $this->_db->query("SELECT * FROM scg_status_trans_bank");
        return $statransbank->fetchAll();
    }

    public function getNameBanks($id_bank)
    {
        $namebank = $this->_db->query("SELECT name_bank FROM scg_bancos WHERE id_bank=$_POST[$id_bank]");
        return $namebank->fetchAll();
    }

    public function getStatusCierres()
    {
        $statusclose = $this->_db->query("SELECT * FROM scg_status_cierres");
        return $statusclose->fetchAll();
    }
} 