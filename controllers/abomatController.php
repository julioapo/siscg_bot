<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 21/07/16
 * Time: 01:50 AM
 */

class abomatController extends Controller {

    private $_abomat;

    private $_generalDat;

    public function __construct()
    {
        parent::__construct();
        $this->_abomat = $this->loadModel('abomat');
        $this->_generalDat = $this->loadModel('general');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('abomat');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','ABONO MATERIAL');
        $this->_views->assign('ruta_agregar','abomat/nuevo');
        $this->_views->assign('abomat',$this->_abomat->getAboMats());
        $this->_views->assign('titulo_agregar','Agregar Abo. Mat.');
        $this->_views->renderizar('index','abomat');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_abomat');

        $this->_views->assign('titulo_pri','ABONO MATERIAL');
        $this->_views->assign('titulo_mod','NUEVO ABO. MAT.');
        $this->_views->setModulo('abomat');
        $this->_views->setIncFileJs(array('abomat'));
        $this->_views->assign('nomcli', $this->_abomat->getNomCli());
        $this->_views->assign('nommamat', $this->_abomat->getNomMaMat());
        $this->_views->assign('tiptransbank', $this->_generalDat->getTipTransBank());

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        if ($this->getInt('insertar') == 1){

            if(!$this->validarFecha('fecha')){
                $this->_views->assign('error','Error en Fecha');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getInt('id_transbank')){
                $this->_views->assign('error','Error en Transaccion bancaria');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getInt('id_bank')){
                $this->_views->assign('error','Error en Banco');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getPostParam('cuentcli')){
                $this->_views->assign('error','Error en Cuenta Cliente');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getMonto('monto')){
                $this->_views->assign('error','Error en Puro');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getInt('id_closemat')){
                $this->_views->assign('error','Error en Cierre');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getPostParam('nro_transaccion')){
                $this->_views->assign('error','Error en Nro Transaccion');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getInt('id_cliente')){
                $this->_views->assign('error','Error en Cliente');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            if(!$this->getPostParam('beneficiario')){
                $this->_views->assign('error','Error en Nro Transaccion');
                $this->_views->renderizar('new','abomat');
                exit;
            }

            $this->_abomat->registrarAboMat(
                $this->getPostParam('fecha'),
                $this->getInt('id_transbank'),
                $this->getInt('id_bank'),
                $this->getPostParam('cuentcli'),
                $this->getPostParam('monto'),
                $this->getInt('id_closemat'),
                $this->getPostParam('nro_transaccion'),
                $this->getInt('id_cliente'),
                $this->getPostParam('beneficiario')
            );

            $this->redireccionar('abomat');

        }

        $this->_views->renderizar('new','abomat');
    }

    public function getCierreMat()
    {
        if($this->getInt('id_mamat'))
            echo json_encode($this->_abomat->getCierreMat($this->getInt('id_mamat')));
    }

    public function getCliMat()
    {
        if($this->getInt('id_mamat'))
            echo json_encode($this->_abomat->getCliMat($this->getInt('id_mamat')));
    }

    public function getBanksCli()
    {
        if($this->getInt('id_cliente'))
            echo json_encode($this->_abomat->getBanksCli($this->getInt('id_cliente')));
    }

    public function getCountsCli()
    {
        if($this->getInt('id_cliente') && $this->getInt('id_banco'))
            echo json_encode($this->_abomat->getCountsCli($this->getInt('id_cliente'),$this->getInt('id_banco')));
    }
}