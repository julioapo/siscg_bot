<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 30/06/16
 * Time: 11:14 PM
 */

class Model
{
    protected $_db;

    private $_registry;

    public function __construct()
    {
        $this->_registry = Registry::getInstancia();
        $this->_db = $this->_registry->_db;
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}