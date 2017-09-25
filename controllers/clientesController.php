<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 08/07/16
 * Time: 11:22 PM
 */

class clientesController extends Controller {

    private $_clientes; //se declara un atributo privado para instanciarlo y utilizarlo en todo el controlador ya que se utilizara este atributo en todos los metodos de este controlador

    private $_banks;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->_clientes = $this->loadModel('clientes');
        $this->_banks = $this->loadModel('bank');
    }

    /**
     * [index controla el inicio del modulo Clientes]
     * @throws Exception
     * @return void [type] [description]
     */
    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('clientes');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','CLIENTES');
        $this->_views->assign('titulo_mod','Modulo Clientes');
        $this->_views->assign('clientes',$this->_clientes->getClientes());
        $this->_views->assign('ruta_agregar','clientes/nuevo');
        $this->_views->assign('titulo_agregar','Agregar Clientes');
        $this->_views->renderizar('index','clientes');
    }

    /**
     * [nuevo controla los eventos de agregar nuevo modulo Clientes]
     * @throws Exception
     * @return void [type] [description]
     */
    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_cliente');

        $this->_views->assign('titulo_pri','CLIENTES');
        $this->_views->assign('titulo_mod','NUEVO CLIENTE');
        $this->_views->setModulo('clientes');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getAlphaNum('cedula')){
                $this->_views->assign('error','Debe introducir cedula del Cliente');
                $this->_views->renderizar('new');
                exit;
            }

            if($this->_clientes->verificarCedulaCli($this->getPostParam('cedula'))){
                $this->_views->assign('error','La cedula ya esta registrada');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('nombre')){
                $this->_views->assign('error','Debe introducir nombre del Cliente');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getSql('direccion')){
                $this->_views->assign('error','Debe introducir direccion del Cliente');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->getAlphaNum('telefono_movil')){
                $this->_views->assign('error','Debe introducir el telefono movil del Cliente');
                $this->_views->renderizar('new');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('new');
                exit;
            }

            if($this->_clientes->verificarEmailCli($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail ya esta registrada');
                $this->_views->renderizar('new');
                exit;
            }

            if($this->getInt('id_mamat')){
                $this->_views->assign('error','Error en Mayorista Material');
                $this->_views->renderizar('new');
                exit;
            }

            $this->_clientes->insertarCliente(
                $this->getPostParam('cedula'),
                $this->getPostParam('nombre'),
                $this->getPostParam('direccion'),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('telefono_movil'),
                $this->getPostParam('email'),
                $this->getPostParam('zona'),
                $this->getPostParam('dia_max_cre'),
                $this->getPostParam('monto_max_cre'),
                $this->getPostParam('grama_max_ent'),
                $this->getInt('status'),
                $this->getInt('id_mamat')
            );

            $this->redireccionar('clientes?mensaje=1');
        }

        $this->_views->assign('mamat',$this->_clientes->getMaMat());
        $this->_views->assign('status',$this->_clientes->getStatus());
        $this->_views->assign('zonas',$this->_clientes->getZonas());
        $this->_views->renderizar('new');
    }

    /**
     * [editar controla los eventos de edicion del modulo Clientes]
     * @param $id_cliente
     * @throws Exception
     * @internal param $ [type] $id [description]
     * @return void [type]     [description]
     */
    public function editar($id_cliente)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('editar_cliente');

        if(!$this->filtrarInt($id_cliente)){
            $this->redireccionar('clientes');
        }

        if(!$this->_clientes->getCliente($this->filtrarInt($id_cliente))){
            $this->redireccionar('clientes');
        }

        $this->_views->assign('status',$this->_clientes->getStatus());
        $this->_views->assign('zonas',$this->_clientes->getZonas());
        $this->_views->assign('titulo_mod','EDITAR CLIENTE');
        $this->_views->setModulo('clientes');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('modificar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->getSql('nombre')){
                $this->_views->assign('error','Debe introducir nombre del Cliente');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getSql('direccion')){
                $this->_views->assign('error','Debe introducir direccion del Cliente');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->getAlphaNum('telefono_movil')){
                $this->_views->assign('error','Debe introducir el telefono movil del Cliente');
                $this->_views->renderizar('edit');
                exit;
            }

            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_views->assign('error','La direccion de E@mail es inv&aacute;lida');
                $this->_views->renderizar('edit');
                exit;
            }

            $this->_clientes->editarCliente(
                $this->filtrarInt($id_cliente),
                $this->getPostParam('nombre'),
                $this->getPostParam('direccion'),
                $this->getPostParam('telefono_fijo'),
                $this->getPostParam('telefono_movil'),
                $this->getPostParam('email'),
                $this->getPostParam('zona'),
                $this->getPostParam('dia_max_cre'),
                $this->getPostParam('monto_max_cre'),
                $this->getPostParam('grama_max_ent'),
                $this->getPostParam('status')
            );

            $this->redireccionar('clientes?mensaje=2');
        }

        $this->_views->assign('titulo_pri','CLIENTES');
        $this->_views->assign('datos',$this->_clientes->getCliente($this->filtrarInt($id_cliente)));
        $this->_views->renderizar('edit');
    }

    /**
     * [eliminar controla los eventos de eliminacion del modulo Clientes]
     * @param $id_cliente
     * @internal param $ [type] $id_empresa [description]
     * @return void [type]             [description]
     */
    public function eliminar($id_cliente)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('eliminar_cliente');

        if(!$this->filtrarInt($id_cliente)){
            $this->redireccionar('clientes');
        }

        if(!$this->_clientes->getCliente($this->filtrarInt($id_cliente))){
            $this->redireccionar('clientes');
        }

        $this->_clientes->eliminarCliente($this->filtrarInt($id_cliente));
        $this->redireccionar('clientes?mensaje=3');
    }

    public function inf_bancaria($id_cliente)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('clientes_cuentas');

        $this->_views->assign('titulo_pri','CLIENTES');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->setModulo('clientes');

        if(!$this->filtrarInt($id_cliente)){
            $this->redireccionar('clientes');
        }

        $this->_views->assign('ruta_agregar','clientes/newCueCli');
        $this->_views->assign('titulo_agregar','Agregar Cuenta');
        $this->_views->assign('id_cliente',$id_cliente);
        $this->_views->assign('info',$this->_clientes->getNomCliente($this->filtrarInt($id_cliente)));
        $this->_views->assign('infbank',$this->_clientes->getCuentasCli($this->filtrarInt($id_cliente)));
        $this->_views->renderizar('bank_inf');
    }

    public function newCueCli($id_cliente)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        if(!$this->filtrarInt($id_cliente)){
            $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);
        }

        $this->_acl->permisosConAcl('new_cuen_cli');

        $this->_views->assign('titulo_pri','CLIENTES');
        $this->_views->assign('titulo_mod','INF BANCARIA');
        $this->_views->assign('bancos',$this->_banks->getBanks());
        $this->_views->setModulo('clientes');

        // Estas lineas valida los datos enviados al metodo
        if ($this->getInt('insertar') == 1){
            $this->_views->assign('datos',$_POST);

            if(!$this->filtrarInt($this->getInt('id_banco'))){
                $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);
            }

            if(!$this->getAlphaNum('nro_cuenta')){
                $this->_views->assign('error','Verifique numero de cuenta!!!');
                $this->_views->renderizar('newCueCli');
                exit;
            }

            if($this->_clientes->verificarCuentaCli($this->getInt('id_banco'),$this->getAlphaNum('nro_cuenta'))){
                $this->_views->assign('error','Ya esta registrada esta cuenta en el banco');
                $this->_views->renderizar('newCueCli','clientes');
                exit;
            }

            $this->_clientes->saveCuentaCli(
                $this->filtrarInt($id_cliente),
                $this->getPostParam('id_banco'),
                $this->getPostParam('nro_cuenta')
            );

            $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);
        }

        $this->_views->renderizar('newCueCli');
    }

    public function dropCueCli($id_cliente,$id_cuenta,$id_banco)
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('drop_cue_cli');

        if(!$this->filtrarInt($id_cliente)){
            $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);
        }

        if(!$this->_clientes->getCliente($this->filtrarInt($id_cliente))){
            $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);
        }

        $this->_clientes->dropCuentaCli($this->filtrarInt($id_cliente),$this->filtrarInt($id_banco),$id_cuenta);
        $this->redireccionar('clientes/inf_bancaria/'.$id_cliente);

    }
}