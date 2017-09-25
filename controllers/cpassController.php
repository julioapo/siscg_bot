<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 04/07/16
 * Time: 11:19 AM
 */

class CpassController extends Controller{

    private $_cambiopass;

    private $_login;


    public function __construct()
    {
        parent::__construct();
        $this->_cambiopass = $this->loadModel('cpass');
        $this->_login = $this->loadModel('login');
    }

    public function index()
    {

        if(Session::getSession('autenticado')){
            Session::tiempoSession();
            $this->_views->assign('titulo_mod','Cambiar Password');
            $this->_views->assign('username',$_GET['user']);
            $this->_views->setModulo();
        }else{
            $this->_views->assign('titulo_mod','Primer Inicio de Session debe Cambiar Password');
            $this->_views->assign('username',$_GET['user']);
            $this->_views->setModulo('cpass');
        }

        if($this->getInt('enviar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getAlphaNum('password')){
                $this->_views->assign('error','Debe ingresar su password!!');
                $this->_views->renderizar('index','Cpass');
                exit;
            }

            if(!$this->getAlphaNum('cpassword')){
                $this->_views->assign('error','Debe confirmar su password!!');
                $this->_views->renderizar('index','Cpass');
                exit;
            }

            if($this->getPostParam('password') != $this->getPostParam('cpassword')){
                $this->_views->assign('error','Los password no coinciden');
                $this->_views->renderizar('index','Cpass');
                exit;
            }

            if($this->_cambiopass->cambiarPassword(
                $this->getAlphaNum('username'),
                $this->getSql('password')
            )){
                Session::destroySession();
                $this->redireccionar('index?message=5');
                exit;
            }
        }

        $this->_views->renderizar('index','Cpass');
    }
} 