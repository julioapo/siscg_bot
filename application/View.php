<?php
/**
 * Created by SISTEMAS JMA MARTINEZ, FP.
 * User: Julio Aponte
 * Date: 29/06/16
 * Time: 11:27 AM
 */

require_once ROOT . 'libs' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';


class View extends Smarty {
    private $_controlador;

    private $_js;

    private $_file;

    private $_tpl;

    private $_modulo;

    private $_acl;

    /**
     * @param Request $peticion
     */
    public function __construct(Request $peticion, Acl $_acl)
    {
        parent::__construct();
        $this->_controlador = $peticion->getControlador();
        $this->_js = array();
        $this->_acl = $_acl;
    }

    /**
     * @param $vista
     * @param bool $item
     * @throws Exception
     */
    public function renderizar($vista, $item=false, $login=false)
    {
        if($login){
            $this->template_dir = ROOT . DS . 'views/login' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
        }
        else{
            $this->template_dir = ROOT . DS . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
        }

        $this->config_dir = ROOT . DS . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = ROOT . 'tmp' . DS . 'cache' . DS;
        $this->compile_dir = ROOT . 'tmp' . DS . 'template' . DS;
        $js = array();
        $file = array();
        $tpl = array();
        $modulo = '';

        if (count($this->_js)) {
            $js = $this->_js;
        }

        //$rutaViews = ROOT . 'views/closediv/show_dat.tpl';

        if (count($this->_tpl)) {
            $tpl = $this->_tpl;
        }

        if (count($this->_file)){
            $file = $this->_file;
        }

        if(isset($this->_modulo)){
            $modulo = $this->_modulo;
        }

        $_params = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'modulo' => $modulo,
            'file' => $file,
            'js' => $js,
            'item' => $item,
            'root' => BASE_URL,
            'configs' => array(
                'app_name' => APP_NAME,
                'app_foot' => APP_FOOT
            )
        );

        $rutaView = ROOT . 'views' . DS . strtolower($this->_controlador) . DS . $vista . '.tpl';

        if(is_readable($rutaView))
        {
            $this->assign('_contenido',$rutaView);
        }
        else {
            throw new Exception("Error de Vista");
        }
        $this->assign('_acl',$this->_acl);
        $this->assign('_layoutParams',$_params);
        $this->display('template.tpl');
    }

    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for ($i=0; $i < count($js); $i++) {
                $this->_js[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $js[$i] .'.js';
            }
        } else {
            throw new Exception("Error de js");
        }
    }

    public function setModulo($namemod=false)
    {
        if(isset($namemod)){
            $this->_modulo = BASE_URL . $namemod;
        }else{
            $this->_modulo = BASE_URL;
        }
    }

    public function setIncFileJs(array $file)
    {
        if(is_array($file) && count($file)){
            for ($i=0; $i < count($file); $i++) {
                $this->_file[] = BASE_URL . 'views/' . $this->_controlador . '/js/' . $file[$i] .'.js';
            }
        }
        else{
            $this->_file = BASE_URL;
        }
    }

    public function setIncFileTpl($tpl)
    {
        $tpl = ROOT . 'views/' . $this->_controlador . '/includes/' . $tpl .'.tpl';
        return $tpl;
    }

} 