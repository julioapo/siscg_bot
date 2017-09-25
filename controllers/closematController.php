<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 18/07/16
 * Time: 11:24 PM
 */

class closematController extends Controller {

    private $_closemat;

    private $_generalDat;

    private $_lastID;

    private $_IDcloseMAT;

    function __construct()
    {
        parent::__construct();
        $this->_closemat = $this->loadModel('closemat');
        $this->_generalDat = $this->loadModel('general');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closemat');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','CIERRE MAT.');
        $this->_views->setIncFileJs(array('closemat'));
        $this->_views->assign('ruta',$this->_views->setIncFileTpl('show_dat'));
        $this->_views->assign('ruta_agregar','closemat/nuevo');
        $this->_views->assign('cierresmat',$this->_closemat->getClosesMat());
        $this->_views->assign('titulo_agregar','Agregar Cierre Mat.');
        $this->_views->renderizar('index','closemat');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nuevo_cierremat');

        $this->_views->assign('titulo_pri','CIERRE MAT.');
        $this->_views->assign('titulo_mod','NUEVO C. MAT');
        $this->_views->setModulo('closemat');
        $this->_views->setIncFileJs(array('closemat'));
        $this->_views->assign('status', $this->_generalDat->getStatusCierres());
        $this->_views->assign('liqdivbsf',$this->_closemat->getLiqDivBsf());
        $this->_views->assign('masmat',$this->_closemat->getMamat());

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        if ($this->getInt('insertar') == 1){

            if(!$this->getInt('id_mamat')){
                $this->_views->assign('error',"Error en Mayorista");
                $this->_views->renderizar('new','closemat');
                exit;
            }

            if(!$this->getInt('id_liqdivbsf')){
                $this->_views->assign('error','Error en Liquidacion de Divisas');
                $this->_views->renderizar('new','closemat');
                exit;
            }

            if(!$this->validarFecha('fecha_close')) {
                $this->_views->assign('error', 'Error en Fecha');
                $this->_views->renderizar('new', 'closemat');
                exit;
            }

            if(!$this->getSql('gramas_close')){
                $this->_views->assign('error','Error en Monto Divisas');
                $this->_views->renderizar('new','closemat');
                exit;
            }

            if(!$this->getSql('precio_gramas')){
                $this->_views->assign('error','Error en Tasa de Cambio');
                $this->_views->renderizar('new','closemat');
                exit;
            }

            if(!$this->getSql('monto_total_close')){
                $this->_views->assign('error','Error en Monto BsF');
                $this->_views->renderizar('new','closemat');
                exit;
            }

            if(!$this->getTexto('observacion')){
                $this->_views->assign('error','Debe datos de observaciones');
                $this->_views->renderizar('new','closemat');
                exit;
            }

            $this->_lastID = $this->_closemat->getLastID();
            if($this->_lastID == 0){
                $this->_lastID = 1;
            }
            else {
                $this->_lastID = $this->_lastID + 1;
            }

            $this->_IDcloseMAT = $this->getNumCloseMat($this->_lastID,'id_mamat','id_liqdivbsf','fecha_close');

            $this->_closemat->insertarCloseMat(
                $this->_IDcloseMAT,
                $this->getInt('id_mamat'),
                $this->getInt('id_liqdivbsf'),
                $this->getPostParam('fecha_close'),
                $this->getMonto('gramas_close'),
                $this->getMonto('precio_gramas'),
                $this->getMonto('monto_total_close'),
                $this->getPostParam('observacion')
            );

            $this->redireccionar('closemat');

        }

        $this->_views->renderizar('new','cierremat');
    }

    public function getNumCloseMat($lastId,$id_mamat,$id_liqdivbsf,$fecha)
    {
        $new_lastId = str_pad(intval($lastId),4,'0',STR_PAD_LEFT);

        $new_fecha = $_POST[$fecha];
        $new_fecha = explode("-",$new_fecha);
        $new_fecha = $new_fecha[0].$new_fecha[1].$new_fecha[2];

        $new_id_mamat = $_POST[$id_mamat];

        $new_id_liqdivbsf = $_POST[$id_liqdivbsf];

        $numclosemat = $new_id_mamat . '-' . $new_id_liqdivbsf . '-' . $new_fecha . '-' . $new_lastId;

        return $numclosemat;

    }

    public function getCloseMat()
    {
        if($this->getIntGET('id_cierremat'))
            echo json_encode($this->_closemat->getClosMattot($this->getIntGET('id_cierremat')));
    }

    public function status($id_closemat)
    {
        $total_puro_ent = 0;
        $total_cierre_mat = 0;
        $total_status_cierre_mat = 0;
        $total_abono = 0;
        $total_monto_cierre = 0;
        $total_status_monto_cierre = 0;

        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('closemat');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        // SE DESARROLLA SOLO PARA LAS ENTREGAS DE MATERIAL

        $total_puro_ent = $this->_closemat->getTotalPuroEntrega($id_closemat);
        $total_cierre_mat = $this->_closemat->getTotalCierre($id_closemat);
        $total_status_cierre_mat = $total_cierre_mat - $total_puro_ent;

        // SE DESARROLLA SOLO PARA ABONOS DE CIERRES

        $total_abono = $this->_closemat->getTotalAbono($id_closemat);;
        $total_monto_cierre = $this->_closemat->getTotalMontoCierre($id_closemat);
        $total_status_monto_cierre = $total_monto_cierre - $total_abono;

        $this->_views->assign('titulo_pri','CIERRE MAT');
        $this->_views->assign('titulo_mod','STATUS CIERRE. MAT.');
        $this->_views->setModulo('closemat');
        if ($total_status_cierre_mat <> 0){
            $this->_views->assign('cierremat',$this->_closemat->getClosesMatSta($id_closemat));
            $this->_views->assign('cierre',$total_cierre_mat);
            $this->_views->assign('entregapuro',$total_puro_ent);
            $this->_views->assign('cierrexentrega',$total_status_cierre_mat);
            $this->_views->assign('entregas',$this->_closemat->getEntMats($id_closemat));
        }
        if ($total_status_monto_cierre <> 0){
            $this->_views->assign('cierreabo',$this->_closemat->getClosesMatSta($id_closemat));
            $this->_views->assign('cierremotto',$total_monto_cierre);
            $this->_views->assign('abono',$total_abono);
            $this->_views->assign('montoxabono',$total_status_monto_cierre);
            $this->_views->assign('abonos',$this->_closemat->getAboMats($id_closemat));
        }
        $this->_views->renderizar('status','cierrediv');
    }

    public function verificarTotCie()
    {
        $verificador = array();
        $verificador['success'] = false;

        if($this->getInt('id_liqdivbsf')){

            $monto_liqbsf = $this->_closemat->getMontoLiq($this->getInt('id_liqdivbsf'));
            $monto_totciemat = $this->_closemat->getTotalCieMat($this->getInt('id_liqdivbsf'));

            $monto_resto = $monto_liqbsf - $monto_totciemat;

            if($this->getMonto('monto_totcie') <= $monto_resto){
                $verificador['success'] = true;
            }
        }

        echo json_encode($verificador);
    }
}