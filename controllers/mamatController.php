<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 02/07/16
 * Time: 01:48 PM
 */

class mamatController extends Controller {

    private $_mamat; //se declara un atributo privado para instanciarlo y utilizarlo en todo el controlador ya que se utilizara este atributo en todos los metodos de este controlador

    private $_banks;

    public function __construct()
    {
        parent::__construct();
        $this->_mamat = $this->loadModel('mamat');
        $this->_banks = $this->loadModel('bank');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('mamat');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','M.M.');
        $this->_views->assign('titulo_mod','Modulo Mayorista de Material');
        $this->_views->assign('mamat',$this->_mamat->getMamats());
        $this->_views->assign('ruta_agregar','mamat/nuevo');
        $this->_views->assign('titulo_agregar','Agregar M.M.');
        $this->_views->renderizar('index');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nueva_mamat');

        $this->_views->assign('titulo_pri','M.M.');
        $this->_views->assign('titulo_mod','NUEVO M.M.');
        $this->_views->setModulo('mamat');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir nombre del M.M.');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getTexto('rif')){
                $this->_views->assign('error','Debe introducir rif del M.M.');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getTexto('contacto')){
                $this->_views->assign('error','Debe introducir contacto del M.M.');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getTexto('telefono_contacto')){
                $this->_views->assign('error','Debe introducir el telefono del contacto del M.M.');
                $this->_views->renderizar('new');
                exit;
            }

            $this->_mamat->insertarMamat(
                $this->getPostParam('nombre'),
                $this->getPostParam('rif'),
                $this->getPostParam('telefono'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('contacto'),
                $this->getPostParam('telefono_contacto')
            );

            $this->redireccionar('mamat?mensaje=1');
        }
        $this->_views->renderizar('new');
    }

    public function editar($id_mamat)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_mamat');

        if(!$this->filtrarInt($id_mamat)){
            $this->redireccionar('mamat');
        }

        if(!$this->_mamat->getMamat($this->filtrarInt($id_mamat))){
            $this->redireccionar('mamat');
        }

        $this->_views->assign('titulo_mod','EDITAR M.M.');
        $this->_views->setModulo('mamat');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('contacto')){
                $this->_views->assign('error','Debe introducir contacto del M.M.');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getTexto('telefono_contacto')){
                $this->_views->assign('error','Debe introducir el telefono del contacto del M.M.');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_mamat->editarMamat(
                $this->filtrarInt($id_mamat),
                $this->getPostParam('telefono'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('contacto'),
                $this->getPostParam('telefono_contacto')
            );

            $this->redireccionar('mamat?mensaje=2');
        }

        $this->_views->assign('titulo_pri','M.M.');
        $this->_views->assign('datos',$this->_mamat->getMamat($this->filtrarInt($id_mamat)));
        $this->_views->renderizar('edit');
    }

    public function eliminar($id_mamat)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_mamat');

        if(!$this->filtrarInt($id_mamat)){
            $this->redireccionar('mamat');
        }

        if(!$this->_mamat->getMamat($this->filtrarInt($id_mamat))){
            $this->redireccionar('mamat');
        }

        $this->_mamat->eliminarMamat($this->filtrarInt($id_mamat));
        $this->redireccionar('mamat?mensaje=3');
    }

    public function inf_bancaria($id_mamat)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('mamat_cuentas');

        $this->_views->assign('titulo_pri','M.M.');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->setModulo('mamat');

        if(!$this->filtrarInt($id_mamat)){
            $this->redireccionar('mamat');
        }

        $this->_views->assign('ruta_agregar','mamat/newCueMamat');
        $this->_views->assign('titulo_agregar','Agregar Cuenta');
        $this->_views->assign('id_mamat',$id_mamat);
        $this->_views->assign('info',$this->_mamat->getNomMamat($this->filtrarInt($id_mamat)));
        $this->_views->assign('infbank',$this->_mamat->getCuentas($this->filtrarInt($id_mamat)));
        $this->_views->renderizar('bank_inf');
    }

    public function newCueMamat($id_mamat)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        if(!$this->filtrarInt($id_mamat)){
            $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);
        }

        $this->_acl->permisosConAcl('new_cuen_mamat');

        $this->_views->assign('titulo_pri','M.M.');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->assign('bancos',$this->_banks->getBanks());
        $this->_views->setModulo('mamat');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->filtrarInt($this->getInt('id_banco'))){
                $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);
            }

            if(!$this->getAlphaNum('nro_cuenta')){
                $this->_views->assign('error','Verifique numero de cuenta!!!');
                $this->_views->renderizar('newCueMamat');
                exit;
            }

            if($this->_mamat->verificarCuenta($this->getInt('id_banco'),$this->getAlphaNum('nro_cuenta'))){
                $this->_views->assign('error','Ya esta registrada esta cuenta en el banco');
                $this->_views->renderizar('newCueMamat','mamat');
                exit;
            }

            $this->_mamat->saveCuenta(
                $this->filtrarInt($id_mamat),
                $this->getPostParam('id_banco'),
                $this->getPostParam('nro_cuenta')
            );

            $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);
        }

        $this->_views->renderizar('newCueMamat');
    }

    public function dropCueMamat($id_mamat,$id_cuenta,$id_banco)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('drop_cue_mamat');

        if(!$this->filtrarInt($id_mamat)){
            $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);
        }

        if(!$this->_mamat->getMamat($this->filtrarInt($id_mamat))){
            $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);
        }

        $this->_mamat->dropCuenta($this->filtrarInt($id_mamat),$this->filtrarInt($id_banco),$id_cuenta);
        $this->redireccionar('mamat/inf_bancaria/'.$id_mamat);

    }
}