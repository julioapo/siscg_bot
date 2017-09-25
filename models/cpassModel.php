<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 04/07/16
 * Time: 12:00 PM
 */

class CpassModel extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function cambiarPassword($userlogin,$userpass)
    {
        try{
        $this->_db->prepare("UPDATE scg_usuarios SET password = :userpass WHERE userlogin = :userlogin")
            ->execute(
                array( ':userlogin' => $userlogin,
                    ':userpass' => Hash::getHash('md5', $userpass, HASH_KEY)
                ));
            return true;
        }catch (PDOException $e){
            echo 'Error... ' . $e->getMessage();
        }
    }
} 