<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 05/07/16
 * Time: 12:33 AM
 */

class permisosController extends Controller {
    private $_permisos;

    public function __construct()
    {
        parent::__construct();
        $this->_permisos = $this->loadModel('permisos');
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
        $this->_views->assign('titulo_mod','PERMISOS DEL SISTEMA');
        $this->_views->assign('permisos',$this->_permisos->getPermisos());
        $this->_views->assign('ruta_agregar','permisos/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Permiso');
        $this->_views->renderizar('index','Permiso');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('agregar_permisos');

        $this->_views->assign('titulo_pri','PERMISOS');
        $this->_views->assign('titulo_mod','NUEVO PERMISO');
        $this->_views->setModulo('permisos');

        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('permiso')){
                $this->_views->assign('error','Debe introducir nombre del Permiso');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getTexto('key')){
                $this->_views->assign('error','Debe introducir llave del Permiso');
                $this->_views->renderizar('new');
                exit;
            }

            $this->_permisos->insertarPermiso(
                $this->getPostParam('permiso'),
                $this->getPostParam('key')
            );

            $this->redireccionar('permisos?mensaje=1');
        }
        $this->_views->renderizar('new');
    }

    public function editar($id_permiso)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_permisos');

        if(!$this->filtrarInt($id_permiso)){
            $this->redireccionar('permisos');
        }

        if(!$this->_permisos->getPermiso($this->filtrarInt($id_permiso))){
            $this->redireccionar('permisos');
        }

        $this->_views->assign('titulo_pri','PERMISOS');
        $this->_views->assign('titulo_mod','EDITAR PERMISO');
        $this->_views->setModulo('permisos');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('permiso')){
                $this->_views->assign('error','Debe introducir nombre de permiso');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getTexto('key')){
                $this->_views->assign('error','Debe introducir llave de permiso');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_permisos->editarPermiso(
                $this->filtrarInt($id_permiso),
                $this->getPostParam('permiso'),
                $this->getPostParam('key')
            );

            $this->redireccionar('permisos?mensaje=2');
        }

        $this->_views->assign('datos',$this->_permisos->getPermiso($this->filtrarInt($id_permiso)));
        $this->_views->renderizar('edit');
    }

    public function eliminar($id_permiso)
    {

        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_permisos');

        if(!$this->filtrarInt($id_permiso)){
            $this->redireccionar('permisos');
        }

        if(!$this->_permisos->getPermiso($this->filtrarInt($id_permiso))){
            $this->redireccionar('permisos');
        }

        $this->_permisos->eliminarPermiso($this->filtrarInt($id_permiso));
        $this->redireccionar('permisos?mensaje=3');
    }
} 