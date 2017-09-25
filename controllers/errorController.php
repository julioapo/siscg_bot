<?php
/**
 * Created by SISTEMAS MJA MARTINEZ FP
 * User: JULIO APONTE
 * Date: 01/07/16
 * Time: 01:13 AM
 */

class ErrorController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','Error');
        $this->_views->assign('error',$this->_getError());
        $this->_views->renderizar('index','Error');
    }

    public function accessError($codigo)
    {
        $this->_views->setModulo();
        $this->_views->assign('titulo_mod','Acceso de Error');
        $this->_views->assign('error',$this->_getError($codigo));
        $this->_views->renderizar('index','Error');
    }

    private function _getError($codigo = false)
    {
        if($codigo){
            $codigo = $this->filtrarInt($codigo);
            if (is_int($codigo))
                $codigo = $codigo;
        }
        else {
            $codigo = 'default';
        }

        $error['default'] = 'Ha ocurrido un error y la pagina no se puede mostrar!!!';
        $error['1000'] = 'Acceso restringido';
        $error['1010'] = 'Tiempo de session expirada!!!';

        if (array_key_exists($codigo,$error)) {
            return $error[$codigo];
        }
        else {
            return $error['default'];
        }
    }


}
