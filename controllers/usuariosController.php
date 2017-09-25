<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 03/07/16
 * Time: 03:14 PM
 */

class UsuariosController extends Controller {

    private $_usuarios;

    private $_acluser;

    public function __construct()
    {
        parent::__construct();
        $this->_usuarios = $this->loadModel('usuarios');
        $this->_acluser = $this->loadModel('acl');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->assign('usuarios',$this->_usuarios->getUsuarios());
        $this->_views->assign('titulo_pri','USUARIOS');
        $this->_views->assign('titulo_mod','USUARIOS');
        $this->_views->assign('ruta_agregar','usuarios/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Usuario');
        $this->_views->setModulo();
        $this->_views->renderizar('index','Usuarios');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        $this->_views->assign('titulo_mod','NUEVO USUARIO');
        $this->_views->assign('titulo_pri','USUARIOS');
        $this->_views->assign('user_rol',$this->_usuarios->getUserRol());
        $this->_views->assign('user_compdiv',$this->_usuarios->getUserCompDiv());
        $this->_views->setModulo('usuarios');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){

            $this->_views->assign('datos',$_POST);

            if(!$this->getSql('nombre')){
                $this->_views->assign('error','Debe introducir nombre');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if(!$this->getAlphaNum('cedula')){
                $this->_views->assign('error','Debe introducir cedula');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if($this->_usuarios->verificarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail ya esta registrada');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if(!$this->getAlphaNum('userlogin')){
                $this->_views->assign('error','Debe introducir login de usuario');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if(!$this->_usuarios->verificarUsuario($this->getAlphaNum('userlogin'))){
                $this->_views->assign('error','El login existe en el Sistema');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            $this->_usuarios->registrarUsuarios(
                $this->getPostParam('nombre'),
                $this->getPostParam('cedula'),
                $this->getPostParam('telefono'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('userlogin'),
                $this->getPostParam('rol_usuario'),
                $this->getPostParam('compdiv_usuario')
            );

            $this->redireccionar('usuarios?mensaje=1');
        }
        $this->_views->renderizar('new','usuarios');
    }

    public function editar($id_usuario)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        if(!$this->filtrarInt($id_usuario)){
            $this->redireccionar('usuarios');
        }

        if(!$this->_usuarios->getUsuario($this->filtrarInt($id_usuario))){
            $this->redireccionar('usuarios');
        }

        $this->_views->assign('titulo_pri','USUARIOS');
        $this->_views->assign('titulo_mod','EDITAR USUARIO');
        $this->_views->assign('user_compdiv',$this->_usuarios->getUserCompDiv());
        $this->_views->assign('user_rol',$this->_usuarios->getUserRol());
        $this->_views->setModulo('usuarios');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){

            $this->_views->assign('datos',$_POST);

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('edit','Usuario');
                exit;
            }

            if(!$this->_usuarios->verificarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail ya esta registrada');
                $this->_views->renderizar('edit','Usuarios');
                exit;
            }

            $this->_usuarios->editarUsuario(
                $this->filtrarInt($id_usuario),
                $this->getPostParam('telefono'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('rol_usuario'),
                $this->getPostParam('compdiv_usuario')
            );

            $this->redireccionar('usuarios?mensaje=2');
        }
        $this->_views->assign('datos',$this->_usuarios->getUsuario($this->filtrarInt($id_usuario)));
        $this->_views->renderizar('edit','Usuario');
    }

    public function eliminar($id_usuario)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        if(!$this->filtrarInt($id_usuario)){
            $this->redireccionar('usuarios');
        }

        if(!$this->_usuarios->getUsuario($this->filtrarInt($id_usuario))){
            $this->redireccionar('usuarios');
        }

        $this->_usuarios->eliminarUsuario($this->filtrarInt($id_usuario));
        $this->redireccionar('usuarios?mensaje=3');
    }

    public function permisos_user($usuarioID)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_perm_user');

        $id = $this->filtrarInt($usuarioID);

        if(!$id){
            $this->redireccionar('usuarios');
        }

        if ($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();

            for($i=0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) -5);
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        };
                        $replace[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }

            for($i = 0; $i < count($eliminar); $i++){
                $this->_acluser->eliminarPermisoUser(
                    $eliminar[$i]['usuario'],
                    $eliminar[$i]['permiso']
                );
            }

            for($i = 0; $i < count($replace); $i++){
                $this->_acluser->editarPermisoUser(
                    $replace[$i]['usuario'],
                    $replace[$i]['permiso'],
                    $replace[$i]['valor']
                );
            }
            $this->redireccionar('usuarios?mensaje=20');
        }

        $permisosUsuario = $this->_acluser->getPermisosUsuario($id);
        $permisosRol = $this->_acluser->getPermisosRol($id);


        if(!$permisosUsuario || !$permisosRol){
            $this->redireccionar('usuarios');
        }

        $this->_views->setModulo('usuarios');
        $this->_views->assign('titulo_pri','USUARIOS');
        $this->_views->assign('titulo_mod','PERMISOS DE USUARIO');
        $this->_views->assign('permisos',array_keys($permisosUsuario));
        $this->_views->assign('usuarios',$permisosUsuario);
        $this->_views->assign('role',$permisosRol);
        $this->_views->assign('info',$this->_acluser->getUser($id));
        $this->_views->renderizar('permisos_user','usuarios');
    }
} 