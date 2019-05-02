<?php
class Starter {
    private $_url=null;
    private $_cont=null;
    function __construct()
    {
        /**
         * get url
         */
        $this->_getUrl();
        /**
         * load default controllers
         */
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
        }        if($this->_url[0]=='admin')
        {
            if (empty($this->_url[1])) {
                $this->_loadAdminDefaultController();
            }
            $this->_loadAdminExistingController();
            $this->_callAdminControllerMethod();
            exit;
        }
        /**
         * load existing controllers
         */
        $this->_loadExistingController();
        /**
         * call to controllers method
         */
        $this->_callControllerMethod();
    }
    private function _getUrl()
    {
        $this->_url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $this->_url = rtrim($this->_url, '/');
        //to check wether the URL is valid or not
        $this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $this->_url);
    }
    private function _loadDefaultController()
    {
        require 'controllers/home.php';
        $this->_cont = new Home();
        $this->_cont->loadModel('home');
        $this->_cont->index();
        exit();
    }
    private function _loadAdminDefaultController()
    {
        require 'admin/controllers/login.php';
        $this->_cont = new Login();
        $this->_cont->loadModel('login');
        $this->_cont->index();        exit();
    }   
	private function _loadExistingController()
    {        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_cont =  new $this->_url[0];
            $this->_cont->loadModel($this->_url[0]);
        } else {
//            print_t($file);
//            exit;
            $this->_error();
        }
    }
    private function _loadAdminExistingController()
    {
        $file = 'admin/controllers/' . $this->_url[1] . '.php';
        if (file_exists($file)) {
            require $file;
            $this->_cont =  new $this->_url[1];
            $this->_cont->loadAdminModel($this->_url[1]);
        } else {
            $this->_error();
        }
    }
    /**
     * http://localhost/Controller/Param
     * url[0]=Controller
     * url[1]=Method
     * url[2]=Param
     */
    private function _callControllerMethod()
    {
        $length = count($this->_url);
        if ($length > 1) {
            if (!method_exists($this->_cont, $this->_url[1])) {
                $this->_error();
            }
        }
        switch ($length) {
            case 2:
                    $this->_cont->{$this->_url[1]}();
                break;
            case 3:
                $this->_cont->{$this->_url[1]}($this->_url[2]);
                break;
            case 4:
                $this->_cont->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 5:
                $this->_cont->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            default:
                $this->_cont->index();
                break;
        }
    }
    private function _callAdminControllerMethod()
    {        $length = count($this->_url);
        if ($length > 2) {            if (!method_exists($this->_cont, $this->_url[2])) {
                $this->_error();
            }
        }
        switch ($length) {
            case 3:
                $this->_cont->{$this->_url[2]}();
                break;
            case 4:
                $this->_cont->{$this->_url[2]}($this->_url[3]);
                break;
            case 5:
                $this->_cont->{$this->_url[2]}($this->_url[3], $this->_url[4]);
                break;
            case 6:
                $this->_cont->{$this->_url[2]}($this->_url[3], $this->_url[4], $this->_url[5]);
                break;
            default:
                $this->_cont->index();
                break;
        }
    }
    private function _error()
    {
        require 'controllers/error.php';
        $this->_cont = new Error();
        $this->_cont->index();
        exit;
    }
}
