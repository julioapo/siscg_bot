<?php
/**
 * Request.php
 * @Author: Julio Aponte
 * @Date:   2016-06-29 00:15:53
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-29 01:03:44
 */
class Request
{
	
	private $_controlador;
	private $_metodo;
	private $_argumentos;

    function __construct()
	{
		if(isset($_GET['url']))
		{
			$url=filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			$url=explode('/',$url);
			$url=array_filter($url);

			$this->_controlador = strtolower(array_shift($url));
			$this->_metodo = strtolower(array_shift($url));
			$this->_argumentos = $url;
		}

		if(!$this->_controlador)
		{
			$this->_controlador = DEFAULT_CONTROLLER;
		}

		if(!$this->_metodo)
		{
			$this->_metodo = 'index';
		}

		if(!isset($this->_argumentos))
		{
			$this->_argumentos = array();

		}
	}

	/**
	 * Metodos para obtener los valores de los atributos
	 */
	
	public function getControlador()
	{
		return $this->_controlador;
	}

	public function getMetodo()
	{
		return $this->_metodo;
	}

	public function getArgumentos()
	{
		return $this->_argumentos;
	}
}
?>