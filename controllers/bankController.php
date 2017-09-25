<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 05/07/16
 * Time: 09:26 PM
 */

class bankController extends Controller {
    private $_banks; //se declara un atributo privado para instanciarlo y utilizarlo en todo el controlador ya que se utilizara este atributo en todos los metodos de este controlador

    public function __construct()
    {
        parent::__construct();
        $this->_banks = $this->loadModel('bank');
    }
    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('ver_bancos');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','BANCOS');
        $this->_views->assign('titulo_mod','MODULO BANCOS');
        $this->_views->assign('bancos',$this->_banks->getBanks());
        $this->_views->assign('ruta_agregar','bank/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Banco');
        $this->_views->renderizar('index','bank');
    }

    /**
     * [nuevo controla los eventos de agregar nuevo modulo Empresas]
     * @return [type] [description]
     */
    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_banco');

        $this->_views->assign('titulo_pri','BANCOS');
        $this->_views->assign('titulo_mod','NUEVO BANCO');
        $this->_views->setModulo('bank');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir nombre del Banco');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getTexto('telefono')){
                $this->_views->assign('error','Debe introducir telefono del Banco');
                $this->_views->renderizar('new');
                exit;
            }

            $this->_banks->newBank(
                $this->getPostParam('nombre'),
                $this->getPostParam('telefono'),
                $this->getPostParam('contacto'),
                $this->getPostParam('telefono_contacto')
            );

            $this->redireccionar('bank?mensaje=1');
        }
        $this->_views->renderizar('new');
    }

    /**
     * [editar controla los eventos de edicion del modulo Empresas]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function editar($id_bank)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_banco');

        if(!$this->filtrarInt($id_bank)){
            $this->redireccionar('bank');
        }

        if(!$this->_banks->getBank($this->filtrarInt($id_bank))){
            $this->redireccionar('bank');
        }

        $this->_views->assign('titulo_pri','BANCOS');
        $this->_views->assign('titulo_mod','EDITAR BANCO');
        $this->_views->setModulo('bank');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getTexto('nombre')){
                $this->_views->assign('error','Debe introducir nombre del Banco');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getTexto('telefono')){
                $this->_views->assign('error','Debe introducir telefono del Banco');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_banks->editBank(
                $this->filtrarInt($id_bank),
                $this->getPostParam('nombre'),
                $this->getPostParam('telefono'),
                $this->getPostParam('contacto'),
                $this->getPostParam('telefono_contacto')
            );

            $this->redireccionar('bank?mensaje=2');
        }

        $this->_views->assign('datos',$this->_banks->getBank($this->filtrarInt($id_bank)));
        $this->_views->renderizar('edit');
    }

    /**
     * [eliminar controla los eventos de eliminacion del modulo Empresas]
     * @param  [type] $id_empresa [description]
     * @return [type]             [description]
     */
    public function eliminar($id_bank)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_banco');

        if(!$this->filtrarInt($id_bank)){
            $this->redireccionar('bank');
        }

        if(!$this->_banks->getBank($this->filtrarInt($id_bank))){
            $this->redireccionar('bank');
        }

        $this->_banks->dropBank($this->filtrarInt($id_bank));
        $this->redireccionar('bank?mensaje=3');
    }
} 