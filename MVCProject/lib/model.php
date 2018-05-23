<?php

class Model {

    function __construct() {
        $this->db = new Database();
    }
    
    function index()
    {
        echo 'check';
    }

}

