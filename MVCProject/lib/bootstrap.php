<?php

class Bootstrap {

    private $_controller;
    private $_controllerObj;
    private $_action;
    private $_p1;
    private $_p2;

    function __construct() {
//        echo 'bootstrap constructor<br>';
    }

    public function init() {
        $this->_parseParams();
        if ($this->_createController())
            $this->_execute();
    }

    private function _parseParams() {

        $uri = isset($_GET['uri']) ? $_GET['uri'] : 'Employees/index';
        $uri = explode('/', $uri);
        $this->_controller = $uri[0];
        $this->_action = isset($uri[1]) ? $uri[1] : 'index';
        $this->_p1 = isset($uri[2]) ? $uri[2] : null;
        $this->_p2 = isset($uri[3]) ? $uri[3] : null;
    }

    private function _createController() {
        $file = 'controllers/' . $this->_controller . '.php';
        if (file_exists($file)) {
            require_once $file;
            $this->_controllerObj = new $this->_controller;
            return true;
        } else {
            $this->_error('the file "'.$this->_controller.'" not found');
            return false;
        }
    }

    private function _execute() {

        if ($this->_p1!=null and $this->_p2!=null) {
            $this->_controllerObj->a = $this->_p1;
            $this->_controllerObj->b = $this->_p2;
        }
        if(method_exists($this->_controllerObj, $this->_action))
        $this->_controllerObj->{$this->_action}();
        else{
            $this->_error('the function "'.$this->_action.'" not found');
        }
    }

    private function _error($msg) {
        require_once 'controllers/error.php';
        $arr=new AppError($msg);
        $arr->index();
        
    }

}
