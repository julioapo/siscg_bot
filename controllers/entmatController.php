<?php
/**
 * Created by SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 20/07/16
 * Time: 10:58 PM
 */

class entmatController extends Controller {

    private $_entmat;


    public function __construct()
    {
        parent::__construct();
        $this->_entmat = $this->loadModel('entmat');
    }

    public function index()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('entmat');

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','ENTREGA MATERIAL');
        $this->_views->assign('ruta_agregar','entmat/nuevo');
        $this->_views->assign('entmat',$this->_entmat->getEntMats());
        $this->_views->assign('titulo_agregar','Agregar Ent. Mat.');
        $this->_views->renderizar('index','entmat');
    }

    public function nuevo()
    {
        if (!Session::getSession('autenticado')) {
            $this->redireccionar();
        }

        $this->_acl->permisosConAcl('nueva_entmat');

        $this->_views->assign('titulo_pri','ENTREGA MATERIAL');
        $this->_views->assign('titulo_mod','NUEVO ENT. MAT.');
        $this->_views->setModulo('entmat');
        $this->_views->setIncFileJs(array('entmat'));
        $this->_views->assign('nommamat', $this->_entmat->getNomMaMat());

        if(isset($_GET['mensaje'])){
            $mensaje=$this->getMessage($_GET['mensaje']);
            $this->_views->assign('mensaje',$mensaje);
        }

        if ($this->getInt('insertar') == 1){

            if(!$this->validarFecha('fecha')){
                $this->_views->assign('error','Error en Fecha');
                $this->_views->renderizar('new','entmat');
                exit;
            }

            if(!$this->getMonto('gramos')){
                $this->_views->assign('error','Error en Gramas');
                $this->_views->renderizar('new','entmat');
                exit;
            }

            if(!$this->getMonto('ley')){
                $this->_views->assign('error','Error en Ley');
                $this->_views->renderizar('new','entmat');
                exit;
            }

            if(!$this->getMonto('puro')){
                $this->_views->assign('error','Error en Puro');
                $this->_views->renderizar('new','entmat');
                exit;
            }

            if(!$this->getInt('id_closemat')){
                $this->_views->assign('error','Error en Cierre');
                $this->_views->renderizar('new','entmat');
                exit;
            }

            $this->_entmat->registrarEntMat(
                $this->getPostParam('fecha'),
                $this->getPostParam('gramos'),
                $this->getPostParam('ley'),
                $this->getPostParam('puro'),
                $this->getInt('id_closemat')
            );

            $this->redireccionar('entmat');

        }

        $this->_views->renderizar('new','entmat');
    }

    public function getCierreMat()
    {
        if($this->getInt('id_mamat'))
            echo json_encode($this->_entmat->getCierreMat($this->getInt('id_mamat')));
    }
}