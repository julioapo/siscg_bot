<?php
/**
 * @Author: Julio Aponte
 * @Date:   2016-06-28 23:19:15
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-28 23:19:22
 */
class Registry
{
    private static $_instancia;

    private $_data;


    /**
     * Metodo Construc de la clase registry siguiendo el patron singleton
     * Asegurando que la o las clase no puedan instanciarse sino desde la misma
     * clase y no pueda existir en la aplicacion dos instancias
     */
    private function __construc(){}

    public function getInstancia()
    {
        if(!Self::$_instancia instanceof self)
        {
            self::$_instancia = new Registry();
        }

        return self::$_instancia;
    }

    public function __set($name ,$value)
    {
        $this->_data[$name] = $value;
    }

    public function __get($name)
    {
        if(isset($this->_data[$name]))
        {
            return $this->_data[$name];
        }

        return false;
        
    }

}