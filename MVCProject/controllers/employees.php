<?php

require_once 'controller.php';

class Employees extends controller {

    function __construct() {
        parent::__construct();
        parent::loadmodel('employees_model');
        $this->_view->idEmployee = '';
        $this->_view->nameEmployee = '';
        $this->_view->timeHiredEmployee = '';
    }

    public function index() {

        $this->_view->massage = '';
        $this->_view->render('employees/index.php');
    }

    function crud() {
        $action = '_' . str_replace(' ', '', $_POST['action']);
        $this->{$action}();
    }
    function selectFromTable() {
        
        $this->_select();
    }

    private function _select() {
       

        $this->_view->massage = $this->_model->{str_replace('_', '', __FUNCTION__)}();
        $this->_view->idEmployee = $this->_model->result['idEmployee'];
        $this->_view->nameEmployee = $this->_model->result['nameEmployee'];
        $this->_view->timeHiredEmployee = $this->_model->result['timeHiredEmployee'];
        
        $this->_view->render('employees/index.php');
    }

    private function _selectall() {
        $this->_view->massage = $this->_model->{str_replace('_', '', __FUNCTION__)}();
        $this->_view->render('employees/index.php');
    }

    private function _update() {
        $this->_view->massage = $this->_model->{str_replace('_', '', __FUNCTION__)}();
        $this->_view->render('employees/index.php');
    }

    private function _delete() {
        $this->_view->massage = $this->_model->{str_replace('_', '', __FUNCTION__)}();
        $this->_view->render('employees/index.php');
    }

    private function _insert() {
        $this->_view->massage = $this->_model->{str_replace('_', '', __FUNCTION__)}();
        $this->_view->render('employees/index.php');
    }

}
