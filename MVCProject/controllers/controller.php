<?php

class Controller {
protected $_view;
protected $_model;
    function __construct() {
        require_once 'lib/view.php';
        $this->_view=new View();
    }
    
    function loadmodel($name){
        if(file_exists('model/'.$name.'.php'))
        {
            require_once 'model/'.$name.'.php';
            $this->_model=new $name();
        }
                
    }

}

