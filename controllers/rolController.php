<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 04/07/16
 * Time: 09:52 PM
 */

class rolController extends Controller {

    private $_roles;

    private $_aclrol;

    public function __construct()
    {
        parent::__construct();
        $this->_roles = $this->loadModel('rol');
        $this->_aclrol = $this->loadModel('acl');
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

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','ROLES DEL SISTEMA');
        $this->_views->assign('roles',$this->_roles->getRols());
        $this->_views->assign('ruta_agregar','rol/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Rol');
        $this->_views->renderizar('index','roles');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        $this->_views->assign('titulo_pri','ROL DE SEGURIDAD');
        $this->_views->assign('titulo_mod','NUEVO ROL');
        $this->_views->setModulo('rol');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir nombre del Rol');
                $this->_views->renderizar('new');
                exit;
            }

            $this->_roles->insertarRol(
                $this->getPostParam('nombre')
            );

            $this->redireccionar('rol?mensaje=1');
        }
        $this->_views->renderizar('new');
    }

    public function editar($id_rol)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        if(!$this->filtrarInt($id_rol)){
            $this->redireccionar('rol');
        }

        if(!$this->_roles->getRol($this->filtrarInt($id_rol))){
            $this->redireccionar('rol');
        }

        $this->_views->assign('titulo_pri','ROL DE SEGURIDAD');
        $this->_views->assign('titulo_mod','EDITAR ROL');
        $this->_views->setModulo('rol');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir Rol de Sistema');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_roles->editarRol(
                $this->filtrarInt($id_rol),
                $this->getPostParam('nombre')
            );

            $this->redireccionar('rol?mensaje=2');
        }

        $this->_views->assign('datos',$this->_roles->getRol($this->filtrarInt($id_rol)));
        $this->_views->renderizar('edit');
    }

    public function eliminar($id_rol)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_access');

        if(!$this->filtrarInt($id_rol)){
            $this->redireccionar('rol');
        }

        if(!$this->_roles->getRol($this->filtrarInt($id_rol))){
            $this->redireccionar('rol');
        }

        $this->_roles->eliminarRol($this->filtrarInt($id_rol));
        $this->redireccionar('rol?mensaje=3');
    }

    public function permisos_rol($roleID)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('admin_perm_rol');

        $id = $this->filtrarInt($roleID);

        if(!$id){
            $this->redireccionar('rol');
        }

        $row = $this->_aclrol->getRol($id);

        if(!$row){
            $this->redireccionar('rol');
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
                            'role' => $id,
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
                            'role' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }

            for($i = 0; $i < count($eliminar); $i++){
                $this->_aclrol->eliminarPermisoRol(
                    $eliminar[$i]['role'],
                    $eliminar[$i]['permiso']
                    );
            }

            for($i = 0; $i < count($replace); $i++){
                $this->_aclrol->editarPermisoRol(
                    $replace[$i]['role'],
                    $replace[$i]['permiso'],
                    $replace[$i]['valor']
                );
            }
            $this->redireccionar('rol?mensaje=20');
        }

        $this->_views->assign('titulo_pri','ROL DE SEGURIDAD');
        $this->_views->setModulo('rol');
        $this->_views->assign('titulo_mod','PERMISOS DEL ROL');
        $this->_views->assign('roles',$row);
        $this->_views->assign('permisos',$this->_aclrol->getPermisosRols($id));
        $this->_views->renderizar('permisos_role','roles');
    }
}