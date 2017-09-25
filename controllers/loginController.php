<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 01/07/16
 * Time: 12:57 AM
 */

class LoginController extends Controller
{
    private $_login;

    private $_usuario;

    private $_password;

    private $_idusuario;

    public function __construct()
    {
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }

    public function index()
    {
        if (Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        if($this->getInt('enviar') == 1){

            $this->_views->assign('datos',$_POST);

            if(!$this->getAlphaNum('username')){
                $this->_views->assign('error','Debe ingresar su nombre de usuario!!');
                $this->_views->renderizar('index','login');
                exit;
            }

            if(!$this->getSql('pass')){
                $this->_views->assign('error','Debe ingresar su password!!');
                $this->_views->renderizar('index','Login');
                exit;
            }

            if(!$this->_login->tipoInicio($this->getAlphaNum('username'))){
                $this->redireccionar('cpass?user='.$this->getAlphaNum('username'));
                exit;
            }

            $fila = $this->_login->getLogin(
                $this->getAlphaNum('username'),
                $this->getSql('pass')
            );

            if(!$fila){
                $this->_views->assign('error','Usuario y/o contraseña incorrecta!!');
                $this->_views->renderizar('index','Login');
                exit;
            }

            $row = $this->_login->getDatosUsuario($fila['id_usuario']);

            //ACA SE PUEDE VALIDAR OTROS DATOS DEL USUARIO OBTENIDOS DEL ROW EJEMPLO EL ESTADO DEL USUARIO
            //if(fila['estado'] != 1){
            //	$this->_vista->_error = 'Este usuario esta deshabilitado!!';
            //	$this->_vista->renderizar('indexLogin');
            //	exit;
            //}

            //LUEGO TAMBIEN SE PUEDEN LLENAR VARIABLES DE SESSION CON LOS DATOS OBTENIDOS NIVEL DE USUARIO EL ROL DEL USUARIO Y OTROS

            Session::setSession('autenticado',true);
            Session::setSession('id_usuario',$row['id_usuario']);
            Session::setSession('nombre',$row['nombres']);
            Session::setSession('userlogin', $row['userlogin']);
            Session::setSession('level',$row['rol_name']);
            Session::setSession('empresa', $row['emp_name']);
            Session::setSession('tiempo',time());

            $this->redireccionar();
        }

        $this->_views->renderizar('index','Login',true);
    }

    public function logout()
    {
        Session::destroySession();
        $this->redireccionar();
    }

}