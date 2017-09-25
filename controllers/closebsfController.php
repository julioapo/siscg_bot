<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 13/07/16
 * Time: 08:38 PM
 */

class closebsfController extends Controller {

    private $_closebsf;

    private $_generalDat;

    private $_lastID;

    private $_nameTrans;

    private $_IDcloseBSF;

    function __construct()
    {
        parent::__construct();
        $this->_closebsf = $this->loadModel('closebsf');
        $this->_generalDat = $this->loadModel('general');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closebsf');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','LIQ. DIV. BsF');
        $this->_views->setIncFileJs(array('closebsf'));
        $this->_views->assign('ruta',$this->_views->setIncFileTpl('show_dat'));
        $this->_views->assign('ruta_agregar','closebsf/nuevo');
        $this->_views->assign('cierresbsf',$this->_closebsf->getCierresBsf());
        $this->_views->assign('titulo_agregar','Agregar Liq. Div. BsF.');
        $this->_views->renderizar('index','cierrebsf');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_cierrebsf');

        $this->_views->assign('titulo_pri','LIQ. DIV. BsF');
        $this->_views->assign('titulo_mod','NUEVO LIQ. DIV. BsF');
        $this->_views->setModulo('closebsf');
        $this->_views->setIncFileJs(array('closebsf'));
        $this->_views->assign('tiptraban', $this->_generalDat->getTipTransBank());
        $this->_views->assign('statraban', $this->_generalDat->getStatusTransBank());
        $this->_views->assign('cierresdiv',$this->_closebsf->getCierreDiv());
        $this->_views->assign('compradores',$this->_closebsf->getCompradores());

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        if ($this->getInt('insertar') == 1){

            if(!$this->getInt('liquidador')){
                $this->_views->assign('error',"Error en Liquidador");
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getInt('bankscomp')){
                $this->_views->assign('error','Error en Bancos de Liquidador');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getAlphaNum('cuentcomp')){
                $this->_views->assign('error','Error en Cuentas');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getInt('cierrediv')){
                $this->_views->assign('error','Error en Id de Colocacion');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->validarFecha('fecha_closebsf')){
                $this->_views->assign('error','Error en Fecha');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getInt('tip_tranbank')){
                $this->_views->assign('error','Error en Tipo Transacción');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getAlphaNum('nro_transaccion')){
                $this->_views->assign('error','Error en Nro de Transacción');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getSql('monto_dls')){
                $this->_views->assign('error','Error en Monto Divisas');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getSql('tasa_cambio')){
                $this->_views->assign('error','Error en Tasa de Cambio');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getSql('monto_bsf')){
                $this->_views->assign('error','Error en Monto BsF');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            if(!$this->getInt('status')){
                $this->_views->assign('error','Error en Status');
                $this->_views->renderizar('new','closebsf');
                exit;
            };

            if(!$this->getTexto('concepto')){
                $this->_views->assign('error','Debe introducir datos de conceptos');
                $this->_views->renderizar('new','closebsf');
                exit;
            }

            $this->_lastID = $this->_closebsf->getLastID();
            if($this->_lastID == 0){
                $this->_lastID = 1;
            }
            else{
                $this->_lastID = $this->_lastID + 1;
            }

            $this->_nameTrans = $this->_generalDat->getNameTrans('tip_tranbank');

            $this->_IDcloseBSF = $this->getNumCloseBsF($this->_lastID,'fecha_closebsf',$this->_nameTrans,'cuentcomp','nro_transaccion');

            $this->_closebsf->registrarCloseBsf(
                $this->_IDcloseBSF,
                $this->getInt('cierrediv'),
                $this->getInt('liquidador'),
                $this->getInt('bankscomp'),
                $this->getAlphaNum('cuentcomp'),
                $this->getInt('tip_tranbank'),
                $this->getInt('status'),
                $this->getAlphaNum('nro_transaccion'),
                $this->getPostParam('fecha_closebsf'),
                $this->getMonto('monto_dls'),
                $this->getMonto('tasa_cambio'),
                $this->getMonto('monto_bsf'),
                $this->getPostParam('concepto')
            );

            $this->redireccionar('closebsf');

        }

        $this->_views->renderizar('new','cierrebsf');
    }

    public function getBanksComp()
    {
        if($this->getInt('id_comprador'))
            echo json_encode($this->_closebsf->getBanksComp($this->getInt('id_comprador')));
    }

    public function getCountsComp()
    {
        if($this->getInt('id_comprador') && $this->getInt('id_banco'))
            echo json_encode($this->_closebsf->getCountComp($this->getInt('id_comprador'),$this->getInt('id_banco')));
    }

    public function getNumCloseBsF($lastId,$fecha,$nameTrans,$nroCount,$nro_trans)
    {
        $new_lastId = str_pad(intval($lastId),4,'0',STR_PAD_LEFT);

        $new_fecha = $_POST[$fecha];
        $new_fecha = explode("-",$new_fecha);
        $new_fecha = $new_fecha[0].$new_fecha[1].$new_fecha[2];

        $new_nameTrans = substr($nameTrans,0,3);

        $new_nameCount = substr($_POST[$nroCount],-6);

        $new_nroTrans = substr($_POST[$nro_trans],-5);

        $numclosebsf = $new_nameTrans . '-' . $new_nroTrans . '-' . $new_nameCount . '-' . $new_fecha . '-' . $new_lastId;

        return $numclosebsf;

    }

    public function getCloseBsF()
    {
        if($this->getIntGET('id_cierrebsf'))
            echo json_encode($this->_closebsf->getClosBsftot($this->getIntGET('id_cierrebsf')));
    }

    public function status($id_cierrebsf)
    {
        $monto_liq = 0;
        $monto_clomat = 0;
        $monto_x_clomat = 0;

        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closebsf');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $monto_liq = $this->_closebsf->getMontoLiq($id_cierrebsf);
        $monto_clomat = $this->_closebsf->getMontoCloMat($id_cierrebsf);

        $monto_x_clomat = $monto_liq - $monto_clomat;

        $this->_views->assign('titulo_pri','LIQ. DIV. BsF');
        $this->_views->assign('titulo_mod','STATUS LIQ. DIV.');
        $this->_views->setModulo('closebsf');
        if ($monto_clomat <> 0){
            $this->_views->assign('liqdivbsf',$this->_closebsf->getCierreBsf($id_cierrebsf));
            $this->_views->assign('montoliq',$monto_liq);
            $this->_views->assign('montoclomat',$monto_clomat);
            $this->_views->assign('montoxclomat',$monto_x_clomat);
            $this->_views->assign('cierremat',$this->_closebsf->getStatusCloBsF($id_cierrebsf));
        }
        $this->_views->renderizar('status','cierrediv');
    }

    public function verificarMontoCol()
    {
        $verificador = array();
        $verificador['success'] = false;

        if($this->getInt('id_cierrediv')){

            $monto_cierre = $this->_closebsf->getMontoCloDiv($this->getInt('id_cierrediv'));
            $monto_liqbsf = $this->_closebsf->getTotalLiq($this->getInt('id_cierrediv'));

            $monto_resto = $monto_cierre - $monto_liqbsf;

            if($this->getMonto('monto_dls') <= $monto_resto){
                $verificador['success'] = true;
            }
        }

        echo json_encode($verificador);

    }
}