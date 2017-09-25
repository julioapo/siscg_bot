<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 10/07/16
 * Time: 04:20 AM
 */

class compradorController extends Controller {

    private $_compradores; //se declara un atributo privado para instanciarlo y utilizarlo en todo el controlador ya que se utilizara este atributo en todos los metodos de este controlador

    private $_banks;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->_compradores = $this->loadModel('comprador');
        $this->_banks = $this->loadModel('bank');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('compradores');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','LIQUIDADOR');
        $this->_views->assign('titulo_mod','Modulo Liq. Divisas');
        $this->_views->assign('compradores',$this->_compradores->getCompradores());
        $this->_views->assign('ruta_agregar','comprador/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Liq. Div');
        $this->_views->renderizar('index','comprador');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_comprador');

        $this->_views->assign('titulo_pri','LIQUIDADOR DIV');
        $this->_views->assign('titulo_mod','NUEVO LIQUIDADOR DIV.');
        $this->_views->setModulo('comprador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getSql('nombre')){
                $this->_views->assign('error','Debe introducir nombre ');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('telefono_fijo')){
                $this->_views->assign('error','Debe introducir el telefono ');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('direccion')){
                $this->_views->assign('error','Debe introducir direccion ');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('new');
                exit;
            }

            if($this->_compradores->verificarEmailComprador($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail ya esta registrada');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('repre_legal')){
                $this->_views->assign('error','Debe introducir nombre del Representante Legal');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('telefono_repre')){
                $this->_views->assign('error','Debe introducir el telefono movil del Representante Legal');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('observaciones')){
                $this->_views->assign('error','Corrija campo Observaciones');
                $this->_views->renderizar('new');
                exit;
            }



            $this->_compradores->insertarComprador(
                $this->getPostParam('nombre'),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('repre_legal'),
                $this->getPostParam('telefono_repre'),
                $this->getPostParam('observaciones')
            );

            $this->redireccionar('comprador?mensaje=1');
        }

        $this->_views->renderizar('new');
    }

    public function editar($id_comprador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_comprador');

        if(!$this->filtrarInt($id_comprador)){
            $this->redireccionar('comprador');
        }

        if(!$this->_compradores->getComprador($this->filtrarInt($id_comprador))){
            $this->redireccionar('comprador');
        }

        $this->_views->assign('titulo_mod','EDITAR LIQ. DIV.');
        $this->_views->setModulo('comprador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getSql('telefono_fijo')){
                $this->_views->assign('error','Debe introducir el telefono');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getSql('direccion')){
                $this->_views->assign('error','Debe introducir direccion');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getSql('repre_legal')){
                $this->_views->assign('error','Debe introducir nombre del Representante Legal');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getSql('telefono_repre')){
                $this->_views->assign('error','Debe introducir el telefono movil del Representante Legal');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getSql('observaciones')){
                $this->_views->assign('error','Corrija campo Observaciones');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_compradores->editarComprador(
                $this->filtrarInt($id_comprador),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('direccion'),
                $this->getPostParam('email'),
                $this->getPostParam('repre_legal'),
                $this->getPostParam('telefono_repre'),
                $this->getPostParam('observaciones')
            );

            $this->redireccionar('comprador?mensaje=2');
        }

        $this->_views->assign('titulo_pri','LIQUIDADOR DIV');
        $this->_views->assign('datos',$this->_compradores->getComprador($this->filtrarInt($id_comprador)));
        $this->_views->renderizar('edit');
    }

    public function eliminar($id_comprador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_comprador');

        if(!$this->filtrarInt($id_comprador)){
            $this->redireccionar('comprador');
        }

        if(!$this->_compradores->getComprador($this->filtrarInt($id_comprador))){
            $this->redireccionar('comprador');
        }

        $this->_compradores->eliminarComprador($this->filtrarInt($id_comprador));
        $this->redireccionar('comprador?mensaje=3');
    }

    public function inf_bancaria($id_comprador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('comprador_cuentas');

        $this->_views->assign('titulo_pri','LIQUIDADOR DIV');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->setModulo('comprador');

        if(!$this->filtrarInt($id_comprador)){
            $this->redireccionar('comprador');
        }

        $this->_views->assign('ruta_agregar','comprador/newCueComp');
        $this->_views->assign('titulo_agregar','Agregar Cuenta');
        $this->_views->assign('id_comprador',$id_comprador);
        $this->_views->assign('info',$this->_compradores->getNomComprador($this->filtrarInt($id_comprador)));
        $this->_views->assign('infbank',$this->_compradores->getCuentasComprador($this->filtrarInt($id_comprador)));
        $this->_views->renderizar('bank_inf');
    }

    public function newCueComp($id_comprador)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        if(!$this->filtrarInt($id_comprador)){
            $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);
        }

        $this->_acl->permisosConAcl('new_cuen_comp');

        $this->_views->assign('titulo_pri','LIQUIDADOR DIV');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->assign('bancos',$this->_banks->getBanks());
        $this->_views->setModulo('comprador');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->filtrarInt($this->getInt('id_banco'))){
                $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);
            }

            if(!$this->getAlphaNum('nro_cuenta')){
                $this->_views->assign('error','Verifique numero de cuenta!!!');
                $this->_views->renderizar('newCueComp');
                exit;
            }

            if($this->_compradores->verificarCuentaComprador($this->getInt('id_banco'),$this->getAlphaNum('nro_cuenta'))){
                $this->_views->assign('error','Ya esta registrada esta cuenta en el banco');
                $this->_views->renderizar('newCueComp','comprador');
                exit;
            }

            $this->_compradores->saveCuentaComprador(
                $this->filtrarInt($id_comprador),
                $this->getPostParam('id_banco'),
                $this->getPostParam('nro_cuenta')
            );

            $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);
        }

        $this->_views->renderizar('newCueComp');
    }

    public function dropCueComp($id_comprador,$id_cuenta,$id_banco)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('drop_cue_comp');

        if(!$this->filtrarInt($id_comprador)){
            $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);
        }

        if(!$this->_compradores->getComprador($this->filtrarInt($id_comprador))){
            $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);
        }

        $this->_compradores->dropCuentaComprador($this->filtrarInt($id_comprador),$this->filtrarInt($id_banco),$id_cuenta);
        $this->redireccionar('comprador/inf_bancaria/'.$id_comprador);

    }

} 