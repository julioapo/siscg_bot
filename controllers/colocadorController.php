<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 02/07/16
 * Time: 01:48 PM
 * Clase Controller de los Colocadores de Divisas
 */

class ColocadorController extends Controller {

    private $_colocadores; //se declara un atributo privado para instanciarlo y utilizarlo en todo el controlador ya que se utilizara este atributo en todos los metodos de este controlador

    private $_banks;

    public function __construct()
    {
        parent::__construct();
        $this->_colocadores = $this->loadModel('colocador');
        $this->_banks = $this->loadModel('bank');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('colocador');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','COLOCADOR');
        $this->_views->assign('titulo_mod','Modulo Colocador');
        $this->_views->assign('colocadores',$this->_colocadores->getColocadores());
        $this->_views->assign('ruta_agregar','colocador/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Colocador');
        $this->_views->renderizar('index','colocadores');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_colocador');

        $this->_views->assign('titulo_pri','COLOCADOR');
        $this->_views->assign('titulo_mod','Modulo Colocador');
        $this->_views->setModulo('colocador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir nombre');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            if(!$this->getTexto('telefono_fijo')){
                $this->_views->assign('error','Debe introducir Telefono Fijo');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            if(!$this->getTexto('direccion')){
                $this->_views->assign('error','Debe introducir Direccion');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            if($this->_colocadores->verificarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail ya esta registrada');
                $this->_views->renderizar('new','usuarios');
                exit;
            }

            if(!$this->getTexto('representante_legal')){
                $this->_views->assign('error','Debe introducir Representante Legal');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            if(!$this->getTexto('telefono_repre')){
                $this->_views->assign('error','Debe introducir el telefono del representante');
                $this->_views->renderizar('new','colocador');
                exit;
            }

            $this->_colocadores->insertarColocador(
                $this->getPostParam('nombre'),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('representante_legal'),
                $this->getPostParam('telefono_repre'),
                $this->getPostParam('observaciones')
            );

            $this->redireccionar('colocador?mensaje=1');
        }
        $this->_views->renderizar('new','colocador');
    }

    public function editar($id_colocador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_colocador');

        if(!$this->filtrarInt($id_colocador)){
            $this->redireccionar('colocador');
        }

        if(!$this->_colocadores->getColocador($this->filtrarInt($id_colocador))){
            $this->redireccionar('colocador');
        }

        $this->_views->assign('titulo_mod','EDITAR COLOCADOR');
        $this->_views->setModulo('colocador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('telefono_fijo')){
                $this->_views->assign('error','Debe introducir Telefono Fijo');
                $this->_views->renderizar('edit','colocador');
                exit;
            }

            if(!$this->getTexto('direccion')){
                $this->_views->assign('error','Debe introducir Direccion');
                $this->_views->renderizar('edit','colocador');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('edit','colocador');
                exit;
            }

            if(!$this->getTexto('representante_legal')){
                $this->_views->assign('error','Debe introducir Representante Legal');
                $this->_views->renderizar('edit','colocador');
                exit;
            }

            if(!$this->getTexto('telefono_repre')){
                $this->_views->assign('error','Debe introducir el telefono del representante');
                $this->_views->renderizar('edit','colocador');
                exit;
            }

            $this->_colocadores->editarColocador(
                $this->filtrarInt($id_colocador),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('representante_legal'),
                $this->getPostParam('telefono_repre'),
                $this->getPostParam('observaciones')
            );

            $this->redireccionar('colocador?mensaje=2');
        }

        $this->_views->assign('titulo_pri','COLOCADOR');
        $this->_views->assign('datos',$this->_colocadores->getColocador($this->filtrarInt($id_colocador)));
        $this->_views->renderizar('edit');
    }

    public function eliminar($id_colocador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_colocador');

        if(!$this->filtrarInt($id_colocador)){
            $this->redireccionar('colocador');
        }

        if(!$this->_colocadores->getColocador($this->filtrarInt($id_colocador))){
            $this->redireccionar('colocador');
        }

        $this->_colocadores->eliminarColocador($this->filtrarInt($id_colocador));
        $this->redireccionar('colocador?mensaje=3');
    }

    public function inf_bancaria($id_colocador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('colocador_cuentas');

        $this->_views->assign('titulo_pri','COLOCADOR DIV');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->setModulo('colocador');

        if(!$this->filtrarInt($id_colocador)){
            $this->redireccionar('colocador');
        }

        $this->_views->assign('ruta_agregar','colocador/newCueCol');
        $this->_views->assign('titulo_agregar','Agregar Cuenta');
        $this->_views->assign('id_colocador',$id_colocador);
        $this->_views->assign('info',$this->_colocadores->getNomColocador($this->filtrarInt($id_colocador)));
        $this->_views->assign('infbank',$this->_colocadores->getCuentas($this->filtrarInt($id_colocador)));
        $this->_views->renderizar('bank_inf');
    }

    public function newCueCol($id_colocador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        if(!$this->filtrarInt($id_colocador)){
            $this->redireccionar('empresas/inf_bancaria/'.$id_colocador);
        }

        $this->_acl->permisosConAcl('new_cuen_col');

        $this->_views->assign('titulo_pri','COLOCADOR');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->assign('bancos',$this->_banks->getBanks());
        $this->_views->setModulo('colocador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->filtrarInt($this->getInt('id_banco'))){
                $this->redireccionar('colocador/inf_bancaria/'.$id_colocador);
            }

            if(!$this->getAlphaNum('nro_cuenta')){
                $this->_views->assign('error','Verifique numero de cuenta!!!');
                $this->_views->renderizar('newCueCol');
                exit;
            }

            if($this->_colocadores->verificarCuenta($this->getInt('id_banco'),$this->getAlphaNum('nro_cuenta'))){
                $this->_views->assign('error','Ya esta registrada esta cuenta en el banco');
                $this->_views->renderizar('newCueCol','colocador');
                exit;
            }

            $this->_colocadores->saveCuenta(
                $this->filtrarInt($id_colocador),
                $this->getPostParam('id_banco'),
                $this->getPostParam('nro_cuenta')
            );

            $this->redireccionar('colocador/inf_bancaria/'.$id_colocador);
        }

        $this->_views->renderizar('newCueCol');
    }

    public function dropCueCol($id_colocador,$id_cuenta,$id_banco)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('drop_cue_col');

        if(!$this->filtrarInt($id_colocador)){
            $this->redireccionar('colocador/inf_bancaria/'.$id_colocador);
        }

        if(!$this->_colocadores->getColocador($this->filtrarInt($id_colocador))){
            $this->redireccionar('colocador/inf_bancaria/'.$id_colocador);
        }

        $this->_colocadores->dropCuenta($this->filtrarInt($id_colocador),$this->filtrarInt($id_banco),$id_cuenta);
        $this->redireccionar('colocador/inf_bancaria/'.$id_colocador);

    }
}