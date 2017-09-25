<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 30/06/16
 * Time: 11:14 PM
 */

class Database extends PDO
{

    public function __construct()
    {
        parent::__construct(
            DB_DRIVER . 'host=' .
            DB_HOST . ";port=" .
            DB_PORT . ";dbname=" .
            DB_NAME . ";user=" .
            DB_USER . ";password=" .
            DB_PASS);
    }
}