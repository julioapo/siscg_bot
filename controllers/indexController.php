<?php
/**
 * indexController.php
 * @Author: Julio Aponte
 * @Date:   2016-06-29 01:10:49
 * @Last Modified by:   Julio Aponte
 * @Last Modified time: 2016-06-29 01:52:00
 */
class IndexController extends Controller
{
	
	public function __construct()
	{
		parent::__construct(); 
	}

	public function index(){

        if(!Session::getSession('autenticado')){
			$this->redireccionar('login');
		}

        Session::tiempoSession();

        $this->_views->assign('titulo','Modulo Index');
        $this->_views->assign('index');
        $this->_views->renderizar('index','index');
	}	
}
?>