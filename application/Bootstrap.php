<?php
/**
 * Bootstrap.php
 * @Author: Julio Aponte
 * @Date:   2016-06-29 00:14:39
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-29 01:20:30
 */
class Bootstrap
{
	public static function run(Request $peticion)
	{
    	$controller = $peticion->getControlador() . 'Controller';
		$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
		$metodo = $peticion->getMetodo();
		$argumentos = $peticion->getArgumentos();

		if(is_readable($rutaControlador))
		{

			require_once $rutaControlador;

			$controller = new $controller;

			if(is_callable(array($controller, $metodo)))
			{
				$metodo = $peticion->getMetodo();
			}else{
				$metodo = 'index';
			}

			if(isset($argumentos))
			{
				call_user_func_array(array($controller, $metodo),$argumentos);
			}else{
				call_user_func(array($controller,$metodo));
			}
		}else{
			// para que esta execpcion sea valida y capturada debe colocar lineas en el index
			throw new Exception("Controlador No Encontrado");
		}
	}
}
?>