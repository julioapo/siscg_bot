<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 10/07/16
 * Time: 11:20 AM
 */

class closedivController extends Controller {

    private $_closediv;

    private $_generalDat;

    private $_lastID;

    private $_nameTrans;

    private $_nameCountry;

    private $_IDcloseDIV;

    public function __construct()
    {
        parent::__construct();
        $this->_closediv = $this->loadModel('closediv');
        $this->_generalDat = $this->loadModel('general');

    }
    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closediv');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','COLOCACION DE DIVISAS');
        $this->_views->setIncFileJs(array('closediv'));
        $this->_views->assign('ruta',$this->_views->setIncFileTpl('show_dat'));
        $this->_views->assign('ruta_agregar','closediv/nuevo');
        $this->_views->assign('cierres',$this->_closediv->getCierresDiv());
        $this->_views->assign('titulo_agregar','Agregar Col. Div.');
        $this->_views->renderizar('index','cierrediv');

    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_cierrediv');

        $this->_views->assign('titulo_pri','COLOCACION DIV');
        $this->_views->assign('titulo_mod','NUEVO COLOCACION DIV');
        $this->_views->setModulo('closediv');
        $this->_views->setIncFileJs(array('closediv'));
        $this->_views->assign('tiptraban', $this->_generalDat->getTipTransBank());
        $this->_views->assign('country', $this->_generalDat->getPaises());
        $this->_views->assign('liquidadores',$this->_closediv->getLiquidadors());

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        if ($this->getInt('insertar') == 1){

            if(!$this->getInt('liquidador')){
                $this->_views->assign('error',"Error en Liquidador");
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getInt('banksliq')){
                $this->_views->assign('error','Error en Bancos de Liquidador');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getAlphaNum('cuentliq')){
                $this->_views->assign('error','Error en Cuentas');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->validarFecha('fecha_closediv')){
                $this->_views->assign('error','Error en Fecha');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getTexto('concepto')){
                $this->_views->assign('error','Debe introducir datos de conceptos');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getInt('tip_tranbank')){
                $this->_views->assign('error','Error en Tipo Transacción');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getMonto('monto_transaccion')){
                $this->_views->assign('error','Error en Monto');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getAlphaNum('nro_transaccion')){
                $this->_views->assign('error','Error en Nro de Transacción');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            if(!$this->getInt('country')){
                $this->_views->assign('error','Error en Pais');
                $this->_views->renderizar('new','closediv');
                exit;
            }

            $this->_lastID = $this->_closediv->getLastID();

            if($this->_lastID == 0){
                $this->_lastID = 1;
            }
            else{
                $this->_lastID = $this->_lastID + 1;
            }

            $this->_nameTrans = $this->_generalDat->getNameTrans('tip_tranbank');

            $this->_nameCountry = $this->_generalDat->getNameCountry('country');

            $this->_IDcloseDIV = $this->getNumCloseDiv($this->_lastID,'fecha_closediv',$this->_nameTrans,'cuentliq',$this->_nameCountry);

            $this->_closediv->registrarCierreDiv(
                $this->_IDcloseDIV,
                $this->getInt('liquidador'),
                $this->getInt('country'),
                $this->getInt('banksliq'),
                $this->getAlphaNum('cuentliq'),
                $this->getAlphaNum('nro_transaccion'),
                $this->getPostParam('fecha_closediv'),
                $this->getPostParam('monto_transaccion'),
                $this->getPostParam('concepto')
            );

            $this->redireccionar('closediv');

        }

        $this->_views->renderizar('new','cierrediv');
    }

    public function status($id_cierrediv)
    {
        $monto_col = 0;
        $monto_liq = 0;
        $monto_x_liq = 0;

        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closediv');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $monto_col = $this->_closediv->getMontoCol($id_cierrediv);
        $monto_liq = $this->_closediv->getMontoLiq($id_cierrediv);

        $monto_x_liq = $monto_col - $monto_liq;


        $this->_views->setModulo();
        $this->_views->assign('titulo_pri','COLOCACION DIV');
        $this->_views->assign('titulo_mod','STATUS COL. DIV.');
        $this->_views->setModulo('closediv');
        if ($monto_liq <> 0){
            $this->_views->assign('cierrediv',$this->_closediv->getCierreDiv($id_cierrediv));
            $this->_views->assign('montocol',$monto_col);
            $this->_views->assign('montoliq',$monto_liq);
            $this->_views->assign('montoxliq',$monto_x_liq);
            $this->_views->assign('cierre',$this->_closediv->getStatusCloDiv($id_cierrediv));
        }
        $this->_views->renderizar('status','cierrediv');
    }

    public function getBanksLiq()
    {
        if($this->getInt('id_liquidador'))
        echo json_encode($this->_closediv->getBanksLiq($this->getInt('id_liquidador')));
    }

    public function getCountsLiq()
    {
        if($this->getInt('id_liquidador') && $this->getInt('id_banco'))
            echo json_encode($this->_closediv->getCountsLiq($this->getInt('id_liquidador'),$this->getInt('id_banco')));
    }

    public function getCloseDiv()
    {
        if($this->getIntGET('id_cierrediv'))
            echo json_encode($this->_closediv->getClosdivtot($this->getIntGET('id_cierrediv')));
    }

    public function getNumCloseDiv($lastId,$fecha,$nameTrans,$nroCount,$nameCountry)
    {
        $new_lastId = str_pad(intval($lastId),4,'0',STR_PAD_LEFT);

        $new_fecha = $_POST[$fecha];
        $new_fecha = explode("-",$new_fecha);
        $new_fecha = $new_fecha[0].$new_fecha[1].$new_fecha[2];

        $new_nameTrans = substr($nameTrans,0,3);

        $new_nameCount = substr($_POST[$nroCount],-5);

        $new_nameCountry = substr($nameCountry,0,3);

        $numclosediv = $new_nameCountry . '-' . $new_nameTrans . '-' . $new_nameCount . '-' . $new_fecha . '-' . $new_lastId;

        return $numclosediv;

    }
}