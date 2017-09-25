<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 01/07/16
 * Time: 02:50 AM
 */

class Hash
{
    public static function getHash($algoritmo, $data, $key)
    {
        $hash = hash_init($algoritmo, HASH_HMAC, $key);
        hash_update($hash, $data);

        return hash_final($hash);
    }
}